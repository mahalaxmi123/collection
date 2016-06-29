<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle's ICIS theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_icis
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//$settings = null;


$settings = null;


defined('MOODLE_INTERNAL') || die;

global $PAGE;

$ADMIN->add('themes', new admin_category('theme_icis', 'ICIS'));



	/*Color and Logo Settings */
    $temp = new admin_settingpage('theme_icis_colors', get_string('generalsetting', 'theme_icis'));
    $temp->add(new admin_setting_heading('theme_icis_colors', get_string('generalsettingsub', 'theme_icis'),
    		format_text(get_string('generalsettingsdesc' , 'theme_icis'), FORMAT_MARKDOWN)));

    // Logo file setting.
    $name = 'theme_icis/logo';
    $title = new lang_string('logo', 'theme_icis');
    $description = new lang_string('logodesc', 'theme_icis');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	

    // Logo alt text.
    $name = 'theme_icis/alttext';
    $title = new lang_string('alttext', 'theme_icis');
    $description = new lang_string('alttextdesc', 'theme_icis');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Favicon file setting.
    $name = 'theme_icis/favicon';
    $title = new lang_string('favicon', 'theme_icis');
    $description = new lang_string('favicondesc', 'theme_icis');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, array('accepted_types' => '.ico'));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);    
	
	 // Footnote setting.
    $name = 'theme_icis/footnote';
    $title = get_string('footnote', 'theme_icis');
    $description = get_string('footnotedesc', 'theme_icis');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


	// Footerlink setting.
	$name = 'theme_icis/footlink';
	$title = get_string('footlink', 'theme_icis');
	$description = get_string('footlinkdesc', 'theme_icis');
	$default = '';
	$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
	

    // Custom CSS file.
    $name = 'theme_icis/customcss';
    $title = new lang_string('customcss','theme_icis');
    $description = new lang_string('customcssdesc', 'theme_icis');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	//Quote on front page setting.
    $name = 'theme_icis/quote';
    $title = get_string('quote', 'theme_icis');
    $description = get_string('quotedes', 'theme_icis');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	$ADMIN->add('theme_icis', $temp);
	
	/* Banner Settings */
    $temp = new admin_settingpage('theme_icis_banner', get_string('bannersettings', 'theme_icis'));
    $temp->add(new admin_setting_heading('theme_icis_banner', get_string('bannersettingssub', 'theme_icis'),
            format_text(get_string('bannersettingsdesc' , 'theme_icis'), FORMAT_MARKDOWN)));

    // Set Number of Slides.
    $name = 'theme_icis/slidenumber';
    $title = get_string('slidenumber' , 'theme_icis');
    $description = get_string('slidenumberdesc', 'theme_icis');
    $default = '1';
    $choices = array(
		'0'=>'0',
    	'1'=>'1',
    	'2'=>'2',
    	'3'=>'3',
    	'4'=>'4',
    	'5'=>'5',
    	'6'=>'6',
    	'7'=>'7',
    	'8'=>'8',
    	'9'=>'9',
    	'10'=>'10');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Set the Slide Speed.
    $name = 'theme_icis/slidespeed';
    $title = get_string('slidespeed' , 'theme_icis');
    $description = get_string('slidespeeddesc', 'theme_icis');
    $default = '600';
    $setting = new admin_setting_configtext($name, $title, $description, $default );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $hasslidenum = (!empty($PAGE->theme->settings->slidenumber));
    if ($hasslidenum) {
    		$slidenum = $PAGE->theme->settings->slidenumber;
	} else {
		$slidenum = '1';
	}

	$bannertitle = array('', '', '','','','','', '', '', '');

    foreach (range(1, $slidenum) as $bannernumber) {

    	// This is the descriptor for the Banner Settings.
    	$name = 'theme_icis/banner';
        $title = get_string('bannerindicator', 'theme_icis');
    	$information = get_string('bannerindicatordesc', 'theme_icis');
    	$setting = new admin_setting_heading($name.$bannernumber, $title.$bannernumber, $information);
    	$setting->set_updatedcallback('theme_reset_all_caches');
    	$temp->add($setting);

        // Enables the slide.
        $name = 'theme_icis/enablebanner' . $bannernumber;
        $title = get_string('enablebanner', 'theme_icis', $bannernumber);
        $description = get_string('enablebannerdesc', 'theme_icis', $bannernumber);
        $default = false;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Title.
        $name = 'theme_icis/bannertitle' . $bannernumber;
        $title = get_string('bannertitle', 'theme_icis', $bannernumber);
        $description = get_string('bannertitledesc', 'theme_icis', $bannernumber);
        $default = $bannertitle[$bannernumber - 1];
        $setting = new admin_setting_configtext($name, $title, $description, $default );
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide text.
        $name = 'theme_icis/bannertext' . $bannernumber;
        $title = get_string('bannertext', 'theme_icis', $bannernumber);
        $description = get_string('bannertextdesc', 'theme_icis', $bannernumber);
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Text for Slide Link.
        $name = 'theme_icis/bannerlinktext' . $bannernumber;
        $title = get_string('bannerlinktext', 'theme_icis', $bannernumber);
        $description = get_string('bannerlinktextdesc', 'theme_icis', $bannernumber);
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Destination URL for Slide Link
        $name = 'theme_icis/bannerlinkurl' . $bannernumber;
        $title = get_string('bannerlinkurl', 'theme_icis', $bannernumber);
        $description = get_string('bannerlinkurldesc', 'theme_icis', $bannernumber);
        $default = '';
        $previewconfig = null;
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Image.
    	$name = 'theme_icis/bannerimage' . $bannernumber;
    	$title = get_string('bannerimage', 'theme_icis', $bannernumber);
    	$description = get_string('bannerimagedesc', 'theme_icis', $bannernumber);
    	$setting = new admin_setting_configstoredfile($name, $title, $description, 'bannerimage'.$bannernumber);
    	$setting->set_updatedcallback('theme_reset_all_caches');
    	$temp->add($setting);    	

    }

 	$ADMIN->add('theme_icis', $temp);
	
	
	
	
	//For Galery Album

    $temp = new admin_settingpage('theme_icis_gallery', get_string('gallerysettings', 'theme_icis'));
    $temp->add(new admin_setting_heading('theme_icis_gallery', get_string('gallerysettingssub', 'theme_icis'),
            format_text(get_string('gallerysettingsdesc' , 'theme_icis'), FORMAT_MARKDOWN)));
	
	// Text for Gallery Title.
	$name = 'theme_icis/gallerymaintitle';
	$title = get_string('gallerymaintitle', 'theme_icis');
	$description = get_string('gallerymaintitledes', 'theme_icis');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
	
	//Text for Gallery Description.
    $name = 'theme_icis/gallerydes';
    $title = get_string('gallerydes', 'theme_icis');
    $description = get_string('gallerydes', 'theme_icis');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	
	// Set Number of Slides.
    $name = 'theme_icis/galleryspotnumber';
    $title = get_string('galleryspotnumber' , 'theme_icis');
    $description = get_string('galleryspotnumberdesc', 'theme_icis');
    $default = '1';
    $choices = array(
		'0'=>'0',
    	'1'=>'1',
    	'2'=>'2',
    	'3'=>'3',
    	'4'=>'4',
    	'5'=>'5',
    	'6'=>'6',
    	'7'=>'7',
    	'8'=>'8',
    	'9'=>'9',
		'10'=>'10',
    	'11'=>'11',
    	'12'=>'12');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $hasgalleryspotnum = (!empty($PAGE->theme->settings->galleryspotnumber));
    if ($hasgalleryspotnum) {
    		$galleryspotnum = $PAGE->theme->settings->galleryspotnumber;
	} else {
		$galleryspotnum = '1';
	}

    foreach (range(1, $galleryspotnum) as $gallerynumber) {
		
        // Enables the galleryspot.
        $name = 'theme_icis/enablegallery' . $gallerynumber;
        $title = get_string('enablegallery', 'theme_icis', $gallerynumber);
        $description = get_string('enablegallerydesc', 'theme_icis', $gallerynumber);
        $default = false;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
       
        // Slide Image.
    	$name = 'theme_icis/galleryimage' . $gallerynumber;
    	$title = get_string('galleryimage', 'theme_icis', $gallerynumber);
    	$description = get_string('galleryimagedesc', 'theme_icis', $gallerynumber);
    	$setting = new admin_setting_configstoredfile($name, $title, $description, 'galleryimage'.$gallerynumber);
    	$setting->set_updatedcallback('theme_reset_all_caches');
    	$temp->add($setting);
		
		
		 // Destination URL for Slide Link
        $name = 'theme_icis/galleryitemname' . $gallerynumber;
        $title = get_string('galleryitemname', 'theme_icis', $gallerynumber);
        $description = get_string('galleryitemnamedesc', 'theme_icis', $gallerynumber);
        $default = '';
        $previewconfig = null;
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
		
		 // Destination URL for Slide Link
        $name = 'theme_icis/gallerylinkurl' . $gallerynumber;
        $title = get_string('gallerylinkurl', 'theme_icis', $gallerynumber);
        $description = get_string('gallerylinkurldesc', 'theme_icis', $gallerynumber);
        $default = '';
        $previewconfig = null;
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
		
		// Slide Title.
        $name = 'theme_icis/galleryitemdetail' . $gallerynumber;
        $title = get_string('galleryitemdetail', 'theme_icis', $gallerynumber);
        $description = get_string('galleryitemdetaildesc', 'theme_icis', $gallerynumber);
        $default = $contacttitle[$gallerynumber - 1];
        $setting = new admin_setting_configtext($name, $title, $description, $default );
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

    }

 	$ADMIN->add('theme_icis', $temp);
	
	
	
	//For Social Networks


    $temp = new admin_settingpage('theme_icis_social', get_string('socialsettings', 'theme_icis'));
    $temp->add(new admin_setting_heading('theme_icis_social', get_string('socialsettingssub', 'theme_icis'),
            format_text(get_string('socialsettingsdesc' , 'theme_icis'), FORMAT_MARKDOWN)));
	
	// Text for Gallery Title.
	$name = 'theme_icis/socialtitle';
	$title = get_string('socialtitle', 'theme_icis');
	$description = get_string('socialtitledes', 'theme_icis');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
	
	// Set Number of Slides.
    $name = 'theme_icis/socialspotnumber';
    $title = get_string('socialspotnumber' , 'theme_icis');
    $description = get_string('socialnumberdesc', 'theme_icis');
    $default = '1';
    $choices = array(
		'0'=>'0',
    	'1'=>'1',
    	'2'=>'2',
    	'3'=>'3',
    	'4'=>'4',
    	'5'=>'5',
    	'6'=>'6',
    	'7'=>'7',
    	'8'=>'8',
    	'9'=>'9',
		'10'=>'10',);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $hassocialspotnum = (!empty($PAGE->theme->settings->socialspotnumber));
    if ($hassocialspotnum) {
    		$socialspotnum = $PAGE->theme->settings->socialspotnumber;
	} else {
		$socialspotnum = '1';
	}

    foreach (range(1, $socialspotnum) as $socialnumber) {
		
        // Enables the socialspot.
        $name = 'theme_icis/enablesocial' . $socialnumber;
        $title = get_string('enablesocial', 'theme_icis', $socialnumber);
        $description = get_string('enablesocialdesc', 'theme_icis', $socialnumber);
        $default = false;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
       
        // Slide Image.
    	$name = 'theme_icis/socialimage' . $socialnumber;
    	$title = get_string('socialimage', 'theme_icis', $socialnumber);
    	$description = get_string('socialimagedesc', 'theme_icis', $socialnumber);
    	$setting = new admin_setting_configstoredfile($name, $title, $description, 'socialimage'.$socialnumber);
    	$setting->set_updatedcallback('theme_reset_all_caches');
    	$temp->add($setting);
		
		 // Destination URL for Slide Link
        $name = 'theme_icis/sociallinkurl' . $socialnumber;
        $title = get_string('sociallinkurl', 'theme_icis', $socialnumber);
        $description = get_string('sociallinkurldesc', 'theme_icis', $socialnumber);
        $default = '';
        $previewconfig = null;
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

    }

 	$ADMIN->add('theme_icis', $temp);
	
	
	//For contact

    $temp = new admin_settingpage('theme_icis_contact', get_string('contactsettings', 'theme_icis'));
    $temp->add(new admin_setting_heading('theme_icis_contact', get_string('contactsettingssub', 'theme_icis'),
            format_text(get_string('contactsettingsdesc' , 'theme_icis'), FORMAT_MARKDOWN)));
	
	// Text for Gallery Title.
	$name = 'theme_icis/contacttitle';
	$title = get_string('contacttitle', 'theme_icis');
	$description = get_string('contacttitledes', 'theme_icis');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
	
	// Set Number of Slides.
    $name = 'theme_icis/contactspotnumber';
    $title = get_string('contactspotnumber' , 'theme_icis');
    $description = get_string('contactnumberdesc', 'theme_icis');
    $default = '1';
    $choices = array(
		'0'=>'0',
    	'1'=>'1',
    	'2'=>'2',
    	'3'=>'3',
    	'4'=>'4',
    	'5'=>'5',
    	'6'=>'6',
    	'7'=>'7',
    	'8'=>'8',
    	'9'=>'9',
		'10'=>'10',
    	'11'=>'11',
    	'12'=>'12');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $hascontactspotnum = (!empty($PAGE->theme->settings->contactspotnumber));
    if ($hascontactspotnum) {
    		$contactspotnum = $PAGE->theme->settings->contactspotnumber;
	} else {
		$contactspotnum = '1';
	}

    foreach (range(1, $contactspotnum) as $contactnumber) {
		
        // Enables the contactspot.
        $name = 'theme_icis/enablecontact' . $contactnumber;
        $title = get_string('enablecontact', 'theme_icis', $contactnumber);
        $description = get_string('enablecontactdesc', 'theme_icis', $contactnumber);
        $default = false;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
       
        // Slide Image.
    	$name = 'theme_icis/contactimage' . $contactnumber;
    	$title = get_string('contactimage', 'theme_icis', $contactnumber);
    	$description = get_string('contactimagedesc', 'theme_icis', $contactnumber);
    	$setting = new admin_setting_configstoredfile($name, $title, $description, 'contactimage'.$contactnumber);
    	$setting->set_updatedcallback('theme_reset_all_caches');
    	$temp->add($setting);
		
		// Slide Title.
        $name = 'theme_icis/contacttitle' . $contactnumber;
        $title = get_string('contacttitle', 'theme_icis', $contactnumber);
        $description = get_string('contacttitledesc', 'theme_icis', $contactnumber);
        $default = $contacttitle[$contactnumber - 1];
        $setting = new admin_setting_configtext($name, $title, $description, $default );
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

    }

 	$ADMIN->add('theme_icis', $temp);