<?php

/* Slide 1 settings */
$hasslide1 = (!empty($PAGE->theme->settings->enablebanner1));
$hasslide1image = (!empty($PAGE->theme->settings->bannerimage1));
if ($hasslide1image) {
    $slide1image = $PAGE->theme->setting_file_url('bannerimage1', 'bannerimage1');
}
$slide1title = (empty($PAGE->theme->settings->bannertitle1)) ? false : $PAGE->theme->settings->bannertitle1;
$slide1caption = (empty($PAGE->theme->settings->bannertext1)) ? false : $PAGE->theme->settings->bannertext1;
$slide1url = (empty($PAGE->theme->settings->bannerlinkurl1)) ? false : $PAGE->theme->settings->bannerlinkurl1;
$slide1linktext = (empty($PAGE->theme->settings->bannerlinktext1)) ? false : $PAGE->theme->settings->bannerlinktext1;

/* Slide 2 settings */
$hasslide2 = (!empty($PAGE->theme->settings->enablebanner2));
$hasslide2image = (!empty($PAGE->theme->settings->bannerimage2));
if ($hasslide2image) {
    $slide2image = $PAGE->theme->setting_file_url('bannerimage2', 'bannerimage2');
}
$slide2title = (empty($PAGE->theme->settings->bannertitle2)) ? false : $PAGE->theme->settings->bannertitle2;
$slide2caption = (empty($PAGE->theme->settings->bannertext2)) ? false : $PAGE->theme->settings->bannertext2;
$slide2url = (empty($PAGE->theme->settings->bannerlinkurl2)) ? false : $PAGE->theme->settings->bannerlinkurl2;
$slide2linktext = (empty($PAGE->theme->settings->bannerlinktext2)) ? false : $PAGE->theme->settings->bannerlinktext2;

/* Slide 3 settings */
$hasslide3 = (!empty($PAGE->theme->settings->enablebanner3));
$hasslide3image = (!empty($PAGE->theme->settings->bannerimage3));
if ($hasslide3image) {
    $slide3image = $PAGE->theme->setting_file_url('bannerimage3', 'bannerimage3');
}
$slide3title = (empty($PAGE->theme->settings->bannertitle3)) ? false : $PAGE->theme->settings->bannertitle3;
$slide3caption = (empty($PAGE->theme->settings->bannertext3)) ? false : $PAGE->theme->settings->bannertext3;
$slide3url = (empty($PAGE->theme->settings->bannerlinkurl3)) ? false : $PAGE->theme->settings->bannerlinkurl3;
$slide3linktext = (empty($PAGE->theme->settings->bannerlinktext3)) ? false : $PAGE->theme->settings->bannerlinktext3;

/* Slide 4 settings */
$hasslide4 = (!empty($PAGE->theme->settings->enablebanner4));
$hasslide4image = (!empty($PAGE->theme->settings->bannerimage4));
if ($hasslide4image) {
	$slide4image = $PAGE->theme->setting_file_url('bannerimage4', 'bannerimage4');
}
$slide4title = (empty($PAGE->theme->settings->bannertitle4)) ? false : $PAGE->theme->settings->bannertitle4;
$slide4caption = (empty($PAGE->theme->settings->bannertext4)) ? false : $PAGE->theme->settings->bannertext4;
$slide4url = (empty($PAGE->theme->settings->bannerlinkurl4)) ? false : $PAGE->theme->settings->bannerlinkurl4;
$slide4linktext = (empty($PAGE->theme->settings->bannerlinktext4)) ? false : $PAGE->theme->settings->bannerlinktext4;

/* Slide 5 settings */
$hasslide5 = (!empty($PAGE->theme->settings->enablebanner5));
$hasslide5image = (!empty($PAGE->theme->settings->bannerimage5));
if ($hasslide5image) {
	$slide5image = $PAGE->theme->setting_file_url('bannerimage5', 'bannerimage5');
}
$slide5title = (empty($PAGE->theme->settings->bannertitle5)) ? false : $PAGE->theme->settings->bannertitle5;
$slide5caption = (empty($PAGE->theme->settings->bannertext5)) ? false : $PAGE->theme->settings->bannertext5;
$slide5url = (empty($PAGE->theme->settings->bannerlinkurl5)) ? false : $PAGE->theme->settings->bannerlinkurl5;
$slide5linktext = (empty($PAGE->theme->settings->bannerlinktext5)) ? false : $PAGE->theme->settings->bannerlinktext5;

/* Slide 6 settings */
$hasslide6 = (!empty($PAGE->theme->settings->enablebanner6));
$hasslide6image = (!empty($PAGE->theme->settings->bannerimage6));
if ($hasslide6image) {
	$slide6image = $PAGE->theme->setting_file_url('bannerimage6', 'bannerimage6');
}
$slide6title = (empty($PAGE->theme->settings->bannertitle6)) ? false : $PAGE->theme->settings->bannertitle6;
$slide6caption = (empty($PAGE->theme->settings->bannertext6)) ? false : $PAGE->theme->settings->bannertext6;
$slide6url = (empty($PAGE->theme->settings->bannerlinkurl6)) ? false : $PAGE->theme->settings->bannerlinkurl6;
$slide6linktext = (empty($PAGE->theme->settings->bannerlinktext6)) ? false : $PAGE->theme->settings->bannerlinktext6;

/* Slide 7 settings */
$hasslide7 = (!empty($PAGE->theme->settings->enablebanner7));
$hasslide7image = (!empty($PAGE->theme->settings->bannerimage7));
if ($hasslide7image) {
	$slide7image = $PAGE->theme->setting_file_url('bannerimage7', 'bannerimage7');
}
$slide7title = (empty($PAGE->theme->settings->bannertitle7)) ? false : $PAGE->theme->settings->bannertitle7;
$slide7caption = (empty($PAGE->theme->settings->bannertext7)) ? false : $PAGE->theme->settings->bannertext7;
$slide7url = (empty($PAGE->theme->settings->bannerlinkurl7)) ? false : $PAGE->theme->settings->bannerlinkurl7;
$slide7linktext = (empty($PAGE->theme->settings->bannerlinktext7)) ? false : $PAGE->theme->settings->bannerlinktext7;

/* Slide 8 settings */
$hasslide8 = (!empty($PAGE->theme->settings->enablebanner8));
$hasslide8image = (!empty($PAGE->theme->settings->bannerimage8));
if ($hasslide8image) {
	$slide8image = $PAGE->theme->setting_file_url('bannerimage8', 'bannerimage8');
}
$slide8title = (empty($PAGE->theme->settings->bannertitle8)) ? false : $PAGE->theme->settings->bannertitle8;
$slide8caption = (empty($PAGE->theme->settings->bannertext8)) ? false : $PAGE->theme->settings->bannertext8;
$slide8url = (empty($PAGE->theme->settings->bannerlinkurl8)) ? false : $PAGE->theme->settings->bannerlinkurl8;
$slide8linktext = (empty($PAGE->theme->settings->bannerlinktext8)) ? false : $PAGE->theme->settings->bannerlinktext8;

/* Slide 9 settings */
$hasslide9 = (!empty($PAGE->theme->settings->enablebanner9));
$hasslide9image = (!empty($PAGE->theme->settings->bannerimage9));
if ($hasslide9image) {
	$slide9image = $PAGE->theme->setting_file_url('bannerimage9', 'bannerimage9');
}
$slide9title = (empty($PAGE->theme->settings->bannertitle9)) ? false : $PAGE->theme->settings->bannertitle9;
$slide9caption = (empty($PAGE->theme->settings->bannertext9)) ? false : $PAGE->theme->settings->bannertext9;
$slide9url = (empty($PAGE->theme->settings->bannerlinkurl9)) ? false : $PAGE->theme->settings->bannerlinkurl9;
$slide9linktext = (empty($PAGE->theme->settings->bannerlinktext9)) ? false : $PAGE->theme->settings->bannerlinktext9;

/* Slide 10 settings */
$hasslide10 = (!empty($PAGE->theme->settings->enablebanner10));
$hasslide10image = (!empty($PAGE->theme->settings->bannerimage10));
if ($hasslide10image) {
	$slide10image = $PAGE->theme->setting_file_url('bannerimage10', 'bannerimage10');
}
$slide10title = (empty($PAGE->theme->settings->bannertitle10)) ? false : $PAGE->theme->settings->bannertitle10;
$slide10caption = (empty($PAGE->theme->settings->bannertext10)) ? false : $PAGE->theme->settings->bannertext10;
$slide10url = (empty($PAGE->theme->settings->bannerlinkurl10)) ? false : $PAGE->theme->settings->bannerlinkurl10;
$slide10linktext = (empty($PAGE->theme->settings->bannerlinktext10)) ? false : $PAGE->theme->settings->bannerlinktext10;

$hasslideshow = ($hasslide1 || $hasslide2 || $hasslide3 || $hasslide4|| $hasslide5|| $hasslide6|| $hasslide7|| $hasslide8|| $hasslide9|| $hasslide10 ) ? true : false;
?>



<?php if ($hasslideshow) { ?>
    <div id="main-slideshow" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="container">	
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php if ($hasslide1) { ?>
            	<li data-target="#main-slideshow" data-slide-to="0" class="active"></li>
            <?php } ?>
            <?php if ($hasslide2) { ?>
            	<li data-target="#main-slideshow" data-slide-to="1"></li>
            <?php } ?>
            <?php if ($hasslide3) { ?>
            	<li data-target="#main-slideshow" data-slide-to="2"></li>
            <?php } ?>
            <?php if ($hasslide4) { ?>
            	<li data-target="#main-slideshow" data-slide-to="3"></li>
            <?php } ?>
            <?php if ($hasslide5) { ?>
            	<li data-target="#main-slideshow" data-slide-to="4"></li>
            <?php } ?>
            <?php if ($hasslide6) { ?>
            	<li data-target="#main-slideshow" data-slide-to="5"></li>
            <?php } ?>
            <?php if ($hasslide7) { ?>
            	<li data-target="#main-slideshow" data-slide-to="6"></li>
            <?php } ?>
            <?php if ($hasslide8) { ?>
            	<li data-target="#main-slideshow" data-slide-to="7"></li>
            <?php } ?>
            <?php if ($hasslide9) { ?>
            	<li data-target="#main-slideshow" data-slide-to="8"></li>
            <?php } ?>
            <?php if ($hasslide10) { ?>
            	<li data-target="#main-slideshow" data-slide-to="9"></li>
            <?php } ?>
        </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        
       <?php if ($hasslide1) { ?>
        <div id="slide1" class="item active">
          <img class="img-responsive" src="<?php echo $slide1image ?>">            
          <?php if ($slide2title || $slide1caption || $slide1linktext || $slide1url) { ?>
          <div class="carousel-caption">
                <div class="caption-inner">
                <h1><?php echo $slide1title ?></h1>
                <p><?php echo $slide1caption ?></p>
                <?php if ($slide1linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide1url; ?>"><?php echo $slide1linktext; ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide2) { ?>
        <div id="slide2" class="item">
          <img class="img-responsive" src="<?php echo $slide2image ?>">          
          <?php if ($slide2title || $slide2caption || $slide2linktext || $slide2url) { ?>
          <div class="carousel-caption">
                <div class="caption-inner">
                <h1><?php echo $slide2title ?></h1>
                <p><?php echo $slide2caption ?></p>
                <?php if ($slide2linktext) { ?>
                	<div class="slide-action">
                    	<a class="btn" href="<?php echo $slide2url ?>"><?php echo $slide2linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide3) { ?>
        <div id="slide3" class="item">
          <img class="img-responsive" src="<?php echo $slide3image ?>"> 
          <?php if ($slide3title || $slide3caption || $slide3linktext || $slide3url) { ?>         
          <div class="carousel-caption">
                <div class="caption-inner">
                <h1><?php echo $slide3title ?></h1>
                <p><?php echo $slide3caption ?></p>
                <?php if ($slide3linktext) { ?>
                	<div class="slide-action">
                    	<a class="btn" href="<?php echo $slide3url ?>"><?php echo $slide3linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide4) { ?>
        <div id="slide4" class="item">
          <img class="img-responsive" src="<?php echo $slide4image ?>">          
          <?php if ($slide4title || $slide4caption || $slide4linktext || $slide4url) { ?>
          <div class="carousel-caption">
          	<div class="caption-inner">
                <h1><?php echo $slide4title ?></h1>
                <p><?php echo $slide4caption ?></p>
                <?php if ($slide4linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide4url ?>"><?php echo $slide4linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide5) { ?>
        <div id="slide5" class="item">
          <img class="img-responsive" src="<?php echo $slide5image ?>">          
          <?php if ($slide5title || $slide5caption || $slide5linktext || $slide5url) { ?>
          <div class="carousel-caption">
                <div class="caption-inner">
                <h1><?php echo $slide5title ?></h1>
                <p><?php echo $slide5caption ?></p>
                <?php if ($slide5linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide5url ?>"><?php echo $slide5linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide6) { ?>
        <div id="slide6" class="item">
          <img class="img-responsive" src="<?php echo $slide6image ?>">          
          <?php if ($slide6title || $slide6caption || $slide6linktext || $slide6url) { ?>
          <div class="carousel-caption">
                <div class="caption-inner">
                <h1><?php echo $slide6title ?></h1>
                <p><?php echo $slide6caption ?></p>
                <?php if ($slide6linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide6url ?>"><?php echo $slide6linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide7) { ?>
        <div id="slide7" class="item">
          <img class="img-responsive" src="<?php echo $slide7image ?>">          
          <?php if ($slide7title || $slide7caption || $slide7linktext || $slide7url) { ?>
          <div class="carousel-caption">
                <div class="caption-inner">
                <h1><?php echo $slide7title ?></h1>
                <p><?php echo $slide7caption ?></p>
                <?php if ($slide7linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide7url ?>"><?php echo $slide7linktext ?></a>
                    </div>
                <?php } ?>
                </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide8) { ?>
        <div id="slide8" class="item">
          <img class="img-responsive" src="<?php echo $slide8image ?>">          
          <?php if ($slide8title || $slide8caption || $slide8linktext || $slide8url) { ?>
          <div class="carousel-caption">
              <div class="caption-inner">
                <h1><?php echo $slide8title ?></h1>
                <p><?php echo $slide8caption ?></p>
                <?php if ($slide8linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide8url ?>"><?php echo $slide8linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($hasslide9) { ?>
        <div id="slide9" class="item">
          <img class="img-responsive" src="<?php echo $slide9image ?>">          
          <?php if ($slide9title || $slide9caption || $slide9linktext || $slide9url) { ?>
          <div class="carousel-caption">
              <div class="caption-inner">
                <h1><?php echo $slide9title ?></h1>
                <p><?php echo $slide9caption ?></p>
                <?php if ($slide9linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide9url ?>"><?php echo $slide9linktext ?></a>
                    </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        
       <?php if ($hasslide10) { ?>
        <div id="slide10" class="item">
          <img class="img-responsive" src="<?php echo $slide10image ?>">          
          <?php if ($slide10title || $slide10caption || $slide10linktext || $slide10url) { ?>
          <div class="carousel-caption">
              <div class="caption-inner">
                <h1><?php echo $slide10title ?></h1>
                <p><?php echo $slide10caption ?></p>
                <?php if ($slide10linktext) { ?>
                    <div class="slide-action">
                    	<a class="btn" href="<?php echo $slide10url ?>"><?php echo $slide10linktext ?></a>
                     </div>
                <?php } ?>
              </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>  
        
              
        
      </div>
      
      
    </div>
    </div>
    
    
<?php } ?>