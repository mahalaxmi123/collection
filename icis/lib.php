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

/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string
 */
function theme_icis_process_css($css, $theme) {
	   
   // $css = theme_icis_generate_autocolors($css, $theme, $substitutions);

    // Set the custom CSS
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_icis_set_customcss($css, $customcss);

    return $css;
}

/**
 * Sets the custom css variable in CSS
 *
 * @param string $css
 * @param mixed $customcss
 * @return string
 */
function theme_icis_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
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


/*function theme_icis_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'logo' || $filearea === 'favicon')) {
        $theme = theme_config::load('icis');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}*/


function theme_icis_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        $theme = theme_config::load('icis');
        if ($filearea === 'logo') {
            return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
		} else if ($filearea === 'favicon') {
            return $theme->setting_file_serve('favicon', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage1') {
            return $theme->setting_file_serve('bannerimage1', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage2') {
            return $theme->setting_file_serve('bannerimage2', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage3') {
            return $theme->setting_file_serve('bannerimage3', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage4') {
            return $theme->setting_file_serve('bannerimage4', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage5') {
            return $theme->setting_file_serve('bannerimage5', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage6') {
            return $theme->setting_file_serve('bannerimage6', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage7') {
            return $theme->setting_file_serve('bannerimage7', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage8') {
            return $theme->setting_file_serve('bannerimage8', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage9') {
            return $theme->setting_file_serve('bannerimage9', $args, $forcedownload, $options);
        } else if ($filearea === 'bannerimage10') {
            return $theme->setting_file_serve('bannerimage10', $args, $forcedownload, $options);
		
		//Gallery Album
		
		} else if ($filearea === 'galleryimage1') {
            return $theme->setting_file_serve('galleryimage1', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage2') {
            return $theme->setting_file_serve('galleryimage2', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage3') {
            return $theme->setting_file_serve('galleryimage3', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage4') {
            return $theme->setting_file_serve('galleryimage4', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage5') {
            return $theme->setting_file_serve('galleryimage5', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage6') {
            return $theme->setting_file_serve('galleryimage6', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage7') {
            return $theme->setting_file_serve('galleryimage7', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage8') {
            return $theme->setting_file_serve('galleryimage8', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage9') {
            return $theme->setting_file_serve('galleryimage9', $args, $forcedownload, $options);
        } else if ($filearea === 'galleryimage10') {
            return $theme->setting_file_serve('galleryimage10', $args, $forcedownload, $options);
		} else if ($filearea === 'galleryimage11') {
            return $theme->setting_file_serve('galleryimage11', $args, $forcedownload, $options);
		} else if ($filearea === 'galleryimage12') {
            return $theme->setting_file_serve('galleryimage12', $args, $forcedownload, $options);
			
			
		//Social Networks
				
		} else if ($filearea === 'socialimage1') {
            return $theme->setting_file_serve('socialimage1', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage2') {
            return $theme->setting_file_serve('socialimage2', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage3') {
            return $theme->setting_file_serve('socialimage3', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage4') {
            return $theme->setting_file_serve('socialimage4', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage5') {
            return $theme->setting_file_serve('socialimage5', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage6') {
            return $theme->setting_file_serve('socialimage6', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage7') {
            return $theme->setting_file_serve('socialimage7', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage8') {
            return $theme->setting_file_serve('socialimage8', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage9') {
            return $theme->setting_file_serve('socialimage9', $args, $forcedownload, $options);
        } else if ($filearea === 'socialimage10') {
            return $theme->setting_file_serve('socialimage10', $args, $forcedownload, $options);	
		
		//Social Networks
				
		} else if ($filearea === 'contactimage1') {
            return $theme->setting_file_serve('contactimage1', $args, $forcedownload, $options);
        } else if ($filearea === 'contactimage2') {
            return $theme->setting_file_serve('contactimage2', $args, $forcedownload, $options);
        } else if ($filearea === 'contactimage3') {
            return $theme->setting_file_serve('contactimage3', $args, $forcedownload, $options);
        } else if ($filearea === 'contactimage4') {
            return $theme->setting_file_serve('contactimage4', $args, $forcedownload, $options);		
		
        } else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }
}

function theme_icis_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG;
    $return = new stdClass;   

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote pull-right">'.format_text($page->theme->settings->footnote).'</div>';
    }
	
	$return->footlink = '';
    if (!empty($page->theme->settings->footlink)) {
        $return->footlink = '<div class="footlink pull-left">'.format_text($page->theme->settings->footlink).'</div>';
    }
	
	$return->quote = '';
    if (!empty($page->theme->settings->quote)) {
        $return->quote = '<div class="quote">'.format_text($page->theme->settings->quote).'</div>';
    }
	
	$return->gallerymaintitle = '';
    if (!empty($page->theme->settings->gallerymaintitle)) {
        $return->gallerymaintitle = '<h2 class="gallery-title">'.format_text($page->theme->settings->gallerymaintitle).'</h2>';
    }
	
	$return->gallerydes = '';
    if (!empty($page->theme->settings->gallerydes)) {
        $return->gallerydes = '<div class="gallery-des">'.format_text($page->theme->settings->gallerydes).'</div>';
    }
	
	$return->socialtitle = '';
    if (!empty($page->theme->settings->socialtitle)) {
        $return->socialtitle = '<h2 class="social-title">'.format_text($page->theme->settings->socialtitle).'</h2>';
    }
	
	$return->contacttitle = '';
    if (!empty($page->theme->settings->contacttitle)) {
        $return->contacttitle = '<h2 class="contact-title">'.format_text($page->theme->settings->contacttitle).'</h2>';
    }
	
    return $return;
}

function theme_icis_page_init(moodle_page $page) {
    $page->requires->jquery();   
}

