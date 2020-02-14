<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
<style>
    .left-side-cont {
        margin:0px 0px 10px 10px;
    }
</style>
</header>
<div class="container body-border contact_page"> 
        <div class="breadcrumb">
            <div class="row">
                <aside class="nav-links">
                    <ul>
                        <li><a href="<?php echo site_url(); ?>/"><i class="fa fa-home"></i>  <?php echo $this->lang->line('home_page');?> </a></li>
                        <li class="active"><a href="javascript:void(0)"><?php echo $title; ?> </a></li>
                    </ul>
                </aside>
            </div> 
        </div>
    <div class="row">
      <div class="col-md-6">
	   <?php echo $this->session->flashdata('message'); ?> 
          <article class="left-side-cont">
  <?php 
			  $attributes = array("name" => 'contact_form', 'id' => "contact_form", "enctype" => 'multipart/form-data');
			  echo form_open("welcome/contactUs",$attributes); ?> 
            	<div class="row">
            		<div class="col-md-2">
            			<div class="form-group">
            				<label> Civilité <span class="mandatory">*</span></label>                                
            				<select class="form-control" name="civility">
            					<option value="Mr">Mr</option>
            					<option value="Mrs">Mrs</option>
            				</select>
            			</div>
            		</div>
            		<div class="col-md-5">
            			<div class="form-group">
            				<label> Prénom <span class="mandatory">*</span></label>
            				<input type="text" class="user form-control" name="first_name" placeholder="Prénom" value="" required>
            			</div>
            		</div>
            		<div class="col-md-5">
            			<div class="form-group">
            				<label>Nom <span class="mandatory">*</span></label>
            				<input type="text" name="last_name" class="user-name form-control" placeholder="Nom de famille" value="" required>
            			</div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-4">
            			<div class="form-group">
            				<label>Entreprise ou Organisme</label>
            				<input type="text" name="company_name" class="user-name form-control" placeholder="Entreprise" value="">
            			</div>
            		</div>
            		<div class="col-md-4">
            			<div class="form-group">
            				<label>Email <span class="mandatory">*</span></label>
            				<input type="text" name="email" class="user-name form-control" placeholder="Email" value="" required>
            			</div>
            		</div>
            		
            		<div class="col-md-4">   
            			<div class="form-group"><label> Téléphone <span class="mandatory">*</span></label>
            				<input type="text" class="phone1 form-control" name="telephone" maxlength="11" placeholder="Téléphone" value="" required>
            			</div>
            		</div>
            	</div>
            	<div class="row">
            	   <!-- <div class="col-md-2">   
            			<div class="form-group"><label> Phone <span class="mandatory">*</span></label>
            				<input type="text" class="phone1 form-control" name="telephone" maxlength="11" placeholder="Phone" value="">
            			</div>
            		</div> -->
            		
            		
            		<div class="col-md-4">   
            			<div class="form-group"><label>Mobile</label>
            				<input type="text" class="phone1 form-control" name="mobile" maxlength="11" placeholder="Mobile" value="">
            			</div>
            		</div>
            		<div class="col-md-4">
            			<div class="form-group">
            				<label>Department <span class="mandatory">*</span></label>  
            				 <select class="form-control" name="department">
            					<option value="10">Booking service</option>
            					<option value="11">Clients Service</option>
            					<option value="12">Driver Service</option>
            					<option value="13">Accounting Service</option>
            					<option value="14">Sales Department</option>
            					<option value="15">Technical Service</option>
            					<option value="16">Disclaimer Service</option>
            				</select>
            			</div>
            		</div>
            		<div class="col-md-4">
            			<div class="form-group">
            				<label>Priorité  <span class="mandatory">*</span></label>
            				<select class="form-control" name="priority">
            					<option value="High">High</option>
            					<option value="Medium">Medium</option>
            					<option value="Low">Low</option>
            				</select>
            			</div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-12">    
            			<div class="form-group">
            				<label> Objet  <span class="mandatory">*</span></label>
            				<input type="text" name="subject" class="user-name form-control" placeholder="Objet" value="" required>
            			</div>
            		</div>
            		<div class="col-md-12">    
            			<div class="form-group">
            				<label> Message  <span class="mandatory">*</span></label>
            				<textarea class="message form-control" name="visit_message" placeholder="Votre message" rows="25" required></textarea>
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label> Télécharger </label>
            				<input class="form-control" type="file" name="attachments[]" multiple placeholder="Télécharger" />
            			</div>
            			<div id="fileuploads"></div>
            			<div class="clearfix"></div>
            		</div>
            		<div class="col-md-4"><a href="#" style="margin-top:35px;float:left;" onclick="extraTicketAttachment();return false" class="fupload"><img class="add" src="<?php echo base_url(); ?>assets/system_design/images/add.png" align="absmiddle" border="0"> <span class="add-file">Ajouter un Ficher</span></a></div>
            	    <div class="col-md-2"><br/>
                        <input type="submit" name="submit" value="<?php echo $this->lang->line('contact_us_button');?>" class="button green_button right">
			        </div>
            	</div>  
			  <!--
        <div class="col-md-6">
            <div class="fg"><label> <?php echo $this->lang->line('name');?> </label>
			
              <input type="text" class="user"  name="name" placeholder="" value="<?php echo set_value('name'); ?>"><?php echo form_error('name'); ?></div>
              
			  
              <div class="fg"><label> <?php echo $this->lang->line('phone');?> / <?php echo $this->lang->line('mobile');?>: * </label>
              <input type="text" class="phone1"  name="contact_no" maxlength="11" placeholder="" value="<?php echo set_value('contact_no');?>"><?php echo form_error('contact_no');?></div>
			  
        </div>
        <div class="col-md-6">   <div class="fg"><label><?php echo $this->lang->line('email');?>: * </label>
              <input type="text"  name="email" class="user-name"  placeholder="" value="<?php echo set_value('email');?>"><?php echo form_error('email');?></div>
              
			  
              <div class="fg"><label><?php echo $this->lang->line('booking_reference');?> : </label>
              <input type="text"  name="booking_no" placeholder="" value="<?php echo set_value('booking_no');?>"></div>
        </div>
			
		   
          <div class="col-md-12">    <div class="fg"><label> <?php echo $this->lang->line('message');?> </label>
            <textarea class="message" name="message"><?php echo set_value('booking_no');?></textarea><?php echo form_error('message');?> </div></div>
            
            

			
			<div class="col-md-12"><br/>
                            <input type="submit" name="submit" value="<?php echo $this->lang->line('contact_us_button');?>" class="button green_button pull-left">
			</div>
			-->

		<?php echo form_close();?>	
          </article> 
      </div>
        <div class="col-md-6">
            <div class="benefits">
                <div class="titleBox">
                    <h4><?php echo $this->lang->line('benefits'); ?></h4>
                    <h6><?php echo $this->lang->line('benefits_txt'); ?></h6>
                </div>
                <div class="infoBox">
                    <div class="col-md-2 wallet"><i class="fa fa-money"></i></div>
                    <div class="col-md-10">
                        <div class="wallet">
                            <h5><?php echo $this->lang->line('value_for_money'); ?></h5>
                            <h6><?php echo $this->lang->line('value_for_money_txt'); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="infoBox">
                    <div class="col-md-2 customer-service"><i class="fa fa-headphones"></i></div>
                    <div class="col-md-10">
                        <div class="wallet">
                            <h5><?php echo $this->lang->line('customer_service'); ?></h5>
                            <h6><?php echo $this->lang->line('customer_service_txt'); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="infoBox">
                    <div class="col-md-2 easy-use"><i class="fa fa-leaf"></i></div>
                    <div class="col-md-10">
                        <div class="wallet">
                            <h5><?php echo $this->lang->line('easy_of_use'); ?></h5>
                            <h6><?php echo $this->lang->line('easy_of_use_txt'); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
    </div>  
      <!--<div class="col-md-6">
	  
		
        <div class="right-side-cont">
          <div class="services con">
           <div class="right-side-hed ">
            <?php echo $this->lang->line('address');?>
        </div>
            <strong><?php echo $site_settings->design_by;?></strong><br>
	<?php echo $site_settings->address.", ".$site_settings->city.", ".$site_settings->state.", ".$site_settings->country.", ".$site_settings->zip;?>
          </div>
        </div>
		
	
		
      </div>-->
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
   		},"<?php echo $this->lang->line('valid_phone_number');?>");
		
		
		$.validator.addMethod("bookingrefno", function(uid, element) {
   			return (this.optional(element) || uid.match(/^\d{12}$/));
   		},"<?php echo $this->lang->line('valid_booking_no');?>");
   		
   		
   		//form validation rules
              $("#contact_form").validate({
                  rules: {
                      name: {
                          required: true,
						  lettersonly: true
                      },
   				contact_no: {
                          required: true,
						  phoneNumber: true,
						rangelength: [10, 11]
                      },
				email:{
					required: true,
					email: true
				},
				message:{
					required:true
				}
                  },
   			
   			messages: {
   				name: {
                          required: "<?php echo $this->lang->line('name_valid');?>"
                      },
   				contact_no: {
                          required: "<?php echo $this->lang->line('phone_valid');?>"
                      },
				email:{
					required: "<?php echo $this->lang->line('email_valid');?>"
				},
				message:{
					required: "<?php echo $this->lang->line('message_valid');?>"
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
