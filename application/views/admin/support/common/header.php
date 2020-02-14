

<!--

    <?php
    error_reporting(0);

    ?>

    

-->

<?php



$page_lang = 'lang="fr"';



?>



<!DOCTYPE html>



<html <?php echo $page_lang; ?>>



<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>"/>

    <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>"/>

    <link rel='shortcut icon' href='<?php echo base_url(); ?>assets/system_design/images/favicon.ico' type='image/x-icon'/>

    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->

    <link href="<?php echo base_url(); ?>assets/system_design/css/buttons.dataTables.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/system_design/css/wimpy.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/system_design/css/styles.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/system_design/css/callback.css" rel="stylesheet">

    <?php if (isset($site_settings->site_theme) && $site_settings->site_theme == "Red") { ?>

        <link href="<?php echo base_url(); ?>assets/system_design/css/cab-2ntheame.css" rel="stylesheet">

    <?php } else { ?>

        <link href="<?php echo base_url(); ?>assets/system_design/css/cab.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/system_design/css/custom-style.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/system_design/css/admin-style.css" rel="stylesheet">

    <?php } ?>

    <link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css"  rel="stylesheet">

    <script src="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.13.0/jquery.timepicker.min.css" />

<!--<script src="<?php echo base_url();?>assets/system_design/scripts/chosen.jquery.min.js"></script>-->








    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->



    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->



    <!--[if lt IE 9]>



    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>



    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



    <![endif]-->



    <script src="<?php echo base_url(); ?>assets/system_design/scripts/jquery.js"></script>



    <script src="<?php echo base_url(); ?>/assets/system_design/form_validation/js/jquery.validate.min.js"



            type="text/javascript"></script>



    <script src="<?php echo base_url(); ?>/assets/system_design/form_validation/js/additional-methods.min.js"



            type="text/javascript"></script>



    <script src="<?php echo base_url(); ?>/assets/system_design/ckeditor.js" type="text/javascript"></script>



    <script src="<?php echo base_url(); ?>/assets/system_design/scripts/html2canvas.js" type="text/javascript"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/timepicker@1.13.0/jquery.timepicker.min.js"></script>



    <style>



    .lang-icons {



    float: right;



    top: 0px;



    



    position: relative;



}



body {background:#f1f1f1 !important; margin-right: 0px; margin-left: 0px;}



header{background:#f1f1f1 !important;}



.body-bg {background:#f1f1f1 !important;}



.lang-right{



    padding: 1px 5px 1px 5px;



}



.tot-top{



    



    padding:0px;



}



        .unread {



            background-color: #eee !important;



        }







        input[type="text"] {



            height: 36px;



        }







        .form-group {



            padding-bottom: 0px !important;



        }







        .col-xs-1 {



            padding-right: 0px !important;



        }







        .form-control {



            float: none;



        }







        div.dt-buttons {



            float: right;



        }







        .navbar-nav.menu li a {



            color: #616161 !important;



            font-size: 12px;



            padding-left: 10px;



            display: block !important;



            width: 100% !important;



            height: 100% !important;



            text-transform: uppercase;



            font-weight: bold;



            transition: 0.2s;



            outline: none;



        }







        /*.navbar-nav.menu li a {*/



        /*    padding: 19px 10px 15px 10px;*/



        /*}*/







        table.dataTable thead th {



            border-right: 1px solid #ccc;



            white-space: nowrap;



        }



        /*



        .top-section {



            background: transparent linear-gradient(#FBFBFB, #ECECEC, #CECECE) repeat scroll 0% 0%;



            margin: 0px;



            height: 42px;



            width: 100%;



            color: #000;



            // background: #494951; 



            padding: 3px 0 2px;



        }







        .top-section a.top-login {



            display: none;



        }



        */







        .social-icons ul li {



            display: none !important;



        }







        .top-pack-book-links ul li a.bookmark {



            display: none !important;



        }



        /*



        .main-menu {



            background-image: linear-gradient(to bottom, #e8e0e0 0%, #ececec 39%, #fbf4f4 39%, #8a8989 100%);



            width: 98%;



            border-bottom: 1px solid rgba(1, 2, 2, 0.2);



            height: 70px;



            margin-left: 13px;



            margin-top: -20px;







        }



        */







        .audio {



            display: none;



        }







        .french-contact-number {



            display: none;



        }







        .call-us-girl {



            display: none;



        }







        .header-icons-fr {



            display: none;



        }







        #navbar > ul {



            padding-left: 0px;



            margin-top: -21px !important;



        }



        



         #navbar > ul li:first-child a {



            border-radius:4px;



        }







        .phone {



            background: rgba(0, 0, 0, 0.4);



            width: 25px;



            height: 25px;



            border-radius: 100%;



            border: 1px solid #fff;



            text-align: center;



            line-height: 23px;



            float: left;



            color: white;



        }







        .header-btn {



            border: none;



            padding-bottom: -40px;



            width: 140px;



            background: transparent;



            padding-left: 20px;



            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);



        }



        /*



         .service-box {



            background: linear-gradient(to bottom, #e0dfdf 20%, #eaeaea 49%, #eaeaea 8%, #a3a3a391 100%) !important;



            border-top: none;



            border-right: 1px solid #ddd !important;



            border-radius: 0% !important;



            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;



            margin-left: 10px;



            width: 144px !important;



            height: 100px !important;



            padding: 8px !important;



            text-decoration: none !important;



            float: left !important;



            position: relative;



            top: 0px;



        }



        */



        #service-i {



            font-size: 35px;



            float: right;



            color: #3f51b575;



        }







        .service-b {



            color: #ff9800a8;



            font-size: 40px;



            margin-left: 20px;



        }











        .service-hr {



            margin-top: -5px;



            border-top-color: #FF9800;



        }



        /*



        .top-calendar {



            width: 230px;



            background: linear-gradient(to bottom, #e0dfdf57 20%, #eaeaea 49%, #eaeaea 8%, #a3a3a357 100%) !important;



            background: transparent;



            color: #000;



            cursor: pointer;



            float: left;



            height: 35px;



            margin-left: 5px;



            border: 1px solid #9e9e9e59;



            text-align: center;



            font-weight: normal;



            font-size: 14px;



            position: relative;



            left: 0px;



            font-weight: bold;



        }



        */



        #navbar {



            padding: 0;



        }







        .secondary-header .padding-p-r {



            margin-top: 15px;



        }







        .open > .dropdown-menu {



            display: grid;



        }







        .logo {



            margin-left: -60px !important;



            background: transparent !important;



            left: 0px !important;



            top: 10px !important;



            position: relative !important;



            width: auto !important;



            height: 50px !important;



            height: 70px !important;



        }



        .lang-right{



            margin-left: 0px;



            float: left;



            width: 110px;



            border: 1px solid #bfbfbf;



            box-shadow: inset 0 1px 0 rgba(255,255,255,0.15), 0 1px 1px rgba(0,0,0,0.075); /* inset 0 1px 0 rgba(255, 255, 255, 0.6), inset 0 2px 5px rgba(255, 255, 255, 0.5), inset 0 -2px 5px rgba(0, 0, 0, 0.1); */



            background: linear-gradient(to bottom, #fff 0, #e0e0e0 100%); /* transparent linear-gradient(#ffffff, #e6e6e6, #CECECE) repeat scroll 0% 0%; */



            border-color: #bfbfbf;background-color: #e6e6e6;



            background-color: #e6e6e6;



            border-color: #bfbfbf;



            padding: 5px 10px 5px 10px;



            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);



            height: 40px;



            line-height: 24px; 



        }







        /*.dropdown-menu {*/



        /*    position: absolute;*/



        /*    margin: 2px -50px 0px;*/



        /*    z-index: 1000;*/



        /*    top: 40px;*/



        /*    min-width: 160px;*/



        /*    padding: 5px 0;*/



        /*    font-size: 14px;*/



        /*    text-align: left;*/



        /*    list-style: none;*/



        /*    background-color: #fff;*/



        /*    -webkit-background-clip: padding-box;*/



        /*    background-clip: padding-box;*/



        /*    border: 1px solid #ccc;*/



        /*    border: 1px solid rgba(0,0,0,.15);*/



        /*    border-radius: 4px;*/



        /*    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);*/



        /*    box-shadow: 0 6px 12px rgba(0,0,0,.175);*/



        /*}*/



        /*#user-nav .dropdown-menu li a {*/



        /*    background: #eeeeee;*/



        /*    padding: 7px 20px !important;*/



        /*    border-bottom: solid 1px #cacaca !important;*/



        /*    text-decoration: none;*/



        /*}*/







    </style>



    <style>



        .close span {



            text-indent: 0;



            display: inline;



        }







        .btn-circle {



            border-radius: 50%;



            margin-right: 5px;



        }







        .btn-circle.btn-sm {



            padding: 2px 6px;



            margin-top: 5px;



            outline: none;



        }







        #noteDIv .row {



            margin-bottom: 10px;



        }







        #attachDiv input[type='file'] {



            margin-top: 5px;



            outline: none;



        }







        .dataTables_wrapper .dataTables_filter input {



            margin-right: 2px;



            margin-left: 0 !important;



            max-width: 86px !important;



            width: 100% !important;



            float: right;



        }







        .toolbar {



            float: right;



            margin-right: 4px;



        }







        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {



            background: #fefefe;



        }







        .table-filter {



        }







        .table-filter input, .table-filter select {



            max-width: 6.6%;



            float: left;



            width: 100%;



            height: 32px !important;



            padding: 2px !important;



            margin-right: 2px !important;



            font-size: 12px;



        }







        .table-filter select {



            max-width: 80px;



        }







        .table-filter .dpo {



            max-width: 98px;



        }







        .attach-label {



            padding-top: 10px;



            width: 18%;



            float: left;



            text-align: center;



        }







        .attach-div {



            padding-top: 5px;



            display: inline-block;



            width: 82%;



            float: right;



            text-align: right;



        }







        .attach-file {



            overflow: hidden;



            width: 75%;



            float: left



        }







        .attach-buttons {



            width: 25%;



            float: right



        }







        .normal-addon {



            border: 0;



            background: #f5f5f5 !important;



        }



        



        .navbar-badge {



            position: absolute !important;



            right: 4px !important;



            top: -2px !important;



            background: #ff0000 !important;



        }



        



        .btn-group>.btn {



            height:40px !important;



            line-height:30px !important;



        }



        .modal.left .modal-dialog,

    .modal.right .modal-dialog {

        position: fixed;

        margin: auto;

        width: 320px;

        height: 100%;

        -webkit-transform: translate3d(0%, 0, 0);

        -ms-transform: translate3d(0%, 0, 0);

        -o-transform: translate3d(0%, 0, 0);

        transform: translate3d(0%, 0, 0);

        color: #000;

    }



    .modal.left .modal-content,

    .modal.right .modal-content {

        height: 100%;

        overflow-y: auto;

    }

    

    .modal.left .modal-body,

    .modal.right .modal-body {

        padding: 15px 15px 80px;

    }



/*Left*/

    .modal.left.fade .modal-dialog{

        z-index: 9999;

        left: -320px;

        -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;

           -moz-transition: opacity 0.3s linear, left 0.3s ease-out;

             -o-transition: opacity 0.3s linear, left 0.3s ease-out;

                transition: opacity 0.3s linear, left 0.3s ease-out;

    }

    

    .modal.left.fade.in .modal-dialog{

        left: 0;

    }

        

/*Right*/

    .modal.right.fade .modal-dialog {

        right: -320px;

        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;

           -moz-transition: opacity 0.3s linear, right 0.3s ease-out;

             -o-transition: opacity 0.3s linear, right 0.3s ease-out;

                transition: opacity 0.3s linear, right 0.3s ease-out;

    }

    

    .modal.right.fade.in .modal-dialog {

        right: 0;

    }



/* ----- MODAL STYLE ----- */

    .modal-content {

        border-radius: 0;

        border: none;

    }



    .modal-header {

        border-bottom-color: #EEEEEE;

        background-color: #FAFAFA;

    }



/* ----- v CAN BE DELETED v ----- */





.demo {

    padding-top: 60px;

    padding-bottom: 110px;

}



.btn-demo {

    margin: 15px;

    padding: 10px 15px;

    border-radius: 0;

    font-size: 16px;

    background-color: #FFFFFF;

}



.modal-backdrop {

    position: fixed;

    top: 0;

    right: 0;

    bottom: 0;

    left: 0;

    z-index: 1040;

    background-color: transparent !important;

    opacity: inherit !important;

}



    </style>

<?php

    $this->load->model('support_model');
    $data = [];
    $data['support'] = $this->support_model->getAll(array('user_id'=>$this->session->userdata('UserId')));

    $drivers_request_count   = $this->support_model->headerCount();

    foreach ($data as $key => $d) {
        if ($d != false) {
            foreach ($d as $i) {
                if (!empty($i->status))
                    $this->data[$key][strtolower($i->status)] = isset($this->data[$key][strtolower($i->status)]) ? $this->data[$key][strtolower($i->status)] + 1 : 1;
            }
        }
    }

    ?>
    

    <style>

        #user-nav .btn-group, .btn-group-vertical {

            float: left;

        }

    </style>

</head>



<body>

    

    <?php //echo $googleApiUrl; ?>

    

<header style="">



    <!--<h2>Here it is: <?php echo @$response; ?></h2>-->



    <div class="header-wrapper" style="

                padding: 0;

               

            ">



        <div class="container-fluid navbar-fixed-top" style="padding-left:0;padding-right:0;">



            <div class="top-section">



                <div class="row-fluid">



                    <div class="col-md-12" style="padding: 0px;">

                        <style> #user-nav .btn-group>.btn { font-weight: bold; } </style>

                        <div id="user-nav">

                            <div class="btn-group" role="group" aria-label="">


                                <div class="btn-group" role="group" style="display: none;">



                                    <div class="weather-forecast" style="margin-top: -10px;">



                                        <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"



                                             style="



                                             height: 60px; width: 60px;float: left;"/>



                                        <span class="weather-icon"



                                              style="margin-left: -10px;margin-top:20px;float: left;"> <?php echo $data->main->temp_max; ?>°C</span>



                                        <span class="min-temperature"



                                              style="margin-right: 5px;margin-top:20px;float: left;"><?php echo $data->main->temp_min; ?>°C</span>







                                    </div>







                                </div>

                                

                                <div class="btn-group" role="group" style="display: none;">

                                    <div class="time" style="margin-top: -6px;">

                                        <div>Humidity: <?php echo $data->main->humidity; ?> %

                                            <p>Wind: <?php echo $data->wind->speed; ?> km/h</p>

                                        </div>

                                    </div>

                                </div>
                                <div class="btn-group" role="group">

                                    <a href="#" class="btn btn-default btn-mar" style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;">

                                    <i id="topbar_time"><?php echo date('l d F Y H:i:s'); ?>...</i>

                                    </a>

                                    <script>

                                        var phptimezone = "<?php echo date_default_timezone_get(); ?>";

                                            // new Date().toLocaleString("en-US", {timeZone: "Europe/Paris"})

                                        $(document).ready(function() {

                                            var daysNames = [

                                                "Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

                                            var monthsNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",

                                              "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                                            var monthsNames2 = ["January", "February", "March", "April", "May", "June",

                                              "July", "August", "September", "October", "November", "December"];

                                            setInterval(function() {

                                                var d = new Date().toLocaleString("en-US", {timeZone: phptimezone});

                                                d = new Date(d);

                                                var date = `${daysNames[d.getDay()]} ${d.getDate()} ${monthsNames[d.getMonth()]} ${d.getFullYear()}`;

                                                var time = `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;

                                                $('#topbar_time').text(date + " " + time);

                                            }, 1000);

                                        });

                                    </script>

                                </div>
                                 

                                <?php



                                $CMS_arr =& get_instance();



                                    $CMS_arr->load->model('my_model');



                                    $cms_value = $CMS_arr->my_model->get_table_row_query("SELECT * FROM vbs_cms where status='1'");



                                ?>
                                 <div class="btn-group" role="group">
                                    <?php include_once('weather.php'); ?>
                                </div>
                                

                                <div class="btn-group" role="group">



                                    <a href="<?php echo site_url('support/my_tickets'); ?>"



                                       class="btn btn-default btn-mar"



                                       style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;">



                                        <i class="fa fa-support"></i> <span class="badge badge-danger navbar-badge"><?= isset($this->data['support']) ? $this->data['support']['new'] : 0 ?></span><?php echo $this->lang->line('support');?></a>



                                </div>


                                <?php


                                $CI =& get_instance();


                                    @$CI->load->model('my_model');



                                    $language = @$CI->my_model->get_table_row_query("SELECT * FROM vbs_languages");
 

                                ?>
                                
                                <div class="lang-icons" style="float: left;">



                                    <div class="lang-right">



                                        <div class="tot-top" style="float: left;">



                                           <span class="en-icon" style="float: left;margin-top: -2px;background-size: contain;background-image: url('<?= base_url('assets/system_design/images/'.$this->config->item('language').'.png'); ?>');"></span>



                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"



                                               aria-expanded="false"



                                               style="color: #111;"> <?= ucwords($this->config->item('language')); ?><b



                                                        class="caret"></b></a>



                                            <ul class="dropdown-menu">                



                                                <?



                                                foreach ($language as $key => $value) {

                                                ?>
                                                    <a href="<?php echo base_url() . $this->lang->switch_uri($value['short_code']) ?>"><span class="fr-icon" style="background-image: url('<?= base_url('assets/system_design/images/'.$value['flag']); ?>');background-size: contain;"></span></span><p style="margin-left: 40px; margin-top: -25px;font-weight: bolder;    color: black;">
                                                        <?= ucwords($value['title']); ?></p></a></li>
                                                <? } ?>

                                            </ul>

                                        </div>

                                    </div>

                                </div>


                            <div class="header-box" style="">
                                <a href="<?php echo site_url('support/my_profile') ?>">
                                    <div class="right">
                                        <div class="tot-top">
                                            <div class="phone">
												<i class="fa fa-circle" style="font-size: 10px;position: relative;color: green;left: -18px;"></i>
												<i class="fa fa-user" style="position: relative;right: 0px;top: -23px;"></i>
                                            </div>
                                            <a href="<?php echo site_url('support/my_profile') ?>" style="color: #111;">
												<?= $this->session->userdata('first_name'); ?>
											</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- top-section -->
        </div>

        <div class="audio right">



            <object class="audioObj" width="140" height="14"



                    style=" float: right;margin-left: 20px;vertical-align: top;"



                    data="http://flash-mp3-player.net/medias/player_mp3_mini.swf"



                    type="application/x-shockwave-flash" title="Adobe Flash Player">



                <param value="http://flash-mp3-player.net/medias/player_mp3_mini.swf" name="movie">



                <param value="#5590C1" name="bgcolor">



                <?php if ($this->lang->lang() == 'fr') { ?>



                    <param value="mp3=<?php echo base_url(); ?>assets/system_design/audio/navetteo_french.mp3&amp;bgcolor=0D528A&amp;slidercolor=fb833e&amp;autoplay=1&amp;autoload=0"



                           name="FlashVars">



                <?php } else {



                    ?>



                    <param value="mp3=<?php echo base_url(); ?>assets/system_design/audio/navetteo_english.mp3&amp;bgcolor=0D528A&amp;slidercolor=fb833e&amp;autoplay=1&amp;autoload=0"



                           name="FlashVars">



                <?php } ?>



            </object>



        </div>



        <?php if (@$site_settings->app_settings == "Enable") { ?>



            <div class="top-links">



                <a href="<?php echo site_url(); ?>/welcome/download_app/android"><img



                            src="<?php echo base_url(); ?>assets/system_design/images/header/google-play-icon.png"



                            style="width:48%" alt="Navetteo Google Apps" title="Navetteo Google Apps "/></a>



                <a href="<?php echo site_url(); ?>/welcome/download_app/ios"><img



                            src="<?php echo base_url(); ?>assets/system_design/images/header/apple-icon.png"



                            style="width:48%" alt="Navetteo iPhone Apps" title="Navetteo iPhone Apps"/></a>



            </div>



        <?php } ?>







    </div><!-- end collumn-->



    </div> <!--end row-->



    </div>



    </div>



    </div>







    <div class="container-fluid" style="

            padding: 0;

       

        ">



        <div class=" secondary-header"><!-- padding-p-0-->



            <div class="row-fluid">

                

                <!--<div class="col-sm-13 col-md-4 col-lg-3">--> <!--padding-p-l-->



                <div class="col-md-3"> <!--padding-p-l-->
                    <a href="<?php echo site_url(); ?>support/home">
                        <div class="logo"><img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/logo.png" alt="Handi Mobilite Logo" title="Handi Mobilite Logo" style="width:200px;height:140px;"/></div>
                    </a>
                </div>

                <div class="col-md-9 mt-pr-none"> <!-- padding-p-r -->
                    <div class="outside-box">
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-support"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b"><?= isset($this->data['support']) ? $this->data['support']['new'] : 0 ?></b>
                            </div>
                            <p class="service-p">Rides</p>
                            <hr class="service-hr">
                        </div>
                    </div>
                    &nbsp;&nbsp;
                    <?php if ($this->lang->lang() == 'fr') { ?>

                        <div class="col-md-4 right french-contact-number"><!--padding-p-r-->
                            <?php 
								echo "01 48 13 09 34";
                            ?>
                            <p class="working-hours" style=" left:35px;">Du Lundi au Vendredi <br/>de 9h à 12h et de 14h

                                à 18h</p>
                        </div>



                    <?php } else { ?>

                            <?php //    $phone = $site_settings->phone;



                            echo "01 48 13 09 34";



                            ?>

                            <p class="working-hours" style="left:20px;">From Monday to Friday <br/>9h to 12h and from



                                14h to 18h</p>



                        </div> 



                    <?php } ?>



                    <div class="col-md-1 right">

                        <img src="<?php echo base_url(); ?>assets/system_design/images/call-us-girl.png"



                             class="call-us-girl" alt="Call Us" title="Call Us"/></div>



                    <?php if ($this->lang->lang() == 'fr') { ?>



                        <div class="header-icons-fr">







                            <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/logo1ssside.png"



                                 alt="Aeroport Service" width="250px" height="80px" title="Aeroport Service"/>







                            <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/logoagain.png"



                                 alt="Aeroport Service" width="250px" height="80px" title="Aeroport Service"/>











                            <img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/disable.png"



                                 alt="Aeroport Service" width="250px" height="80px" title="Aeroport Service"/>











                        </div>



                    <?php } else if ($this->lang->lang() == 'ens') { ?>



                        <div class="header-icons-en">



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/aeroport.png"



                                 alt="Airport Service" title="Airport Service"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/passengers.png"



                                 alt="Passengers" title="Passengers"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/circuit-touristiques.png"



                                 alt="Tours Circuit" title="Tours Circuit"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/transfert-gare.png"



                                 alt="Railway Transfer" title="Railway Transfer"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/airport-transfers.png"



                                 style="width:95px" alt="Airport Transfer" title="Airport Transfer"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/free-quotes-en.png"



                                 alt="Free Quotes" title="Free Quotes"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/24hr-fr.png"



                                 alt="24/7 Service" title="24/7 Service"/>



                            <img src="<?php echo base_url(); ?>assets/system_design/images/header/disabled.png"



                                 alt="Disabled" title="Disabled"/>



                        </div>



                    <?php } ?>



                </div>







            </div>



        </div>



    </div> <!--/.container-fluid -->



    <div class="main-menu" style="">



        <div class="container-fluid" style="padding-left:0;padding-right:0;"> 



            <div class="row-fluid">



                <nav class="navbar navbar-navetteo menu-total">



                    <div class="navbar-header">

                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed nav-bar-btn" type="button"><span class="sr-only"><?php echo $this->lang->line('toggle_navigation'); ?></span> <span  class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>

                    </div>



                    <div class="collapse navbar-collapse res-menu" id="navbar">



                        <ul class="nav navbar-nav menu">



                            <li <?php if (isset($active_class)) {


                                if ($active_class == "dashboard") echo 'class="active"';



                            } ?>><a href="<?php echo site_url(); ?>support/home"><i class="fa fa-tachometer"



                                                                                       style="font-size: 15px;margin-right: 5px;"></i><span><?php echo $this->lang->line('dashboard'); ?></span></a>



                            </li>



                            <li <?php if (isset($active_class)) { if ($active_class == "support") echo 'class="active"'; } ?>>



                                <a href="<?php echo base_url() ?>support/my_tickets.php"><i class="fa fa-calendar" style="font-size: 15px;margin-right: 5px;"></i><span>Support</span></a>



                            </li>


                        </ul>



                    </div>



                    <!--/.nav-collapse -->



                </nav>



            </div>



        </div>



    </div>



    </div>



    </div>



</header>



<!-- Modal -->

<style type="text/css">

            .card{

                background-color: #fff;

            }

            .card-body3{

                padding: 15px;

            }

            .height-div3{

                height: 100%;

                overflow-y: auto;

            }

            .height-div3::-webkit-scrollbar{

                background-color: #e7e7e7;

                width: 5px;

            }

            .height-div3::-webkit-scrollbar-thumb{

                background-color: lightgrey;

                width: 5px;

            }

         

            .user-image-div .circle-rounded{

                border-radius: 100%;

                width: 50px;

            }

            .filter-div{

                /*margin-bottom: 0px;*/

            }

            .users-chat-div{

                clear: both;

                border-bottom: 1.5px dashed lightgrey;

                padding: 10px;

                position: relative;

                cursor: pointer;

            }

            .users-chat-div2{

                clear: both;

                border-bottom: 1.5px dashed lightgrey;

                padding-bottom: 8px;

                position: relative;

            }

            .users-chat-div:hover{

                background-color: #d3d3d34d;

            }

            .user-image-div,.usercontent-div{

                display: inline-block;

                clear: both;

            }

            .user-image-div{

                float: left;

            }

            .usercontent-div{

                padding-left: 10px;

            }

            .usercontent-div p{

                margin: 0px;

            }

            .chat-badge{

                position: absolute;

                top: 28px;

                right: 5px;

                background-color: red;

            }

            .chat-badge-time{

                position: absolute;

                top: 2px;

                right: 10px;

                color: grey;

            }

            .real-chat-badge{

                position: absolute;

                top: 0px;

                right: 10px;

                color: grey;

            }

            .fa-circle2{

                position: absolute;

                bottom: 11px;

                left: 45px;

                border: 2px solid #fff;

                border-radius: 100%;

            }

            .status_active{

                color: green;

            }

            .usercontent-div p:nth-child(2) {

                color: grey;

            }

            .fa-check{

                color: lightgrey;

            }

            .reply-div-ul{

                margin: 0px !important;

                margin-left: 0px !important;

                padding-left: 0px !important;

                list-style-type: none;

            }

            .reply-div-ul li{

                float: left;

                padding-right: 15px;

                cursor: pointer;

            }

            .replybtn{

                color: silver !important;

                padding: 6px 10px !important;

                height: inherit !important;

            }

            textarea {

                overflow: auto;

                resize: none;

            }

            .detail-content p{

                margin-bottom: 5px;

            }

            .chat-main{

    position: fixed;

    width: 300px;

    bottom: 0;

    left: 350px;

}

.chat-header{

    background: #4267B2;

    padding-top: 1px;

    padding-bottom: 1px;

}

.username i{

    font-size: 9px;

}

.username h6{

    display: inline-block;

    font-size: 12px;

    font-weight: 600;

}

.options i{

    font-size: 14px;

    font-weight: normal;

    opacity: 0.7;

}

.options .live-video{

    font-size: 6px;

}

.chats{

    height: 260px;

    overflow-x: scroll;

    overflow-x: hidden;

}

.chats ul li{

    list-style: none;

    clear: both;

    font-size: 13px;

}

.chats .send-msg{

    float: right;

}

.receive-msg img{

    border-radius: 100%;

    height: 30px;

    /*width: 12%;*/

}

.receive-msg-img{

    display: inline;

}

.receive-msg .receive-msg-desc{

    /*display: inline-block;*/

}

.receive-msg .receive-msg-desc p{

    background: #c1c1c1;

    display: inline-block;

}

.message-box input{

    border: none;

    font-size: 13px;

}

.message-box input:focus{

    outline: none;

}

.tools i{

    color: #a1a1a1;

    cursor: pointer;

    font-size: 20px;

    margin-right: 6px;

}

.rounded-top {

    border-top-left-radius: .25rem!important;

    border-top-right-radius: .25rem!important;

}

.text-white {

    color: #fff!important;

}

.border {

    border: 1px solid #dee2e6!important;

}

.rounded {

    border-radius: .25rem!important;

}

.pr-2, .px-2 {

    padding-right: .5rem!important;

}

.pl-2, .px-2 {

    padding-left: .5rem!important;

}

.mb-1, .my-1 {

    margin-bottom: .25rem!important;

}

.message-box input:focus{

    box-shadow: none !important;

}

input:hover, input:focus, textarea:hover, textarea:focus{

    box-shadow: none !important;

}

.switch {

  position: relative;

  display: inline-block;

  width: 50px;

  height: 20px;

  left: -7px;

}



.switch input { 

  opacity: 0;

  width: 0;

  height: 0;

}



.slider {

  position: absolute;

  cursor: pointer;

  top: 0;

  left: 0;

  right: 0;

  bottom: 0;

  background-color: #ccc;

  -webkit-transition: .4s;

  transition: .4s;

}



.slider:before {

    position: absolute;

    content: "";

    height: 16px;

    width: 16px;

    left: 4px;

    bottom: 2px;

    background-color: white;

    -webkit-transition: .4s;

    transition: .4s;

}



input:checked + .slider {

  background-color: #3e9d38;

}



input:focus + .slider {

  box-shadow: 0 0 1px #3e9d38;

}



input:checked + .slider:before {

  -webkit-transform: translateX(26px);

  -ms-transform: translateX(26px);

  transform: translateX(26px);

}



/* Rounded sliders */

.slider.round {

  border-radius: 34px;

}



.slider.round:before {

  border-radius: 50%;

}

.popover-content {

    padding: 5px 5px;

}

.quickchatreply{

    padding: 0px;

    margin: 0px;

}

.quickchatreply li{

    list-style-type: none;

    padding: 5px;

    border-radius: 5px;

    cursor: pointer;

}

.quickchatreply li:hover{

    background-color: #e5e5e5;

}



#chatsbox ul li a{

    color: silver;

}

        </style>

    <div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content" style="overflow: inherit;">



                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <!-- <h4 class="modal-title" id="myModalLabel"> Chating </h4> -->

                    <?



                        $CI2 =& get_instance();

                        $CI2->load->model('my_model');

                        $language2 = $CI->my_model->get_table_row_query2("SELECT * FROM vbs_header_settings");

                        // print_r($language2['chat_status']);

                    ?>

                    <div class="filter-div card-body text-center">

                        <label class="switch" style="margin-bottom: -6px;">

                          <input type="checkbox" id="chatboxswitch" value="active" <?php if($language2['chat_status']=="active"){echo "checked";}else{} ?>>

                          <span class="slider round"></span>

                        </label>

                        <select class="form-control" style="display: inline-block; width: inherit !important;">

                            <option value=""> Category </option>

                            <option value="">a</option>

                            <option value="">b</option>

                            <option value="">c</option>

                            <option value="">d</option>

                        </select>

                        <select class="form-control" style="display: inline-block; width: inherit !important;">

                            <option value=""> Status </option>

                            <option value="">a</option>

                            <option value="">b</option>

                            <option value="">c</option>

                            <option value="">d</option>

                        </select> 

                       </div>

                </div>



                <div class="modal-body height-div3" style="padding-left: 0px; padding-right: 0px; padding-bottom: 0px;">

                    <!-- <p class="text-center">Loading...</p> -->

                    <div class=""> 

                    <audio id="pop" style="visibility: hidden;height: 0px;width: 0px;">

                      <source src="<?php echo base_url(); ?>assets/chat_audio_sound.mp3" type="audio/mpeg">

                    </audio>                      

                       <div class="height-div33">

                                            

                     </div>

                    </div>

                </div>



            </div><!-- modal-content -->

        </div><!-- modal-dialog -->

    </div><!-- modal -->



    <div class="row pt-3">

        <div class="chat-main" style="opacity: 0; z-index: -1; background-color: #fff;">

            <div class="col-md-12 chat-header rounded-top bg-primary text-white">

                <div class="row">

                    <div class="col-md-9 hidechatbx hide-chat-box2 username pl-2">

                        <i class="fa fa-circle text-success" aria-hidden="false" style="position: relative; top: 0px; left: 0px;"></i>

                        <h6 class="m-0" id="userchatname"></h6>

                    </div>

                    <div class="col-md-3 options text-right pr-2">

                        <b class="hide-chat-box2" style="font-size: 32px;position: relative;top: 2px;cursor: context-menu;"> - </b>

                        <i class="fa fa-times closechatbox" aria-hidden="false"></i>

                      </div>

                </div>

            </div>

            <div class="chat-content">

                <div class="col-md-12 chats border" id="chatsbox">

                    

                </div>

                <div class="col-md-12 message-box border pl-2 pr-2 border-top-0" onclick="removeextrafunctionality()">

                    <?php echo form_open_multipart('insertadminchathistory', ['id' => 'adminreplymsgform', 'class' => 'form']); ?>

                    <!-- <form action="" id="adminreplymsgform" enctype="multipart/form-data" method="post"> -->

                    <div id="attachfile_div" class="text-center" style="float: right;width: 70px; display: none;">

                        <div id="otherfieattacmentdiv"></div>

                        <img src="" id="changeattachfileimage" style="width: 100%;border: 1px solid #ddd; border-radius: 4px; padding: 3px;">

                        <div class="text-center" id="attachfilename" style="line-height: 1;"></div>

                    </div>

                    <input type="text" name="messagetext" id="messagetext" class="pl-0 pr-0 w-100" placeholder="Type a message..." autocomplete="off"  required="required"/>

                    <input type="hidden" name="userid" id="input_userid">

                    <div class="tools" style="clear: both;">

                        <!-- <i class="fa fa-meh-o" aria-hidden="true"></i> -->

                        <input type="file" name="chatfile" id="chatfile" style="visibility: hidden;height: 0px;width: 0px;" onchange="addattachfileto_div()">

                        <i class="fa fa-paperclip" aria-hidden="true" onclick="addchatfile()"></i>

                        <a href="javascript:void(0)" title="" data-toggle="popover" data-html="true" data-placement="top" data-content="<ul class='quickchatreply'><li onclick='quickchatreplyfnc(1)'>Sure, let`s get started</li><li onclick='quickchatreplyfnc(2)'>Interesting, but I need info</li><li onclick='quickchatreplyfnc(3)'>I`m not able to do this</li></ul>"> Quick reply </a>

                        <input type="submit" name="submit" class="btn btn-primary" value="Send" style="float: right; padding: 5px; height: inherit !important; box-shadow: none !important; margin-bottom: 5px;">

                    </div>

                <!-- </form> -->

                <?=form_close();?>

                </div>

            </div>

        </div>

    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript">

    $(document).ready(function(){

    getnewmessagesdata();

    var soundstatus;

    function getnewmessagesdata(){

        var status = 'active';

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/getallnewmessages',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {
                 
         
                        var obj = result;
                    

                    

                    if(obj.sound_status==1 && obj.ischat_open==0)

                    {

                        $('audio#pop')[0].play();

                        clearTimeout(soundstatus);

                        updatechatsound_status();

                    }

                    // alert(obj.sound_status+" HTML="+obj.chat_html_data);return;

                   // console.log(1);

                    $('.height-div33').html(obj.chat_html_data);

                    setTimeout(getnewmessagesdata,5000);

                }

            });

    }



    function updatechatsound_status()

    {

        var status = "active";

        soundstatus = setTimeout(function(){

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/changechatsound_status',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    // $('audio#pop')[0].pause();

                    console.log(result);

                }

            });

    },800);

    }



   // $('[data-toggle="popover"]').popover();

});

    $('.hide-chat-box').click(function(){

        $('.chat-content').slideDown();

        $('.chat-main').css({'opacity':1,'z-index':9999});

        $('.hidechatbx').addClass('hide-chat-box');

    });

    $('.hide-chat-box2').click(function(){

        $('.chat-content').slideToggle();

        $('.chat-main').css('opacity',1);

        $('.hidechatbx').addClass('hide-chat-box2');



    });



    $('.height-div33').click(function(){

        $('.chat-content').slideDown();

        $('.chat-main').css('opacity',1);

        $('.hidechatbx').addClass('hide-chat-box2');

    });



    



    $('#chatboxswitch').click(function(){

        if($(this).prop("checked")){

            // alert();return;

            var status = 'active';

            $.ajax({

                url:'<?php echo base_url(); ?>Messages/changechatboxstatus',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    console.log("Chat active");

                }

            });

        }

        else

        {

            var status = 'inactive';

            $.ajax({

                url:'<?php echo base_url(); ?>Messages/changechatboxstatus',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    console.log("Chat Inactive");

                }

            });

        }

    });



    function removeextrafunctionality()

    {

        $('.close').click();

    }



    function quickchatreplyfnc(val)

    {

        if(val==1)

        {

            $('#messagetext').val('Sure, let`s get started');

        }

        if(val==2)

        {

            $('#messagetext').val('Interesting, but I need info');

        }

        if(val==3)

        {

            $('#messagetext').val('I`m not able to do this');

        }



        $('#adminreplymsgform').submit();

    }



    function addattachfileto_div()

    {

        $('#attachfile_div').css({'display':'block'});

        var attachfilename_val = $('#chatfile').val();

        var extension = attachfilename_val.split('.').pop();

        // alert(extension);return;

        if(extension=="png" || extension=="PNG" || extension=="jpg" || extension=="jpeg" || extension=="gif")

        {

            var oFReader = new FileReader();

            oFReader.readAsDataURL(document.getElementById("chatfile").files[0]); 

            oFReader.onload = function (oFREvent){

            document.getElementById("changeattachfileimage").src = oFREvent.target.result;

         }            

        }

        else

        {

            $('#changeattachfileimage').attr('src','<?php echo base_url(); ?>assets/chat_files/file_upload_image.png');       

        }

        var attachfilename_vall = attachfilename_val.substring(attachfilename_val.lastIndexOf("\\") + 1, attachfilename_val.length);

        $('#attachfilename').text(attachfilename_vall);

        $('#messagetext').attr("required",false);

    }







    var specificuserSettimeout;

    function getspecificuserchathistory(userid,user_name)

    {

        clearTimeout(specificuserSettimeout);        

        var status = 'active';

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/getallspecificusermessages',

                method:'get',

                data:'userid='+userid,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    $('#userchatname').text(user_name);

                    $('#input_userid').val(userid);

                    $('.chat-main').css({'z-index':9999,'opacity':1});

                    $('#chatsbox').html(result);



                    var elem = document.getElementById('chatsbox');

                    elem.scrollTop = elem.scrollHeight;



                    specificuserSettimeout = setTimeout(getspecificuserchathistory.bind(null,userid,user_name),3000);

                }

            });        

    }



    // function adminreply()

    // {

    //    var message_text = $('#messagetext').val();

    //    var userid = $('#input_userid').val();

    //    var attachfile = $('#chatfile').val();

    //    $.ajax({

    //         url:'<?php echo base_url(); ?>Messages/insertadminreply',

    //         method:'get',

    //         data:'userid='+userid+'&messagetext='+message_text+'&attachfile='+attachfile,

    //         cache:false,

    //         contentType:false,

    //         processData:false,

    //         success:function(result)

    //         {

    //             $('#messagetext').val('');

    //             $('#chat_ul').append(result);

    //             $('.popover').hide();

    //             var elem = document.getElementById('chatsbox');

    //             elem.scrollTop = elem.scrollHeight;

    //         }

    //     });  

    // }

    $('#adminreplymsgform').on('submit',function(e){

        e.preventDefault();    

        var formData = new FormData(this);

       $.ajax({

            url:'<?php echo base_url(); ?>insertadminchathistory',

            method:'POST',

            data:formData,

            cache:false,

            contentType:false,

            processData:false,

            success:function(result)

            {

                // alert(result);

                $('#attachfile_div').css({'display':'none'});

                $('#messagetext').val('');

                $('#chatfile').val('');

                $('#messagetext').attr("required",true);

                $('#chat_ul').append(result);

                $('.popover').hide();

                var elem = document.getElementById('chatsbox');

                elem.scrollTop = elem.scrollHeight;

            }

        });  

    });



   $('.closechatbox').on('click',function(){

        $('.chat-main').css({'opacity':0,'z-index':-1});

        clearTimeout(specificuserSettimeout);

        $.ajax({

            url:'<?php echo base_url(); ?>Messages/change_is_chat_open_status_to_off',

            method:'get',

            data:'status=1',

            cache:false,

            success:function(result)

            {

                console.log('Sound off');

            }

        });

    });



   function addchatfile()

   {

    $('#chatfile').click();

   }



    // window.setInterval(function() {

      var elem = document.getElementById('chatsbox');

      elem.scrollTop = elem.scrollHeight;

    // }, 2000);

    </script>

