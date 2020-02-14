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
                        <?=form_open("admin/reminders1/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Reminder Status*</label>
                                    <select name="reminder_status" id="reminder_status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->reminder_status == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->reminder_status == 0){echo 'selected';} ?> value="0">Disabled</option>
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
                                        <!-- <option <?php if($data->status == 1){echo 'selected';} ?> value="1">New</option>
                                        <option <?php if($data->status == 2){echo 'selected';} ?> value="2">Pending</option> -->
                                        <option <?php if($data->status == 3){echo 'selected';} ?> value="3">Replied</option>
                                        <!-- <option <?php if($data->status == 4){echo 'selected';} ?> value="4">Closed</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Module*</label>
                                    <select name="module" id="module" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->module == 1){echo 'selected';} ?> value="1">Job Applications</option>
                                        <option <?php if($data->module == 2){echo 'selected';} ?> value="2">Quote Requests</option>
                                        <option <?php if($data->module == 3){echo 'selected';} ?> value="3">Calls</option>
                                        <option <?php if($data->module == 4){echo 'selected';} ?> value="4">Quote Invoices</option>
                                        <option <?php if($data->module == 5){echo 'selected';} ?> value="5">Support</option>
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
                            <div class="col-xs-6">
                                <div class="attach-label" style="width: 24%;">Reminder Before Days: </div>
                                <div class="attach-div" id="attachDiv" style="margin-top: -33px;">
                                    <div class="attach-main" style="margin-left: 20px;">
                                        <?php if($data->reminder_before_days == ""){ ?>
                                            <div class="attach-file">
                                                <input style = "max-width: 330px;margin-left: 15px;" class="form-control" type="number" min="1" max="100" name="reminder_before_days[]">
                                            </div>
                                            <div class="attach-buttons">
                                                <button type="button" class="btn btn-circle btn-success btn-sm addDays"><iR class="fa fa-plus"></iR></button>
                                            </div>
                                        <?php }else{ ?>
                                            <?php $i = 0; $reminder_before_days = explode(',', $data->reminder_before_days);
                                                foreach ($reminder_before_days as  $r) {
                                            ?>
                                                <div>
                                                    <div class="attach-file"> 
                                                        <input style = "max-width: 330px;margin-left: 15px;" class="form-control" type="number" min="1" max="100" value="<?=$r?>" name="reminder_before_days[]"> 
                                                    </div> 
                                                    <div class="attach-buttons"> 
                                                        <button type="button" class="btn btn-circle btn-success btn-sm addDays"><i class="fa fa-plus"></i></button> 
                                                        <?php if($i != 0){ ?>
                                                            <button type="button" class="btn btn-circle btn-danger btn-sm dellFile"><i class="fa fa-minus"></i></button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php $i++; } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="attach-label" style="width: 24%;">Reminder After Days: </div>
                                <div class="attach-div" id="attachDiv1" style="margin-top: -33px;">
                                    <div class="attach-main1" style="margin-left: 20px;">
                                        <?php if($data->reminder_after_days == ""){ ?>
                                            <div class="attach-file1">
                                                <input style = "max-width: 330px;margin-left: 15px;" class="form-control" type="number" min="1" max="100" name="reminder_after_days[]">
                                            </div>
                                            <div class="attach-buttons">
                                                <button style = "margin-top:-60px;" type="button" class="btn btn-circle btn-success btn-sm addDays1"><iR class="fa fa-plus"></iR></button>
                                            </div>
                                        <?php }else{ ?>
                                            <?php $i = 0; $reminder_after_days = explode(',', $data->reminder_after_days);
                                                foreach ($reminder_after_days as  $r) {
                                            ?>
                                                <div>
                                                    <div class="attach-file1"> 
                                                        <input style = "max-width: 330px;margin-left: 15px;" class="form-control" type="number" min="1" max="100" value="<?=$r?>" name="reminder_after_days[]"> 
                                                    </div> 
                                                    <div class="attach-buttons"> 
                                                        <button <?php if($i == 0){ ?>style = "margin-top:-60px;"<?php }else{ ?>style = "margin-top:-60px;"<?php } ?> type="button" class="btn btn-circle btn-success btn-sm addDays1"><i class="fa fa-plus"></i></button> 
                                                        <?php if($i != 0){ ?>
                                                            <button style = "margin-top:-60px;" type="button" class="btn btn-circle btn-danger btn-sm dellFile1"><i class="fa fa-minus"></i></button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php $i++; } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
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
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/reminders1")?>" class="btn btn-default">Cancel</a>
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
        
    });
    function appendText(text){
        CKEDITOR.instances['message'].insertHtml(text);
    }
    $(document.body).on("click",".addDays", function () {
        $("#attachDiv").append('<div class="attach-main" style="margin-left: 20px;margin-top:5px;"> <div class="attach-file"> <input style = "max-width: 330px;margin-left: 15px;" class="form-control" type="number" min="1" max="100" name="reminder_before_days[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addDays"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm dellFile"><i class="fa fa-minus"></i></button></div></div>');
    });
    $(document.body).on("click",".addDays1", function () {
        $("#attachDiv1").append('<div class="attach-main1" style="margin-left: 20px;margin-top:0px;"> <div class="attach-file1"> <input style = "max-width: 330px;margin-left: 15px;" class="form-control" type="number" min="1" max="100" name="reminder_after_days[]"> </div> <div class="attach-buttons" style = "margin-top:-33px;"> <button type="button" class="btn btn-circle btn-success btn-sm addDays1"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm dellFile1"><i class="fa fa-minus"></i></button></div></div>');
    });
    $(document.body).on("click",".dellFile", function () {
        $(this).parent().parent().remove();
    });
    $(document.body).on("click",".dellFile1", function () {
        $(this).parent().parent().remove();
    });
</script>