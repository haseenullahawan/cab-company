</header>
    <div class="container-fluid body-bg">
        <div class="container body-border"><!--padding-p-0-->
            <div class="breadcrumb">
                <div class="row">
                   <aside class="nav-links">
                      <ul>
                         <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page');?>  </a> </li>
                         <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                      </ul>
                   </aside>
                </div>
            </div>
            <div class="col-md-12" style="text-align: center;">
                <h2>Trips Available</h2>
                <div class="trip-districts">
                    <img src="<?php echo base_url(); ?>assets/system_design/images/zones.png" style="width: 60%; min-width: 300px" alt="Trip Districts" title="Trip Districts" />
                </div>
            </div>
        </div>
    </div>