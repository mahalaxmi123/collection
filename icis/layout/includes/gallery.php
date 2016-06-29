<?php 

$slide1caption = (empty($PAGE->theme->settings->bannertext1)) ? false : $PAGE->theme->settings->bannertext1;
$slide1linktext = (empty($PAGE->theme->settings->bannerlinktext1)) ? false : $PAGE->theme->settings->bannerlinktext1;


/* Slide 1 settings */
$hasgalleryspot1 = (!empty($PAGE->theme->settings->enablegallery1));
$hasgalleryspot1image = (!empty($PAGE->theme->settings->galleryimage1));
if ($hasgalleryspot1image) {
    $galleryspot1image = $PAGE->theme->setting_file_url('galleryimage1', 'galleryimage1');
}

$gallery1url = (empty($PAGE->theme->settings->gallerylinkurl1)) ? false : $PAGE->theme->settings->gallerylinkurl1;
$gallery1itemdetail = (empty($PAGE->theme->settings->galleryitemdetail1)) ? false : $PAGE->theme->settings->galleryitemdetail1;
$gallery1itemname = (empty($PAGE->theme->settings->galleryitemname1)) ? false : $PAGE->theme->settings->galleryitemname1;

/* Slide 2 settings */
$hasgalleryspot2 = (!empty($PAGE->theme->settings->enablegallery2));
$hasgalleryspot2image = (!empty($PAGE->theme->settings->galleryimage2));
if ($hasgalleryspot2image) {
    $galleryspot2image = $PAGE->theme->setting_file_url('galleryimage2', 'galleryimage2');
}

$gallery2url = (empty($PAGE->theme->settings->gallerylinkurl2)) ? false : $PAGE->theme->settings->gallerylinkurl2;
$gallery2itemdetail = (empty($PAGE->theme->settings->galleryitemdetail2)) ? false : $PAGE->theme->settings->galleryitemdetail2;
$gallery2itemname = (empty($PAGE->theme->settings->galleryitemname2)) ? false : $PAGE->theme->settings->galleryitemname2;

/* Slide 3 settings */
$hasgalleryspot3 = (!empty($PAGE->theme->settings->enablegallery3));
$hasgalleryspot3image = (!empty($PAGE->theme->settings->galleryimage3));
if ($hasgalleryspot3image) {
    $galleryspot3image = $PAGE->theme->setting_file_url('galleryimage3', 'galleryimage3');
}


$gallery3url = (empty($PAGE->theme->settings->gallerylinkurl3)) ? false : $PAGE->theme->settings->gallerylinkurl3;
$gallery3itemdetail = (empty($PAGE->theme->settings->galleryitemdetail3)) ? false : $PAGE->theme->settings->galleryitemdetail3;
$gallery3itemname = (empty($PAGE->theme->settings->galleryitemname3)) ? false : $PAGE->theme->settings->galleryitemname3;

/* Slide 4 settings */
$hasgalleryspot4 = (!empty($PAGE->theme->settings->enablegallery4));
$hasgalleryspot4image = (!empty($PAGE->theme->settings->galleryimage4));
if ($hasgalleryspot4image) {
	$galleryspot4image = $PAGE->theme->setting_file_url('galleryimage4', 'galleryimage4');
}


$gallery4url = (empty($PAGE->theme->settings->gallerylinkurl4)) ? false : $PAGE->theme->settings->gallerylinkurl4;
$gallery4itemdetail = (empty($PAGE->theme->settings->galleryitemdetail4)) ? false : $PAGE->theme->settings->galleryitemdetail4;
$gallery4itemname = (empty($PAGE->theme->settings->galleryitemname4)) ? false : $PAGE->theme->settings->galleryitemname4;

/* Slide 5 settings */
$hasgalleryspot5 = (!empty($PAGE->theme->settings->enablegallery5));
$hasgalleryspot5image = (!empty($PAGE->theme->settings->galleryimage5));
if ($hasgalleryspot5image) {
	$galleryspot5image = $PAGE->theme->setting_file_url('galleryimage5', 'galleryimage5');
}

$gallery5url = (empty($PAGE->theme->settings->gallerylinkurl5)) ? false : $PAGE->theme->settings->gallerylinkurl5;
$gallery5itemdetail = (empty($PAGE->theme->settings->galleryitemdetail5)) ? false : $PAGE->theme->settings->galleryitemdetail5;
$gallery5itemname = (empty($PAGE->theme->settings->galleryitemname5)) ? false : $PAGE->theme->settings->galleryitemname5;

/* Slide 6 settings */
$hasgalleryspot6 = (!empty($PAGE->theme->settings->enablegallery6));
$hasgalleryspot6image = (!empty($PAGE->theme->settings->galleryimage6));
if ($hasgalleryspot6image) {
	$galleryspot6image = $PAGE->theme->setting_file_url('galleryimage6', 'galleryimage6');
}


$gallery6url = (empty($PAGE->theme->settings->gallerylinkurl6)) ? false : $PAGE->theme->settings->gallerylinkurl6;
$gallery6itemdetail = (empty($PAGE->theme->settings->galleryitemdetail6)) ? false : $PAGE->theme->settings->galleryitemdetail6;
$gallery6itemname = (empty($PAGE->theme->settings->galleryitemname6)) ? false : $PAGE->theme->settings->galleryitemname6;

/* Slide 7 settings */
$hasgalleryspot7 = (!empty($PAGE->theme->settings->enablegallery7));
$hasgalleryspot7image = (!empty($PAGE->theme->settings->galleryimage7));
if ($hasgalleryspot7image) {
	$galleryspot7image = $PAGE->theme->setting_file_url('galleryimage7', 'galleryimage7');
}

$gallery7url = (empty($PAGE->theme->settings->gallerylinkurl7)) ? false : $PAGE->theme->settings->gallerylinkurl7;
$gallery7itemdetail = (empty($PAGE->theme->settings->galleryitemdetail7)) ? false : $PAGE->theme->settings->galleryitemdetail7;
$gallery7itemname = (empty($PAGE->theme->settings->galleryitemname7)) ? false : $PAGE->theme->settings->galleryitemname7;


/* Slide 8 settings */
$hasgalleryspot8 = (!empty($PAGE->theme->settings->enablegallery8));
$hasgalleryspot8image = (!empty($PAGE->theme->settings->galleryimage8));
if ($hasgalleryspot8image) {
	$galleryspot8image = $PAGE->theme->setting_file_url('galleryimage8', 'galleryimage8');
}


$gallery8url = (empty($PAGE->theme->settings->gallerylinkurl8)) ? false : $PAGE->theme->settings->gallerylinkurl8;
$gallery8itemdetail = (empty($PAGE->theme->settings->galleryitemdetail8)) ? false : $PAGE->theme->settings->galleryitemdetail8;
$gallery8itemname = (empty($PAGE->theme->settings->galleryitemname8)) ? false : $PAGE->theme->settings->galleryitemname8;

/* Slide 9 settings */
$hasgalleryspot9 = (!empty($PAGE->theme->settings->enablegallery9));
$hasgalleryspot9image = (!empty($PAGE->theme->settings->galleryimage9));
if ($hasgalleryspot9image) {
	$galleryspot9image = $PAGE->theme->setting_file_url('galleryimage9', 'galleryimage9');
}


$gallery9url = (empty($PAGE->theme->settings->gallerylinkurl9)) ? false : $PAGE->theme->settings->gallerylinkurl9;
$gallery9itemdetail = (empty($PAGE->theme->settings->galleryitemdetail9)) ? false : $PAGE->theme->settings->galleryitemdetail9;
$gallery9itemname = (empty($PAGE->theme->settings->galleryitemname9)) ? false : $PAGE->theme->settings->galleryitemname9;

/* Slide 10 settings */
$hasgalleryspot10 = (!empty($PAGE->theme->settings->enablegallery10));
$hasgalleryspot10image = (!empty($PAGE->theme->settings->galleryimage10));
if ($hasgalleryspot10image) {
	$galleryspot10image = $PAGE->theme->setting_file_url('galleryimage10', 'galleryimage10');
}


$gallery10url = (empty($PAGE->theme->settings->gallerylinkurl10)) ? false : $PAGE->theme->settings->gallerylinkurl10;
$gallery10itemdetail = (empty($PAGE->theme->settings->galleryitemdetail10)) ? false : $PAGE->theme->settings->galleryitemdetail10;
$gallery10itemname = (empty($PAGE->theme->settings->galleryitemname10)) ? false : $PAGE->theme->settings->galleryitemname10;

/* Slide 11 settings */
$hasgalleryspot11 = (!empty($PAGE->theme->settings->enablegallery11));
$hasgalleryspot11image = (!empty($PAGE->theme->settings->galleryimage11));
if ($hasgalleryspot11image) {
	$galleryspot11image = $PAGE->theme->setting_file_url('galleryimage11', 'galleryimage11');
}


$gallery11url = (empty($PAGE->theme->settings->gallerylinkurl11)) ? false : $PAGE->theme->settings->gallerylinkurl11;
$gallery11itemdetail = (empty($PAGE->theme->settings->galleryitemdetail11)) ? false : $PAGE->theme->settings->galleryitemdetail11;
$gallery11itemname = (empty($PAGE->theme->settings->galleryitemname11)) ? false : $PAGE->theme->settings->galleryitemname11;

/* Slide 12 settings */
$hasgalleryspot12 = (!empty($PAGE->theme->settings->enablegallery12));
$hasgalleryspot12image = (!empty($PAGE->theme->settings->galleryimage12));
if ($hasgalleryspot12image) {
	$galleryspot12image = $PAGE->theme->setting_file_url('galleryimage12', 'galleryimage12');
}


$gallery12url = (empty($PAGE->theme->settings->gallerylinkurl12)) ? false : $PAGE->theme->settings->gallerylinkurl12;
$gallery12itemdetail = (empty($PAGE->theme->settings->galleryitemdetail12)) ? false : $PAGE->theme->settings->galleryitemdetail12;
$gallery12itemname = (empty($PAGE->theme->settings->galleryitemname12)) ? false : $PAGE->theme->settings->galleryitemname12;

$hasgalleryspotshow = ($hasgalleryspot1 || $hasgalleryspot2 || $hasgalleryspot3 || $hasgalleryspot4|| $hasgalleryspot5|| $hasgalleryspot6|| $hasgalleryspot7|| $hasgalleryspot8|| $hasgalleryspot9|| $hasgalleryspot10 || $hasgalleryspot11 || $hasgalleryspot11 ) ? true : false;
?>

<div class="gallery-wrapper">
	<?php  echo $html->gallerymaintitle; ?>
    <?php  echo $html->gallerydes; ?>
</div>
<?php if ($hasgalleryspotshow) { ?>
    <div id="galleryspot" class="galleryspot-wrapper">   
      <!-- Wrapper for galleryspots -->
		<div class="galleryspot">
            <div class="row-fluid">
                <div class="span3">
                     <?php if ($hasgalleryspot1) { ?>
                    <div id="galleryspot1" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot1image ?>">
                      <?php if ($gallery1itemname) { ?>
                      <h4 class="text-center"><a href="<?php echo $gallery1url ?>"><?php echo $gallery1itemname ?></a></h4>                      
                      <?php } ?>
                      <?php if ($gallery1itemname) { ?>
                      <p class="text-center"><?php echo $gallery1itemdetail ?></p>
                      <?php if ($gallery1itemname) { ?>
                      
                    </div>
                    <?php } ?>
                </div>
                <div class="span3">
                    <?php if ($hasgalleryspot2) { ?>
                    <div id="galleryspot2" class="item">                     
                      <img class="img-responsive" src="<?php echo $galleryspot2image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery2url ?>"><?php echo $gallery2itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery2itemdetail ?></p>                      
                    </div>
                    <?php } ?>
                </div>
                <div class="span3">
                     <?php if ($hasgalleryspot3) { ?>
                    <div id="galleryspot3" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot3image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery3url ?>"><?php echo $gallery3itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery3itemdetail ?></p>
                      
                    </div>
                    <?php } ?>
                </div>
                <div class="span3">
                    <?php if ($hasgalleryspot4) { ?>
                    <div id="galleryspot4" class="item">
                      	   <img class="img-responsive" src="<?php echo $galleryspot4image ?>">
                           <h4 class="text-center"><a href="<?php echo $gallery4url ?>"><?php echo $gallery4itemname ?></a></h4>                      
                      		<p class="text-center"><?php echo $gallery4itemdetail ?></p>
                    </div>
                    <?php } ?>
                </div>                
            </div>
            
             <div class="row-fluid">             	
                <div class="span3">
                    <?php if ($hasgalleryspot5) { ?>
                    <div id="galleryspot5" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot5image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery5url ?>"><?php echo $gallery5itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery5itemdetail ?></p>
                    </div>
                    <?php } ?>
                </div>
                <div class="span3">
                    <?php if ($hasgalleryspot6) { ?>
                    <div id="galleryspot6" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot6image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery6url ?>"><?php echo $gallery6itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery6itemdetail ?></p>
                    </div>
                    <?php } ?>  
                </div> 
                <div class="span3">
                    <?php if ($hasgalleryspot7) { ?>
                    <div id="galleryspot7" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot7image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery7url ?>"><?php echo $gallery7itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery7itemdetail ?></p>
                    </div>
                    <?php } ?>     	
                </div>
                <div class="span3">
                    <?php if ($hasgalleryspot8) { ?>
                    <div id="galleryspot8" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot8image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery8url ?>"><?php echo $gallery8itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery8itemdetail ?></p>
                    </div>
                    <?php } ?> 
                </div>               
            </div>  
            <div class="row-fluid">
            	 <div class="span3">
                    <?php if ($hasgalleryspot9) { ?>
                    <div id="galleryspot9" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot9image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery9url ?>"><?php echo $gallery9itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery9itemdetail ?></p>
                    </div>
                    <?php } ?>
                </div> 
            	<div class="span3">
                    <?php if ($hasgalleryspot10) { ?>
                    <div id="galleryspot10" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot10image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery10url ?>"><?php echo $gallery10itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery10itemdetail ?></p>
                    </div>
                    <?php } ?>  
                </div>
                <div class="span3">
                    <?php if ($hasgalleryspot11) { ?>
                    <div id="galleryspot11" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot11image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery11url ?>"><?php echo $gallery11itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery11itemdetail ?></p>
                    </div>
                    <?php } ?>     	
                </div>
                <div class="span3">
                    <?php if ($hasgalleryspot12) { ?>
                    <div id="galleryspot12" class="item">
                      <img class="img-responsive" src="<?php echo $galleryspot12image ?>">
                      <h4 class="text-center"><a href="<?php echo $gallery12url ?>"><?php echo $gallery12itemname ?></a></h4>                      
                      <p class="text-center"><?php echo $gallery12itemdetail ?></p>
                    </div>
                    <?php } ?> 
                </div>
            </div>
            </div>
</div>


<?php } 
?>