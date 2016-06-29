<?php
// This file is part of The Healthcert 3 Moodle theme
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

$html = theme_healthcert_get_html_for_settings($OUTPUT, $PAGE);

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$knownregionpre = $PAGE->blocks->is_known_region('side-pre');
$knownregionpost = $PAGE->blocks->is_known_region('side-post');

$regions = healthcert_grid($hassidepre, $hassidepost);
$PAGE->set_popup_notification_allowed(false);



echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<nav role="navigation" class="navbar navbar-default">
    <div class="container">
    <div class="header-inner">    
    <div class="topbar clearfix">
    <div class="header-contact-no"><h4><strong><i class="fa fa-phone"></i></strong><span> 1300 856 695</span></h4></div>
	<?php echo $OUTPUT->user_menu(); ?>
    <?php if (!isloggedin()): ?>
    <ul class="list-inline visible-xs pull-right custom-login-btn">
    	<li><a class="btn btn-primary" href="<?php echo $CFG->wwwroot;?>/login/index.php">Login</a> </li>
    </ul>
	<?php endif; ?>
    </div>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#moodle-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $CFG->wwwroot;?>"><img class="img-responsive"src="<?php echo get_logo_url(); ?>" alt="Healthcert"></a>
    </div>
    <ul class="nav pull-right">
        <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
    </ul> 
    <div id="moodle-navbar" class="navbar-collapse collapse">
        <?php echo $OUTPUT->custom_menu(); ?>        
    </div>
    </div>
    </div>
</nav>
<header id="breadcrumb-wrapper" class="clearfix">
    <div class="container">
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav" role="navigation" aria-label="breadcrumb"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>            
        </div>
    
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </div>
</header>
<div id="page">
	<div class="container">    
        <div id="page-content" class="row">
            <div id="region-main" class="<?php echo $regions['content']; ?>">
                <div class="region-main-inner">
					<?php
                    echo $OUTPUT->course_content_header();        
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </div>
            </div>
    
            <?php
            if ($knownregionpre) {
                echo $OUTPUT->blocks('side-pre', $regions['pre']);
            }?>
            <?php
            if ($knownregionpost) {
                echo $OUTPUT->blocks('side-post', $regions['post']);
            }?>
        </div>
	</div>
</div>

<section id="footer-top">
	<div class="container">
    	<?php require_once(dirname(__FILE__) . '/includes/footer.php'); ?>        
    </div>
</section>
<footer id="page-footer">
	 <div class="container">
	 	<div class="pull-left"><?php echo $html->footnote; ?></div>
        <?php require_once(dirname(__FILE__) . '/includes/social.php'); ?>
    </div>
	<div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>        
</footer>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
