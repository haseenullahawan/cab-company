<?php $locale_info = localeconv(); ?>
<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <?php 
               $attributes = array('name' => 'waiting_settings_form', 'id' => 'waiting_settings_form');
               echo form_open("settings/waitings/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('waiting_time');?></label>    
                  <input type="text" name="waiting_time" placeholder="<?php echo $this->lang->line('in_mins');?>" value="<?php 
                     if(isset($waiting_rec->waiting_time))
                     echo $waiting_rec->waiting_time;echo set_value('waiting_time');
                     ?>" />    
                  <?php echo form_error('waiting_time');?>
               </div>
               <div>
                  <label><?php echo $this->lang->line('cost')." (".$locale_info['currency_symbol'].")";?></label>
                  <input type="text" name="cost" placeholder="<?php echo $this->lang->line('cost');?>" value="<?php 
                     if(isset($waiting_rec->cost))
                     echo $waiting_rec->cost;echo set_value('cost');?>"/>
                  <?php echo form_error('cost');?>
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>
                  <?php
                     $options=array("Active"=>"Active","Inactive"=>"Inactive");
                     
                     $select=array();
                     if(isset($waiting_rec->status))
                     {
                     	$select=array($waiting_rec->status);
                     }
                      
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');
                     
                      ?>
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php   } 
                  else { 
                  ?>
               <input type="hidden" value="<?php if(isset($waiting_rec->id)) echo $waiting_rec->id?>" name="update_rec_id">
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php } ?>     
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("proper_value", function(uid, element) {
                return (this.optional(element) || uid.match(/^((([0-9]*)[\.]([0-9]{2}))|([0-9]*))$/));
            }, "<?php echo $this->lang->line('valid_proper');?>");
            $.validator.addMethod("numbersonly", function(a, b) {
                return this.optional(b) || /^[0-9 ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_numbers');?>");
            //form validation rules
            $("#waiting_settings_form").validate({
                rules: {
                    waiting_time: {
                        required: true,
                        numbersonly: true
                    },
                    cost: {
                        required: true,
                        proper_value: true
                    }
                },
                messages: {
                    waiting_time: {
                        required: "<?php echo $this->lang->line('waiting_time_valid');?>"
                    },
                    cost: {
                        required: "<?php echo $this->lang->line('cost_valid');?>"
                    }
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