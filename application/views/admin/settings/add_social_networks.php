<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <?php echo $this->session->flashdata('message');?>              
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'social_networks_form', 'id' => 'social_networks_form');
                  echo form_open("settings/socialNetworks",$attributes) ?>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('facebook');?></label>    
                  <input type="text" name="facebook" placeholder="<?php echo $this->lang->line('url_order');?>" value="<?php if(isset($network_settings->facebook))		
                     echo $network_settings->facebook;?>" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('twitter');?></label>    
                  <input type="text" name="twitter" placeholder="<?php echo $this->lang->line('url_order');?>" value="<?php if(isset($network_settings->twitter))		
                     echo $network_settings->twitter;?>" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('linked_in');?></label>    
                  <input type="text" name="linkedin" placeholder="<?php echo $this->lang->line('url_order');?>" value="<?php if(isset($network_settings->linkedin))		
                     echo $network_settings->linkedin;?>" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('google_plus');?></label>    
                  <input type="text" name="google_plus" placeholder="<?php echo $this->lang->line('url_order');?>" value="<?php if(isset($network_settings->google_plus))		
                     echo $network_settings->google_plus;?>" />    
               </div>
               <input type="hidden" value="<?php  if(isset($network_settings->id))
                  echo $network_settings->id;
                  ?>"  name="update_rec_id" />
               <div class="col-md-6"> 
                  <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" /> 
               </div>
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
             }, "<?php echo $this->lang->line('valid_name');?>");
             //form validation rules
             $("#social_networks_form").validate({
                 rules: {
                     facebook: {
                     },
                     twitter: {
                     },
                     linkedin: {
                     },
                     google_plus: {
                     }
                 },
                 messages: {
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