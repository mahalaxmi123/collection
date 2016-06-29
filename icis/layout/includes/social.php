<?php 

$slide1caption = (empty($PAGE->theme->settings->bannertext1)) ? false : $PAGE->theme->settings->bannertext1;
$slide1linktext = (empty($PAGE->theme->settings->bannerlinktext1)) ? false : $PAGE->theme->settings->bannerlinktext1;


/* Slide 1 settings */
$hassocialspot1 = (!empty($PAGE->theme->settings->enablesocial1));
$hassocialspot1image = (!empty($PAGE->theme->settings->socialimage1));
if ($hassocialspot1image) {
    $socialspot1image = $PAGE->theme->setting_file_url('socialimage1', 'socialimage1');
}
$social1url = (empty($PAGE->theme->settings->sociallinkurl1)) ? false : $PAGE->theme->settings->sociallinkurl1;
/* Slide 2 settings */
$hassocialspot2 = (!empty($PAGE->theme->settings->enablesocial2));
$hassocialspot2image = (!empty($PAGE->theme->settings->socialimage2));
if ($hassocialspot2image) {
    $socialspot2image = $PAGE->theme->setting_file_url('socialimage2', 'socialimage2');
}
$social2url = (empty($PAGE->theme->settings->sociallinkurl2)) ? false : $PAGE->theme->settings->sociallinkurl2;

/* Slide 3 settings */
$hassocialspot3 = (!empty($PAGE->theme->settings->enablesocial3));
$hassocialspot3image = (!empty($PAGE->theme->settings->socialimage3));
if ($hassocialspot3image) {
    $socialspot3image = $PAGE->theme->setting_file_url('socialimage3', 'socialimage3');
}
$social3url = (empty($PAGE->theme->settings->sociallinkurl3)) ? false : $PAGE->theme->settings->sociallinkurl3;
/* Slide 4 settings */
$hassocialspot4 = (!empty($PAGE->theme->settings->enablesocial4));
$hassocialspot4image = (!empty($PAGE->theme->settings->socialimage4));
if ($hassocialspot4image) {
	$socialspot4image = $PAGE->theme->setting_file_url('socialimage4', 'socialimage4');
}
$social4url = (empty($PAGE->theme->settings->sociallinkurl4)) ? false : $PAGE->theme->settings->sociallinkurl4;
/* Slide 5 settings */
$hassocialspot5 = (!empty($PAGE->theme->settings->enablesocial5));
$hassocialspot5image = (!empty($PAGE->theme->settings->socialimage5));
if ($hassocialspot5image) {
	$socialspot5image = $PAGE->theme->setting_file_url('socialimage5', 'socialimage5');
}
$social5url = (empty($PAGE->theme->settings->sociallinkurl5)) ? false : $PAGE->theme->settings->sociallinkurl5;
/* Slide 6 settings */
$hassocialspot6 = (!empty($PAGE->theme->settings->enablesocial6));
$hassocialspot6image = (!empty($PAGE->theme->settings->socialimage6));
if ($hassocialspot6image) {
	$socialspot6image = $PAGE->theme->setting_file_url('socialimage6', 'socialimage6');
}
$social6url = (empty($PAGE->theme->settings->sociallinkurl6)) ? false : $PAGE->theme->settings->sociallinkurl6;
/* Slide 7 settings */
$hassocialspot7 = (!empty($PAGE->theme->settings->enablesocial7));
$hassocialspot7image = (!empty($PAGE->theme->settings->socialimage7));
if ($hassocialspot7image) {
	$socialspot7image = $PAGE->theme->setting_file_url('socialimage7', 'socialimage7');
}
$social7url = (empty($PAGE->theme->settings->sociallinkurl7)) ? false : $PAGE->theme->settings->sociallinkurl7;
/* Slide 8 settings */
$hassocialspot8 = (!empty($PAGE->theme->settings->enablesocial8));
$hassocialspot8image = (!empty($PAGE->theme->settings->socialimage8));
if ($hassocialspot8image) {
	$socialspot8image = $PAGE->theme->setting_file_url('socialimage8', 'socialimage8');
}
$social8url = (empty($PAGE->theme->settings->sociallinkurl8)) ? false : $PAGE->theme->settings->sociallinkurl9;
/* Slide 9 settings */
$hassocialspot9 = (!empty($PAGE->theme->settings->enablesocial9));
$hassocialspot9image = (!empty($PAGE->theme->settings->socialimage9));
if ($hassocialspot9image) {
	$socialspot9image = $PAGE->theme->setting_file_url('socialimage9', 'socialimage9');
}
$social9url = (empty($PAGE->theme->settings->sociallinkurl9)) ? false : $PAGE->theme->settings->sociallinkurl9;
/* Slide 10 settings */
$hassocialspot10 = (!empty($PAGE->theme->settings->enablesocial10));
$hassocialspot10image = (!empty($PAGE->theme->settings->socialimage10));
if ($hassocialspot10image) {
	$socialspot10image = $PAGE->theme->setting_file_url('socialimage10', 'socialimage10');
}
$social10url = (empty($PAGE->theme->settings->sociallinkurl10)) ? false : $PAGE->theme->settings->sociallinkurl10;

$hassocialspotshow = ($hassocialspot1 || $hassocialspot2 || $hassocialspot3 || $hassocialspot4|| $hassocialspot5|| $hassocialspot6|| $hassocialspot7|| $hassocialspot8|| $hassocialspot9|| $hassocialspot10 ) ? true : false;
?>

<?php if ($hassocialspotshow) { ?>
    <div id="socialspot" class="pull-right socialspot-wrapper">  
    <?php  echo $html->socialtitle; ?> 
      <!-- Wrapper for socialspots -->
		<ul class="socialspot clearfix">
			
			<?php if ($hassocialspot1) { ?>
            <li>
                <div id="socialspot1" class="item">
                <a href="<?php echo $social1url ?>"><img class="img-responsive" src="<?php echo $socialspot1image ?>"></a>
                </div>
            </li>
            <?php } ?>                
                
			<?php if ($hassocialspot2) { ?>
            <li>
                <div id="socialspot2" class="item">                     
                <a href="<?php echo $social2url ?>"><img class="img-responsive" src="<?php echo $socialspot2image ?>"></a>                     
                </div>
            </li>
            <?php } ?>               
               
			<?php if ($hassocialspot3) { ?>
            <li>
                <div id="socialspot3" class="item">
                <a href="<?php echo $social3url ?>"><img class="img-responsive" src="<?php echo $socialspot3image ?>"></a>
                </div>
            </li>
            <?php } ?>
                
			<?php if ($hassocialspot4) { ?>
            <li>
                <div id="socialspot4" class="item">
                <a href="<?php echo $social4url ?>"><img class="img-responsive" src="<?php echo $socialspot4image ?>"></a>
                </div>
            </li> 
            <?php } ?>  	

			<?php if ($hassocialspot5) { ?>
            <li>
                <div id="socialspot5" class="item">
                <a href="<?php echo $social5url ?>"><img class="img-responsive" src="<?php echo $socialspot5image ?>"></a>
                </div>
            </li>
            <?php } ?>

			<?php if ($hassocialspot6) { ?>
            <li>
                <div id="socialspot6" class="item">
                <a href="<?php echo $social6url ?>"><img class="img-responsive" src="<?php echo $socialspot6image ?>"></a>
                </div>
            </li> 
            <?php } ?>  
            
            <?php if ($hassocialspot7) { ?>
            <li>
                <div id="socialspot7" class="item">
                <a href="<?php echo $social7url ?>"><img class="img-responsive" src="<?php echo $socialspot7image ?>"></a>
                </div>
            </li>
            <?php } ?>  
            
            <?php if ($hassocialspot8) { ?>
            <li>
                <div id="socialspot8" class="item">
                <a href="<?php echo $social8url ?>"><img class="img-responsive" src="<?php echo $socialspot8image ?>"></a>
                </div>
            </li>
            <?php } ?> 
            
            <?php if ($hassocialspot9) { ?>
            <li>
                <div id="socialspot9" class="item">
                <a href="<?php echo $social9url ?>"><img class="img-responsive" src="<?php echo $socialspot9image ?>"></a>
                </div>
            </li>
            <?php } ?>
            
            <?php if ($hassocialspot10) { ?>
            <li>
                <div id="socialspot10" class="item">
                <a href="<?php echo $socia101url ?>"><img class="img-responsive" src="<?php echo $socialspot10image ?>"></a>
                </div>
            </li>
            <?php } ?>  
		</ul>
</div>


<?php } 
?>