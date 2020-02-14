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
                        <?=form_open("admin/settings/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Request Closing Days*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="request_closing_days" placeholder="Request Closing Days*" value="<?=set_value('request_closing_days',$data->request_closing_days)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/settings/1")?>" class="btn btn-default">Cancel</a>
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