<?php 

$slide1caption = (empty($PAGE->theme->settings->bannertext1)) ? false : $PAGE->theme->settings->bannertext1;
$slide1linktext = (empty($PAGE->theme->settings->bannerlinktext1)) ? false : $PAGE->theme->settings->bannerlinktext1;


/* Slide 1 settings */
$hascontactspot1 = (!empty($PAGE->theme->settings->enablecontact1));
$hascontactspot1image = (!empty($PAGE->theme->settings->contactimage1));
if ($hascontactspot1image) {
    $contactspot1image = $PAGE->theme->setting_file_url('contactimage1', 'contactimage1');
}
$contact1title = (empty($PAGE->theme->settings->contacttitle1)) ? false : $PAGE->theme->settings->contacttitle1;

/* Slide 2 settings */
$hascontactspot2 = (!empty($PAGE->theme->settings->enablecontact2));
$hascontactspot2image = (!empty($PAGE->theme->settings->contactimage2));
if ($hascontactspot2image) {
    $contactspot2image = $PAGE->theme->setting_file_url('contactimage2', 'contactimage2');
}
$contact2title = (empty($PAGE->theme->settings->contacttitle2)) ? false : $PAGE->theme->settings->contacttitle2;
/* Slide 3 settings */
$hascontactspot3 = (!empty($PAGE->theme->settings->enablecontact3));
$hascontactspot3image = (!empty($PAGE->theme->settings->contactimage3));
if ($hascontactspot3image) {
    $contactspot3image = $PAGE->theme->setting_file_url('contactimage3', 'contactimage3');
}
$contact3title = (empty($PAGE->theme->settings->contacttitle3)) ? false : $PAGE->theme->settings->contacttitle3;
/* Slide 4 settings */
$hascontactspot4 = (!empty($PAGE->theme->settings->enablecontact4));
$hascontactspot4image = (!empty($PAGE->theme->settings->contactimage4));
if ($hascontactspot4image) {
	$contactspot4image = $PAGE->theme->setting_file_url('contactimage4', 'contactimage4');
}
$contact4title = (empty($PAGE->theme->settings->contacttitle4)) ? false : $PAGE->theme->settings->contacttitle4;

$hascontactspotshow = ($hascontactspot1 || $hascontactspot2 || $hascontactspot3 || $hascontactspot4) ? true : false;
?>

<?php if ($hascontactspotshow) { ?>
    <div id="contactspot" class="pull-left contactspot-wrapper">  
    <?php  echo $html->contacttitle; ?> 
      <!-- Wrapper for contactspots -->
		<ul class="contactspot clearfix">               
			<?php if ($hascontactspot1) { ?>
            <li>
                <div id="contactspot1" class="item">
                    <img class="img-responsive" src="<?php echo $contactspot1image ?>">
                    <span><?php echo $contact1title ?></span>
                </div>
            </li>
			<?php } ?>
            
			<?php if ($hascontactspot2) { ?>
            <li>
                <div id="contactspot2" class="item">                     
                    <img class="img-responsive" src="<?php echo $contactspot2image ?>">  
                    <span><?php echo $contact2title ?></span>                    
                </div>
            </li>
            <?php } ?>
                
			<?php if ($hascontactspot3) { ?>
            <li>
                <div id="contactspot3" class="item">
                    <img class="img-responsive" src="<?php echo $contactspot3image ?>">
                    <span><?php echo $contact3title ?></span>
                </div>
            </li>
            <?php } ?>
            
            <?php if ($hascontactspot4) { ?>
                <li>
                <div id="contactspot4" class="item">
                    <img class="img-responsive" src="<?php echo $contactspot4image ?>">
                    <span><?php echo $contact4title ?></span>
                </div>
            </li> 
            <?php } ?>
		</ul>
</div>


<?php } 
?>