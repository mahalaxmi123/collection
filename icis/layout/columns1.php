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
 * The one column layout.
 *
 * @package   theme_icis
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_icis_get_html_for_settings($OUTPUT, $PAGE);

if (!empty($PAGE->theme->settings->logo)) {
    $logourl = $PAGE->theme->setting_file_url('logo', 'logo');
    $logoalt = get_string('logo', 'theme_icis', $SITE->fullname);
} else {
    $logourl = $OUTPUT->pix_url('logo', 'theme');
    $logoalt = get_string('moodlelogo', 'theme_icis');
}

if (!empty($PAGE->theme->settings->alttext)) {
    $logoalt = format_string($PAGE->theme->settings->alttext);
}

if (!empty($PAGE->theme->settings->favicon)) {
    $faviconurl = $PAGE->theme->setting_file_url('favicon', 'favicon');
} else {
    $faviconurl = $OUTPUT->favicon();
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $faviconurl; ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
    <div class="container">
        <div class="page-wrapper">
			<header role="banner" class="navbar navbar-default<?php echo $html->navbarclass ?> moodle-has-zindex">
            	<nav role="navigation" class="navbar-inner">
                    <a class="brand" href="<?php echo $CFG->wwwroot;?>">
                        <p><img class="logo img-responsive" src="<?php echo $logourl; ?>" alt="<?php echo $logoalt ?>" /></p>
                        <h2><?php echo format_string($SITE->fullname, true, array('context' => context_course::instance(SITEID)));?></h2>               
                    </a>    
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php if (!isloggedin()) { ?>
                            <div class="login-btn"><a href="<?php echo $CFG->wwwroot;?>/login/index.php">Sign In</a></div>
                    <?php } ?>
                    
                    <?php if (isloggedin()) {
                        echo $OUTPUT->user_menu();
                    }?>			
                    <div class="nav-collapse collapse">
                        <?php echo $OUTPUT->custom_menu(); ?>
                        <ul class="nav pull-right">
                            <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                        </ul>
                    </div>
            	</nav>
        	</header>
            <div id="page-header" class="clearfix">
                <div id="page-navbar" class="clearfix">
                    <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
                    <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
                </div>
                <div id="course-header">
                	<?php echo $OUTPUT->course_header(); ?>
                </div>
            </div>

            <div id="page-content">
                <div class="row-fluid">
                    <section id="region-main" class="span12">
                        <?php
                        echo $OUTPUT->course_content_header();
                        echo $OUTPUT->main_content();
                        echo $OUTPUT->course_content_footer();
                        ?>
                    </section>
                </div>
            </div>

     		<div class="footer-top clearfix">
                <!--Promotional Banners -->
                    <?php require_once(dirname(__FILE__) . '/includes/contact.php'); ?>
                <!--/Promotional Banners -->
                <!--Promotional Banners -->
                    <?php require_once(dirname(__FILE__) . '/includes/social.php'); ?>
                <!--/Promotional Banners -->
            </div>
            <footer id="page-footer" class="clearfix">
                <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>    
                <div class="pull-left footer-menu"><?php echo $OUTPUT->custom_menu(); ?></div>
                <?php
                echo $html->footnote;
                echo $OUTPUT->standard_footer_html();
                ?>
            </footer>
    		<?php echo $OUTPUT->standard_end_of_body_html() ?>

		</div>
	</div>
</div>
</body>
</html>
