<?php
	$fburl    = theme_healthcert_get_setting('fburl');
	$twurl    = theme_healthcert_get_setting('twurl');
	$liurl    = theme_healthcert_get_setting('liurl');
	$gpurl    = theme_healthcert_get_setting('gpurl');
?>
<div class="navbar-right">
	<?php 
	    if($fburl!='' || $twurl!='' || $liurl!='' || $gpurl!='')
    {
    ?>
  <div class="social-media">
    <ul class="list-inline">
         <?php if($fburl!=''){?> <li class="smedia-01"><a href="<?php echo $fburl; ?>"><i class="fa fa-facebook"></i></a></li><?php }?>
         <?php if($twurl!=''){?> <li class="smedia-02"><a href="<?php echo $twurl; ?>"><i class="fa fa-twitter"></i></a></li><?php }?>
          <?php if($liurl!=''){?> <li class="smedia-03"><a href="<?php echo $liurl; ?>"><i class="fa fa-linkedin"></i></a></li><?php }?>                      
         <?php if($gpurl!=''){?> <li class="smedia-04"><a href="<?php echo $gpurl; ?>"><i class="fa fa-google-plus"></i></a></li><?php }?>
    </ul>
  </div>
 <?php
 }
 ?>
</div>