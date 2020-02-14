<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <!----><?php 
                  $attributes = array('name' => 'paypal_settings_form', 'id' => 'paypal_settings_form');
                  echo form_open_multipart('settings/paypalSettings',$attributes) ;?>            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('paypal_email');?></label>    
                  <input type="text" name="paypalemail" 
                     value= "<?php if(isset($paypal_settings->paypal_email))		
                        echo $paypal_settings->paypal_email;echo set_value('paypalemail');?>" />  
                  <?php echo form_error('paypalemail');?>
               </div>
               <div class="form-group">           
                  <label class="control-label"><?php echo $this->lang->line('currency');?></label>	
                  <?php 					 
                     $select = array();
                     if(isset($paypal_settings->currency)) {
                     		$select = array(								
                     						$paypal_settings->currency
                     						);
                     
                     }	
                      echo form_dropdown('currency',$currency_opts,$select,'class = "chzn-select"');					?>   
               </div>
               <div class="form-group">           
                  <label class="control-label"><?php echo $this->lang->line('account_type');?></label>	
                  <?php 					 
                     $options = array(								
                     "sandbox"=>"sandbox","live"=>"live"		
                     );						
                     
                     $select = array();
                     if(isset($paypal_settings->account_type)) {
                     	$select = array(								
                     					$paypal_settings->account_type	
                     					);
                     
                     }	
                     echo form_dropdown('account_type',$options,$select,'class = "chzn-select"');					?>                 
               </div>
            <!--   <div class="form-group">           
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>	
                  <?php 					 
                     $options = array(								
                     "Active"=>"Active","Inactive"=>"Inactive"	
                     );						
                     
                     $select = array();
                     if(isset($paypal_settings->status)) {
                     	$select = array(								
                     					$paypal_settings->status
                     					);
                     
                     }	
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					?>     
               </div>	-->
               <input type="hidden" value="<?php  if(isset($paypal_settings->id))
                  echo $paypal_settings->id;
                  ?>"  name="update_record_id" />
               <div class="form-group">
                  <label class="control-label"><?php echo $this->lang->line('logo_image');?></label>
                  <input type="file" name="userfile" size="20"  />
               </div>
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php echo form_close();?>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //form validation rules
             $("#paypal_settings_form").validate({
                 rules: {
                     paypalemail: {
                         required: true,
                         email: true
                     }
                 },
                 messages: {
                     paypalemail: {
                         required: "<?php echo $this->lang->line('paypal_email_valid');?>"
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