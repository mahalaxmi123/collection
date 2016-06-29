<?php
// This file is part of The Bootstrap Moodle theme
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

$regions = bootstrap_grid($hassidepre, $hassidepost);
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


<?php if (!isloggedin()){ ?>
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top main-nav not-login">
<?php }else{ ?>
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top main-nav sticky">
<?php } ?>
    <div class="container-fluid">
    <div class="navbar-header pull-left">
        <a class="navbar-brand" href="<?php echo $CFG->wwwroot;?>"><img class="img-responsive" src="<?php echo $OUTPUT->pix_url('logo_small', 'theme'); ?>" alt="" /></a>
    </div>
    <div class="user-menu-wrapper pull-right">
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
        <ul class="nav pull-right">
            <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
        </ul>
    </div>
    
    </div>
</nav>

<!--Banner -->
<?php if (!isloggedin()){ ?>
<div class="banner-wrapper">
	<div class="container">
    	<div class="banner-logo text-center">
        	<img src="<?php echo $OUTPUT->pix_url('logo', 'theme'); ?>" alt="" />
        </div>
        <div class="text-center banner-detail">
        	<h1>Learn to Diagnose and Treat with Confindence</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus in erat id pretium. Nullam id tempor nibh. Nullam volutpat est ac tellus fermentum, acullamcorper elitlobortis. Nam vitae lacus ut sem varius ultrices eget eget massa.</p>
        </div>
        <div class="text-center login-button">
        <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModal">Sign In</a>
        </div>
        
    </div>
</div>
<?php } ?>
<!--Banner -->

<header class="moodleheader">
    <div class="container-fluid">
    <a href="<?php echo $CFG->wwwroot ?>" class="logo"></a>
    <?php echo $OUTPUT->page_heading(); ?>
    </div>
</header>

<div id="page">
	<div class="container-fluid">
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
        <div id="region-main">
             <div class="<?php echo $regions['content']; ?>">
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

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>
	</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
      </div>
      <div class="modal-body">
       	<form action="<?php echo $CFG->httpswwwroot; ?>/login/index.php" method="post" id="login" <?php //echo $autocomplete; ?> >
                <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="<?php echo get_string('username'); ?>" autocomplete="off"/>
                </div>
                <div class="form-group">                
                <input class="form-control" type="password" name="password" id="password" placeholder="<?php echo get_string('password'); ?>"  value="" <?php //echo $autocomplete; ?> />
                </div>
                <div class="login-modal-footer">
                <button class="btn btn-primary login-btn" type="submit"><span class="glyphicon glyphicon-lock"></span> Sign In</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                
                
                <?php if (isset($CFG->rememberusername) and $CFG->rememberusername == 2) { ?>
                <div class="checkbox hidden-xs">
                    <label><input type="checkbox" name="rememberusername" value="1"/><?php echo get_string('rememberusername', 'admin'); ?></label>
                </div>
                <?php } ?>                
                <div class=""><strong><a href="<?php $CFG->wwwroot;?>login/forgot_password.php" id="forgotten"><?php echo get_string('passwordforgotten'); ?></a></strong></div>
                </div>
            </form>
      </div>      
    </div>
  </div>
</div>
</body>
</html>
