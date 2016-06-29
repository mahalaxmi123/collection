<?php

$numberofslides = theme_healthcert_get_setting('numberofslides');

if ($numberofslides) { ?>


    <div id="home-page-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php for($s=0;$s<$numberofslides;$s++):$cls_txt = ($s=="0")?' class="active"':''; ?>
                <li data-target="#home-page-carousel" data-slide-to="<?php echo $s; ?>" <?php echo $cls_txt; ?>></li>
                <?php endfor; ?>
            </ol>
                
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php for($s1=1;$s1<=$numberofslides;$s1++): 
                $cls_txt2 = ($s1=="1")?' active':'';
                $slidecaption = theme_healthcert_get_setting('slide' . $s1 . 'caption', true);
				$slidedescription = theme_healthcert_get_setting('slide' . $s1 . 'description', true);
                $slideurl = theme_healthcert_get_setting('slide' . $s1 . 'url');
                $slideimg = theme_healthcert_render_slideimg($s1,'slide' . $s1 . 'image');
            ?>
            <div class="item<?php echo $cls_txt2; ?>">                
                <img class="img-responsive" src="<?php echo $slideimg; ?>" />
                <div class="slide-detail">
                	<div class="container">
                        <div class="caption">
                        	<?php if ($slideurl): ?>
                            <h2 class="slide-title"><?php echo $slidecaption; ?></h2>
                            <?php endif; ?>
                            <?php if ($slideurl): ?>
                            <p class="slide-description"><?php echo $slidedescription; ?></p>
                            <?php endif; ?>
                            <?php if ($slideurl): ?>
                           		<p class="text-center read-more"><a href="<?php echo $slideurl; ?>"><?php echo get_string('readmore','theme_healthcert'); ?></a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <a class="left carousel-control" href="#home-page-carousel" data-slide="prev"></a>
        <a class="right carousel-control" href="#home-page-carousel" data-slide="next"></a>    
	</div>
<?php } ?>