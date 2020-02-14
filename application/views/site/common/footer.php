<section id="partners">
    <div class="container"> <!-- padding-p-0-->
        <div class="row">
            <div class="partners_inner">
                <ul class="partners">
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/charte-diversite.png" alt="Charte Diversite" title="Charte Diversite" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/direction.png" alt="Direction" title="Direction" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/aeroports.png" alt="Aeroports" title="Aeroports" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/iledefrance.png" alt="iLe De France" title="iLe De France" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/qtp.png" alt="QTP" title="QTP" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/ratp.png" alt="RATP" title="RATP"  /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/sncf.png" alt="SNCF" title="SNCF" /></li>
                    <!--<li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/club-chauffeur.png" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/chauffeur-prive.png" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/lecab.png" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/snap-car.png" /></li>
                    <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/allo-cab.png" /></li>-->
                    <!--
                     <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/stif.png" /></li>
                     <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/afm.png" /></li>
                     <li><img src="<?php echo base_url(); ?>assets/system_design/images/partners/apf.png" /></li>-->
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="footer-top">
    <div class="container">
        <div class="row">
            <div class="footer-top-inner">
                <div class="col-lg-3 col-md-3 col-sm-6" style="width:33%;">&nbsp;</div>
                <div class="col-lg-9 col-md-9 col-sm-6" style="width:67%;">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <a href="<?php echo site_url();?>contact.php"><span class="send-us-email"><i class="fa fa-envelope"></i> contact@handi-express.fr</span></a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <span class="call-us"><i class="fa fa-phone"></i> Fax 0183628404</span>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <span class="live-support"><i class="fa fa-wechat"></i> Live Support</span>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <a href="<?php echo site_url();?>supporttickets.php"><span class="ticket-support"><i class="fa fa-headphones"></i> Ticket Support</span></a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-inner">
                <div class="col-lg-3 col-md-3 col-sm-6" style="width:33%;">
                    <div class="logo2"><img src="<?php echo base_url(); ?>assets/system_design/images/new_footer_header_images/footerlogo.png" alt="Navetteo Logo" title="Navetteo Logo" /></div>
                    <div class="copyright-left">
                        <?php //    if(isset($site_settings->rights_reserved_content)) { ?>
                        <p>Copyright France © 2010 Handi-Express.fr Tous droits reservés</p>
                        <?php //} ?>
                    </div>
                    <p class="credit-cards"><!--<label><?php echo $this->lang->line('cards_we_accept');?></label>--><img src="<?php echo base_url();?>/assets/system_design/images/credit-cards-logos.png" alt="All Cards we accept" title="All Cards we accept" /></p>
                    <p style="float:left"><a href="http://www.copyrightfrance.com/certificat-depot-copyright-france-28RF1G2.htm" target="_BLANK"><img src="<?php echo base_url();?>/assets/system_design/images/copyright-logo.gif" style="margin-top: 5px;margin-left: 0px" alt="Copyrights" title="Copyrights" /></a></p>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6" style="width:67%;">
                    <!--<div class="row footer-divider">
                      <div class="col-lg-3 col-md-3 col-sm-4">
                          <a href="<?php echo site_url();?>/welcome/contactUs"><span class="footer-support"><i class="fa fa-envelope"></i> dddd Us Email</span></a>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4">
                          <span class="footer-support"><i class="fa fa-phone"></i> Call Us 0208905906</span>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4">
                          <span class="footer-support"><i class="fa fa-wechat"></i> Live Support</span>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4">
                          <a href="<?php echo site_url();?>/welcome/contactUs"><span class="footer-support"><i class="fa fa-headphones"></i> Ticket Support</span></a>
                      </div>
                  </div>-->-->
                    <div class="row">
                        <?php
                        $testimonials = $this->db->get($this->db->dbprefix('testimonials_settings'))->result();
                        // echo "<pre>"; print_r($testimonials); die();
                        // if(count($testimonials)>0) {?>
                        <!--<div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="footer_div">
                          <div class="footer_heading">
                            <h5><?php // echo $this->lang->line('testimonials');?> </h5>
                          </div>
    
                          <div class="footer_social_links">
                            <div  id="testimonials-row">
                              <div class="row">
                                <div class="col-md-12 column">
                                  <div class="carousel slide" id="testimonials-rotate">
                                    <ol class="carousel-indicators">
                                      <li class="active" data-slide-to="0" data-target="#testimonials-rotate"> </li>
                                      <li data-slide-to="1" data-target="#testimonials-rotate"> </li>
                                      <li data-slide-to="2" data-target="#testimonials-rotate"> </li>
                                    </ol>
                                    <div class="carousel-inner">
                                      <?php // $i=0; 
                        //$this->db->select('user_name,content');
                        //$testimonials = $this->db->get_where('vbs_testimonials_settings',array('status'=>'Active'))->result();
                        //foreach($testimonials as $row):?>
                                                              <div class="item <?php // if($i++==0) echo ' active';?>">
                                        <div class="testimonials col-md-10 padding-p-0">
                                          <h3> <?php //echo $row->content; ?><br>
                                            <small class="name"> <?php //echo $row->user_name; ?></small> </h3>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>
                                      <?php //endforeach; ?>
                                    </div>
                                  </div>
                                  <div class="pull-right"> <a class="left" href="#testimonials-rotate" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right" href="#testimonials-rotate" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>-->
                        <?php // } ?>
    
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <div class="footer_div">
                                <div class="footer_heading">
                                    <h5>TRANSPORT PMR REGULIER  <?php echo $this->lang->line('transport_shuttle');?></h5>
                                </div>
                                <!--./footer_heading-->
                                <div class="footer_links">
                                    <ul>
                                        <li> <a href="<?php echo site_url();?>handi-pro.php">HANDI PRO</a></li>
                                        <li><a href="<?php echo site_url();?>handi-business.php">HANDI BUSINESS</a></li>
    
                                        <li><a href="<?php echo site_url();?>handi-soclaire.php">HANDI SCOLAIRE</a></li>
    
    
                                    </ul>
                                </div>
                            </div>
                            <!--./footer_div-->
                        </div>
    
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <div class="footer_div">
                                <div class="footer_heading">
                                    <h5>TRANSPORT PMR A LA DEMANDE</h5>
                                </div>
                                <!--./footer_heading-->
                                <div class="footer_links">
                                    <ul>
                                        <li><a href="<?php echo site_url();?>handi-prive.php">HANDI PRIVE</a></li>
                                        <li><a href="<?php echo site_url();?>handi-shuttle.php">HANDI SHUTTLE</a></li>
                                        <li><a href="<?php echo site_url();?>handi-voyage.php">HANDI VOYAGE</a></li>
                                        <li><a href="<?php echo site_url();?>handi-senior.php">HANDI SENIOR</a></li>
                                        <li><a href="<?php echo site_url();?>handi-medical.php"> HANDI MEDICAL</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--./footer_div-->
                        </div>
    
    
                        <div class="col-lg-3 col-md-3 col-sm-4">
                            <div class="footer_div">
                                <div class="footer_heading">
                                    <h5>INFORMATION<?php echo $this->lang->line('transport_gare');?></h5>
                                </div>
                                <!--./footer_heading-->
                                <div class="footer_links">
                                    <ul>
                                        <li> <a href="<?php echo site_url();?>nos-tarifs.php">Tarifs </a></li>
    
                                        <li> <a href="<?php echo site_url();?>contact.php">Nous Contacter</a></li>
    
                                    </ul>
                                </div>
                            </div>
                            <!--./footer_div-->
                        </div>
    
    
    
                        <!--<div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="footer_div">
                          <div class="footer_heading">
                            <h5><?php echo $this->lang->line('useful_links');?></h5>
                          </div>
                          <div class="footer_links">
                            <ul>
                              <li><a href="<?php echo site_url();?>/services/13">Honfleur & Deauville</a></li>
                              <li><a href="<?php echo site_url();?>/services/14">Plages Des Debarquements</a></li>
                             <li><a href="<?php echo site_url();?>/services/15">Saint Malo & Monto Saint-Michel</a></li>
                            </ul>
                          </div>
                        </div>
                    </div> -->
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="footer_div">
                                <div class="footer_heading">
                                    <h5><?php echo $this->lang->line('usefullinks_page');?></h5>
                                </div>
                                <div class="footer_links">
                                    <ul>
                                        <!--<li><a href="<?php echo site_url(); ?>/welcome/prices"><?php echo $this->lang->line('ourprice_page');?></a></li> -->
                                        <li><a href="<?php echo site_url(); ?>zones.php"><?php echo $this->lang->line('zones_page');?></a></li>
                                        <li><a href="<?php echo site_url(); ?>vehicules.php"><?php echo $this->lang->line('page_fleet');?></a></li>
                                        <li><a href="<?php echo site_url(); ?>knowledgebase.php"><?php echo $this->lang->line('FAQs');?></a></li>
                                        <!-- <li><a href="<?php echo site_url(); ?>/welcome/contactUs"><?php echo $this->lang->line('contact_page');?></a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="footer_div">
                          <div class="footer_heading">
                            <h5>Trans Gare<?php echo $this->lang->line('trans_gare');?></h5>
                          </div>
                          <div class="footer_links">
                            <ul>
                              <li> <a href="#">Trans Institution<?php echo $this->lang->line('trans_institution');?></a></li>
                            </ul>
                          </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="footer_div">
                          <div class="footer_heading">
                            <h5><?php echo $this->lang->line('our_company');?></h5>
                          </div>
    
                          <div class="footer_links">
                            <ul>
                              <li> <a href="<?php echo site_url();?>/welcome/contactUs"><?php echo $this->lang->line('contact_us');?></a></li>
                              <li><a href="<?php echo site_url();?>/welcome/faqs"><?php echo $this->lang->line('FAQs');?></a></li>
                             <li><a href="<?php echo site_url();?>/welcome/testimonials"> <?php echo $this->lang->line('testimonials');?></a></li>
                            </ul>
                          </div>
                        </div>
                    </div> -->
                        <!--./col-lg-3-->
                        <!--
                    <div class="col-lg-3 col-md-3 col-sm-4">
                      <div class="footer_div">
    
                        <div class="footer_heading"> 
                                    <h5><?php echo $this->lang->line('pages');?></h5>
                                    </div>
                        <div class="footer_links">
                          <ul>
                          <?php
                        $this->db->select('id,name,parent_id');
                        $sub_categories = $this->db->get_where('vbs_aboutus',array('is_bottom' => '1','status' => 'Active'))->result();
                        if(count($sub_categories) > 0)
                            foreach($sub_categories as $sub_row) {
    
                                ?>
                                <li><a href="<?php echo site_url(); ?>/page/index/<?php echo $sub_row->id; ?>/<?php echo $sub_row->name;?>"><?php echo $sub_row->name;?></a></li>
    
                                <?php } ?>
                          </ul>
                        </div>
                      </div>
                      <! -- ./footer_div-- > 
                    </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--./container-->
</section>
<section class="bottom_footer">
    <div class="container">
        <div class="row"> 
            <div class="bottom_footer_inner">
                <!--<div class="col-md-3 padding-lr">
                    <div class="copyright-left">
                        <?php if(isset($site_settings->rights_reserved_content)) { ?>
                            <p><?php echo $site_settings->rights_reserved_content;?></p>
                        <?php } ?>
                    </div>
                </div>-->
        
                <div class="col-md-4">
                    <div class="footer-quick-links">
                        <ul>
                            <li>Powered by <a href="http://netsco.biz/cab-booking-script.php" target="_BLANK">CBS V 1.0</a></li>
                            <li>Developed by <a href="http://netsco.biz/" target="_BLANK">NETSCO</a></li>
                        </ul>
                    </div>
                </div>
        
                <div class="col-md-8">
                    <div class="footer-quick-links">
                        <ul>
                            <li><a href="<?php echo site_url();?>conditions-d-utilisation.php"><?php echo $this->lang->line('terms_conditions');?></a></li>
                            <li><a href="<?php echo site_url();?>politique-de-vie-privee.php"><?php echo $this->lang->line('privacy_policy');?></a></li>
                            <li><a href="<?php echo site_url();?>contact.php"><?php echo $this->lang->line('report_abuse');?></a></li>
                            <li><a href="<?php echo site_url();?>mentions-legales.php"><?php echo $this->lang->line('legal_notice');?></a></li>
                        </ul>
                    </div>
                </div>

                <!--<div class="col-md-3 padding-lr">
                    <div class="copyright-left right-foo">
                        <?php //if(isset($site_settings->design_by)) { ?>
                               < ! - - <p><a href="http://digitalvidhya.com" target="_blank"> <?php echo $this->lang->line('design_by');?>  <?php echo  $site_settings->design_by;?></a></p>-- >
                        <?php //} ?>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.min.js"></script>


<script>
    $(function() {
        $(".chzn-select").chosen();
    });
</script>


<!--<script src="<?php echo base_url();?>assets/system_design/scripts/BeatPicker.min.js"></script>-->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/timepicki.js"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/bx-slider.js"></script>
<script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap-datepicker.min.js"></script>
<script>
    $('input.bdatepicker').datepicker({
        format: "dd/mm/yyyy"
    });
    $('#timepicker1').timepicki({
        show_meridian:false,
        min_hour_value:0,
        max_hour_value:23,
        overflow_minutes:true,
        increase_direction:'up',
        disable_keyboard_mobile: true});
    $('#timepicker2').timepicki({
        show_meridian:false,
        min_hour_value:0,
        max_hour_value:23,
        overflow_minutes:true,
        increase_direction:'up',
        disable_keyboard_mobile: true});
    $('#go_time_1, #back_time_1').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});
    $('#go_time_2, #back_time_2').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});
    $('#go_time_3, #back_time_3').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});
    $('#go_time_4, #back_time_4').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});
    $('#go_time_5, #back_time_5').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});
    $('#go_time_6, #back_time_6').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});
    $('#go_time_7, #back_time_7').timepicki({show_meridian:false,min_hour_value:0,max_hour_value:23,overflow_minutes:true,increase_direction:'up',disable_keyboard_mobile: true});

</script>
<?php if(in_array("homebooking",$css_type)) { ?>

    <?php echo $this->load->view('site/common/script'); ?>

<?php } ?>

<?php if(in_array("onlinebooking",$css_type) || in_array("passengerdetails",$css_type)) { ?>

    <?php echo $this->load->view('site/common/online_script'); ?>

<?php } ?>
<!--Date Table-->
<?php if(in_array("datatable",$css_type)) { ?>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/system_design/scripts/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" class="init">

        $(document).ready(function() {
            $('#example').dataTable();
            $('.example').dataTable();
        } );

    </script>
<?php } ?>
<!--Date Table-->



<script type="text/javascript" class="init">



    function setActiveOnlinePackage(id) {
        numid = id.split('_')[1];
        $('#cars_data_list div').removeClass('active');
        $('li').removeClass('active');
        $('#'+id).parent().closest('ul').addClass('active');
        $('#'+id).parent().parent().addClass('car-sel-bx active');

    }

</script>
<!--Slider-->
<?php if(in_array("slider",$css_type)) { ?>
<?php } ?>
<!--Slider-->

<script type="text/javascript">
    $('.partners').bxSlider({
        minSlides: 5,
        maxSlides: 8,
        slideWidth: 240,
        slideMargin: 10,
        infiniteLoop: true,
        auto:true
    });
    $url = "<?php echo site_url(); ?>";
    $lang = $url.split(".fr/");
    if($lang[1] == 'en') {
        $(".liContactUs").css("width","108px");
        $(".liContactUs").css("text-align","center");
        $(".top-links").css("margin-left","0px");
        //  $(".copyright-left").css("font-size","9px");
    }
    else if ($lang[1] == 'fr') {
        $(".liContactUs").css("width","147px");
        $(".liContactUs").css("text-align","center");
        $(".liContactUs a").css("font-size","12px");
        $(".top-links").css("margin-left","-50px");
        //  $(".copyright-left").css("font-size","9px");
    }
    $(".scroll-up > .bx-wrapper").css("max-width","570px");
</script>
</body>
</html>