<!--<div class="container padding-p-0 clientarea">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"><?php echo $title;?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="#"> <?php echo $this->lang->line('home_page');?> </a> </li>
               <li>>></li>
               <li class="active"> <a href="#"><?php echo $title;?></a> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>-->
</header>
<div class="container-fluid body-bg">
    <div class="container body-border">
        <div class="breadcrumb">
            <div class="row">
               <aside class="nav-links">
                  <ul>
                     <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home');?>  </a> </li>
                     <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                  </ul>
               </aside>
            </div>
        </div>
        <div class="row">
           <div class="col-md-9 col-md-offset-1">
              <div id="total-login">
                 <!-- <div class="first-row">
                    <div class="login-head">Profile</div>





                    </div> -->
                 <div class="online">
                    <!-- Tab panes -->
                    <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active" id="home">
                          <div class="online-con padding-p-0">
                             <div class="profile-p"> 
                             </div>
                             <?php 
                                $attributes = array("name"=>'change_password_form',"id"=>'change_password_form');

                                echo form_open("users/changePassword",$attributes); ?>
                             <div class="col-md-6">
                                <?php echo $this->session->flashdata('message'); ?>
                                <div class="form-group">
                                   <label><?php echo $this->lang->line('old_password');?></label>
                                   <?php echo form_input($old_password); ?>
                                   <?php echo form_error('old_password'); ?>
                                </div>
                                <div class="form-group">
                                   <label><?php echo $this->lang->line('new_password');?></label>
                                   <?php echo form_input($new_password); ?>
                                   <?php echo form_error('new_password'); ?>
                                </div>
                                <br>
                                <div class="form-group">
                                   <label><?php echo $this->lang->line('change_password_new_password_confirm_label');?></label>
                                   <?php echo form_input($new_password_confirm); ?>
                                   <?php echo form_error('new_password_confirm'); ?>
                                </div>
                                <input type="submit" class="button green_button right" name="submit" value="<?php echo $this->lang->line('change_password_submit_btn'); ?>" style="margin-top:10px;" >
                                <?php echo form_close();?>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
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
   		$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd= $('#password').val();
   			return (this.optional(element) || repwd==pwd);
   		},"<?php echo $this->lang->line('valid_passwords');?>");
   
   		//form validation rules
   
              $("#change_password_form").validate({
                  rules: {
                old: {
                          required: true      
                      },
   	new_password: {
   			  required: true,
   			  rangelength: [8,50]
   		},
   				new_confirm: {
                          required: true,
   			  pwdmatch: true
                      }
                  },
   			messages: {
   				old: {
                          required: "<?php echo $this->lang->line('old_password_valid');?>"
                      },
   	new_password: {
                          required: "<?php echo $this->lang->line('new_password_valid');?>"
                      },
   				new_confirm: {
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