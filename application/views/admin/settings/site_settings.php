<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'site_settings_form', 'id' => 'site_settings_form');
                  echo form_open('settings/siteSettings',$attributes);?>            
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('site_url');?></label>    
                     <input type="text" name="sitename" value="<?php if(isset($site_settings->site_name))		
                        echo $site_settings->site_name;echo set_value('sitename');?>" /> 
                     <?php echo form_error('sitename');?>
                  </div>
                  <div class="form-group">       
                     <label><?php echo $this->lang->line('address');?></label></label>				
                     <input type="text" name="address" value="<?php if(isset($site_settings->address))				echo $site_settings->address;echo set_value('address'); ?>"/>  
                     <?php echo form_error('address');?>
                  </div>
                  <div class="form-group">      
                     <label><?php echo $this->lang->line('city');?></label>					  
                     <input type="text" name="city" value="<?php if(isset($site_settings->city))					  
                        echo $site_settings->city;echo set_value('city');?>"/>
                     <?php echo form_error('city');?>
                  </div>
                  <div class="form-group">     
                     <label><?php echo $this->lang->line('state');?></label>		
                     <input type="text" name="state" value="<?php if(isset($site_settings->state))					 echo $site_settings->state;echo set_value('state');?>"/>
                     <?php echo form_error('state');?>				  
                  </div>
                  <div class="form-group">        
                     <label><?php echo $this->lang->line('country');?></label>					
                     <input type="text" name="country" value="<?php if(isset($site_settings->country))				echo $site_settings->country;echo set_value('country');?>"/> 
                     <?php echo form_error('country');?>
                  </div>
                  <div class="form-group">             
                     <label><?php echo $this->lang->line('zip_code'); ?></label>			
                     <input type="text" name="zip" value="<?php if(isset($site_settings->zip))					
                        echo $site_settings->zip;echo set_value('zip');?>"/>  
                     <?php echo form_error('zip');?>
                  </div>
                  <div class="form-group">   
                     <label><?php echo $this->lang->line('phone');?></label>				
                     <input type="text" name="phone" value="<?php if(isset($site_settings->phone))					 echo $site_settings->phone;echo set_value('phone');?>"/>
                     <?php echo form_error('phone');?>
                  </div>
                  <div class="form-group">   
                     <label><?php echo $this->lang->line('land_line');?></label>				
                     <input type="text" name="land_line" value="<?php if(isset($site_settings->land_line))					 echo $site_settings->land_line;echo set_value('land_line');?>"/>  
                     <?php echo form_error('land_line');?>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('fax');?></label>                     
                     <input type="text" name="fax" value="<?php if(isset($site_settings->fax))		
                        echo $site_settings->fax;echo set_value('fax');?>"/>  
                     <?php echo form_error('fax');?>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('contact_email');?> </label>					 
                     <input type="text" name="portal_email"  value="<?php if(isset($site_settings->portal_email))				
                        echo $site_settings->portal_email;echo set_value('portal_email');?>"/>
                     <?php echo form_error('portal_email');?>				  
                  </div>
                  <div class="form-group">           
                     <label><?php echo $this->lang->line('currency');?></label>			
                     <?php 					 
                        $country_select = array();
                        if(isset($site_settings->site_country)) {
                        		$country_select = array(								
                        						$site_settings->site_country		
                        						);
                        
                        }	
                         echo form_dropdown('site_country',$country_options,$country_select,'class = "chzn-select"');?>
                  </div>
                  <div class="form-group">           
                     <label><?php echo $this->lang->line('time_zone');?></label>			
                     <?php 					 
                        $time_zone_options_select = array();
                        if(isset($site_settings->time_zone)) {
                        		$time_zone_options_select = array(								
                        						$site_settings->time_zone		
                        						);
                        
                        }	
                         echo form_dropdown('site_timezone',$time_zone_options,$time_zone_options_select,'class = "chzn-select"');?>
                  </div>
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('payment_method');?></label>	</br>
                     <?php $paypal=$this->base_model->run_query('SELECT * from vbs_paypal_settings');
                        // echo ($paypal[0]->status);die();
                        if($paypal[0]->status=="Active"){?>
                     <input type="checkbox" <?php if(($site_settings->paypal) == "1") echo "checked";?>  
                        name="paypal" id="c1" /><?php echo $this->lang->line('paypal');?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                     <?php 	  }?>
                     <input type="checkbox"  <?php if(($site_settings->cash) == "1") echo "checked";?>	
                        name="cash" id="c2"  />  <?php echo $this->lang->line('cash');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
               </div>
               <!-- another div -->            
               <div class="col-md-6">
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('distance_type');?></label>		
                     <?php 					 
                        $distance_type_options = array(						
                        "Km" => "Km",								
                        "Mile" => "Mile"						
                        );													
                        
                        $distance_type_select = array();
                        if(isset($site_settings->distance_type)) {
                        	$distance_type_select = array(								
                        					$site_settings->distance_type		
                        					);
                        
                        }	
                        echo form_dropdown('distance_type',$distance_type_options,$distance_type_select,'class = "chzn-select"');					 ?>      
                  </div>
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('airports');?> </label>		
                     <?php 					 
                        $airports_options = array(						
                        "Enable" => "Enable",								
                        "Disable" => "Disable"						
                        );													
                        
                        $airports_status = array();
                        if(isset($site_settings->airports_status)) {
                        	$airports_status = array(								
                        					$site_settings->airports_status		
                        					);
                        
                        }	  
                        echo form_dropdown('airports',$airports_options,$airports_status,'class = "chzn-select"');					 ?>    
                  </div>
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('day_start_time'); ?></label></label>		
                     <input type="text" name="day_start_time" placeholder="<?php echo $this->lang->line('value_should_be_in_24hrs_format');?>" value="<?php if(isset($site_settings->day_start_time))			
                        echo $site_settings->day_start_time; echo set_value('day_start_time');?>"/> 
                     <?php echo form_error('day_start_time');?>
                  </div>
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('day_end_time');?></label>		
                     <input type="text" name="day_end_time" placeholder="<?php echo $this->lang->line('value_should_be_in_24hrs_format');?>" value="<?php if(isset($site_settings->day_end_time))			
                        echo $site_settings->day_end_time;echo set_value('day_end_time');?>"/>  
                     <?php echo form_error('day_end_time');?>
                  </div>
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('night_start_time');?></label>		
                     <input type="text" name="night_start_time" placeholder="<?php echo $this->lang->line('value_should_be_in_24hrs_format');?>" value="<?php if(isset($site_settings->night_start_time))			
                        echo $site_settings->night_start_time;echo set_value('day_end_time');?>"/> 
                     <?php echo form_error('night_start_time');?>
                  </div>
                  <div class="form-group">               
                     <label><?php echo $this->lang->line('night_end_time');?></label>		
                     <input type="text" name="night_end_time" placeholder="<?php echo $this->lang->line('value_should_be_in_24hrs_format');?>" value="<?php if(isset($site_settings->night_end_time))			
                        echo $site_settings->night_end_time;echo set_value('night_end_time');?>"/> 
                     <?php echo form_error('night_end_time');?> 
                  </div>
                  <div class="form-group" style="display:none;">           
                     <label class="control-label"><?php echo $this->lang->line('email_type');?></label>	
                     <?php 					 
                        $options = array(								
                        "PHP mail" => "PHP mail",					
                        "Sendmail" => "Sendmail",							
                        "Gmail SMTP" => "Gmail SMTP"			
                        );						
                        
                        $select = array();
                        if(isset($site_settings->email_type)) {
                        	$select = array(								
                        					$site_settings->email_type		
                        					);
                        
                        }	
                        echo form_dropdown('email_type',$options,$select,'class = "chzn-select"');					?>                 
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('design_by');?></label>					 
                     <input type="text" name="design_by"  value="<?php if(isset($site_settings->design_by))				
                        echo $site_settings->design_by;echo set_value('design_by');?>"/> 
                     <?php echo form_error('design_by');?>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('rights_reserved');?></label>					 
                     <input type="text" name="rights_reserved_content"  value="<?php if(isset($site_settings->rights_reserved_content))				
                        echo $site_settings->rights_reserved_content;echo set_value('rights_reserved_content');?>"/> <?php echo form_error('rights_reserved_content');?>                 
                  </div>
                  <div class="form-group">           
                     <label class="control-label0000"><?php echo $this->lang->line('date_format');?></label>	
                     <?php 					 
                        $options = array(								
                        "mm/dd/YYYY" => "mm/dd/yyyy",					
                        "YYYY.mm.dd" => "yyyy.mm.dd",							
                        "dd/mm/YYYY"=> "dd/mm/yyyy",
                        "dd.mm.YYYY"=> "dd.mm.yyyy",
                        "dd-mm-YYYY"=> "dd-mm-yyyy",
                        "mm-dd-YYYY"=> "mm-dd-yyyy",
                        "YYYY/mm/dd"=> "yyyy/mm/dd"
                        );
                        
                        $select = array();
                        if(isset($site_settings->date_formats)) {
                        	$select = array(								
                        					$site_settings->date_formats		
                        					);
                        
                        }	
                        echo form_dropdown('date_formats',$options,$select,'class = "chzn-select"');					?>                 
                  </div>
				  
				  
				  <div class="form-group">           
                     <label class="control-label0000"><?php echo $this->lang->line('app_settings');?></label>	
                     <?php 					 
                        $options = array(								
                        "Enable" => "Enable",					
                        "Disable" => "Disable"							
                
                        );
                        
                        $select = array();
                        if(isset($site_settings->app_settings)) {
                        	$select = array(								
                        					$site_settings->app_settings		
                        					);
                        
                        }	
                        echo form_dropdown('app_settings',$options,$select,'class = "chzn-select"');					?>                 
                  </div>
				  
				  <div class="form-group">                    
                     <label><?php echo $this->lang->line('contact_map');?></label>					 
                    <textarea rows="4" cols="40" name="contact_map" ><?php if(isset($site_settings->contact_map)) echo 	$site_settings->contact_map; ?> </textarea>                 
                  </div>
				  
				    
               </div>
               <input type="hidden" value="<?php  if(isset($site_settings->id))
                  echo $site_settings->id;
                  ?>"  name="update_record_id" />
               <div class="col-md-6">  <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" class="right-p"/></div>
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
                 $.validator.addMethod("phoneNumber", function(uid, element) {
                     return (this.optional(element) || uid.match(/^([0-9]*)$/));
                 }, "Please enter valid number.");
                 $.validator.addMethod("Fax", function(uid, element) {
                     return (this.optional(element) || uid.match(/^\+?[0-9]{6,}$/));
                 }, "Please enter valid fax.");
                 //form validation rules
                 $("#site_settings_form").validate({
                     rules: {
                         sitename: {
                             required: true
                         },
                         address: {
                             required: true
                         },
                         city: {
                             required: true
                         },
                         state: {
                             required: true
                         },
                         country: {
                             required: true
                         },
                         zip: {
                             required: true
                         },
                         phone: {
                             required: true,
                             phoneNumber: true,
                             rangelength: [10, 11]
                         },
                         fax: {
                             Fax: true
                         },
                         portal_email: {
                             required: true
                         },
                         currency_code: {
                             required: true
                         },
                         currency_symbol: {
                             required: true
                         },
                         day_start_time: {
                             required: true
                         },
                         day_end_time: {
                             required: true
                         },
                         night_start_time: {
                             required: true
                         },
                         night_end_time: {
                             required: true
                         },
                         design_by: {
                             required: true
                         },
                         rights_reserved_content: {
                             required: true
                         }
                     },
                     messages: {
                         sitename: {
                             required: "<?php echo $this->lang->line('site_name_valid');?>"
                         },
                         address: {
                             required: "<?php echo $this->lang->line('address_valid');?>"
                         },
                         city: {
                             required: "<?php echo $this->lang->line('city_valid');?>"
                         },
                         state: {
                             required: "<?php echo $this->lang->line('state_valid');?>"
                         },
                         country: {
                             required: "<?php echo $this->lang->line('country_valid');?>"
                         },
                         zip: {
                             required: "<?php echo $this->lang->line('zip_code_valid');?>"
                         },
                         phone: {
                             required: "<?php echo $this->lang->line('phone_valid');?>"
                         },
                         portal_email: {
                             required: "<?php echo $this->lang->line('portal_email_valid');?>"
                         },
                         currency_code: {
                             required: "<?php echo $this->lang->line('currency_code_valid');?>"
                         },
                         currency_symbol: {
                             required: "<?php echo $this->lang->line('currency_symbol_valid');?>"
                         },
                         day_start_time: {
                             required: "<?php echo $this->lang->line('day_start_time_valid');?>"
                         },
                         day_end_time: {
                             required: "<?php echo $this->lang->line('day_end_time_valid');?>"
                         },
                         night_start_time: {
                             required: "<?php echo $this->lang->line('night_start_time_valid');?>"
                         },
                         night_end_time: {
                             required: "<?php echo $this->lang->line('night_end_time_valid');?>"
                         },
                         design_by: {
                             required: "<?php echo $this->lang->line('design_by_valid');?>"
                         },
                         rights_reserved_content: {
                             required: "<?php echo $this->lang->line('rights_valid');?>"
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