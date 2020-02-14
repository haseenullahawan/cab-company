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
                        <h1 style="border-bottom: 0px;">Quick Replies</h1>
                        <hr>
                        <?=form_open("admin/configurations/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select name="status" id="status" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Name*" value="<?=set_value('name',$data->name)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Module*</label>
                                    <select name="module" id="module" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->module == 1){echo 'selected';} ?> value="1">Job Applications</option>
                                        <option <?php if($data->module == 2){echo 'selected';} ?> value="2">Quote Requests</option>
                                        <option <?php if($data->module == 3){echo 'selected';} ?> value="3">Calls</option>
                                        <option <?php if($data->module == 4){echo 'selected';} ?> value="4">Support</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea rows="4" class="form-control message_sentence" name="message_sentence" placeholder="Message"><?=set_value('name',$data->message_sentence)?></textarea>
                                    <script>
                                        CKEDITOR.replace("message_sentence", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/configurations")?>" class="btn btn-default">Cancel</a>
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
    
</script>