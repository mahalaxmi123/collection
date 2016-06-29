<?php


defined('MOODLE_INTERNAL') || die;
$settings = null;

if (is_siteadmin()) {

    $ADMIN->add('themes', new admin_category('theme_healthcert', 'Healthcert'));
	
	/* Header Settings */
	$temp = new admin_settingpage('theme_healthcert_generalsettings', get_string('generalsettings', 'theme_healthcert'));	

    // Logo file setting.
    $name = 'theme_healthcert/logo';
    $title = get_string('logo','theme_healthcert');
    $description = get_string('logodesc', 'theme_healthcert');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Footnote setting.
    $name = 'theme_healthcert/footnote';
    $title = get_string('footnote', 'theme_healthcert');
    $description = get_string('footnotedesc', 'theme_healthcert');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	
	// Custom CSS file.
    $name = 'theme_healthcert/customcss';
    $title = get_string('customcss', 'theme_healthcert');
    $description = get_string('customcssdesc', 'theme_healthcert');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				
	$ADMIN->add('theme_healthcert', $temp);
	
	
	/*Slideshow Settings Start */				
	$temp = new admin_settingpage('theme_healthcert_slideshow', get_string('slideshowheading', 'theme_healthcert'));
    $temp->add(new admin_setting_heading('theme_healthcert_slideshow', get_string('slideshowheadingsub', 'theme_healthcert'),
    format_text(get_string('slideshowdesc', 'theme_healthcert'), FORMAT_MARKDOWN)));
				
	// Display Slideshow.
    $name = 'theme_healthcert/toggleslideshow';
    $title = get_string('toggleslideshow', 'theme_healthcert');
    $description = get_string('toggleslideshowdesc', 'theme_healthcert');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				
	// Number of slides.
    $name = 'theme_healthcert/numberofslides';
    $title = get_string('numberofslides', 'theme_healthcert');
    $description = get_string('numberofslides_desc', 'theme_healthcert');
    $default = 3;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
    );
    
	$temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));				

    $numberofslides = get_config('theme_healthcert', 'numberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {
				    
		// This is the descriptor for Slide One
        $name = 'theme_healthcert/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_healthcert', array('slide' => $i));
        $information = get_string('slidenodesc', 'theme_healthcert', array('slide' => $i));
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);
								
		// Slide Image.
        $name = 'theme_healthcert/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_healthcert');
        $description = get_string('slideimagedesc', 'theme_healthcert');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Caption.
        $name = 'theme_healthcert/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_healthcert');
        $description = get_string('slidecaptiondesc', 'theme_healthcert');
        $default = get_string('slidecaptiondefault','theme_healthcert', array('slideno' => sprintf('%02d', $i) ));
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
		
		// Slide description.
        $name = 'theme_healthcert/slide' . $i . 'description';
        $title = get_string('slidedescription', 'theme_healthcert');
        $description = get_string('slidedescriptiondesc', 'theme_healthcert');
        $default = get_string('slidedescriptiondefault','theme_healthcert', array('slideno' => sprintf('%02d', $i) ));
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
								
		// Slide Description Text.
		$name = 'theme_healthcert/slide' . $i . 'url';
		$title = get_string('slideurl', 'theme_healthcert');
		$description = get_string('slideurldesc', 'theme_healthcert');
		$default = 'http://www.example.com/';
		$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
							
		}				
	    $ADMIN->add('theme_healthcert', $temp);
		/* Slideshow Settings End Here*/
		
		
		
		
		
		$temp = new admin_settingpage('theme_healthcert_footer', get_string('footerheading', 'theme_healthcert'));
				
		// Footer Logo file setting.
		$name = 'theme_healthcert/footerlogo';
		$title = get_string('footerlogo','theme_healthcert');
		$description = get_string('footerlogodesc', 'theme_healthcert');
		$setting = new admin_setting_configstoredfile($name, $title, $description, 'footerlogo');
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
		
		$name = 'theme_healthcert/quicklink';
		$title = get_string('quicklink', 'theme_healthcert');
		$description = get_string('quicklink_desc', 'theme_healthcert');
		$default = get_string('quicklinkdefault', 'theme_healthcert');
		$setting = new admin_setting_configtextarea($name, $title, $description, $default);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
		
		$name = 'theme_healthcert/infolink';
		$title = get_string('infolink', 'theme_healthcert');
		$description = get_string('infolink_desc', 'theme_healthcert');
		$default = get_string('infolinkdefault', 'theme_healthcert');
		$setting = new admin_setting_configtextarea($name, $title, $description, $default);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
		
		

		/*Address, Email, Phone No */					
		$name = 'theme_healthcert/phoneno';
		$title = get_string('phoneno', 'theme_healthcert');
		$description = '';
		$default = '';
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
					
		$name = 'theme_healthcert/faxno';
		$title = get_string('faxno', 'theme_healthcert');
		$description = '';
		$default = '';
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
		
		$name = 'theme_healthcert/address';
		$title = get_string('address', 'theme_healthcert');
		$description = '';
		$default = '';
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
		
		$name = 'theme_healthcert/address2';
		$title = get_string('address2', 'theme_healthcert');
		$description = '';
		$default = '';
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
		
		
		/* Facebook,Pinterest,Twitter,Google+ Settings */
		$name = 'theme_healthcert/fburl';
		$title = get_string('fburl', 'theme_healthcert');
		$description = get_string('fburldesc', 'theme_healthcert');
		$default = get_string('fburl_default','theme_healthcert');
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
		
		$name = 'theme_healthcert/twurl';
		$title = get_string('twurl', 'theme_healthcert');
		$description = get_string('twurldesc', 'theme_healthcert');
		$default = get_string('twurl_default','theme_healthcert');
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
		
		$name = 'theme_healthcert/liurl';
		$title = get_string('liurl', 'theme_healthcert');
		$description = get_string('liurldesc', 'theme_healthcert');
		$default = get_string('liurl_default','theme_healthcert');
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
					
		$name = 'theme_healthcert/gpurl';
		$title = get_string('gpurl', 'theme_healthcert');
		$description = get_string('gpurldesc', 'theme_healthcert');
		$default = get_string('gpurl_default','theme_healthcert');
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$temp->add($setting);
		
		$ADMIN->add('theme_healthcert', $temp);
		/*Footer Settings end*/	
}

