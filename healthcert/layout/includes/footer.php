<?php
	$phoneno  = theme_healthcert_get_setting('phoneno');
	$faxno  = theme_healthcert_get_setting('faxno');
	$address  = theme_healthcert_get_setting('address');
	$address2  = theme_healthcert_get_setting('address2');
	
	$quicklink = theme_healthcert_get_setting('quicklink');
	$infolink = theme_healthcert_get_setting('infolink');
?>


<div class="row">
 	<div class="col-sm-4">
        <div class="footer-logo">
            <a href="<?php echo $CFG->wwwroot;?>">
	            <img src="<?php echo get_logo_url('footer'); ?>" width="259" height="73" alt="Healthcert">
            </a>
        </div>
        <div class="foot-menu-wrapper quick-link">
            <h3>Quick Links</h3>
            <ul class="list-unstyled">
			   <?php 
                 $quicklink_settings =	explode("\n",$quicklink);
                 
                    foreach($quicklink_settings as $key => $settingval){
                        $exp_set = explode("|",$settingval);
                        list($ltxt,$lurl) = $exp_set;
                        $ltxt = trim($ltxt);
                        $lurl = trim($lurl);
                        if(empty($ltxt))
                            continue;
                        echo '<li><i class="fa fa-caret-right"></i><a href="'.$lurl.'" target="_blank"> '.$ltxt.'</a></li>';
                    }
	                //	$atto_settings = $natto_settings;
                 ?>
             </ul>
          </div>
    </div>
    <div class="col-sm-5">
    	<div class="foot-menu-wrapper info-link">
            <h3>HealthCert Courses</h3>
            <ul class="list-unstyled">
			   <?php 
                 $info_settings =	explode("\n",$infolink);
                 
                    foreach($info_settings as $key => $settingval){
                        $exp_set = explode("|",$settingval);
                        list($ltxt,$lurl) = $exp_set;
                        $ltxt = trim($ltxt);
                        $lurl = trim($lurl);
                        if(empty($ltxt))
                            continue;
                        echo '<li><i class="fa fa-caret-right"></i><a href="'.$lurl.'" target="_blank"> '.$ltxt.'</a></li>';
                    }
	                //	$atto_settings = $natto_settings;
                 ?>
             </ul>
          </div>
    </div>
    <div class="col-sm-3">
        <div class="contact-info">
	        <h3>Contact Us</h3> 
            <p><strong>Australian Course Enquiries Contact:</strong></p>   	    
        	<ul class="list-unstyled">
                <li><p><i class="fa fa-phone"></i><span><?php echo $phoneno; ?></span></p></li>
                <li><p><i class="fa fa-fax"></i><span><?php echo $faxno; ?></span></p></li>
                <li><p><i class="fa fa-map-marker"></i><span><?php echo $address; ?></span></p></li>
            </ul>
            
            <p><strong>HealthCert International Pte Ltd</strong></p>   	    
        	<ul class="list-unstyled">                
                <li><p><i class="fa fa-map-marker"></i><span><?php echo $address2; ?></span></p></li>
            </ul>
    </div>

</div>