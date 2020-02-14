<?php $locale_info = localeconv(); ?>
    <!--<script src="<?php echo base_url(); ?>/assets/system_design/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>-->

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
                        <?=form_open("cms/update/".$data->id)?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php // foreach(config_model::$civility as $key => $civil):?>
                                        <!--<option <?php // set_value('civility',$this->input->post('civility')) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>-->
                                        <?php //endforeach;?>
                                        <option value="1" <?php if($data->status == 1){ ?> selected <?php } ?>>Enabled</option>
                                        <option value="2" <?php if($data->status == 2){ ?> selected <?php } ?>>Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Name*" value="<?php echo $data->name?>">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Subject*</label>
                                    <!--<div class="input-group">-->
                                        <!--<span class="input-group-addon"><i class="fa fa-phone"></i></span>-->
                                        <input id="subject" maxlength="200" type="text" class="form-control" required name="subject" placeholder="Subject" value="<?php echo $data->subject?>">
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea class="ckeditor" id="editor1" name="message" cols="100" rows="10">
                                        <?php echo $data->message?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <!--<button type="button" class="btn btn-default replyBtn">Close</button>-->
                            <button class="btn btn-default">Update</button>
                            <a href="<?=base_url("cms/index")?>" class="btn btn-default">Cancel</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });
    });
</script>