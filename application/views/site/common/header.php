<?php
$page_lang = 'lang="fr"';
?>
    <!DOCTYPE html>
<html <?php echo $page_lang;?>>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>"/>
        <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>" />
        <link rel='shortcut icon' href='<?php echo base_url(); ?>assets/system_design/images/favicon.ico' type='image/x-icon'/>
        <title><?php echo $title; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/system_design/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/system_design/css/callback.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <?php if (isset($site_settings->site_theme) && $site_settings->site_theme == "Red") { ?>
            <link href="<?php echo base_url(); ?>assets/system_design/css/cab-2ntheame.css" rel="stylesheet">
        <?php } else { ?>
            <link href="<?php echo base_url(); ?>assets/system_design/css/cab.css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>assets/system_design/css/custom-style.css" rel="stylesheet">
        <?php } ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
<body>
<header>
    <div class="header-wrapper">
        <div class="navbar-fixed-top">
            <div class="top-section">
                <div class="container">
                    <!-- <div class="container-fluid"> -->
                    <div class="row"> 
                        <div class="top_section_inner">
                            <div class="col-md-6 col-sm-6 col-xs-12 section-cen">               <?php ?>
                                <ul class="top-links">                        
                                	<li>
                                		<a href="#">
                                			<span style="float:left;">Chauffeur</span>
                                			<img src="https://i.imgur.com/Aimkg8w.png" height="30" width="30">
                                		</a>
                                	</li>
                                	<li>
                                		<a href="#">
                                			<span style="float:left;">Emploi</span>
                                			<img src="https://i.imgur.com/F4cXf41.png" style="border-radius:50%;" width="30" height="30">
                                		</a>    
                                	</li>
                                	<li>
                                		<a href="#">
                                			<span style="float:left;">Partenariat</span>
                                			<img src="https://cab-booking-script.com/demo/images/money.png" style="" height="30" width="30">
                                		</a>
                                	</li>
                                </ul>
                                <?php
                                if (!$this->ion_auth->logged_in()) {
                                    ?>
                                    <!-- <div class="social-icons left" style="margin-top:4px; margin-right: 10px !important">
                                        <a class="top-login" href="#" data-href="<?php echo site_url(); ?>chauffeur.php"><?php echo $this->lang->line('driver_login');
                                        ?>
                                        </a>
                                    </div>
                                    -->

                                <?php }
                                ?>
                                <div class="social-icons left">
                                    <ul>
                                        <?php
                                        $social_networks = $this->base_model->run_query("SELECT * FROM vbs_social_networks");

                                        //social_networks

                                        if (isset($social_networks[0]->facebook)) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $social_networks[0]->facebook; ?>"   target="_blank">
                                                    <img src='<?php echo base_url() . "assets/system_design/images/facebook-icon.png" ?>' alt="Navetteo Facebook" title="Navetteo Facebook" />
                                                </a> <!--<i class="fa fa-facebook"></i>-->
                                            </li>
                                        <?php }
                                        if (isset($social_networks[0]->twitter)) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $social_networks[0]->twitter; ?>"   target="_blank">
                                                    <!--<i class="fa fa-twitter"></i> -->
                                                    <img src='<?php echo base_url() . "assets/system_design/images/twitter-icon.png" ?>' alt="Navetteo Twitter" title="Navetteo Twitter"/>
                                                </a>
                                            </li>
                                        <?php   }
                                        if (isset($social_networks[0]->linkedin)) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $social_networks[0]->linkedin; ?>"  target="_blank">
                                                    <!--<i class="fa fa-linkedin"></i>  -->
                                                    <img src='<?php echo base_url() . "assets/system_design/images/linkedin-icon.png" ?>' alt="Navetteo LinkedIn" title="Navetteo LinkedIn"/>
                                                </a>
                                            </li>
                                        <?php }
                                        if (isset($social_networks[0]->google_plus)) {
                                            ?>
                                            <!--<li>
                                                <a href="<?php // echo $social_networks[0]->google_plus; ?>" target="_blank">
                                                    < --<i class="fa fa-google-plus"></i> -- >
                                                    <img src='<?php // echo base_url() . "assets/system_design/images/google-icon.png" ?>' alt="Navetteo GooglePlus" title="Navetteo GooglePlus"/>
                                                </a>
                                            </li> -->
                                        <?php   } ?>
                                        <!--
                                                <?php   //  if ($site_settings->app_settings == "Enable") { ?>
                                                            <li> <a href="<?php echo site_url(); ?>/welcome/download_app/android" style="font-size:20px;"> <i class="fa fa-android"></i> </a> </li>
                                                            <li> <a href="<?php echo site_url(); ?>/welcome/download_app/ios" style="font-size:20px;"> <i class="fa fa-apple"></i> </a> </li>
                                                <?php   //  } ?>
                                                -->
                                    </ul>
                                </div>
                                <!-- Add to Favorites -->
                                <div class="top-pack-book-links <?php if( $this->lang->lang() == 'fr' ) { echo 'leftalign_fr'; } else { echo 'leftalign_en'; } ?>">
                                    <ul>
                                        <li><a class="bookmark" href="javascript:(function(){var a=window,b=document,c=encodeURIComponent,d=a.open('http://www.seocentro.com/cgi-bin/promotion/bookmark/bookmark.pl?u='+c( b.location )+'&amp;t='+c( b.title ),'bookmark_popup','left='+((a.screenX||a.screenLeft)+10)+',top='+((a.screenY||a.screenTop)+10)+',height=480px,width=720px,scrollbars=1,resizable=1,alwaysRaised=1');a.setTimeout(function(){ d.focus()},300)})();"><?php echo $this->lang->line('bookmark_us');?></a></li>
                                    </ul>
                                </div> 
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12 section-ce2">

                                <?php if (!$this->ion_auth->logged_in()) { ?>
                                    <!--<div class="register right">
                                                    <div class="tot-top">
                                                        <aside class="col">  <a class='top-register' href="<?php echo site_url(); ?>/auth/create_user" ><?php echo $this->lang->line('create_account'); ?> </a> </aside>
                                                    </div>
                                                </div>-->
                                    <div class="login right">
                                        <div class="user-nav">
                                        	<div class="btn-group" role="group">
                                        		<div class="btn-group" role="group">               
                                        			<a href="#">  
                                        				<button type="button" class="btn btn-default loginout register"><i class="fa fa-user"></i> S'enregistrer</button>                        
                                        			</a>
                                        		</div>
                                        		<div class="btn-group" role="group">                            
                                        			<a href="#">  
                                        			<button type="button" class="btn btn-default loginout login"><i class="fa fa-lock"></i> Connexion</button>
                                        			</a>                        
                                        		</div>
                                        	</div>
                                        </div>
                                        <!--
                                        <div class="tot-top">
                                            < -- <div class="phone"> <i class="fa fa-lock"></i> </div> -- >
                                            <aside class="col">
                                                < -- <?php echo site_url(); ?>/auth/clientlogin" > -- >
                                                <a class='client-login' href="#">
                                                    <?php echo $this->lang->line('client_login'); ?> </a> 
                                            </aside>
                                        </div>
                                        -->
                                    </div>
                                <?php } else { ?>
                                    <a href="<?php echo site_url(); ?>/auth" >
                                        <div class="right">
                                            <div class="tot-top">
                                                <div class="phone"> <i class="fa fa-user"></i> </div>
                                                <!--<aside> <?php // echo $this->session->userdata('username'); ?> </aside>-->
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <?php echo $this->session->userdata('username'); ?><b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li> <a href="<?php echo site_url(); ?>/users/profile" class="media-heading"><i class="fa fa-fw fa-user"></i> <?php echo $this->lang->line('profile'); ?></a> </li>
                                                    <!-- <li> <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a> </li> -->
                                                    <li> <a href="<?php echo site_url(); ?>/users/changePassword"><i class="fa fa-fw fa-gear"></i> <?php echo $this->lang->line('change_password'); ?></a> </li>
                                                    <li class="divider"></li>
                                                    <li> <a href="<?php echo site_url(); ?>/auth/logout"><i class="fa fa-fw fa-power-off"></i><?php echo $this->lang->line('log_out'); ?> </a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                                
                                <div class="lang-icons"><!--class="selec" id="uli"-->
                                    <div class="btn-group">
                                    	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    	    <span style="position: relative;">Francais </span>
                                    	    <span style="position: relative;"><img src="<?php echo base_url(); ?>assets/system_design/images/fr-icon.png" /></span>
                                    	  <!--<span class="glyphicon glyphicon-chevron-down"></span>-->
                                    	  <i class="fa fa-angle-down"></i>
                                    	</button>
                                    
                                    	<ul class="dropdown-menu"> 
                                    	  <li>
                                    		<a href="#" title="Select this card">Francais <img src="<?php echo base_url(); ?>assets/system_design/images/fr-icon.png" /></a>
                                    	  </li>
                                    	  <li>
                                    		<a href="#" title="Select this card">English <img src="<?php echo base_url(); ?>assets/system_design/images/en-icon.png" /></a>
                                    	  </li> 
                                    	</ul>
                                    </div>
                                    <!--<ul class="right">
                                        <li> <a href="<?php echo base_url() . $this->lang->switch_uri('en') ?>"><span class="en-icon"></span></a> </li>
                                        <li><a href="<?php echo base_url() . $this->lang->switch_uri('fr') ?>"><span class="fr-icon"></span></a></li>
                                    </ul>
                                    <a href="#"><?php echo $this->lang->line('lang'); ?></a>
                                            <div id="ld">
                                                <ul>
                                                    <li> <?php echo anchor($this->lang->switch_uri('en'), 'English'); ?> </li>
                                                    <li><?php echo anchor($this->lang->switch_uri('fr'), 'French'); ?> </li>
                                                    <li><?php echo anchor($this->lang->switch_uri('pt'), 'Português'); ?> </li>
                                                    <li><?php echo anchor($this->lang->switch_uri('de'), 'Deutsch'); ?> </li>
                                                </ul>
                                            </div>-->
                                </div>
                                <div class="currency">
                                	<select name="department" class="grad-bg form-control remove-apperance">
                                	    <option value="EURO" selected="">&euro; EURO</option>
                                		<option value="USD">&#36; USD</option>
                                	</select>
                                </div>
                                <!--
                                <div class="audio right">
                                    <object class="audioObj"  width="140" height="14" style=" float: right;margin-left: 20px;vertical-align: top;" data="http://flash-mp3-player.net/medias/player_mp3_mini.swf" type="application/x-shockwave-flash" title="Adobe Flash Player">
                                        <param value="http://flash-mp3-player.net/medias/player_mp3_mini.swf" name="movie">
                                        <param value="#5590C1" name="bgcolor">
                                        <?php   if( $this->lang->lang() == 'fr' ) { ?>
                                            <param value="mp3=<?php echo base_url(); ?>assets/system_design/audio/navetteo_french.mp3&amp;bgcolor=0D528A&amp;slidercolor=fb833e&amp;autoplay=1&amp;autoload=0" name="FlashVars">
                                        <?php   }
                                        else {
                                            ?>          <param value="mp3=<?php echo base_url(); ?>assets/system_design/audio/navetteo_english.mp3&amp;bgcolor=0D528A&amp;slidercolor=fb833e&amp;autoplay=1&amp;autoload=0" name="FlashVars">
                                        <?php   } ?>
                                    </object>
                                </div>
                                -->
                                <!-- Saravanan 17-August-2016
                                        <div class="top-pack-book-links">
                                            <ul>
                                                <li><a class="partner-access" href="<?php echo site_url(); ?>/auth/partnerlogin"><?php echo $this->lang->line('partner_access');?></a></li>
                                            </ul>
                                        </div>
                                        -->
                                <?php   if ($site_settings->app_settings == "Enable") { ?>
                                    <div class="top-links">
                                        <a href="<?php echo site_url(); ?>/welcome/download_app/android"><img src="<?php echo base_url(); ?>assets/system_design/images/header/google-play-icon.png" style="width:48%" alt="Navetteo Google Apps" title="Navetteo Google Apps " /></a>
                                        <a href="<?php echo site_url(); ?>/welcome/download_app/ios"><img src="<?php echo base_url(); ?>assets/system_design/images/header/apple-icon.png" style="width:48%" alt="Navetteo iPhone Apps" title="Navetteo iPhone Apps"/></a>
                                    </div>
                                <?php   } ?>
                                <!--<div class="top-links">
                                            <ul>
                                                <li> <a href="<?php echo site_url();?>/welcome/testimonials"><?php echo $this->lang->line('testimonial_page');?></a></li>
                                                <li><a href="<?php echo site_url(); ?>/welcome/faqs"><?php echo $this->lang->line('FAQs');?></a></li>
                                                <li><a href="<?php echo site_url(); ?>/welcome/fleet"><?php echo $this->lang->line('page_fleet');?></a></li>
                                            </ul>
                                        </div>-->


                            </div><!-- end collumn-->
                        </div> <!--end row-->
                    </div> 
                </div>
            </div>

            <div class="container secondary-header">
                <!-- <div class="container-fluid"> padding-p-0-->
                    <div class="row">
                        <div class="col-md-2"> <!--padding-p-l-->
                            <a href="<?php echo site_url();?>index.php">
                                <div class="header-logo"><img src="<?php echo base_url(); ?>assets/system_design/images/handi-express-logo.png" alt="Handi Mobilite Logo" title="Handi Mobilite Logo" /></div>
                            </a>
                        </div>
                        <div class="col-md-9"> 
                            <?php   if ($this->lang->lang() == 'fr') { ?>
                                <div class="col-md-4 right french-contact-number"><!--padding-p-r-->
                                    <?php   //$phone = $site_settings->land_line;
                                    echo "01 48 13 09 34";

                                    ?>
                                    <p class="working-hours" style=" left:35px;">Du Lundi au Vendredi <br/>de 9h à 12h et de 14h à 18h</p>


                                </div>
                            <?php   } else { ?>
                                <div class="col-md-4 right english-contact-number">
                                    <?php //    $phone = $site_settings->phone;
                                    echo "01 48 13 09 34";
                                    ?>
                                    <p class="working-hours" style="left:20px;">From Monday to Friday <br/>9h to 12h and from 14h to 18h</p>
                                </div>
                            <?php   }   ?>
                            <div class="col-md-1 right">


                                <img src="<?php echo base_url(); ?>assets/system_design/images/call-us-girl.png" class="call-us-girl" alt="Call Us" title="Call Us" /></div>
                            <?php if ($this->lang->lang() == 'fr') { ?>
                                <div class="header-icons-fr">

                                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/logo1ssside.png" alt="Aeroport Service"  width="250px" height="80px"  title="Aeroport Service"/>

                                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/logoagain.png" alt="Aeroport Service"  width="250px" height="80px"  title="Aeroport Service"/>



                                    <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/disable.png" alt="Aeroport Service"  width="250px" height="80px" title="Aeroport Service"/>


                                </div>
                            <?php   }
                            else if ($this->lang->lang() == 'en') { ?>
                                <div class="header-icons-en">
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/aeroport.png" alt="Airport Service" title="Airport Service"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/passengers.png" alt="Passengers" title="Passengers"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/circuit-touristiques.png" alt="Tours Circuit" title="Tours Circuit"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/transfert-gare.png" alt="Railway Transfer" title="Railway Transfer"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/airport-transfers.png" style="width:95px" alt="Airport Transfer" title="Airport Transfer"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/free-quotes-en.png" alt="Free Quotes" title="Free Quotes"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/24hr-fr.png" alt="24/7 Service" title="24/7 Service"/>
                                    <img src="<?php echo base_url(); ?>assets/system_design/images/header/disabled.png" alt="Disabled" title="Disabled"/>
                                </div>
                            <?php   }   ?>
                        </div>

                    </div>
                <!--</div> -->
            </div> <!--/.container-fluid -->
            <div class="main-menu"> <!-- style="height: 70px;" -->
                <div class="container nav-border">
                    <div class="row">
                        <nav class="navbar navbar-navetteo menu-total">
                            <div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed nav-bar-btn" type="button"> <span class="sr-only"><?php echo $this->lang->line('toggle_navigation');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div class="collapse navbar-collapse res-menu" id="navbar">
                                <?php if(!$this->ion_auth->logged_in()) {?>
                                    <ul class="nav navbar-nav menu">


                                        <li <?php if(isset($active_class)){ if($active_class=="home") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>index.php"> <i class="fa fa-home"></i> <?php echo $this->lang->line('home_page');?></a></li>

                                        <!-- <?php echo site_url(); ?>/welcome/onlineReservation"> -->


                                        <li class="obook <?php if(isset
                                        ($active_class)){ if($active_class=="onlinebooking") echo 'active'; }?>" ><div class="menu-new-icon">New</div><a href="#"><?php echo $this->lang->line('book_online');?></a>

                                        </li>


                                        <!--<li class="packages <?php if(isset($active_class)){ if($active_class=="packages") echo 'active'; }?>"><a href="<?php echo site_url(); ?>/packages"><?php echo $this->lang->line('packages');?></a></li>-->
                                        <li class="parks drop-menu menu-drop<?php if(isset($active_class)) { if($active_class=="aeroport") echo 'class="active"'; }?>">
                                            <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle aeroport-a"><i class="fa fa-car" style="font-size: 15px;margin-right: 5px;"></i>TRANSPORT PMR REGULIER<span class="caret"></span> </a>
                                            <ul  style="width:204px;" role="menu" class="dropdown-menu drop-menu">
                                                <li style="width:204px;"><a href="<?php echo site_url();?>handi-pro.php">HANDI PRO</a></li>
                                                <li style="width:204px;"><a href="<?php echo site_url();?>handi-business.php">HANDI BUSINESS</a></li>

                                                <li style="width:204px;"><a href="<?php echo site_url();?>handi-scolaire.php">HANDI SCOLAIRE</a></li>

                                            </ul>
                                        </li>

                                        <li class="parks drop-menu menu-drop<?php if(isset($active_class)) { if($active_class=="transport_parcs") echo 'class="active"'; }?>">
                                            <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle parks-a"><i class="fa fa-car" style="font-size: 15px;margin-right: 5px;"></i>TRANSPORT PMR A LA DEMANDE<span class="caret"></span> </a>
                                            <ul style="width:240px;" role="menu" class="dropdown-menu drop-menu">

                                                <li style="width:240px;" ><a href="<?php echo site_url();?>handi-prive.php">HANDI PRIVE</a></li>

                                                <li style="width:240px;" ><a href="<?php echo site_url();?>handi-shuttle.php">HANDI SHUTTLE</a></li>

                                                <li style="width:240px;"><a href="<?php echo site_url();?>handi-voyage.php">HANDI VOYAGE</a></li>

                                                <li><a href="<?php echo site_url();?>handi-senior.php">HANDI SENIOR</a></li>

                                                <li><a href="<?php echo site_url();?>handi-medical.php">HANDI MEDICAL</a></li>



                                            </ul>
                                        </li>
                                        <li <?php if(isset($active_class)){ if($active_class=="prices") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>nos-tarifs.php"><i class="fa fa-money" style="font-size: 15px;margin-right: 5px;"></i><?php echo $this->lang->line('ourprice_page');?></a></li>
                                        <li <?php if(isset($active_class)){ if($active_class=="zones") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>zones.php"><i class="fa fa-area-chart" style="font-size: 15px;margin-right: 5px;"></i><?php echo $this->lang->line('zones_page');?></a></li>
                                        <li <?php if(isset($active_class)){ if($active_class=="fleet") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>vehicules.php"><i class="fa fa-truck" style="font-size: 15px;margin-right: 5px;"></i><?php echo $this->lang->line('page_fleet');?></a></li>
                                        <!--<li <?php // if(isset($active_class)){ if($active_class=="testimonials") echo 'class="active"'; }?> ><a href="<?php // echo site_url(); ?>testimonials.php"><i class="fa fa-quote-left" style="font-size: 15px;margin-right: 5px;"></i><?php // echo $this->lang->line('testimonial_page');?></a></li>-->
                                        <li <?php if(isset($active_class)){ if($active_class=="faqs") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>knowledgebase.php"><i class="fa fa-question-circle" style="font-size: 15px;margin-right: 5px;"></i><?php echo $this->lang->line('FAQs');?></a></li>
                                        <li class="green <?php if(isset($active_class)){ if($active_class=="contactus") echo 'active'; }?>" ><a href="<?php echo site_url('contact') ?>"><i class="fa fa-envelope" style="font-size: 15px;margin-right: 5px;"></i> <?php echo $this->lang->line('contact_page');?></a></li>
                                    </ul>


                                <?php }
                                else if($this->ion_auth->logged_in()) {
                                    ?>
                                    <ul class="nav navbar-nav menu">
                                        <li <?php if(isset($active_class)){ if($active_class=="home") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>index.php"> <i class="fa fa-home"></i> <?php echo $this->lang->line('home_page');?></a></li>
                                        <li class="obook <?php if(isset($active_class)){ if($active_class=="onlinebooking") echo 'active'; }?>" ><a href="<?php echo site_url(); ?>reservation.php"><?php echo $this->lang->line('book_online');?></a></li>
                                        <li class="packages <?php if(isset($active_class)){ if($active_class=="packages") echo 'active'; }?>"><a href="<?php echo site_url(); ?>/packages"><?php echo $this->lang->line('packages');?></a></li>
                                        <li <?php if(isset($active_class)){ if($active_class=="my_bookings") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/myBookings"><?php echo $this->lang->line('my_bookings');?></a></li>
                                        <li <?php if(isset($active_class)){ if($active_class=="my_quotes") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/myQuotes"><?php echo $this->lang->line('my_quotes');?></a></li>
                                        <li <?php if(isset($active_class)){ if($active_class=="my_invoices") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/myInvoices"><?php echo $this->lang->line('my_invoices');?></a></li>
                                        <li <?php if(isset($active_class)){ if($active_class=="my_support_tickets") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/mySupportTickets"><?php echo $this->lang->line('my_support_tickets');?></a></li>

                                    </ul>
                                <?php } ?>
                            </div>
                            <!--/.nav-collapse -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/system_design/scripts/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/system_design/form_validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/system_design/form_validation/js/additional-methods.min.js" type="text/javascript"></script>
    <div class="announcementsbox">
        <div class="container" style="position:relative;">
            <div class="row">
                <div class="announcement_inner"> 
                    <div class="col-md-12 col-xs-6">
                        <h2>ACTUALITES : </h2> 
                        <marquee class="annn-marque 2">
                            <a href="#">HANDI EXPRESS Le spécialiste du transport de personnes à mobilité réduite, Transport de personnes handicapées et Transport de personne âgées.Tout type de trajet et Toute distance...</a>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('header_modals.php');?>