<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Hotel Settings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
                <!--<h3><?php // echo $title;?></h3>-->
                <a class="btn btn-primary add-btn" href="<?php echo site_url();?>/settings/hotels"> <i class="fa fa-list">&nbsp;<?php echo $this->lang->line('hotels');?></i></a>
            </div>
            <?php 
               $attributes = array('name' => 'add_hotels_form', 'id' => 'add_hotels_form');
               echo form_open("settings/hotels/".$operation,$attributes) ?>
            <div class="module-body" style="border:none !important;">
                <div class="col-md-6">
                    <div class="form-group">                    
                       <label><?php echo $this->lang->line('hotel_name');?></label>    
                       <input type="text" class="hotel_name" name="hotel_name" placeholder="<?php echo $this->lang->line('enter_hotel_name');?>" value="<?php 
                          if(isset($hotel_rec->hotel_name))
                          echo $hotel_rec->hotel_name;echo set_value('hotel_name');
                          ?>" />    
                    </div>
                    <?php echo form_error('hotel_name');?>
                    <div class="form-group">                     
                       <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                       <?php 					 
                          $options = array(						
                          "Active" => "Active",
                          "Inactive" => "Inactive"								

                          );	

                          $select = array();
                          if(isset($hotel_rec->status)) {
                          $select = array(								
                                             $hotel_rec->status		
                                             );					  			
                          }
                          echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 

                          ?>   
                    </div>
               </div>
                <div class="col-md-6">
                    <label><?php echo $this->lang->line('hotel_address');?></label>    
                    <textarea class="location" name="hotel_address" id="hotel_address" rows="6" style="height:auto;"><?php 
                          if(isset($hotel_rec->address))
                          echo $hotel_rec->address;echo set_value('hotel_address');
                          ?></textarea>
                </div>
                 <?php echo form_error('hotel_address');?>
                <?php 
                    if($operation == "Add" ) {?>
                 <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
                 <?php } else { ?>
                 <input type="hidden" value="<?php echo $hotel_rec->id?>" name="update_rec_id">
                 <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
                 <?php } ?> 
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("lettersonly", function(a, b) {
                return this.optional(b) || /^[a-z ]+$/i.test(a)
            }, "Please enter valid hotel name.");
            //form validation rules
            $("#add_hotels_form").validate({
                rules: {
                    hotel_name: {
                        required: true,
                    },
                },
                messages: {
                    hotel_name: {
                        required: "<?php echo $this->lang->line('hotel_valid');?>"
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);

</script>
 <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script>
/*$(".airprt_name").geocomplete({	 
            country: '<?php //  echo $site_settings->site_country;?>'	 
     });*/
</script>