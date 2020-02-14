</header>
<div class="container-fluid">
    <div class="container padding-p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="right-side-cont">
                    <?php if (isset($site_settings->contact_map) && $site_settings->contact_map != "") { ?>
                        <div class="services con">
                            <div class="right-side-hed ">
                                <?php echo $this->lang->line('map'); ?>
                            </div>
                            <?php echo $site_settings->contact_map; ?>
                        </div>
                    <?php } ?>
                    <!--<div class="services con">
                        <div class="right-side-hed ">
                            <?php echo $this->lang->line('address'); ?>
                        </div>
                        <strong><?php echo $site_settings->design_by; ?></strong><br>
                        <?php echo $site_settings->address . ", " . $site_settings->city . ", " . $site_settings->state . ", " . $site_settings->country . ", " . $site_settings->zip; ?>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="left-side-cont">
                    <article class="content">
                        <?php
                        $attributes = array("name" => 'contact_form', 'id' => "contact_form");
                        echo form_open("welcome/contactUs", $attributes);
                        ?>
                        <div class="col-md-3">
                            <div class="fg">
                                <label> Civility <?php echo $this->lang->line('civility'); ?> </label> 
                                <select name="civility">
                                    <option value="Select">Select</option>
                                    <option value="<?php echo set_value('name'); ?>"><?php echo form_error('name'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fg">
                                <label><?php echo $this->lang->line('first_name'); ?> </label> 
                                <?php echo form_error('first_name'); ?>
                                <input type="text"  name="first_name" placeholder="First Name" value="<?php echo set_value('first_name'); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fg">
                                <label><?php echo $this->lang->line('last_name'); ?> </label> 
                                <?php echo form_error('last_name'); ?>
                                <input type="text"  name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fg">
                                <label><?php echo $this->lang->line('company'); ?> </label> 
                                <?php echo form_error('company'); ?>
                                <input type="text"  name="company" placeholder="Company" value="<?php echo set_value('company'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label><?php echo $this->lang->line('email'); ?> </label> 
                                <?php echo form_error('email'); ?>
                                <input type="text"  name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label><?php echo $this->lang->line('phone'); ?> / <?php echo $this->lang->line('mobile'); ?>: * </label> 
                                <?php echo form_error('contact_no'); ?>
                                <input type="text"  name="contact_no" placeholder="Phone" value="<?php echo set_value('contact_no'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label><?php echo $this->lang->line('fax'); ?> </label> 
                                <?php echo form_error('fax'); ?>
                                <input type="text"  name="fax" placeholder="Fax" value="<?php echo set_value('fax'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label><?php echo $this->lang->line('address'); ?> </label> 
                                <?php echo form_error('address'); ?>
                                <input type="text"  name="address" placeholder="Address" value="<?php echo set_value('address'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label><?php echo $this->lang->line('city'); ?> </label> 
                                <?php echo form_error('city'); ?>
                                <input type="text"  name="city" placeholder="City" value="<?php echo set_value('city'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label>Zip Code <?php echo $this->lang->line('zipcode'); ?> </label> 
                                <?php echo form_error('zipcode'); ?>
                                <input type="text"  name="zipcode" placeholder="Zip Code" value="<?php echo set_value('zipcode'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <label>Subject <?php echo $this->lang->line('subject'); ?> </label> 
                                <?php echo form_error('subject'); ?>
                                <input type="text" name="subject" placeholder="Subject" value="<?php echo set_value('subject'); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fg">
                                <label>Department <?php echo $this->lang->line('department'); ?> </label> 
                                <?php echo form_error('department'); ?>
                                <select name="department">
                                    <option value="1" selected="selected">Service Department</option>
                                    <option value="3">Service Commercial</option>
                                    <option value="5">Service Comptablité</option>
                                    <option value="6">Service Client</option>
                                    <option value="2">Service Régulation</option>
                                    <option value="4">Service Parc</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fg">
                                <label>Service Description <?php echo $this->lang->line('service_description'); ?> </label> 
                                <?php echo form_error('service_description'); ?>
                                <input type="text"  name="service_description" placeholder="Service Description" value="<?php echo set_value('service_description'); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="fg">
                                <label>Priority <?php echo $this->lang->line('priority'); ?> </label> 
                                <?php echo form_error('priority'); ?>
                                <select name="priority">
                                    <option value="">Priority</option>
                                    <option value="High">Haute</option>
                                    <option value="Medium">Moyenne</option>
                                    <option value="Low">Faible</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">    
                            <div class="fg">
                                <label> <?php echo $this->lang->line('message'); ?> </label>
                                <?php echo form_error('message'); ?> 
                                <textarea cols="" rows="" name="message" value="<?php echo set_value('booking_no'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fg">
                                <?php echo form_error('file'); ?>
                                <input type="file"  name="file" placeholder="File" value="<?php echo set_value('file'); ?>">
                            </div>
                        </div>
                        <div class="col-md-12"><br/>
                            <input type="submit" name="submit" value="<?php echo $this->lang->line('submit'); ?>" class="button green_button">
                        </div>

                        <?php echo form_close(); ?>	
                    </article>
                </div>
            </div>
         </div>
    </div>
</div>


<script type="text/javascript">
    (function ($, W, D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
                {
                    setupFormValidation: function ()
                    {
                        //Additional Methods			

                        $.validator.addMethod("lettersonly", function (a, b) {
                            return this.optional(b) || /^[a-z ]+$/i.test(a)
                        }, "<?php echo $this->lang->line('valid_name'); ?>");

                        $.validator.addMethod("phoneNumber", function (uid, element) {
                            return (this.optional(element) || uid.match(/^([0-9]*)$/));
                        }, "<?php echo $this->lang->line('valid_phone_number'); ?>");


                        $.validator.addMethod("bookingrefno", function (uid, element) {
                            return (this.optional(element) || uid.match(/^\d{12}$/));
                        }, "<?php echo $this->lang->line('valid_booking_no'); ?>");


                        //form validation rules
                        $("#contact_form").validate({
                            rules: {
                                first_name: {
                                    required: true,
                                    lettersonly: true
                                },
                                last_name: {
                                    required: true,
                                    lettersonly: true
                                },
                                contact_no: {
                                    required: true,
                                    phoneNumber: true,
                                    rangelength: [10, 11]
                                },
                                email: {
                                    required: true,
                                    email: true
                                },
                                message: {
                                    required: true
                                }
                            },
                            messages: {
                                first_name: {
                                    required: "<?php echo $this->lang->line('first_name_valid'); ?>"
                                },
                                last_name: {
                                    required: "<?php echo $this->lang->line('last_name_valid'); ?>"
                                },
                                contact_no: {
                                    required: "<?php echo $this->lang->line('phone_valid'); ?>"
                                },
                                email: {
                                    required: "<?php echo $this->lang->line('email_valid'); ?>"
                                },
                                message: {
                                    required: "<?php echo $this->lang->line('message_valid'); ?>"
                                }
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    }
                }

        //when the dom has loaded setup form validation rules
        $(D).ready(function ($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
</script>
