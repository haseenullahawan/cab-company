<?php $locale_info = localeconv(); ?>
<link href="<?php echo base_url(); ?>assets/system_design/css/simple-rating.css" rel="stylesheet">
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/common/alert');?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                    </div>
                    <div class="module-body">
                        <?=form_open("admin/notifications/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select name="notification_status" id="notification_status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->notification_status == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->notification_status == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Name*" value="<?=set_value('name',$data->name)?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select name="status" id="status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status == 1){echo 'selected';} ?> value="1">New</option>
                                        <option <?php if($data->status == 2){echo 'selected';} ?> value="2">Pending</option>
                                        <option <?php if($data->status == 3){echo 'selected';} ?> value="3">Replied</option>
                                        <option <?php if($data->status == 4){echo 'selected';} ?> value="4">Closed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Module*</label>
                                    <select name="department" id="department" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->department == 1){echo 'selected';} ?> value="1">Job Applications</option>
                                        <option <?php if($data->department == 2){echo 'selected';} ?> value="2">Quote Requests</option>
                                        <option <?php if($data->department == 3){echo 'selected';} ?> value="3">Calls</option>
                                        <option <?php if($data->department == 4){echo 'selected';} ?> value="4">Quote Invoices</option>
                                        <option <?php if($data->department == 5){echo 'selected';} ?> value="5">Support</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                               <div class="form-group">
                                    <label>Subject*</label>
                                    <input type="text" class="form-control" required name="subject" placeholder="Subject*" value="<?=set_value('subject',$data->subject)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group" style="margin-top: 20px;">
                                    <label></label>
                                    <input type="checkbox" class="" <?php if($data->send_copy_to_department_operator==1){echo 'checked';} ?> id="send_copy_to_department_operator"> <span style="display: inline-block;padding-top: 13px;" >Send copy to department operator</span>
                                    <input type="hidden" name="send_copy_to_department_operator" value="<?=set_value('subject',$data->send_copy_to_department_operator)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea rows="4" class="form-control message" name="message" placeholder="Message"><?=set_value('name',$data->message)?></textarea>
                                    <script>
                                        CKEDITOR.replace("message", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>USEFUL CODES TO USE:</label>
                                    <br>
                                    <span><a href="javascript:void();" onclick="appendText('{sender_name}')" >{sender_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{user_name}')" >{user_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{department_name}')" >{department_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{support_status}')" >{support_status}</a></span>
									
									<div style="display:none;" class="quote_req_shortcodes">
										<span><a href="javascript:void();" onclick="appendSubjectText('{quote_request_subject}')" >{quote_request_subject}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{last_quote_request_user_reply}')" >{last_quote_request_user_reply}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_sender_email}')" >{quote_request_sender_email}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_date}')" >{quote_request_date}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_time}')" >{quote_request_time}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_civility}')" >{quote_request_civility}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_first_name}')" >{quote_request_first_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_last_name}')" >{quote_request_last_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_request_company_name}')" >{quote_request_company_name}</a></span>
									</div>
									<div style="display:none;" class="quote_inv_shortcodes">
										<span><a href="javascript:void();" onclick="appendSubjectText('{quote_invoices_subject}')" >{quote_invoices_subject}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{last_quote_invoices_user_reply}')" >{last_quote_invoices_user_reply}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_sender_email}')" >{quote_invoices_sender_email}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_date}')" >{quote_invoices_date}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_time}')" >{quote_invoices_time}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_civility}')" >{quote_invoices_civility}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_first_name}')" >{quote_invoices_first_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_last_name}')" >{quote_invoices_last_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{quote_invoices_company_name}')" >{quote_invoices_company_name}</a></span>
									</div>
									<div style="display:none;" class="support_shortcodes">
										<span><a href="javascript:void();" onclick="appendSubjectText('{support_request_subject}')" >{support_subject}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{last_support_request_user_reply}')" >{last_support_request_user_reply}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_sender_email}')" >{support_request_sender_email}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_date}')" >{support_request_date}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_time}')" >{support_request_time}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_civility}')" >{support_request_civility}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_first_name}')" >{support_request_first_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_last_name}')" >{support_request_last_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{support_request_company_name}')" >{support_request_company_name}</a></span>
									</div>
									<div style="display:none;" class="calls_shortcodes">
										<span><a href="javascript:void();" onclick="appendSubjectText('{call_request_subject}')" >{call_request_subject}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{last_call_request_user_reply}')" >{last_call_request_user_reply}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_sender_email}')" >{call_request_sender_email}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_date}')" >{call_request_date}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_time}')" >{call_request_time}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_civility}')" >{call_request_civility}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_first_name}')" >{call_request_first_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_last_name}')" >{call_request_last_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{call_request_company_name}')" >{call_request_company_name}</a></span>
									</div>
									<div style="display:none;" class="job_shortcodes">
										<span><a href="javascript:void();" onclick="appendSubjectText('{job_request_subject}')" >{job_request_subject}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{last_job_request_user_reply}')" >{last_job_request_user_reply}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_sender_email}')" >{job_request_sender_email}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_date}')" >{job_request_date}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_time}')" >{job_request_time}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_civility}')" >{job_request_civility}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_first_name}')" >{job_request_first_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_last_name}')" >{job_request_last_name}</a></span>
										<span><a href="javascript:void();" onclick="appendText('{job_request_company_name}')" >{job_request_company_name}</a></span>
									</div>
									
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/notifications")?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<script src="<?php echo base_url(); ?>assets/system_design/scripts/simple-rating.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#send_copy_to_department_operator').change(function() {
            if(this.checked) {
                $("input[name='send_copy_to_department_operator']").val("1");
            }else{
                $("input[name='send_copy_to_department_operator']").val("0");
            }
        });
		$('#status').change(function() {
			var department = $('#department').val();
			// if($(this).val()==3) {
                // $('.quote_req_shortcodes').show();
            // }else{
				// $('.quote_req_shortcodes').hide();
			// }
			
            if(($(this).val()==3) && (department==1)) {
                $('.job_shortcodes').show();
                $('.quote_req_shortcodes').hide();
				$('.support_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
            }else if(($(this).val()==3) && (department==2)) {
                $('.quote_req_shortcodes').show();
				$('.support_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
            }else if(($(this).val()==3) && (department==3)) {
				$('.calls_shortcodes').show();
				$('.support_shortcodes').hide();
				$('.quote_req_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
			}else if(($(this).val()==3) && (department==4)){
				$('.quote_inv_shortcodes').show();
				$('.calls_shortcodes').hide();
				$('.support_shortcodes').hide();
				$('.quote_req_shortcodes').hide();
				$('.job_shortcodes').hide();
			}else if(($(this).val()==3) && (department==5)){
				$('.support_shortcodes').show();
				$('.quote_req_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
			}else{
                $('.quote_req_shortcodes').hide();
				$('.support_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
            }
        });
		$('#department').change(function() {
			var status = $('#status').val();
            // if(status==3) {
                // $('.quote_req_shortcodes').show();
            // }else{
				// $('.quote_req_shortcodes').hide();
			// }
			
			if(($(this).val()==1) && (status==3)) {
                $('.job_shortcodes').show();
                $('.quote_req_shortcodes').hide();
				$('.support_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
            }else if(($(this).val()==2) && (status==3)) {
                $('.quote_req_shortcodes').show();
				$('.support_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
            }else if(($(this).val()==3) && (status==3)) {
				$('.calls_shortcodes').show();
				$('.support_shortcodes').hide();
				$('.quote_req_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
			}else if(($(this).val()==4) && (status==3)){
				$('.quote_inv_shortcodes').show();
				$('.calls_shortcodes').hide();
				$('.support_shortcodes').hide();
				$('.quote_req_shortcodes').hide();
				$('.job_shortcodes').hide();
			}else if(($(this).val()==5) && (status==3)){
				$('.support_shortcodes').show();
				$('.quote_req_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
			}else{
                $('.quote_req_shortcodes').hide();
				$('.support_shortcodes').hide();
				$('.calls_shortcodes').hide();
				$('.job_shortcodes').hide();
				$('.quote_inv_shortcodes').hide();
            }
        });
    });
    function appendSubjectText(text){
		var input = $('input[name="subject"]').val();
        $('input[name="subject"]').val(input+' '+text);
    }
    function appendText(text){
        CKEDITOR.instances['message'].insertHtml(text);
    }
</script>