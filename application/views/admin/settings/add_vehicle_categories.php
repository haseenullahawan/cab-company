<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Vehicles Settings >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <?php 
               $attributes = array('name' => 'add_vehicle_categories_form', 'id' => 'add_vehicle_categories_form');
               echo form_open("settings/vehicleCategories/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('category');?></label>    
                  <input type="text" name="category" placeholder="<?php echo $this->lang->line('eg_premimum_general_etc');?>" value="<?php 
                     if(isset($vehicle_category_rec->category))
                     echo $vehicle_category_rec->category;echo set_value('category');
                     ?>" />    
                  <?php echo form_error('category');?>
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($vehicle_category_rec->status)) {
                     $select = array(								
                     			$vehicle_category_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?>   
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php } else { ?>
               <input type="hidden" value="<?php echo $vehicle_category_rec->id?>" name="update_rec_id">
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
              }, "<?php echo $this->lang->line('valid_vehicle_category');?>");
              //form validation rules
              $("#add_vehicle_categories_form").validate({
                  rules: {
                      category: {
                          required: true,
                      },
                  },
                  messages: {
                      category: {
                          required: "<?php echo $this->lang->line('vehicle_category_valid');?>"
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