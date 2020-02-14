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
    <link rel='shortcut icon' href='<?php echo base_url(); ?>assets/system_design/images/favicon.ico'
          type='image/x-icon'/>
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

    <?php } ?>
    <link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">

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

    <style>
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

        .top-section {
            background: transparent linear-gradient(#FBFBFB, #ECECEC, #CECECE) repeat scroll 0% 0%;
            margin: 0px;
            height: 42px;
            width: 100%;
            color: #000;
            /* background: #494951; */
            padding: 3px 0 2px;
        }

        .top-section a.top-login {
            display: none;
        }

        .social-icons ul li {
            display: none !important;
        }

        .top-pack-book-links ul li a.bookmark {
            display: none !important;
        }

        .main-menu {
            background-image: linear-gradient(to bottom, #e8e0e0 0%, #ececec 39%, #fbf4f4 39%, #8a8989 100%);
            width: 98%;
            border-bottom: 1px solid rgba(1, 2, 2, 0.2);
            height: 70px;
            margin-left: 13px;
            margin-top: -20px;

        }

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
            padding-left: 15px;
            margin-top: -21px !important;
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

        .service-box {
            background: linear-gradient(to bottom, #e0dfdf 20%, #eaeaea 49%, #eaeaea 8%, #a3a3a391 100%) !important;
            border-top: none;
            border-right: 1px solid #ddd !important;
            border-radius: 0% !important;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) !important;
            margin-left: 10px;
            width: 146px !important;
            height: 100px !important;
            padding: 5px !important;
            text-decoration: none !important;
            float: left !important;
            position: relative;
            top: -10px;
        }

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

        .service-p {
            font-size: 15px;
        }

        .service-hr {
            margin-top: -5px;
            border-top-color: #FF9800;
        }

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
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6), inset 0 2px 5px rgba(255, 255, 255, 0.5), inset 0 -2px 5px rgba(0, 0, 0, 0.1);
            background: transparent linear-gradient(#ffffff, #e6e6e6, #CECECE) repeat scroll 0% 0%;
            border-color: #bfbfbf;background-color: #e6e6e6;
            background-color: #e6e6e6;
            border-color: #bfbfbf;
            padding: 5px 10px 5px 10px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);

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
    </style>

    <?php

    $this->load->model('calls_model');
    $this->load->model('request_model');
    $this->load->model('jobs_model');

    $data = [];
    $data['request'] = $this->request_model->getAll();
    $data['jobs'] = $this->jobs_model->getAll();
    $data['calls'] = $this->calls_model->getAll();

    foreach ($data as $key => $d) {
        if ($d != false) {
            foreach ($d as $i) {
                if (!empty($i->status))
                    $this->data[$key][strtolower($i->status)] = isset($this->data[$key][strtolower($i->status)]) ? $this->data[$key][strtolower($i->status)] + 1 : 1;
            }
        }
    }
    // print_r($this->data);

    ?>

    <?php
    $apiKey = "8614c60196cc0edb266fbad0511ce8a8";
    $urlforcast = "http://api.openweathermap.org/data/2.5/forecast/daily?q=Kingdom of Morocco,MA&units=metric&cnt=5&appid=" . $apiKey;
    $json = file_get_contents($urlforcast);
    $data = json_decode($json, true);
    if(!empty($data)){
        foreach ($data['list'] as $day => $value) {
            echo $desc = $value['weather'][0]['description'];
            $max_temp = $value['temp']['max'];
            $min_temp = $value['temp']['min'];
            $pressure = $value['pressure'];
        }
    }
    ?>
    <?php
    $apiKey = "8614c60196cc0edb266fbad0511ce8a8";
    $cityId = "2542007";
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();
    ?>

    <script>
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            // add a zero in front of numbers<10
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('localclock').innerHTML = h + ":" + m + ":" + s;
            t = setTimeout(function () {
                startTime()
            }, 500);
        }

        startTime();
    </script>
</head>
<body>
<header>
    <div class="header-wrapper">
        <div class="navbar-fixed-top">
            <div class="top-section">
                <div class="container-fluid body-bg" style=" margin-top: 0; background: none !important;">
                    <div class="container-fluid body-bg" style=" margin-top: 0;background: none !important;">
                        <div class="row">
                            <div class="col-md-12" style="padding: 0px;">
                                <div id="user-nav">

                                    <div class="btn-group" role="group" aria-label="">
                                        <div class="btn-group" role="group">
                                            <script src="<?php echo base_url(); ?>assets/system_design/scripts/wimpy.js"></script>
                                            <!-- Wimpy Player Instance -->
                                            <div style="height: 30px;width: 200px;"
                                                 data-wimpyplayer
                                                 data-media="http://direct.francebleu.fr/live/fb1071-midfi.mp3"
                                                 data-skin="<?php echo base_url(); ?>assets/system_design/scripts/wimpy.skins/001.tsv">

                                            </div>
                                        </div>
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
                                            <div class="top-calendar"><input type="text" name="top-calendar"
                                                                             id="top-calendar-widget"
                                                                             value="<?php echo date('l d F Y H:i'); ?>"
                                                                             style="color:#000;border:none;background:transparent;font-size:14px;box-shadow: none;width:255px;cursor: pointer;"
                                                                             readonly/></div>
                                            <!--<div class="top-calendar" ><?php echo date('d-m-Y H:i:s'); ?>                    <div class="calendar-widget" align="center" style="margin:15px 0px 0px 0px;display:none;"><iframe src=http://widgetscode.com/wc/hc-fr?skin=blk1 style='width:250px;height:300px;margin:0;'frameborder=0></iframe></div>                </div>-->
                                            <div id="localclock"
                                                 style="margin-top: 1.5px;margin-left: 93px;font-size: 15px;font-weight: bold;"></div>

                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-suitcase"></i> CRM<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url() ?>admin/newsletters.php"
                                                       class="flag-arabic"><i
                                                                class="fa fa-suitcase"></i>
                                                        Newsletter </a></li>
                                                <li><a href="<?php echo base_url() ?>admin/promotion.php"
                                                       class="flag-arabic"><i class="fa fa-suitcase"></i>
                                                        Promotion </a></li>
                                            </ul>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-bolt"></i> CMS<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= base_url(); ?>admin/language.php"
                                                       class="flag-arabic"><i
                                                                class="fa fa-language"></i>
                                                        Language </a></li>
                                            </ul>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <a href="<?php echo site_url('admin/jobs'); ?>"
                                               class="btn btn-default btn-mar"
                                               style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;"><i
                                                        class="fa fa-registered"></i>
                                                Job Applications </a>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo site_url('admin/calls'); ?>"
                                               class="btn btn-default btn-mar"
                                               style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;">
                                                <i class="fa fa-phone"></i> Calls</a>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo site_url('admin/request'); ?>"
                                               class="btn btn-default btn-mar"
                                               style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;">
                                                <i class="fa fa-paper-plane"></i>Quote
                                                Requests</a>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url(); ?>admin/file_manager.php"
                                               class="btn btn-default btn-mar"
                                               style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;"><i
                                                        class="fa fa-file-o"></i>
                                                Files</a>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url(); ?>admin/tasks.php" class="btn btn-default btn-mar"
                                               style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;"><i
                                                        class="fa fa-tasks"></i>
                                                Tasks
                                            </a>
                                        </div>
                                        <!-- <div class="btn-group" role="group">
                                            <a href="<?= base_url(); ?>admin/language.php" class="btn btn-default btn-mar"
                                               style="color: #000000db;background-color: #e0e0e0;border-color: #dbdbdb;"><i class="fa fa-language"></i>
                                                Language
                                            </a>
                                        </div> -->


                                        <div class="lang-icons" style="float: left;"><!--class="selec" id="uli"-->
                                            <div class="lang-right">
                                                <div class="tot-top" style="float: left;">
                                                   <span class="en-icon" style="float: left;margin-top: -5px;"></span>
                                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"
                                                       aria-expanded="false"
                                                       style="color: #111;"> English<b
                                                                class="caret"></b></a>
<!--                                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"-->
<!--                                                       aria-expanded="false"-->
<!--                                                       style="color: #111;"> Language<b-->
<!--                                                                class="caret"></b></a>-->
                                                    <ul class="dropdown-menu">
<!--                                                        <li style="color: #000000db;background-color: #e0e0e0b0;border-color: #dbdbdb;width: 160px;height: 40px;margin: 0;" aria-selected="true">-->
<!--                                                            <a href="--><?php //echo base_url() . $this->lang->switch_uri('en') ?><!--"><span-->
<!--                                                                        class="en-icon"></span>-->
<!--                                                                <p style="margin-left: 10px; margin-top: -25px;font-weight: bolder;">-->
<!--                                                                    English</p></a></li>-->
                                                        <li style="color: #000000db;background-color: #e0e0e0b0;border-color: #dbdbdb; width: 160px;height: 40px;margin: 0;">
                                                            <a href="<?php echo base_url() . $this->lang->switch_uri('fr') ?>"><span
                                                                        class="fr-icon"></span></span><p
                                                                        style="margin-left: 10px; margin-top: -25px;font-weight: bolder;">
                                                                    French</p></a></li>
                                                    </ul>

                                                </div>


                                                <!--                                            <select name="icon" class="grad-bg form-control remove-apperance">-->
                                                <!--                                                <option value="fa fa-icon" selected> English <span class="en-icon"></span></option>-->
                                                <!--                                                <option value="fa fa-icon">French <span class="en-icon"></span><span-->
                                                <!--                                                                class="fr-icon"></span></a></option>-->
                                                <!--                                            </select>-->
                                            </div>
                                            <!--   <ul class="right" style="padding-left: 60px;">
                                                <li>
                                                   <a href="<?php echo base_url() . $this->lang->switch_uri('en') ?>"><span
                                                                class="en-icon"></span></a></li>
                                                <li>
                                                    <a href="<?php echo base_url() . $this->lang->switch_uri('fr') ?>"><span                                                            class="fr-icon"></span></a></li>
                                            </ul> -->
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


                                        <div class="currency"
                                             style="background:#fff;width:100px;height: 20px;float: left;top: -26px;">
                                            <select name="department" class="grad-bg form-control remove-apperance">
                                                <option value="fa fa-usd" selected>&#x24; USD</option>
                                                <option value="fa fa-eur">&#x20ac; EURO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="header-box" style="width: 100px; float: right;margin-right: 10px;">
                                        <a href="<?php echo site_url(); ?>/auth">
                                            <div class="right">
                                                <div class="tot-top">
                                                    <!--                                                    <button style="width: 160px !important;" type="button" class="btn btn-default"-->
                                                    <!--                                                            aria-haspopup="true" aria-expanded="false"><span class="fa fa-circle" style="color: green">-->
                                                    <!---->
                                                    <!--                                                        </span> -->
                                                    <?php //echo $user_name; ?><!-- <span class="caret"></span></button>-->
                                                    <div class="phone"><i class="fa fa-user"></i></div>
                                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"
                                                       aria-expanded="false"
                                                       style="color: #111;"> <?= $user->username; ?><b
                                                                class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <!--                                                      <li><a href="#"><i class="fa fa-fw fa-desktop"></i> CMS</a></li>-->
                                                        <!--                                                      <li><a href="-->
                                                        <?php //echo site_url('admin/newsletter');?><!--"><i class="fa fa-fw fa-newspaper-o"></i> Newsletter</a></li>-->
                                                        <!--                                                      <li><a href=""><i class="fa fa-fw fa-tasks"></i> Tasks</a></li>-->
                                                        <!--                                                      <li><a href=""><i class="fa fa-fw fa-file"></i> Files</a></li>-->
                                                        <li><a href="<?php echo base_url('admin/configurations.php'); ?>"><i class="fa fa-fw fa-wrench"></i>
                                                                Configurations</a></li>
                                                        <li><a href="#"><i class="fa fa-fw fa-gear"></i>
                                                                Settings</a></li>
                                                        <li><a href="<?php echo base_url('admin/company'); ?>"><i
                                                                        class="fa fa-fw fa-file"></i> Company
                                                                Profile</a></li>
                                                        <li>
                                                            <a href="<?php echo base_url('admin/departments'); ?>"><i
                                                                        class="fa fa-fw fa-table"></i>
                                                                Departments</a></li>
                                                        <li><a href="<?php echo base_url('admin/roles'); ?>"><i
                                                                        class="fa fa-fw fa-tag"></i> Roles</a></li>
                                                        <li><a href="<?php echo base_url('admin/users'); ?>"><i
                                                                        class="fa fa-fw fa-users"></i> Users</a>
                                                        </li>
                                                        <li><a href="<?php echo site_url(); ?>admin/logout"><i
                                                                        class="fa fa-fw fa-power-off"></i><?php echo $this->lang->line('log_out'); ?>
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>


                                    </div>
                                    <!--<ul>                        <li><a class="user-name" href="#"><?php echo "Welcome " . $user_name; ?></a></li>                        <li class="btn btn-inverse"><a href="#">Settings</a></li>                        <li class="btn btn-inverse configuration">                            <div class="btn-group">                                <button type="button" class="btn btn-default">Configuration</button>                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                    <span class="caret"></span>                                    <span class="sr-only">Toggle Dropdown</span>                                </button>                                <ul class="dropdown-menu">                                    <li><a href="#" class="flag-arabic">Employees</a></li>                                    <li><a href="#" class="flag-arabic">Fleet</a></li>                                    <li><a href="#" class="flag-arabic">Resources</a></li>                                    <li><a href="#" class="flag-arabic">Dispatch</a></li>                                    <li><a href="#" class="flag-arabic">Accounting</a></li>                                    <li><a href="#" class="flag-arabic">CRM</a></li>                                    <li><a href="#" class="flag-arabic">Booking</a></li>                                    <li><a href="#" class="flag-arabic">Outsourcing</a></li>                                    <li><a href="#" class="flag-arabic">Affiliation</a></li>                                    <li><a href="#" class="flag-arabic">Recruitment</a></li>                                    <li><a href="#" class="flag-arabic">CMS</a></li>                                    <li><a href="#" class="flag-arabic">Messenger</a></li>                                    <li><a href="#" class="flag-arabic">Support</a></li>                                </ul>                            </div>                        </li>                        <?php if ($this->session->userdata('admin_login') == 1) : ?>                        <li class="btn btn-inverse"><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>                        <?php endif; ?>                    </ul>-->
                                    <!-- Wimpy Engine -->

                                    <!--                                    <style type="text/css">-->
                                    <!--                                        #Rube_JBEEB_27{-->
                                    <!--                                            padding-top: 5px !important;-->
                                    <!--                                        }-->
                                    <!--                                    </style>-->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
        <!--        <div class="col-md-6 col-sm-6 col-xs-12 section-cen">               --><?php //?>
        <!---->
        <!--            --><?php //if (!$this->ion_auth->logged_in()) { ?>
        <!--                <div class="social-icons left" style="margin-top:4px; margin-right: 10px !important">-->
        <!--                    <a class="top-login" href="#"-->
        <!--                       data-href="--><?php //echo site_url(); ?><!--chauffeur.php">-->
        <?php //echo $this->lang->line('driver_login'); ?><!--</a>-->
        <!--                </div>-->
        <!---->
        <!--            --><?php //} ?>
        <!--            <div class="social-icons left">-->
        <!--                <ul>-->
        <!--                    --><?php
        //                    $social_networks = $this->base_model->run_query("SELECT * FROM vbs_social_networks");
        //
        //                    //social_networks
        //
        //                    if (isset($social_networks[0]->facebook)) {
        //                        ?>
        <!--                        <li>-->
        <!--                            <a href="-->
        <?php //echo $social_networks[0]->facebook; ?><!--" target="_blank">-->
        <!--                                <img src='-->
        <?php //echo base_url() . "assets/system_design/images/facebook-icon.png" ?><!--'-->
        <!--                                     alt="Navetteo Facebook" title="Navetteo Facebook"/>-->
        <!--                            </a> <i class="fa fa-facebook"></i>-->
        <!--                        </li>-->
        <!--                    --><?php //}
        //                    if (isset($social_networks[0]->twitter)) {
        //                        ?>
        <!--                        <li>-->
        <!--                            <a href="-->
        <?php //echo $social_networks[0]->twitter; ?><!--" target="_blank">-->
        <!--                                <i class="fa fa-twitter"></i> -->
        <!--                                <img src='-->
        <?php //echo base_url() . "assets/system_design/images/twitter-icon.png" ?><!--'-->
        <!--                                     alt="Navetteo Twitter" title="Navetteo Twitter"/>-->
        <!--                            </a>-->
        <!--                        </li>-->
        <!--                    --><?php //}
        //                    if (isset($social_networks[0]->linkedin)) {
        //                        ?>
        <!--                        <li>-->
        <!--                            <a href="-->
        <?php //echo $social_networks[0]->linkedin; ?><!--" target="_blank">-->
        <!--                                <i class="fa fa-linkedin"></i>  -->
        <!--                                <img src='--><?php //echo base_url() . "assets/system_design/images/linkedin-icon.png" ?>
        <!--                                     alt="Navetteo LinkedIn" title="Navetteo LinkedIn"/>-->
        <!--                            </a>-->
        <!--                        </li>-->
        <!--                    --><?php //}
        //                    if (isset($social_networks[0]->google_plus)) {
        //                        ?>
        <!--                        <li>-->
        <!--                            <a href="-->
        <?php //echo $social_networks[0]->google_plus; ?><!--" target="_blank">-->
        <!--                                <i class="fa fa-google-plus"></i> -->
        <!--                                <img src='-->
        <?php //echo base_url() . "assets/system_design/images/google-icon.png" ?><!--'-->
        <!--                                     alt="Navetteo GooglePlus" title="Navetteo GooglePlus"/>-->
        <!--                            </a>-->
        <!---->
        <!--                        </li>-->
        <!--                    --><?php //} ?>
        <!---->
        <!--                </ul>-->
        <!--            </div>-->
        <!--            <div class="top-pack-book-links --><?php //if ($this->lang->lang() == 'fr') {
        //                echo 'leftalign_fr';
        //            } else {
        //                echo 'leftalign_en';
        //            } ?><!--">-->
        <!--                <ul>-->
        <!--                    <li><a class="bookmark"-->
        <!--                           href="javascript:(function(){var a=window,b=document,c=encodeURIComponent,d=a.open('http://www.seocentro.com/cgi-bin/promotion/bookmark/bookmark.pl?u='+c( b.location )+'&amp;t='+c( b.title ),'bookmark_popup','left='+((a.screenX||a.screenLeft)+10)+',top='+((a.screenY||a.screenTop)+10)+',height=480px,width=720px,scrollbars=1,resizable=1,alwaysRaised=1');a.setTimeout(function(){ d.focus()},300)})();">-->
        <?php //echo $this->lang->line('bookmark_us'); ?><!--</a>-->
        <!--                    </li>-->
        <!--                </ul>-->
        <!--            </div>-->
        <!--        </div>-->


        <!--        <div class="col-md-6 col-sm-6 col-xs-12 section-ce2">-->

        <!--                                    <a href="--><?php //echo site_url(); ?><!--/auth" >-->
        <!--                                        <div class="right">-->
        <!--                                            <div class="tot-top">-->
        <!--                                                <div class="phone"> <i class="fa fa-user"></i> </div>-->
        <!--                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> -->
        <? //= $user->username; ?><!--<b class="caret"></b></a>-->
        <!--                                                <ul class="dropdown-menu">-->
        <!--                                                    <li><a href="#"><i class="fa fa-fw fa-desktop"></i> CMS</a></li>-->
        <!--                                                    <li><a href="-->
        <?php //echo site_url('admin/newsletter');?><!--"><i class="fa fa-fw fa-newspaper-o"></i> Newsletter</a></li>-->
        <!--                                                    <li><a href=""><i class="fa fa-fw fa-tasks"></i> Tasks</a></li>-->
        <!--                                                    <li><a href=""><i class="fa fa-fw fa-file"></i> Files</a></li>-->
        <!--                                                    <li><a href="#"><i class="fa fa-fw fa-wrench"></i> Configurations</a></li>-->
        <!--                                                    <li><a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a></li>                                                   <li><a href="-->
        <?php //echo base_url('admin/company'); ?><!--"><i class="fa fa-fw fa-file"></i> Company Profile</a></li>-->
        <!--                                                    <li><a href="-->
        <?php //echo base_url('admin/departments'); ?><!--"><i class="fa fa-fw fa-table"></i> Departments</a></li>-->
        <!--                                                    <li><a href="-->
        <?php //echo base_url('admin/roles'); ?><!--"><i class="fa fa-fw fa-tag"></i> Roles</a></li>-->
        <!--                                                    <li><a href="-->
        <?php //echo base_url('admin/users'); ?><!--"><i class="fa fa-fw fa-users"></i> Users</a></li>-->
        <!--                                                    <li> <a href="-->
        <?php //echo site_url(); ?><!--admin/logout"><i class="fa fa-fw fa-power-off"></i>-->
        <?php //echo $this->lang->line('log_out'); ?><!-- </a> </li>-->
        <!--                                                </ul>-->
        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                    </a>-->

        <!--                                <div class="lang-icons"><class="selec" id="uli"-->
        <!--                                    <ul class="right">-->
        <!--                                        <li> <a href="-->
        <?php //echo base_url() . $this->lang->switch_uri('en') ?><!--"><span class="en-icon"></span></a> </li>
                                                 <li><a href="-->
        <?php //echo base_url() . $this->lang->switch_uri('fr') ?><!--"><span class="fr-icon"></span></a></li>
                                              </ul>-->
        <!--                                </div>-->

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
        <?php if ($site_settings->app_settings == "Enable") { ?>
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

    <div class="container-fluid secondary-header">
        <div class="container-fluid"><!-- padding-p-0-->
            <div class="row">
                <div class="col-md-3"> <!--padding-p-l-->
                    <a href="<?php echo site_url(); ?>dashboard.php">
                        <div class="logo"><img
                                    src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/logo.png"
                                    alt="Handi Mobilite Logo" title="Handi Mobilite Logo"
                                    style="width:200px;height:140px;"/></div>
                    </a>
                </div>
                <div class="col-md-9 padding-p-r">
                    <div class="outside-box">
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-phone"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b"><?= isset($this->data['calls']) ? $this->data['calls']['new'] : 0 ?></b>
                            </div>
                            <p class="service-p">CALLS</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-registered"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b"><?= isset($this->data['jobs']) ? $this->data['jobs']['new'] : 0 ?></b>
                            </div>
                            <p class="service-p">JOB APPLICATIONS</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-paper-plane"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b"><?= isset($this->data['request']) ? $this->data['request']['new'] : 0 ?></b>
                            </div>
                            <p class="service-p">QUOTE REQUESTS</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-ticket"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b">10</b>
                            </div>
                            <p class="service-p">BOOKINGS</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-calculator"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b">12</b>
                            </div>
                            <p class="service-p">INVOICES</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-users"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b">0</b>
                            </div>
                            <p class="service-p">CLIENTS</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-car"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b">0</b>
                            </div>
                            <p class="service-p">CARS</p>
                            <hr class="service-hr">
                        </div>
                        <div class="service-box">
                            <div class="service-div">
                                <i id="service-i" class="fa fa-car"></i>
                                <br>
                            </div>
                            <div>
                                <b class="service-b">0</b>
                            </div>
                            <p class="service-p">DRIVERS</p>
                            <hr class="service-hr">
                        </div>
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Gross</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-plus fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">116</b>-->
                        <!--                                <p class="first-box-p">Cash Flow</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-plus fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">116</b>-->
                        <!--                                <p class="first-box-p">Pending Bookings</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-cab fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">3</b>-->
                        <!--                                <p class="first-box-p">Pending Support</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-plane fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">5</b>-->
                        <!--                                <p class="first-box-p">Pending Requests</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Pending Calls</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Pending Mails</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Gross</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Cart Alerts</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Driver Alerts</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <div class="first-box">-->
                        <!--                            <a href="#" class="btn-box">-->
                        <!--                                <i id="class-i" class="fa fa-th fa-3x"></i>-->
                        <!--                                <b class="btn-box-b">15</b>-->
                        <!--                                <p class="first-box-p">Client Alerts</p>-->
                        <!--                            </a>-->
                        <!--                        </div>-->

                    </div>

                    &nbsp;&nbsp;
                    <?php if ($this->lang->lang() == 'fr') { ?>
                        <div class="col-md-4 right french-contact-number"><!--padding-p-r-->
                            <?php //$phone = $site_settings->land_line;
                            echo "01 48 13 09 34";

                            ?>
                            <p class="working-hours" style=" left:35px;">Du Lundi au Vendredi <br/>de 9h à 12h et de 14h
                                à 18h</p>


                        </div>
                    <?php } else { ?>
                        <div class="col-md-4 right english-contact-number">
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
                    <?php } else if ($this->lang->lang() == 'en') { ?>
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
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-navetteo menu-total">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar"
                                data-toggle="collapse" class="navbar-toggle collapsed nav-bar-btn" type="button"><span
                                    class="sr-only"><?php echo $this->lang->line('toggle_navigation'); ?></span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span></button>
                    </div>
                    <div class="collapse navbar-collapse res-menu" id="navbar">
                        <ul class="nav navbar-nav menu">
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "dashboard") echo 'class="active"';
                            } ?>><a href="<?php echo site_url(); ?>admin/dashboard"><i class="fa fa-tachometer"
                                                                                       style="font-size: 15px;margin-right: 5px;"></i><span><?php echo $this->lang->line('dashboard'); ?></span></a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "calls") echo 'class="active"';
                            } ?>><a href="<?php echo site_url('admin/calls'); ?>"><i class="fa fa-phone"
                                                                                     style="font-size: 15px;margin-right: 5px;"></i><span><?php echo $this->lang->line('calls'); ?></span></a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "jobs") echo 'class="active"';
                            } ?>><a href="<?php echo site_url('admin/jobs'); ?>"><i class="fa fa-registered"
                                                                                    style="font-size: 15px;margin-right: 5px;"></i><span><?php echo $this->lang->line('jobs'); ?></span></a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "request") echo 'class="active"';
                            } ?>><a href="<?php echo site_url('admin/request'); ?>"><i class="fa fa-paper-plane"
                                                                                       style="font-size: 15px;margin-right: 5px;"></i>Quote
                                    Requests</a></li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "booking") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-ticket" style="font-size: 15px;margin-right: 5px;"></i>Bookings</a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "invoices") echo 'class="active"';
                            } ?>><a href="<?php echo site_url('admin/invoices'); ?>"><i class="fa fa-calculator" style="font-size: 15px;margin-right: 5px;"></i>Invoices</a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "clients") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-users" style="font-size: 15px;margin-right: 5px;"></i>Clients</a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "cars") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-car"
                                                style="font-size: 15px;margin-right: 5px;"></i>Cars</a></li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "drivers") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-car" style="font-size: 15px;margin-right: 5px;"></i>Drivers</a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "planning") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-calculator" style="font-size: 15px;margin-right: 5px;"></i>Planning</a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "planning") echo 'class="active"';
                            } ?>><a href="<?php echo base_url() ?>admin/dispatch/map_views.php"><i class="fa fa-map"
                                                                                                   style="font-size: 15px;margin-right: 5px;"></i>Mapview</a>
                            </li>
                            <li <?php if (isset($active_class)) {
                                if ($active_class == "support") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-child"
                                                style="font-size: 15px;margin-right: 5px;"></i><span><?php echo $this->lang->line('support'); ?></span></a>
                            </li>
                            <!-- <li <?php if (isset($active_class)) {
                                if ($active_class == "map") echo 'class="active"';
                            } ?>><a href="#"><i class="fa fa-map" style="font-size: 15px;margin-right: 5px;"></i>Map</a></li> -->
                            <!--<li <?php if (isset($active_class)) {
                                if ($active_class == "newsletter") echo 'class="active"';
                            } ?>><a href="<?php echo site_url('admin/newsletter'); ?>">Newsletter</a></li>-->
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
