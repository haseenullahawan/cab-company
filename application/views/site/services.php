</header>
    <div class="container-fluid body-bg">
        <div class="container body-border service_page"><!--padding-p-0-->
            <div class="breadcrumb">
                <div class="row">
                   <aside class="nav-links">
                      <ul>
                         <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page');?>  </a> </li>
                         <li><a href="javascript:void(0)">Services</a></li>
                         <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                      </ul>
                   </aside>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?php echo base_url();?>uploads/service_images/<?php echo $service_info->image; ?>" class="service_img" alt="<?php echo $service_info->name;?>" title="<?php echo $service_info->name;?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $service_info->name;?></h2>
                <h5><?php echo $service_info->meta_description;?></h5><br/>
                <!--<div class="price-txt"><i class="fa fa-euro"></i><?php echo $service_info->min_cost;?></div>-->
                <a href="#" class="button light_orange_button" style="margin:0"><?php echo $this->lang->line('book_now'); ?></a>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <?php echo $service_info->description; ?>
            </div>
        </div>
    </div>