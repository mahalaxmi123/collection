<?php

defined('MOODLE_INTERNAL') || die();

function healthcert_grid($hassidepre, $hassidepost) {

    if ($hassidepre && $hassidepost) {
        $regions = array('content' => 'col-sm-6 col-sm-push-3');
        $regions['pre'] = 'col-sm-3 col-sm-pull-6';
        $regions['post'] = 'col-sm-3';
    } else if ($hassidepre && !$hassidepost) {
        $regions = array('content' => 'col-sm-9 col-sm-push-3');
        $regions['pre'] = 'col-sm-3 col-sm-pull-9';
        $regions['post'] = 'emtpy';
    } else if (!$hassidepre && $hassidepost) {
        $regions = array('content' => 'col-sm-9');
        $regions['pre'] = 'empty';
        $regions['post'] = 'col-sm-3';
    } else if (!$hassidepre && !$hassidepost) {
        $regions = array('content' => 'col-sm-12');
        $regions['pre'] = 'empty';
        $regions['post'] = 'empty';
    }
    
    if ('rtl' === get_string('thisdirection', 'langconfig')) {
        if ($hassidepre && $hassidepost) {
            $regions['pre'] = 'col-sm-3  col-sm-push-3 col-lg-2 col-lg-push-2';
            $regions['post'] = 'col-sm-3 col-sm-pull-9 col-lg-2 col-lg-pull-10';
        } else if ($hassidepre && !$hassidepost) {
            $regions = array('content' => 'col-sm-9 col-lg-10');
            $regions['pre'] = 'col-sm-3 col-lg-2';
            $regions['post'] = 'empty';
        } else if (!$hassidepre && $hassidepost) {
            $regions = array('content' => 'col-sm-9 col-sm-push-3 col-lg-10 col-lg-push-2');
            $regions['pre'] = 'empty';
            $regions['post'] = 'col-sm-3 col-sm-pull-9 col-lg-2 col-lg-pull-10';
        }
    }
    return $regions;
}

/*
**Copied from healthcert theme
*/

function theme_healthcert_process_css($css, $theme) {
	
    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_healthcert_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } 
	else {
        $customcss = null;
    }
    $css = theme_healthcert_set_customcss($css, $customcss);		
		$css = theme_healthcert_set_fontwww($css);
    return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
 
function theme_healthcert_set_logo($css, $logo) {
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
 
function theme_healthcert_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    static $theme;

    if (empty($theme)) {
        $theme = theme_config::load('healthcert');
    }
    if ($context->contextlevel == CONTEXT_SYSTEM) {
								
        if ($filearea === 'logo') {
            return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
        } else if ($filearea === 'footerlogo') {
            return $theme->setting_file_serve('footerlogo', $args, $forcedownload, $options);
        } else if ($filearea === 'style') {
            theme_healthcert_serve_css($args[1]);
        } else if ($filearea === 'pagebackground') {
            return $theme->setting_file_serve('pagebackground', $args, $forcedownload, $options);
        } else if (preg_match("/slide[1-9][0-9]*image/", $filearea) !== false) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        }	else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }
}

/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
**/
 
function theme_healthcert_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Loads the CSS Styles and put the font path
 *
 * @param $css
 * @return string
 */
 
function theme_healthcert_set_fontwww($css) {
    global $CFG, $PAGE;
    if(empty($CFG->themewww)){
        $themewww = $CFG->wwwroot."/theme";
    } else {
        $themewww = $CFG->themewww;
    }

    $tag = '[[setting:fontwww]]';

    $theme = theme_config::load('healthcert');
   
   	$css = str_replace($tag, $themewww.'/healthcert/fonts/', $css);
   
    return $css;

}

/**
 * Logo Image URL Fetch from theme settings
 *
 * @return string
**/
if (!function_exists('get_logo_url')){	
	function get_logo_url($type='header'){
		global $OUTPUT;
		static $theme;
		if(empty($theme)){
			$theme = theme_config::load('healthcert');
		}
		
		if($type=="header"){
			$logo = $theme->setting_file_url('logo', 'logo');
			$logo = empty($logo)?$OUTPUT->pix_url('home/logo', 'theme'):$logo;
		}
		else if($type=="footer"){
			$logo = $theme->setting_file_url('footerlogo', 'footerlogo');
			$logo = empty($logo)?$OUTPUT->pix_url('home/footerlogo', 'theme'):$logo;
		}		
		return $logo;
	}
}


function theme_healthcert_render_slideimg($p,$sliname){
	global $PAGE, $OUTPUT;
	
    $nos = theme_healthcert_get_setting('numberofslides'); 
    $i = $p%3;
    $slideimage = $OUTPUT->pix_url('home/slide'.$i, 'theme');
				
	// Get slide image or fallback to default
    if (theme_healthcert_get_setting($sliname)) {
    	$slideimage = $PAGE->theme->setting_file_url($sliname , $sliname);
    }
	return $slideimage;
}


function theme_healthcert_get_setting($setting, $format = false){
    global $CFG;
    require_once($CFG->dirroot . '/lib/weblib.php');
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('healthcert');
    }
    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}


function theme_healthcert_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG;
    $return = new stdClass;   

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote">'.format_text($page->theme->settings->footnote).'</div>';
    }
	
    return $return;
}


/*Enable jquery site wide*/

function theme_healthcert_page_init(moodle_page $page) {
    $page->requires->jquery();
}

