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
                        <?=form_open("admin/callback/".$data->id."/update")?>
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
                                    <label>Auto Take Line*</label>
                                    <select name="auto_take_line" id="auto_take_line" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->auto_take_link == 1){echo 'selected';} ?> value="1">Yes</option>
                                        <option <?php if($data->auto_take_link == 0){echo 'selected';} ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/callback/1/edit")?>" class="btn btn-default">Cancel</a>
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