<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
</header>
<style>
    .slider_wrapper {
        height:530px !important;
    }
    .slider_wrapper img {
        height: 545px !important;
    }
    select {margin-top:0px;}
    .slider_wrapper .bx-wrapper .bx-pager {top:inherit;bottom: 0px;}
    select.cust_width1 {width:177px !important;margin-left:-17px !important;}
    select.cust_width2 {width:162px !important;margin-left:-5px !important;}
    select.statut {padding: 6px 10px;width: 127px;}
    select.civility {width: 74px;padding: 6px 10px;margin-left: -8px;}
    input.first_name {width:100px;}
    input.last_name {width:80px;}
    .register-box textarea {height:auto !important;}
    input.green_button {top:25px;position:relative;}
</style>
<div class="slider_wrapper " id="sliderWrapper"> <!--slider_wrapper_1-->
    <div class="container">
        <div class="row"> 
            <ul class="homepageSlider">
    			<li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide1.jpg" title="Visite Guidee Paris" alt="Visite Guidee Paris" style="height:360px" />
                </li>
    			<li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide2.jpg" title="Gare De Lyon" alt="Gare De Lyon" style="height:360px" />
                </li>
    			<li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide3.jpg" title="Gare Saint Lazare" alt="Gare Saint Lazare" style="height:360px" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide4.jpg" title="Aeroport D'Orly" alt="Aeroport D'Orly" style="height:360px" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide5.jpg" title="Aeroport De Roissy CDG" alt="Aeroport De Roissy CDG" style="height:360px" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide6.jpg" title="Aeroport Beauvais" alt="Aeroport Beauvais" style="height:360px" />
                </li>
              <li>
                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/slide7.jpg" title="Aeroport Beauvais" alt="Aeroport Beauvais" style="height:360px" />
                </li> 
            </ul> 
        </div> 
    </div>
</div>
<div class="container" style="position: relative;">
    <div class="register-box">
        <div class="booking-title booking-title-bg-red">Signup Now to Start Making Money</div>
        <div class="">
            <?php echo form_open('affiliate/register', array("id"=>"registerform"));?>
            <div class="col-md-4 form-group">
                <span>Statut</span>
                <select name="statut" class="form-control statut">
                    <option value="0">Independant</option>
                    <option value="1">Company</option>
                </select>                                    </div>


            <div class="col-md-2 form-group">
                <span>Civility</span>
                <select name="civility" class="form-control civility">
                    <option value="0">Mr</option>
                    <option value="1">Miss</option>
                    <option value="2">Mrs</option>
                </select>                                    </div>

            <div class="col-md-3 form-group">
                <span>First Name</span>
                <input name="" value="" class="form-control first_name" type="text">                                    </div>
            <div class="col-md-3 form-group">
                <span>Last Name</span>
                <input name="" value="" class="form-control last_name" type="text">                                    </div>
                <div class="clearfix"></div>
            <div class="col-md-4 form-group">
                <span>Company</span>
                <input name="" value="" class="form-control" type="text">                                    </div>
            <div class="col-md-4 form-group">
                <span>Phone</span>
                <input name="" value="" class="form-control" type="text">                                    </div>
            <div class="col-md-4 form-group">
                <span>Email</span>
                <input name="" value="" class="form-control" type="text">                                    </div>
            <div class="col-md-12 form-group">
                <span>Address</span>
                <textarea name="" value="" rows="1"></textarea>                                    </div>
            <div class="col-md-6 ">
                <label>City</label>
                <input name="" value="" class="form-control" type="text">                                    </div>
            <div class="col-md-6 ">
                <label>Zip Code</label>
                <input name="" value="" class="form-control" type="text">                                    </div>
                <div class="clearfix"></div>

            <div class="col-md-6 form-group">
                <label>Password</label>
                <input name="" value="" class="form-control" type="text">                                    </div>
            <div class="col-md-6 form-group">
                <label>Password Confirm</label>
                <input name="" value="" class="form-control" type="text">                                    </div>
        </div>
        <div class="bk-row">
            <div class="col-md-12">
                <div class="form-group" style="text-align:left;">
                    <span class="tos_conditions"><input type="checkbox" name="tos_conditions">Accept <a href="http://www.cab-booking-script.com/demo/termsServices" target="_blank"> Terms and Conditions</a></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" style="text-align: right;">

                    <input type="submit" class="button green_button" value="Registe Now">

                </div>
            </div>
        </div>

        <?php echo form_close();?>
    </div>
</div>
<div class="booking-process">
    <div class="container">
        <div class="row">
            <div class="process-box">
                <div class="col-md-3 easy-steps">
                    <div class="img-holder">
                        <div class="img-container">
                            <div class="numbering">1</div>
                            <span class="process-text">Signup</span>
                            <i class="fa fa-sign-in"></i> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 easy-steps">
                    <div class="img-holder">
                        <div class="img-container">
                            <div class="numbering">2</div>
                            <span class="process-text">Upload Documents</span>
                            <i class="fa fa-upload"></i> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 easy-steps">
                    <div class="img-holder">
                        <div class="img-container">
                            <div class="numbering">3</div>
                            <span class="process-text">Get Approved</span>
                            <i class="fa fa-check"></i> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 easy-steps">
                    <div class="img-holder">
                        <div class="img-container">
                            <div class="numbering">4</div>
                            <span class="process-text">Earn Money</span>
                            <i class="fa fa-money"></i> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container body-border"> 
    <div class="breadcrumb">
        <div class="row">
            <aside class="nav-links">
                <ul>
                    <li><a href="<?php echo site_url(); ?>/"><i class="fa fa-home"></i>  <?php echo $this->lang->line('home_page');?> </a></li>
                    <li class="active"><a href="javascript:void(0)"><?php echo $title ?> </a></li>
                </ul>
            </aside>
        </div>
    </div>
           
    <div class="clearfix"></div> 
    <div id="services-section" class="body-bg">
    	<div class="row">
    		<div class="col-md-4">
    			<div class="plans">
    				<div class="plans-header">
    					<h3>Transfert Aeroport D'Orly</h3></div> 
    				<div class="col-md-12 pkg_title_row">
    					<div class="plans_img"><img src="http://navetteo.fr/uploads/service_images/3_aeroport-orly.png" alt="Peugeot 508 - Peugeot 508 " title="Peugeot 508 - Peugeot 508 "></div>
    				</div>
    				<div class="description" style="padding-left:11px;padding-right:11px;">
    					La liaison entre Paris et l'aéroport d'Orly est souvent très difficile. Transports en commun surchargés, longues files d'attente pour prendre un taxi.                                         </div>
    				<div class="button-row">
    					<div class="learn_button" style="float:right;margin-bottom:20px;padding-left:11px;padding-right:11px;"><a href="<?php echo base_url(); ?>services" class="button light_green_button">Know more</a></div>
    
    
    
    				</div>
    			</div>
    		</div>
    		<div class="col-md-4">
    			<div class="plans">
    				<div class="plans-header">
    					<h3>Transfert Aeroport CDG</h3></div>
    				<div class="col-md-12 pkg_title_row">
    					<div class="plans_img"><img src="http://navetteo.fr/uploads/service_images/4_aeroport-de-roissy.png" alt="Peugeot 508 - Peugeot 508 " title="Peugeot 508 - Peugeot 508 "></div>
    				</div>
    				<div class="description" style="padding-left:11px;padding-right:11px;">
    					Vous cherchez un transport pour vous rendre Ã L'aeroport? ou qu'on vous recupere de L'aeroport ?                                        </div>
    				<div class="button-row">
    					<div class="learn_button" style="float:right;margin-bottom:20px;padding-left:11px;padding-right:11px;"><a href="<?php echo base_url(); ?>services" class="button light_green_button">Know more</a></div>
    
    				</div>
    			</div>
    		</div>
    		<div class="col-md-4">
    			<div class="plans">
    				<div class="plans-header">
    					<h3>Transfert Aeroport Beauvais</h3></div>
    				
    				<div class="col-md-12 pkg_title_row">
    					<div class="plans_img"><img src="http://navetteo.fr/uploads/service_images/5_aeroport-beauvais.png" alt="Peugeot 508 - Peugeot 508 " title="Peugeot 508 - Peugeot 508 "></div>
    				</div>
    				<div class="description" style="padding-left:11px;padding-right:11px;">
    					Navetteo est le meilleur site de transport de personne qui soit si vous avez besoin si vous avez besoin d'un transfert aéroport pour l'aéroport de Beauvais.                                        </div>
    				<div class="button-row">
    					<div class="learn_button" style="float:right;margin-bottom:20px;padding-left:11px;padding-right:11px;"><a href="<?php echo base_url(); ?>services" class="button light_green_button">Know more</a></div>
    
    
    					<!-- Here Button Was Removed -->
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4">
    			<div class="plans">
    				<div class="plans-header">
    					<h3>Transfert Aeroport Le Bourget</h3></div>
    				<div class="col-md-12 pkg_title_row">
    					<div class="plans_img"><img src="http://navetteo.fr/uploads/service_images/28_le-bourget.png" alt="Peugeot 508 - Peugeot 508 " title="Peugeot 508 - Peugeot 508 "></div>
    				</div>
    				<div class="description" style="padding-left:11px;padding-right:11px;">
    					La liaison entre Paris et l'aéroport Le Bourget est souvent très difficile. Transports en commun surchargés, longues files prendre un taxi.                                         </div>
    				<div class="button-row">
    					<div class="learn_button" style="float:right;margin-bottom:20px;padding-left:11px;padding-right:11px;"><a href="<?php echo base_url(); ?>services" class="button light_green_button">Know more</a></div>
    				</div>
    			</div>
    		</div>
    
    
    		<div class="col-md-4">
    			<div class="plans">
    				<div class="plans-header">
    					<h3>Transfert Aeroport Paris Vatry</h3></div>
    				<div class="col-md-12 pkg_title_row">
    					<div class="plans_img"><img src="http://navetteo.fr/uploads/service_images/0_paris-vatry.png" alt="Peugeot 508 - Peugeot 508 " title="Peugeot 508 - Peugeot 508 "></div>
    				</div>
    				<div class="description" style="padding-left:11px;padding-right:11px;">
    					La liaison entre Paris et l'aéroport Paris Vatry est souvent très difficile. Transports en commun surchargés, longues files prendre un taxi.                                         </div>
    				<div class="button-row">
    					<div class="learn_button" style="float:right;margin-bottom:20px;padding-left:11px;padding-right:11px;"><a href="<?php echo base_url(); ?>services" class="button light_green_button">Know more</a></div>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-4">
    			<div class="plans">
    				<div class="plans-header">
    					<h3>Transfert Gare Austerlitz</h3>
    				</div>
    				<div class="col-md-12 pkg_title_row">
    					<div class="plans_img"><img src="http://navetteo.fr/uploads/service_images/24_gare-d-austerlitz.png" alt="Peugeot 508 - Peugeot 508 " title="Peugeot 508 - Peugeot 508 "></div>
    				</div>
    				<div class="description" style="padding-left:11px;padding-right:11px;">
    					Que ce soit sur les circuits touristiques de certaines régions, des visites guidées de grandes villes ou encore un transfert gare ou un transfert aéroport                                        </div>
    				<div class="button-row">
    					<div class="learn_button" style="float:right;margin-bottom:20px;padding-left:11px;padding-right:11px;"><a href="<?php echo base_url(); ?>services" class="button light_green_button">Know more</a></div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
		$('.homepageSlider').bxSlider({ 
            mode: 'fade',
            auto: true,
            pager: true,
            autoControl: false,
            adaptiveHeight: true,
            easing: 'swing',
            responsive: true,
            preloadImages: 'all'
        });
        $(".slider_wrapper .bx-viewport").css("height", '530px');
	});
</script>