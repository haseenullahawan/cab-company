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
                  $attributes = array('name' => 'email_settings_form', 'id' => 'email_settings_form');
                  echo form_open('settings/emailSettings',$attributes);?>            
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('host');?></label>      
                  <input type="text" name="smtp_host" placeholder="<?php echo $this->lang->line('host_name');?>"  value="<?php if(isset($email_settings->smtp_host))		
                     echo $email_settings->smtp_host;echo set_value('smtp_host');?>" />
                  <?php echo form_error('smtp_host');?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('email');?></label>    
                  <input type="text" name="smtp_user" placeholder="<?php echo $this->lang->line('email');?>" value="<?php if(isset($email_settings->smtp_user))		
                     echo $email_settings->smtp_user;echo set_value('smtp_user');?>" /> 
                  <?php echo form_error('smtp_user');?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('password');?></label>    
                  <input type="password" name="smtp_password" placeholder="<?php echo $this->lang->line('password');?>" value="<?php if(isset($email_settings->smtp_password))		
                     echo $email_settings->smtp_password;?>" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('port');?></label>    
                  <input type="text" name="smtp_port" placeholder="<?php echo $this->lang->line('port');?>" value="<?php if(isset($email_settings->smtp_port))		
                     echo $email_settings->smtp_port;echo set_value('smtp_port');?>" />  
                  <?php echo form_error('smtp_port');?>
               </div>
               <input type="hidden" value="<?php  if(isset($email_settings->id))
                  echo $email_settings->id;
                  ?>"  name="update_record_id" />
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
            </div>
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
             $.validator.addMethod("numbersonly", function(a, b) {
                 return this.optional(b) || /^[0-9 ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_number');?>");
             //form validation rules
             $("#email_settings_form").validate({
                 rules: {
                     smtp_host: {
                         required: true
                     },
                     smtp_user: {
                         required: true,
                         email: true
                     },
                     smtp_password: {
                         required: true,
                         rangelength: [8, 30]
                     },
                     smtp_port: {
                         required: true,
                         numbersonly: true,
                         rangelength: [2, 4]
                     }
                 },
                 messages: {
                     smtp_host: {
                         required: "<?php echo $this->lang->line('host_valid');?>"
                     },
                     smtp_user: {
                         required: "<?php echo $this->lang->line('email_valid');?>"
                     },
                     smtp_password: {
                         required: "<?php echo $this->lang->line('password_valid');?>"
                     },
                     smtp_port: {
                         required: "<?php echo $this->lang->line('port_valid');?>"
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