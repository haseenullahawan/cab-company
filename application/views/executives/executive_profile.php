<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <h3><?php echo $title;?></h3>
            </div>
            <?php 
               $attributes = array("name" => 'profile_form',"id" => 'profile_form');
               echo form_open_multipart('executive/profile',$attributes); ?>
            <div class="module-body">
               <?php echo $this->session->flashdata('message'); ?>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('user_name');?></label>											
                  <input type="text" name="user_name" value="<?php 
                     if(isset($admin_details->username)) echo $admin_details->username;echo set_value('user_name');
                     ?>" />         
               </div>
               <?php echo form_error('user_name');?>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('email');?></label>											
                  <input type="text" name="email" value="<?php 
                     if(isset($admin_details->email)) echo $admin_details->email;echo set_value('email');
                     ?>"/>         
               </div>
               <?php echo form_error('email');?>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('first_name');?></label>											
                  <input type="text" name="first_name" value="<?php 
                     if(isset($admin_details->first_name)) echo $admin_details->first_name;echo set_value('first_name');
                     ?>"/>         
               </div>
               <?php echo form_error('first_name');?>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('last_name');?></label>											
                  <input type="text" name="last_name" value="<?php 
                     if(isset($admin_details->last_name)) echo $admin_details->last_name;
                     ?>"/>         
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('phone');?></label>											
                  <input type="text" name="phone" value="<?php 
                     if(isset($admin_details->phone)) echo $admin_details->phone;echo set_value('phone');
                     ?>"/>         
               </div>
               <?php echo form_error('phone');?>
               <!-- <div class="form-group">                    
                  <label><?php //echo $this->lang->line('photo');?></label>    
                              <input type="file" name="userfile" />    
                  </div> -->
               <input type="hidden" name="update_rec_id" value="<?php if(isset($admin_details->id)) echo $admin_details->id;?>" />                 		
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
   $.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"<?php echo $this->lang->line('valid_name');?>");
   		
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([0-9]*)$/));
   		},"<?php echo $this->lang->line('valid_number');?>");
   
   
   
   		
   		
   		//form validation rules
              $("#profile_form").validate({
                  rules: {
                      user_name: {
                          required: true,
   			  lettersonly: true
                      },
   				
   	email:{
   		required: true,
   		email: true
   	},
   	phone: {
                          required: true,
   			  phoneNumber: true,
   			rangelength: [10, 11]
                      },
   	first_name:{
   		required: true,
   		lettersonly: true
   		
   	}
   	
                  },
   			
   			messages: {
   				user_name:{
   		required: "<?php echo $this->lang->line('user_name_valid');?>"
   	},
   	email:{
   		required: "<?php echo $this->lang->line('email_valid');?>"
   	},
   	phone:{
   		required: "<?php echo $this->lang->line('phone_valid');?>"
   	},
   	first_name:{
   		required: "<?php echo $this->lang->line('first_name_valid');?>"
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