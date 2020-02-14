<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $this->lang->line('booking_system');?>::<?php echo $title;?></title>
	<link rel='shortcut icon' href='<?php echo base_url(); ?>assets/system_design/images/favicon.ico' type='image/x-icon'/>
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>/assets/system_design/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="<?php echo base_url();?>/assets/system_design/css/bootstrap-responsive.min.css" rel="stylesheet">
      <?php if(isset($site_settings->site_theme) && $site_settings->site_theme == "Red") {  ?>
      <link type="text/css" href="<?php echo base_url();?>/assets/system_design/css/theme-2ntheame.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/css/side-menu-2nd-theme.css" rel="stylesheet">
      <?php } else {?>
      <link type="text/css" href="<?php echo base_url();?>/assets/system_design/css/theme.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/css/side-menu.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/system_design/css/custom-admin-style.css" rel="stylesheet">
      <?php } ?>
      <link type="text/css" href="<?php echo base_url();?>/assets/system_design/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/css/jquery.dataTables.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/css/responsive-calendar.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/css/BeatPicker.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/css/timepicki.css" rel="stylesheet">
      <link href="<?php echo base_url();?>/assets/system_design/form_validation/css/validation-error.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->	<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.js"></script>
      <script src="<?php echo base_url();?>/assets/system_design/form_validation/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>/assets/system_design/form_validation/js/additional-methods.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>/assets/system_design/ckeditor.js" type="text/javascript"></script>
      <script>
         var editor;
         
         // The instanceReady event is fired, when an instance of CKEditor has finished
         // its initialization.
         CKEDITOR.on( 'instanceReady', function( ev ) {
         	editor = ev.editor;
         
         	// Show this "on" button.
         	document.getElementById( 'readOnlyOn' ).style.display = '';
         
         	// Event fired when the readOnly property changes.
         	editor.on( 'readOnly', function() {
         		document.getElementById( 'readOnlyOn' ).style.display = this.readOnly ? 'none' : '';
         		document.getElementById( 'readOnlyOff' ).style.display = this.readOnly ? '' : 'none';
         	});
         });
         
         function toggleReadOnly( isReadOnly ) {
         	// Change the read-only state of the editor.
         	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setReadOnly
         	editor.setReadOnly( isReadOnly );
         }
         
      </script>
    </head>
    <body>
        <div class="header-wrapper">
            <div class="header-bg-top">
                <div class="container-fluid"> <!--top-hedd-->
                    <div class="top-bar">
                        <div class="container">
                            <div class="top-widgets">
                                <!-- widget meteo -->
                                <div id="widget_1cb7ba62bdf2ced9f6bbb6c1a8f42386">
                                <span id="t_1cb7ba62bdf2ced9f6bbb6c1a8f42386"></span>
                                <span id="l_1cb7ba62bdf2ced9f6bbb6c1a8f42386"><a href="http://www.my-meteo.fr/previsions+meteo+france/paris.html"></a></span>
                                <script type="text/javascript">
                                (function() {
                                        var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
                                        my.src = "http://services.my-meteo.fr/widget/js3.php?ville=251&format=petit-horizontal&nb_jours=5&coins&c1=ffffff&c2=ffffff&c3=transparent&c4=transparent&c5=d4f7ff&c6=ffd4d4&police=0&t_icones=2&x=702&y=38&id=1cb7ba62bdf2ced9f6bbb6c1a8f42386";
                                        var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
                                })();
                                </script>
                                </div>
                                <!-- widget meteo -->
                            </div>
                            <div class="audio">
                                <object width="110" height="14" style=" float: right;margin-left: 20px;vertical-align: top;" data="http://flash-mp3-player.net/medias/player_mp3_mini.swf" type="application/x-shockwave-flash" title="Adobe Flash Player">
                                    <param value="http://flash-mp3-player.net/medias/player_mp3_mini.swf" name="movie">
                                    <param value="#5590C1" name="bgcolor">
                                    <?php   // if( $this->lang->lang() == 'fr' ) { ?>
                                                <param value="mp3=http://audio.scdn.arkena.com/11718/fb1071-lofi32.mp3&amp;autoplay=1&amp;bgcolor=0D528A&amp;slidercolor=fb833e" name="FlashVars">
                                    <?php   // }
                                            // else {
                                    ?>          <param value="mp3=http://audio.scdn.arkena.com/11718/fb1071-lofi32.mp3&amp;autoplay=1&amp;bgcolor=0D528A&amp;slidercolor=fb833e" name="FlashVars">                
                                    <?php   // } ?>
                                </object>
                            </div>
                            <nav role="navigation" class="navbar navbar-inverse menu-total"> <!-- navbar-fixed-top top -->
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    <!--<a href="<?php echo site_url(); ?>" class="navbar-brand logo"><?php echo $this->lang->line('CAB_admin'); ?></a> -->
                                    <!--<a href="<?php echo site_url(); ?>">
                                        <div class="navbar-brand logo"><img src="<?php echo base_url(); ?>assets/system_design/images/navetteo-logo.png" style="width:160px;height:110px;background:transparent !important;margin-left:30px;border:none !important;"/></div>
                                    </a>-->
                                </div>
                                <div class="selec" id="uli">
                                    <a href="#" style="text-decoration:none;"><?php echo $this->lang->line('lang'); ?> <b class="caret"></b></a>
                                    <div id="ld">
                                        <ul>
                                            <li> <?php echo anchor($this->lang->switch_uri('en'), 'English'); ?> </li>
                                            <li><?php echo anchor($this->lang->switch_uri('fr'), 'French'); ?> </li>
                                            <li><?php echo anchor($this->lang->switch_uri('pt'), 'Português'); ?> </li>
                                            <li><?php echo anchor($this->lang->switch_uri('de'), 'Deutsch'); ?> </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Top Menu Items -->
                                <ul class="nav navbar-right top-nav">
                                    <?php
                                    $this->db->where('is_new', 0);
                                    $unread_bookings = $this->db->count_all_results('vbs_bookings');
                                    ?> 
                                    <li class="dropdown" style="margin-right:-17px">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-bell"></i> <?php if ($unread_bookings > 0) { ?><b class="caret"></b><?php } ?> </a>
                                        <div class="alert-num">
                                            <?php echo $unread_bookings; ?> 
                                        </div>
                                        <?php if ($unread_bookings > 0) { ?>
                                            <ul class="dropdown-menu message-dropdown">
                                                <?php
                                                $today = date("Y-m-d");
                                                $todaybookings1 = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '" . $today . "' AND b.is_conformed = 'pending' ORDER BY b.pick_date ASC LIMIT 10");
                                                ?>
                                                <?php foreach ($todaybookings1 as $row): ?>
                                                    <li class="message-preview">
                                                        <a href="<?php echo site_url(); ?>/admin/bookingDetails/<?php echo $row->id; ?>">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <h5 class="media-heading"><strong><?php echo $row->registered_name; ?></strong> </h5>
                                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i><?php echo $this->lang->line('pick_up'); ?>:<?php echo $row->pick_date; ?></p>
                                                                    <p><strong><?php echo $this->lang->line('pick_point'); ?>:</strong> <?php echo $row->pick_point; ?></p>
                                                                    <p><strong><?php echo $this->lang->line('drop_point'); ?>:</strong> <?php echo $row->drop_point; ?></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                                <li> <a href="<?php echo site_url(); ?>/settings/bookings/unReadBookings"><?php echo $this->lang->line('view_unread_bookings'); ?></a> </li>

                                                <li class="message-footer"> <a href="<?php echo site_url(); ?>/settings/todayBookings"><?php echo $this->lang->line('view_today_bookings'); ?></a> </li>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-user"></i>  <?php echo $this->session->userdata('username'); ?><b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo site_url(); ?>/admin/profile" class="media-heading"><i class="fa fa-fw fa-user"></i> <?php echo $this->lang->line('profile'); ?></a> </li>
                                            <!-- <li> <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a> </li> -->
                                            <li> <a href="<?php echo site_url(); ?>/auth/change_password/admin"><i class="fa fa-fw fa-gear"></i> <?php echo $this->lang->line('change_password'); ?></a> </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo site_url(); ?>/settings/themeSettings" title="<?php echo $this->lang->line('change_site_theme'); ?>"><?php echo $this->lang->line('change_theme'); ?></a>
                                            </li>
                                            <li class="divider"></li>
                                            <li> <a href="<?php echo site_url(); ?>/auth/logout"><i class="fa fa-fw fa-power-off"></i><?php echo $this->lang->line('log_out'); ?> </a> </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens --> 
                                <!-- /.navbar-collapse -->
                                <!-- Time Widget-->
                                <!--<div style="margin: 10px 10px 0px; display: inline-block; text-align: center; width: 100px;float:right;"><script type="text/javascript" src="http://localtimes.info/clock.php?continent=Europe&country=France&city=Paris&cp1_Hex=FFFFFF&cp2_Hex=FFFFFF&cp3_Hex=000000&fwdt=104&ham=1&hbg=1&hfg=0&sid=0&mon=0&wek=0&wkf=0&sep=0&widget_number=1000"></script></div>-->
                                <div style="margin: 18px 0px 0px 30px; display: inline-block; text-align: right; width: 100px;float:right;">
                                    <!--<a href="http://time.is/France" id="time_is_link" rel="nofollow" style="color:#fff;background:transparent;float:left;width:110px"><span id="France_z71f" style="font-size:14px;color:#fff;background:transparent;font-weight: bolder"></span></a>
                                    <script src="http://widget.time.is/t.js"></script>
                                    <script>time_is_widget.init({France_z71f:{time_format:"hours:minutes"}});</script>-->
                                    <a href="http://time.is" id="time_is_link" rel="nofollow" style="color:#fff;background:transparent;float:left;width:110px"></a>
                                    <span id="Courbevoie_z71f" style="font-size:14px;color:#fff;background:transparent;font-weight: normal;"></span>
                                    <script src="http://widget.time.is/t.js"></script>
                                    <script>time_is_widget.init({Courbevoie_z71f:{}});</script>

                                </div>    
                                <!-- Time Widget ENds-->
                                <div class="top-calendar" ><?php echo date('d-m-Y');?>
                                    <!--<div class="calendar-widget" align="center" style="margin:15px 0px 0px 0px;display:none;"><noscript><div align="center" style="width:140px;border:1px solid #ccc;background:#fff ;color: #fff ;font-weight:bold;"><a style="font-size:12px;text-decoration:none;color:#000 ;" href=""></a></div></noscript><script type="text/javascript" src="http://mycalendar.org/calendar.php?group=Holiday&calendar=France&widget_number=2&cp3_Hex=8F228f&cp2_Hex=FFFFF3&cp1_Hex=090909&fwdt=200&lab=1"></script></div>-->
                                    <div class="calendar-widget" align="center" style="margin:15px 0px 0px 0px;display:none;"><iframe src=http://widgetscode.com/wc/hc-fr?skin=eblue1 style='width:250px;height:300px;margin:0;'frameborder=0></iframe></div>
                                </div>


                            </nav>
                        </div>
                    </div>
                    <div class="header-middle-bar">
                        <div class="container"><!-- padding-p-0-->
                            <div class="row">
                                <div class="col-md-2"> <!--padding-p-l-->
                                    <a href="<?php echo site_url();?>/auth/index/home">
                                        <div id="logo"><img src="<?php echo base_url(); ?>assets/system_design/images/navetteo-logo.png" style="width:160px;height:110px;"/></div>
                                    </a>
                                 </div>
                                <div class="col-md-10 padding-p-r">
                                    <div class="top-section">
                                        <!--<div class="top-links">
                                            <ul>
                                                <li> <a href="<?php echo site_url();?>/welcome/testimonials"><?php echo $this->lang->line('testimonial_page');?></a></li>
                                                <li><a href="<?php echo site_url(); ?>/welcome/faqs"><?php echo $this->lang->line('FAQs');?></a></li>                                                
                                            </ul>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="admin-nav">
                                    <div class="cab-stats">
                                        <div class="first-box">
                                            <a href="<?php echo site_url();?>/settings/bookings/Add" class="btn-box big"><i class="fa fa-plus fa-3x"></i><b><?php echo $bookings_count;?></b>
                                                <p>
                                                    <?php if ($this->lang->lang() == 'fr') {
                                                            $add_book = str_replace(" ","<br/>",$this->lang->line('add_booking'));
                                                            echo $add_book;
                                                          }
                                                          else {
                                                              echo $this->lang->line('add_booking');
                                                          }
                                                    ?>
                                                </p>
                                            </a>
                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url();?>/settings/searchBookings" class="btn-box big">
                                            <i class="fa fa-calendar fa-3x"></i><b>Y/M/D</b><p> <?php echo $this->lang->line('search_bookings');?></p>
                                            </a> 
                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url();?>/admin/customers" class="btn-box big"><i class="fa  fa-group fa-3x"></i><b><?php echo $members_count;?></b>
                                               <p><?php echo $this->lang->line('customers');?></p>     
                                            </a>  

                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url(); ?>/admin/executives" class="btn-box big"><i class="fa  fa-group fa-3x"></i><b><?php echo $executives_count;?></b>
                                                <p><?php echo $this->lang->line('executives');?></p>
                                            </a>  

                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url(); ?>/vehicle_settings/vehicles" class="btn-box big"><i class="fa fa-cab fa-3x"></i><b><?php echo $vehicles_count;?></b>
                                                <p><?php echo $this->lang->line('vehicles');?></p>
                                            </a>      
                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url(); ?>/settings/airports" class="btn-box big"><i class="fa fa-plane fa-3x"></i><b><?php echo $airports_count;?></b>
                                                <p><?php echo $this->lang->line('airports');?></p>
                                            </a> 
                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url();?>/settings/packageSettings" class="btn-box big"><i class="fa fa-th fa-3x"></i><b><?php echo $packages_count;?></b>
                                            <p><?php echo $this->lang->line('packages');?></p>
                                            </a>    
                                         </div>
                                         <div class="first-box">
                                            <a href="<?php echo site_url();?>/settings/siteSettings" class="btn-box big"><i class="fa fa-anchor fa-3x"></i><b>Site</b>
                                            <p><?php echo $this->lang->line('settings');?></p>
                                            </a> 
                                         </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--/.container-fluid --> 
                <div class="main-menu">
                    <div class="container nav-border">
                        <div class="row">
                            <nav role="navigation" class="navbar navbar-navetteo menu-total">
                                <div class="navbar-header">
                                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed nav-bar-btn" type="button"> <span class="sr-only"><?php echo $this->lang->line('toggle_navigation');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                 </div>
                                <div class="collapse navbar-collapse res-menu" id="navbar">
                                    <ul class="nav navbar-nav menu">
                                        <li <?php if(isset($active_class)){ if($active_class=="dashboard") echo 'class="active"'; }?>><a href="<?php echo site_url();?>/admin"><span><?php echo $this->lang->line('dashboard');?></span></a></li>
                                        <li <?php if(isset($active_class) && $active_class=="bookings") { echo 'class="drop-menu menu-drop active"'; } else { echo 'class="drop-menu menu-drop"'; } ?> >
                                           <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->lang->line('bookings');?><span class="caret"></span> </a>
                                            <ul role="menu" class="dropdown-menu drop-menu">
                                              <li><a href="<?php echo site_url();?>/settings/bookings/Add"><?php echo $this->lang->line('add_booking');?></a></li>
                                               <li><a href="<?php echo site_url();?>/settings/todayBookings"><span><?php echo $this->lang->line('today_bookings');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url();?>/settings/searchBookings"><span><?php echo $this->lang->line('search_bookings');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url();?>/settings/bookings"><span><?php echo $this->lang->line('all_bookings');?></span></a>
                                               </li>
                                              <li <?php if(isset($active_class)){ if($active_class=="infotrafic") echo 'class="active"'; }?>><a href="<?php echo site_url();?>/settings/infotrafic"><?php echo $this->lang->line("live_traffic");?></a></li>
                                              <li <?php if(isset($active_class)){ if($active_class=="map") echo 'class="active"'; }?>><a href="<?php echo site_url();?>/settings/map"><?php echo $this->lang->line("map");?></a></li>
                                              <li <?php if(isset($active_class)){ if($active_class=="trackflight") echo 'class="active"'; }?>><a href="<?php echo site_url();?>/settings/trackFlight"><?php echo $this->lang->line("track_flight");?></a></li>

                                           </ul>
                                        </li>
                                        <li <?php if(isset($active_class) && $active_class=="vehicle") { echo 'class="drop-menu menu-drop active"'; } else { echo 'class="drop-menu menu-drop"'; } ?>>
                                           <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->lang->line('vehicle_settings');?><span class="caret"></span> </a>
                                            <ul role="menu" class="dropdown-menu drop-menu">
                                               <li><a href="<?php echo site_url(); ?>/vehicle_settings/vehicles"><span><?php echo $this->lang->line('list_vehicles');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url(); ?>/vehicle_settings/vehicles/Add"><span><?php echo $this->lang->line('add_vehicle');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url();?>/settings/vehicleCategories"><span><?php echo $this->lang->line('vehicle_categories');?></span></a></li>
                                               <li><a href="<?php echo site_url();?>/settings/vehicleFeatures"><span><?php echo $this->lang->line('vehicle_features');?></span></a></li>
                                            </ul>
                                        </li>
                                        <li <?php if(isset($active_class) && $active_class=="airports") { echo 'class="drop-menu menu-drop active"'; } else { echo 'class="drop-menu menu-drop"'; } ?>>
                                           <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->lang->line('airport_settings');?><span class="caret"></span> </a>
                                           <ul role="menu" class="dropdown-menu drop-menu">
                                              <li><a href="<?php echo site_url();?>/settings/airports"><span><?php echo $this->lang->line('list_airports');?></span></a></li>
                                              <li><a href="<?php echo site_url();?>/settings/airports/Add"><span><?php echo $this->lang->line('add_airport');?></span></a></li>
                                           </ul>
                                        </li>
                                        <li <?php if(isset($active_class) && $active_class=="users") { echo 'class="drop-menu menu-drop active"'; } else { echo 'class="drop-menu menu-drop"'; } ?>>
                                           <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->lang->line('users');?><span class="caret"></span> </a>
                                            <ul role="menu" class="dropdown-menu drop-menu">
                                               <li><a href="<?php echo site_url();?>/admin/customers"><span><?php echo $this->lang->line('list_customers');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url();?>/admin/addCustomers"><span><?php echo $this->lang->line('add_customer');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url(); ?>/admin/executives"><span><?php echo $this->lang->line('list_executives');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url(); ?>/admin/addExecutives"><span><?php echo $this->lang->line('add_executive');?></span></a>
                                               </li>
                                            </ul>
                                        </li>
                                        <li <?php if(isset($active_class) && $active_class=="masterSettings") { echo 'class="drop-menu menu-drop active"'; } else { echo 'class="drop-menu menu-drop"'; } ?>>
                                            <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><span><?php echo $this->lang->line('master_settings');?></span><span class="caret"></span></a>      
                                            <ul role="menu" class="dropdown-menu drop-menu">
                                                <li><a href="<?php echo site_url();?>/settings/siteSettings"><span><?php echo $this->lang->line('site_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/testimonials"><span><?php echo $this->lang->line('testimonial_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/emailSettings"><span><?php echo $this->lang->line('email_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/paypalSettings"><span><?php echo $this->lang->line('paypal_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/packageSettings"><span><?php echo $this->lang->line('hourly_package_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/waitings"></span><?php echo $this->lang->line('waiting_time_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/reasonsToBook"></span><?php echo $this->lang->line('reasons_to_book_with_us');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/socialNetworks"></span><?php echo $this->lang->line('social_networks');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/seoSettings"></span><?php echo $this->lang->line('seo_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/themeSettings"></span><?php echo $this->lang->line('theme_settings');?></span></a></li>
                                                <li><a href="<?php echo site_url();?>/settings/appSettings"></span><?php echo $this->lang->line('app_settings');?></span></a></li>
                                              <li <?php if(isset($active_class) && $active_class=="services") echo 'class="active"';?>><a href="<?php echo site_url();?>/settings/services"><?php echo $this->lang->line('services_pages');?></a></li>
                                                <li <?php if(isset($active_class) && $active_class=="page") echo 'class="active"';?>><a href="<?php echo site_url();?>/settings/aboutUs"><?php echo $this->lang->line('dynamic_pages');?></a></li>
                                                <li <?php if(isset($active_class)){ if($active_class=="faq") echo 'class="active"'; }?>><a href="<?php echo site_url();?>/settings/faqs"><?php echo $this->lang->line('faqs');?></a></li>
                                                
                                            </ul>
                                        </li>
                                        <li <?php if(isset($active_class) && $active_class=="report") { echo 'class="drop-menu menu-drop active"'; } else { echo 'class="drop-menu menu-drop"'; } ?>>
                                            <a href="#" aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle"><span><?php echo $this->lang->line('reports');?></span><span class="caret"></span></a>
                                            <ul role="menu" class="dropdown-menu drop-menu">
                                               <li><a href="<?php echo site_url();?>/reports/overallVehicles"><span><?php echo $this->lang->line('overall_vehicles');?></span></a>
                                               </li>
                                               <li><a href="<?php echo site_url();?>/reports/payments"><span><?php echo $this->lang->line('payments');?></span></a>
                                               </li>
                                            </ul>
                                        </li>
                                     </ul>
                                </div>    
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- /navbar -->
            </div>
        </div>
      