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
                        <?=form_open_multipart("admin/documents/add")?>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Document Status*</label>
                                    <select name="document_status" id="document_status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Name*" value="<?=set_value('name',$this->input->post('name'))?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Module*</label>
                                    <select name="department" id="department" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option value="1">Job Applications</option>
                                        <option value="2">Quote Requests</option>
                                        <option value="3">Calls</option>
                                        <option value="4">Quote Invoices</option>
                                        <option value="5">Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select name="status" id="status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option value="1">New</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Replied</option>
                                        <option value="4">Closed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="form-group">
                                    <label>Subject*</label>
                                    <input type="text" class="form-control" required name="subject" placeholder="Subject*" value="RE : {quote_request_subject}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Document</label>
                                    <textarea rows="4" class="form-control message" name="message" placeholder="Message"><?=set_value('message',$this->input->post('message'))?></textarea>
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
                                    <span><a href="javascript:void();" onclick="appendText('{date}')" >{date}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{time}')" >{time}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_subject}')" >{quote_request_subject}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{last_quote_request_user_reply}')" >{last_quote_request_user_reply}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_sender_email}')" >{quote_request_sender_email}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_date}')" >{quote_request_date}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_time}')" >{quote_request_time}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_civility}')" >{quote_request_civility}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_first_name}')" >{quote_request_first_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_last_name}')" >{quote_request_last_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_company_name}')" >{quote_request_company_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{quote_request_message}')" >{quote_request_message}</a></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Save</button>
                                    <a href="<?=base_url("admin/documents")?>" class="btn btn-default">Cancel</a>
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
        //CKEDITOR.instances['message'].insertHtml('<p>Reply :&nbsp;{last_quote_request_user_reply}</p><hr /><p>Sent from :&nbsp;{quote_request_sender_email}</p><p>Date :&nbsp;{quote_request_date}, Time :&nbsp;{quote_request_time}</p><p>Sender Name :&nbsp;{quote_request_civility}&nbsp;{quote_request_first_name}&nbsp;{quote_request_last_name} Company :&nbsp;{quote_request_company_name}</p><p>Subject :&nbsp;{quote_request_subject}</p><p>Message :&nbsp;{quote_request_message}</p><hr />');
    });
    $(window).load(function(){
        CKEDITOR.instances['message'].insertHtml('<p>Reply :&nbsp;{last_quote_request_user_reply}</p><hr /><p>Sent from :&nbsp;{quote_request_sender_email}</p><p>Date :&nbsp;{quote_request_date}, Time :&nbsp;{quote_request_time}</p><p>Sender Name :&nbsp;{quote_request_civility}&nbsp;{quote_request_first_name}&nbsp;{quote_request_last_name} Company :&nbsp;{quote_request_company_name}</p><p>Subject :&nbsp;{quote_request_subject}</p><p>Message :&nbsp;{quote_request_message}</p><hr />');
    });
    function appendText(text){
        CKEDITOR.instances['message'].insertHtml(text);
    }
</script>