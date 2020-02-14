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
            <div class="" style="text-align: center;">
                <?php if (count($vehicles) > 0) { ?>
                    <div class="scroll-up">
                        <!--<div class="container-fluid">
                            <div class="container padding-p-0">-->
                                <!--<div class="row">
                                    <div class="col-md-12 padding-p-0">
                                        <div class="hedding-style">  </div>
                                        <hr class="tall">
                                        <aside class="main-hedd"> <?php echo $this->lang->line('cars'); ?></aside>
                                        <h4> <?php echo $this->lang->line('cars'); ?></h4>
                                    </div>
                                </div>-->

                                <div class="row">
                                        <?php foreach ($vehicles as $row): ?>
                                            <div class="col-md-4" style="margin-top:15px;">
                                                <div class="fleets">
                                                    <div class="fleets_head"><h3><?php echo strtoupper($row->name); ?></h3></div>
                                                    <div class="fleet_title_row"><img class="fleets_img" src="<?php echo base_url(); ?>uploads/vehicle_images/<?php if ($row->image) echo $row->image; else echo "noimageavailable.jpg" ?>" title="<?php echo strtoupper($row->name); ?>" alt="<?php echo strtoupper($row->name); ?>"></div>
                                                    <div class="col-md-12 plan_title_row">
                                                        <p class="plan_title"><?php echo $this->lang->line('vehicle_details_caps');?></p>
                                                    </div>
                                                    <div class="col-md-12 fleet_title_row"  style=" margin-top:-10px; text-align: left;margin:0 0 0px;">
                                                       
                                                        <div class="col-md-12" style="padding:0px 0px 10px 0px; margin-top:-10px;">
                                                        <?php 
                                                                echo $this->lang->line('model') . ":  " . $row->model . "<br/>";
                                                                
                                                                echo  "Capacite : " . $row->passengers_capacity ."<br/>";
                                                                
                                                                
                                                                
                                                        ?>
                                                          
                                                       
                                                        
                                                            <?php echo $this->lang->line('fuel_type') . ": " . $row->fuel_type . "<br/>";
                                                                 
                                                                    echo $this->lang->line('cost_type') .": " . $row->cost_type . "<br/>";
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                </div>
                            <!--</div>
                        </div>-->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>