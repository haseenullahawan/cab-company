<?php
        $url = site_url();          
        $lang = explode(".fr/",$url);
        if($lang[1] == 'en') {
            $page_lang = 'lang="en"';
        }
        else if ($lang[1] == 'fr') {
            $page_lang = 'lang="fr"';   
        }
?>
<!DOCTYPE html>
<html <?php echo $page_lang;?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>"/>
        <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>" />
        <link rel='shortcut icon' href='<?php echo base_url(); ?>assets/system_design/images/favicon.ico' type='image/x-icon'/>
        <title><?php echo $title; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/system_design/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/system_design/css/callback.css" rel="stylesheet">
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
                    <div class="container-fluid"> <!--top-hedd-->
                        <div class="container"><!-- padding-p-0-->
                            <div class="row">
                                <div class="col-md-2"> <!--padding-p-l-->
                                    <a href="<?php echo site_url();?>/auth/index/home">
                                        <div class="logo"><img src="<?php echo base_url(); ?>assets/system_design/images/navetteo-logo.png" alt="Navetteo Logo" title="Navetteo Logo" style="width:160px;height:110px;"/></div>
                                    </a>
                                 </div>
                                <div class="col-md-10 padding-p-r">
                                    <div class="top-section">
                                        <div class="social-icons left">
                                            <ul>
                                                <?php
                                                        $social_networks = $this->base_model->run_query("SELECT * FROM vbs_social_networks");

                                                        //social_networks

                                                        if ($social_networks[0]->facebook) {
                                                            ?>
                                                            <li> 
                                                                <a href="<?php echo $social_networks[0]->facebook; ?>"   target="_blank">
                                                                    <img src='<?php echo base_url() . "assets/system_design/images/facebook-icon.png" ?>' alt="Navetteo Facebook" title="Navetteo Facebook" />
                                                                </a> <!--<i class="fa fa-facebook"></i>-->
                                                            </li>
                                                <?php }
                                                        if ($social_networks[0]->twitter) {
                                                ?>
                                                            <li> 
                                                                <a href="<?php echo $social_networks[0]->twitter; ?>"   target="_blank">
                                                                    <!--<i class="fa fa-twitter"></i> -->
                                                                    <img src='<?php echo base_url() . "assets/system_design/images/twitter-icon.png" ?>' alt="Navetteo Twitter" title="Navetteo Twitter"/>
                                                                </a> 
                                                            </li>
                                                <?php   }
                                                        if ($social_networks[0]->linkedin) {
                                                ?>
                                                            <li> 
                                                                <a href="<?php echo $social_networks[0]->linkedin; ?>"  target="_blank"> 
                                                                    <!--<i class="fa fa-linkedin"></i>  -->
                                                                    <img src='<?php echo base_url() . "assets/system_design/images/linkedin-icon.png" ?>' alt="Navetteo LinkedIn" title="Navetteo LinkedIn"/>
                                                                </a>
                                                            </li>
                                                <?php }
                                                        if ($social_networks[0]->google_plus) {
                                                ?>
                                                            <li> 
                                                                <a href="<?php echo $social_networks[0]->google_plus; ?>" target="_blank"> 
                                                                    <!--<i class="fa fa-google-plus"></i> -->
                                                                    <img src='<?php echo base_url() . "assets/system_design/images/google-icon.png" ?>' alt="Navetteo GooglePlus" title="Navetteo GooglePlus"/>
                                                                </a> 

                                                            </li>
                                                <?php   } ?>
                                                <!--                
                                                <?php   //  if ($site_settings->app_settings == "Enable") { ?>
                                                            <li> <a href="<?php echo site_url(); ?>/welcome/download_app/android" style="font-size:20px;"> <i class="fa fa-android"></i> </a> </li>
                                                            <li> <a href="<?php echo site_url(); ?>/welcome/download_app/ios" style="font-size:20px;"> <i class="fa fa-apple"></i> </a> </li>
                                                <?php   //  } ?>
                                                -->
                                            </ul>
                                        </div>
                                        <div class="lang-icons"><!--class="selec" id="uli"-->
                                            <ul class="right">
                                                <li> <a href="<?php echo base_url() . $this->lang->switch_uri('en') ?>"><span class="en-icon"></span></a> </li>
                                                <li><a href="<?php echo base_url() . $this->lang->switch_uri('fr') ?>"><span class="fr-icon"></span></a></li>
                                            </ul>
                                            <!--<a href="#"><?php echo $this->lang->line('lang'); ?></a>
                                            <div id="ld">
                                                <ul>
                                                    <li> <?php echo anchor($this->lang->switch_uri('en'), 'English'); ?> </li>
                                                    <li><?php echo anchor($this->lang->switch_uri('fr'), 'French'); ?> </li>
                                                    <li><?php echo anchor($this->lang->switch_uri('pt'), 'Português'); ?> </li>
                                                    <li><?php echo anchor($this->lang->switch_uri('de'), 'Deutsch'); ?> </li>
                                                </ul>
                                            </div>-->
                                        </div>
                                        <?php if (!$this->ion_auth->logged_in()) { ?>
                                                <!--<div class="register right">
                                                    <div class="tot-top">
                                                        <aside class="col">  <a class='top-register' href="<?php echo site_url(); ?>/auth/create_user" ><?php echo $this->lang->line('create_account'); ?> </a> </aside>
                                                    </div>
                                                </div>-->
                                                <div class="login right">
                                                    <div class="tot-top">
                                                        <!--<div class="phone"> <i class="fa fa-lock"></i> </div>-->
                                                        <aside class="col"> <a class='client-login' href="<?php echo site_url(); ?>/auth/clientlogin" ><?php echo $this->lang->line('client_login'); ?> </a> </aside>
                                                    </div>
                                                </div>
                                                <div class="right" style="margin-top:5px;">
                                                    <a class="top-login" href="<?php echo site_url(); ?>/auth/driverlogin"><?php echo $this->lang->line('driver_login');?></a>
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
                                        
                                        <div class="top-pack-book-links <?php if( $this->lang->lang() == 'fr' ) { echo 'leftalign_fr'; } else { echo 'leftalign_en'; } ?>">
                                            <ul>
                                                <li><a class="bookmark" href="javascript:(function(){var a=window,b=document,c=encodeURIComponent,d=a.open('http://www.seocentro.com/cgi-bin/promotion/bookmark/bookmark.pl?u='+c( b.location )+'&amp;t='+c( b.title ),'bookmark_popup','left='+((a.screenX||a.screenLeft)+10)+',top='+((a.screenY||a.screenTop)+10)+',height=480px,width=720px,scrollbars=1,resizable=1,alwaysRaised=1');a.setTimeout(function(){ d.focus()},300)})();"><?php echo $this->lang->line('bookmark_us');?></a></li>
                                            </ul>
                                        </div>
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
                                    </div>
                                    <?php   if ($this->lang->lang() == 'fr') { ?>
                                                <div class="col-md-4 right french-contact-number"><!--padding-p-r-->
                                                    <?php   //$phone = $site_settings->land_line; 
                                                            echo "01 85 09 02 32";
                                                    
                                                    ?>
                                                    <p class="working-hours" style="left:35px;">Du Lundi au Vendredi <br/>de 9h à 12h et de 14h à 18h</p>
                                                </div>
                                    <?php   } else { ?>
                                                <div class="col-md-4 right english-contact-number">
                                                    <?php //    $phone = $site_settings->phone;
                                                            echo "01 85 09 09 34";
                                                    ?>
                                                    <p class="working-hours" style="left:20px;">From Monday to Friday <br/>9h to 12h and from 14h to 18h</p>
                                                </div>
                                    <?php   }   ?>
                                    <div class="col-md-1 right"><img src="<?php echo base_url(); ?>assets/system_design/images/call-us-girl.png" class="call-us-girl" alt="Call Us" title="Call Us" /></div>                                    
                                    <?php if ($this->lang->lang() == 'fr') { ?>
                                            <div class="header-icons-fr">
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/aeroport.png" alt="Aeroport Service" title="Aeroport Service"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/passengers.png" alt="Passengers" title="Passengers"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/circuit-touristiques.png" alt="Circuit Touristiques" title="Circuit Touristiques"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/transfert-gare.png" alt="Transfer Gare" title="Transfer Gare"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/airport-transfers.png" style="width:95px" alt="Airport Transfers" title="Airport Transfers"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/free-quotes-fr.png" alt="Free Quotes" title="Free Quotes"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/24hr-fr.png" alt="24/7 Service" title="24/7 Service"/>
                                                <img src="<?php echo base_url(); ?>assets/system_design/images/header/disabled.png" alt="Accessible" title="Accessible"/>
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
                        </div>
                    </div> <!--/.container-fluid --> 
                    <div class="main-menu">
                        <div class="container nav-border">
                            <div class="row">
                                <nav class="navbar navbar-navetteo menu-total">
                                    <div class="navbar-header">
                                       <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed nav-bar-btn" type="button"> <span class="sr-only"><?php echo $this->lang->line('toggle_navigation');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    </div>
                                    <div class="collapse navbar-collapse res-menu" id="navbar">
                                        <?php if(!$this->ion_auth->logged_in()) {?>
                                        <ul class="nav navbar-nav menu">
                                            <li <?php if(isset($active_class)){ if($active_class=="home") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/auth/index/home"> <i class="fa fa-home"></i> <?php echo $this->lang->line('home_page');?></a></li>
                                            <li class="obook <?php if(isset($active_class)){ if($active_class=="onlinebooking") echo 'active'; }?>" ><div class="menu-new-icon">New</div><a href="<?php echo site_url(); ?>/welcome/onlineReservation"><?php echo $this->lang->line('book_online');?></a></li>
                                            <!--<li class="packages <?php if(isset($active_class)){ if($active_class=="packages") echo 'active'; }?>"><a href="<?php echo site_url(); ?>/packages"><?php echo $this->lang->line('packages');?></a></li>-->
                                            <li class="parks drop-menu menu-drop<?php if(isset($active_class)) { if($active_class=="aeroport") echo 'class="active"'; }?>">
                                             <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle aeroport-a"><?php echo $this->lang->line('transfer_airport'); ?><span class="caret"></span> </a>
                                                <ul role="menu" class="dropdown-menu drop-menu">
                                                    <li><a href="<?php echo site_url();?>/services/3"><?php echo $this->lang->line('transfer_dorly'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/4"><?php echo $this->lang->line('transfer_cdg'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/5"><?php echo $this->lang->line('transfer_beauvais'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/28"><?php echo $this->lang->line('transfer_lebourget'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/26"><?php echo $this->lang->line('transfer_parisvatry'); ?></a></li>
                                                </ul>
                                            </li>
                                            <!--<li class="drop-menu menu-drop<?php if(isset($active_class)) { if($active_class=="transport_gare") echo 'class="active"'; }?>">
                                             <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle">TRANSFERT GARE<span class="caret"></span> </a>
                                                <ul role="menu" class="dropdown-menu drop-menu">
                                                </ul>
                                            </li>-->
                                            <li class="parks drop-menu menu-drop<?php if(isset($active_class)) { if($active_class=="visitor_guides") echo 'class="active"'; }?>">
                                             <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle circuits-a"><?php echo $this->lang->line('transfer_railways'); ?><span class="caret"></span> </a>
                                                <ul role="menu" class="dropdown-menu drop-menu">
                                                    <li><a href="<?php echo site_url();?>/services/6"><?php echo $this->lang->line('transfer_dunord'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/7"><?php echo $this->lang->line('transfer_montparnasse'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/8"><?php echo $this->lang->line('transfer_saintlazard'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/9"><?php echo $this->lang->line('transfer_delyon'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/21"><?php echo $this->lang->line('transfer_delest'); ?></a></li>
                                                    
                                                    <!--<li><a href="<?php echo site_url();?>/services/10">Paris Tour</a></li>
                                                    <li><a href="<?php echo site_url();?>/services/11">Châteaux de Versailles</a></li>
                                                    <li><a href="<?php echo site_url();?>/services/12">Fontainebleau</a></li>
                                                    <li><a href="<?php echo site_url();?>/services/22">Chantilly</a></li>
                                                    <li><a href="<?php echo site_url();?>/services/13">Honfleur & Deauville</a></li>
                                                    <li><a href="<?php echo site_url();?>/services/14">Plages des débarquements</a></li>
                                                    <li><a href="<?php echo site_url();?>/services/15">Saint Malo & Mont Saint Michel</a></li>-->
                                                </ul>
                                            </li>
                                            
                                            <li class="parks drop-menu menu-drop<?php if(isset($active_class)) { if($active_class=="transport_parcs") echo 'class="active"'; }?>">
                                             <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle parks-a"><?php echo $this->lang->line('transfer_parkgarden'); ?> <span class="caret"></span> </a>
                                                <ul role="menu" class="dropdown-menu drop-menu">
                                                    <li><a href="<?php echo site_url();?>/services/23"><?php echo $this->lang->line('transfer_disneyland'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/25"><?php echo $this->lang->line('transfer_asterix'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/10"><?php echo $this->lang->line('transfer_paristour'); ?></a></li>
                                                    <li><a href="<?php echo site_url();?>/services/11"><?php echo $this->lang->line('transfer_versailles'); ?></a></li>
                                                </ul>
                                            </li>
                                          <!--<li <?php if(isset($active_class)){ if($active_class=="packages") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/packages"><?php echo $this->lang->line('packages');?></a></li>-->
                                          <!--          
                                          Dynamic pages display in menu 
                                          <?php                         
                                             // $this->db->select('id,name');
                                             // $categories = $this->db->get_where('vbs_aboutus',array('parent_id' => 0,'status'=>'Active'))->result();

                                             // if(count($categories) > 0)
                                             // foreach($categories as $row):
                                             ?>
                                          <li class="drop-menu menu-drop<?php if(isset($active_class) && $active_class==$row->name) echo " active";?>">
                                             <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><?php echo $row->name;?><span class="caret"></span> </a>
                                             <ul role="menu" class="dropdown-menu drop-menu">
                                                <?php
                                                        //  $this->db->select('id,name,parent_id');
                                                        //  $this->db->order_by('sort_order','asc');
                                                        //  $sub_categories = $this->db->get_where('vbs_aboutus',array('parent_id' => $row->id,'status' => 'Active'))->result();

                                                        //   if(count($sub_categories) > 0)
                                                        //   foreach($sub_categories as $sub_row):
                                                   ?>
                                                <li><a href="<?php echo site_url(); ?>/page/index/<?php echo $sub_row->id;?>/<?php echo $row->name;?>"><?php echo $sub_row->name;?></a></li>
                                                <?php //    endforeach; ?>
                                             </ul>
                                          </li>
                                          <?php // endforeach;?>
                                          -->
                                            <li <?php if(isset($active_class)){ if($active_class=="prices") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/welcome/prices"><?php echo $this->lang->line('ourprice_page');?></a></li>
                                            <li <?php if(isset($active_class)){ if($active_class=="zones") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/welcome/zones"><?php echo $this->lang->line('zones_page');?></a></li>
                                            <li <?php if(isset($active_class)){ if($active_class=="testimonials") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/welcome/testimonials"><?php echo $this->lang->line('testimonial_page');?></a></li>
                                            <li <?php if(isset($active_class)){ if($active_class=="faqs") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/welcome/faqs"><?php echo $this->lang->line('FAQs');?></a></li>
                                            <li <?php if(isset($active_class)){ if($active_class=="fleet") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/welcome/fleet"><?php echo $this->lang->line('page_fleet');?></a></li>                                                
                                            <li class="liContactUs <?php if(isset($active_class)){ if($active_class=="contactus") echo 'active'; }?>" ><a href="<?php echo site_url(); ?>/welcome/contactUs"><?php echo $this->lang->line('contact_page');?></a></li>
                                        </ul>
                                        <?php }
                                                else if($this->ion_auth->logged_in()) {
                                        ?>
                                                <ul class="nav navbar-nav menu">
                                                    <li <?php if(isset($active_class)){ if($active_class=="home") echo 'class="active"'; }?> ><a href="<?php echo site_url(); ?>/auth/index/home"> <i class="fa fa-home"></i> <?php echo $this->lang->line('home_page');?></a></li>
                                                    <li class="obook <?php if(isset($active_class)){ if($active_class=="onlinebooking") echo 'active'; }?>" ><a href="<?php echo site_url(); ?>/welcome/onlineBooking"><?php echo $this->lang->line('book_online');?></a></li>
                                                    <li class="packages <?php if(isset($active_class)){ if($active_class=="packages") echo 'active'; }?>"><a href="<?php echo site_url(); ?>/packages"><?php echo $this->lang->line('packages');?></a></li>
                                                    <li <?php if(isset($active_class)){ if($active_class=="my_bookings") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/myBookings"><?php echo $this->lang->line('my_bookings');?></a></li>
                                                    <li <?php if(isset($active_class)){ if($active_class=="my_quotes") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/myQuotes"><?php echo $this->lang->line('my_quotes');?></a></li>
                                                    <li <?php if(isset($active_class)){ if($active_class=="my_invoices") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/myInvoices"><?php echo $this->lang->line('my_invoices');?></a></li>
                                                    <li <?php if(isset($active_class)){ if($active_class=="my_support_tickets") echo 'active'; }?>><a href="<?php echo site_url(); ?>/users/mySupportTickets"><?php echo $this->lang->line('my_support_tickets');?></a></li>
                                                    <li class="liContactUs <?php if(isset($active_class)){ if($active_class=="contactus") echo 'active'; }?>" ><a href="<?php echo site_url(); ?>/welcome/contactUs"><?php echo $this->lang->line('contact_page');?></a></li>
                                                    <!--<li class="dropdown menu-drop">
                                                       <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this->lang->line('my_account');?><span class="caret"></span></a>
                                                       <ul role="menu" class="dropdown-menu drop-menu">
                                                          <li><a href="<?php //echo site_url(); ?>/users/profile"><?php echo $this->lang->line('my_profile');?></a></li>
                                                          <li><a href="<?php //echo site_url(); ?>/users/changePassword"><?php echo $this->lang->line('change_password');?></a></li>
                                                          <li><a href="<?php //echo site_url(); ?>/users/myBookings"><?php echo $this->lang->line('my_bookings');?></a></li>
                                                          <li><a href="<?php //echo site_url(); ?>/auth/logout"><?php echo $this->lang->line('logout');?></a></li>
                                                       </ul>
                                                    </li>->
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
            
<div class="floating-form-2 visiable" id="contact_form_2" style="top: 14px;">
    <div class="contact-opener-2">APPEL IMMEDIAT GRATUIT</div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <a href="javascript:;" class="close-btn-2"><i class="fa fa-times-circle-o"></i></a>
            <?php echo form_open_multipart('auth/callMe', ['id' => 'the-contact-form-2', 'class' => 'form']); ?>
            <h4 style="text-align: center; margin: 0 0 12px">APPEL IMMEDIAT GRATUIT</h4>

            <div class="row">
                <div class="col-xs-12">
                    <div class=" form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input id="num2" maxlength="50" type="text" class="form-control" required name="num" placeholder="Tapez votre numéro ici">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" style="text-align: center">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <button class="btn-successs" type="submit">Appelez moi</button>
                </div>
            </div>
        <?=form_close();?>
    </div>
</div>

<!-- / End Call Back Form -->


<!-- Contact Slide Form -->
<div class="floating-form visiable" id="contact_form">
    <div class="contact-opener">DEMANDE DE DEVIS EXPRESS</div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <a href="javascript:;" class="close-btn"><i class="fa fa-times-circle-o"></i></a>
            <?php echo form_open_multipart('auth/submitContactForm', ['id' => 'the-contact-form', 'class' => 'form']); ?>
            <div class="row">
                <div class="col-xs-4 form-group" style="padding:0 10px">
                    <select class="form-control" name="civility" required>
                        <option value="Mr">Mr</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                    </select>
                </div>
                <div class=" form-group col-xs-4">
                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom">
                </div>

                <div class="form-group col-xs-4">
                    <input type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class=" form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input id="tel" maxlength="50" type="text" class="form-control" required name="tel" placeholder="Telephone">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class=" form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class=" form-group">
                        <textarea rows="3" maxlength="3000" class="form-control" name="message" required placeholder="Votre message"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" style="text-align: center">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <button class="btn-successs" type="submit">ENVOYER</button>
                </div>
            </div>
            <?=form_close();?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var _scroll = true, _timer = false, _floatbox = $("#contact_form"), _floatbox_opener = $(".contact-opener, .close-btn") ;
        _floatbox.css({right: "0px"});
        _floatbox_opener.click(function(){
            if (_floatbox.hasClass('visiable')){
                _floatbox.animate({"right":"-300px"}, {duration: 300}).removeClass('visiable');
            }else{
                _floatbox.animate({"right":"0px"},  {duration: 300}).addClass('visiable');
            }
        });


        $(window).scroll(function(){
            if(_scroll){
                _floatbox.animate({"top": "304px"},{duration: 300});
                _scroll = false;
            }
            if(_timer !== false){ clearTimeout(_timer); }
            _timer = setTimeout(function(){_scroll = true;
                _floatbox.animate({"top": "304px"},{easing: "linear"}, {duration: 500});}, 400);
        });

        $('#the-contact-form').submit(function (e) {
            e.preventDefault();
            var that = $(this);
            that.find(".alert, .error").remove();
            $.ajax({
                type: that.attr("method"),
                url:  that.attr("action"),
                data: that.serialize(),
                dataType: "json",
                success: function(res){
                    if(res.status != false){
                        that.prepend("<div class='alert alert-success'>" + res.msg + "</div>");
                        that.trigger('reset')
                    } else
                        that.prepend("<div class='alert alert-danger'>" + res.msg + "</div>");

                },
                error: function(){

                }
            });
            return false;
        });

        var _scroll2 = true, _timer2 = false, _floatbox2 = $("#contact_form_2"), _floatbox_opener2 = $(".contact-opener-2, .close-btn-2") ;
        _floatbox2.css({right: "0px"});
        _floatbox_opener2.click(function(){
            if (_floatbox2.hasClass('visiable')){
                _floatbox2.animate({"right":"-300px"}, {duration: 300}).removeClass('visiable');
            }else{
                _floatbox2.animate({"right":"0px"},  {duration: 300}).addClass('visiable');
            }
        });

        $(window).scroll(function(){
            if(_scroll2){
                _floatbox2.animate({"top": "50px"},{duration: 300});
                _scroll2 = false;
            }
            if(_timer2 !== false){ clearTimeout(_timer2); }
            _timer2 = setTimeout(function(){_scroll2 = true;
                _floatbox2.animate({"top": "50px"},{easing: "linear"}, {duration: 500});}, 400);
        });

        $('#the-contact-form-2').submit(function (e) {
            e.preventDefault();
            var that = $(this);
            that.find(".alert, .error").remove();
            that.prepend("<div class='alert alert-success'>Veuillez decrocher votre telephone... </div>");
            $.ajax({
                type: that.attr("method"),
                url:  that.attr("action"),
                data: that.serialize(),
                async: false,
                dataType: "json",
                success: function(res){
                    that.find(".alert, .error").remove();
                    if(res.status != false){
                        that.prepend("<div class='alert alert-success'>" + res.msg + "</div>");
                        that.trigger('reset')
                    } else
                        that.prepend("<div class='alert alert-danger'>" + res.msg + "</div>");
                },
                error: function(){
                    that.find(".alert, .error").remove();
                    that.prepend("<div class='alert alert-danger'>Quelque chose ne va pas</div>")
                }
            });
            return false;
        });
    });
</script>