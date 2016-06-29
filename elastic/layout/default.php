<?php
// This file is part of The Elastic Moodle theme
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


$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$knownregionpre = $PAGE->blocks->is_known_region('side-pre');
$knownregionpost = $PAGE->blocks->is_known_region('side-post');

$regions = elastic_grid($hassidepre, $hassidepost);
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

<nav role="navigation" class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
    <!--Browse Courses-->
    <div class="browse-course-toggle">    
        <div class="browse-course-toggle-bar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </div>
        <strong class="hidden-xs">Browse Courses</strong>
    </div>
    <div class="browse-courses">
        <div class="">
	        <?php
    	    	$formcontent = '';
        		$formcontent = get_category_courses();
        	?>
        </div>
    </div>
    <!-- /Browse Courses-->
        
    <div class="navbar-header pull-left">
        <a class="navbar-brand" href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo $OUTPUT->pix_url('logo', 'theme'); ?>" alt="" /></a>
    </div>
    <div class="navbar-header pull-right">
        <?php echo $OUTPUT->user_menu(); ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#moodle-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="moodle-navbar" class="navbar-collapse collapse navbar-right">
        <?php echo $OUTPUT->custom_menu(); ?>
    </div>
    
    </div>
</nav>

<div id="page">
<div class="container">
    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav" role="navigation" aria-label="breadcrumb"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
        </div>

        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content">
    	<div class="row">
            <div class="<?php echo $regions['content']; ?>">
                <div id="region-main">
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
<footer id="page-footer">
    <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
    <?php echo $OUTPUT->standard_footer_html(); ?>
</footer>
<div class="admin-panel">
<div class="ap-toggle" title="Administration"><span class="glyphicon glyphicon-cog"></span></div>
<?php echo $OUTPUT->blocks('admin-panel'); ?>
</div>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</div>
</body>
</html>
