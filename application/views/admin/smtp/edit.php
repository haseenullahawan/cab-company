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
                        <h3 style="border-bottom: 0px;font: icon;">Add SMTP Notifications</h3>
                        <hr>
                        <?=form_open("admin/smtp/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-0">
                                <div class="form-group" style="display: none">
                                    <label>Status*</label>
                                    <select name="status" id="status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-0">
                                <div class="form-group" style="display: none">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Name*" value="<?=set_value('name',$data->name)?>">
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Link*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="smtp_host" placeholder="Link*" value="<?=set_value('smtp_host',$data->smtp_host)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Email to send from*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="smtp_user" placeholder="Email*" value="<?=set_value('smtp_user',$data->smtp_user)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="password" style="height:36px;" maxlength="100" class="form-control" required name="smtp_password" placeholder="Password*" value="<?=set_value('smtp_password',$data->smtp_password)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Destination Email*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="path_to_send_mail" placeholder="Destination Email*" value="<?=set_value('path_to_send_mail',$data->path_to_send_mail)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group" style="margin-top: 20px;">
                                    <label></label>
                                    <input type="checkbox" class="" <?php if($data->send_copy_to_sender == 1){echo 'checked';} ?> id="send_copy_to_sender"> <span style="display: inline-block;padding-top: 13px;" >Send copy to sender</span>
                                    <input type="hidden" name="send_copy_to_sender" value="<?=set_value('send_copy_to_sender',$data->send_copy_to_sender)?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 style="border-bottom: 0px;font: icon;">Add SMTP Newsletters</h3>
                        <hr>
                        <div class="row">
                            <div class="col-xs-0">
                                <div class="form-group" style="display: none">
                                    <label>Status*</label>
                                    <select name="smtp_status_1" id="smtp_status_1" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->smtp_status_1 == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->smtp_status_1 == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-0">
                                <div class="form-group" style="display: none">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="smtp_name_1" placeholder="Name*" value="<?=set_value('smtp_name_1',$data->smtp_name_1)?>">
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Link*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="smtp_host_1" placeholder="Link*" value="<?=set_value('smtp_host_1',$data->smtp_host_1)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Email to send from*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="smtp_user_1" placeholder="Email*" value="<?=set_value('smtp_user_1',$data->smtp_user_1)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="password" style="height:36px;" maxlength="100" class="form-control" required name="smtp_password_1" placeholder="Password*" value="<?=set_value('smtp_password_1',$data->smtp_password_1)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Destination Email*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="smtp_path_to_send_mail_1" placeholder="Destination Email*" value="<?=set_value('smtp_path_to_send_mail_1',$data->smtp_path_to_send_mail_1)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group" style="margin-top: 20px;">
                                    <label></label>
                                    <input type="checkbox" class="" <?php if($data->smtp_send_copy_to_sender_1 == 1){echo 'checked';} ?> id="smtp_send_copy_to_sender_1"> <span style="display: inline-block;padding-top: 13px;" >Send copy to sender</span>
                                    <input type="hidden" name="smtp_send_copy_to_sender_1" value="<?=set_value('smtp_send_copy_to_sender_1',$data->smtp_send_copy_to_sender_1)?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- <h3 style="border-bottom: 0px;font: icon;">Callback</h3>
                        <hr>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select name="status1" id="status1" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status1 == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status1 == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name1" placeholder="Name*" value="<?=set_value('name1',$data->name1)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Link*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="host1" placeholder="Link*" value="<?=set_value('host1',$data->host1)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Call From*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="call_from" placeholder="Call From*" value="<?=set_value('call_from',$data->call_from)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Call To*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="call_to" placeholder="Call To*" value="<?=set_value('call_to',$data->call_to)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Auto Take Link*</label>
                                    <select name="auto_take_link" id="auto_take_link" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->auto_take_link == 1){echo 'selected';} ?> value="1">Yes</option>
                                        <option <?php if($data->auto_take_link == 0){echo 'selected';} ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/smtp/1/edit")?>" class="btn btn-default">Cancel</a>
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
        $('#send_copy_to_sender').change(function() {
            if(this.checked) {
                $("input[name='send_copy_to_sender']").val("1");
            }else{
                $("input[name='send_copy_to_sender']").val("0");
            }
        });
        $('#smtp_send_copy_to_sender_1').change(function() {
            if(this.checked) {
                $("input[name='smtp_send_copy_to_sender_1']").val("1");
            }else{
                $("input[name='smtp_send_copy_to_sender_1']").val("0");
            }
        });
    });
</script>