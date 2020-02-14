<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Users >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'add_customers_form', 'id' => 'add_customers_form');
                   echo form_open("admin/addCustomers/".$operation,$attributes) ?>
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('first_name');?></label>    
                     <input type="text" name="first_name" placeholder="<?php echo $this->lang->line('first_name');?>"  value="<?php 
                        if(isset($user->first_name))
                        echo $user->first_name;echo set_value('first_name');
                        ?>" />    
                     <?php echo form_error('first_name');?>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('last_name');?></label>    
                     <input type="text" name="last_name" placeholder="<?php echo $this->lang->line('last_name');?>"  value="<?php 
                        if(isset($user->last_name))
                        echo $user->last_name;
                        ?>" />    
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('email');?></label>    
                     <input type="text" name="email" placeholder="<?php echo $this->lang->line('customer_email');?>" value="<?php 
                        if(isset($user->email))
                        echo $user->email;echo set_value('email');
                        ?>" />   
                     <?php echo form_error('email');?>				  
                  </div>
                   <div class="form-group">                    
                     <label><?php echo $this->lang->line('address');?> 1</label>    
                     <input type="text" name="address1" placeholder="<?php echo $this->lang->line('address1');?>" value="<?php echo set_value('address1');?>" />
                     <?php echo form_error('address1');?>				   
                  </div>
                   <div class="form-group">                     
                     <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                     <?php 					 
                        $options = array(						
                        "1" => "Active",
                        "0" => "Inactive"								
                        );	
                        
                        $select = array();
                        if(isset($user->active)) {
                        $select = array(								
                        			$user->active		
                        			);					  			
                        }
                        echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                        
                        ?>   
                  </div>
                  
               </div>
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('password');?></label>    
                     <input type="password" name="password" placeholder="<?php echo $this->lang->line('password');?>" id="password" value="<?php echo set_value('password');?>"/>  
                     <?php echo form_error('password');?>				   
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('confirm_password');?></label>    
                     <input type="password" name="confirm_password" placeholder="<?php echo $this->lang->line('confirm_password');?>" value="<?php echo set_value('confirm_password');?>" />
                     <?php echo form_error('confirm_password');?>				   
                  </div>
                   <div class="form-group">                    
                     <label><?php echo $this->lang->line('phone');?></label>    
                     <input type="text" name="phone" placeholder="<?php echo $this->lang->line('customer_phone');?>" value="<?php 
                        if(isset($user->phone))
                        echo $user->phone;echo set_value('phone');
                        ?>" />     
                     <?php echo form_error('phone');?>
                  </div>
                   
                   <div class="form-group">                    
                     <label><?php echo $this->lang->line('address');?> 2</label>    
                     <input type="text" name="address2" placeholder="<?php echo $this->lang->line('address2');?>" value="<?php echo set_value('address2');?>" />
                     <?php echo form_error('address2');?>				   
                  </div>
                  
                  <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
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
             $.validator.addMethod("pwdmatch", function(repwd, element) {
                 var pwd = $('#password').val();
                 return (this.optional(element) || repwd == pwd);
             }, "<?php echo $this->lang->line('valid_passwords');?>");
             $.validator.addMethod("lettersonly", function(a, b) {
                 return this.optional(b) || /^[a-z ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_name');?>");
             $.validator.addMethod("phoneNumber", function(uid, element) {
                 return (this.optional(element) || uid.match(/^([0-9]*)$/));
             }, "<?php echo $this->lang->line('valid_phone_number');?>");
             //form validation rules
             $("#add_customers_form").validate({
                 rules: {
                     first_name: {
                         required: true,
                         lettersonly: true,
                         rangelength: [1, 30]
                     },
                     last_name: {
                         lettersonly: true
                     },
                     email: {
                         required: true,
                         email: true
                     },
                     phone: {
                         required: true,
                         phoneNumber: true,
                         rangelength: [10, 11]
                     },
                     password: {
                         required: true,
                         rangelength: [8, 30]
                     },
                     confirm_password: {
                         required: true,
                         pwdmatch: true
                     }
                 },
                 messages: {
                     first_name: {
                         required: "<?php echo $this->lang->line('first_name_valid');?>"
                     },
                     email: {
                         required: "<?php echo $this->lang->line('email_valid');?>"
                     },
                     phone: {
                         required: "<?php echo $this->lang->line('phone_valid');?>"
                     },
                     password: {
                         required: "<?php echo $this->lang->line('password_valid');?>"
                     },
                     confirm_password: {
                         required: "<?php echo $this->lang->line('confirm_password_valid');?>"
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