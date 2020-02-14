<?php $locale_info = localeconv(); ?>
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
                        <?=form_open("cms/add")?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php // foreach(config_model::$civility as $key => $civil):?>
                                        <!--<option <?php // set_value('civility',$this->input->post('civility')) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>-->
                                        <?php //endforeach;?>
                                        <option value="1">Enabled</option>
                                        <option value="2">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Name*" value="<?=set_value('name',$this->input->post('name'))?>">
                                </div>
                            </div>
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Status*</label>-->
                            <!--        <select class="form-control" name="status_two" required>-->
                            <!--            <?php foreach(config_model::$status as $key => $status):?>-->
                            <!--                <option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>-->
                            <!--            <?php endforeach;?>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Module*</label>-->
                            <!--        <select class="form-control" name="module" required>-->
                            <!--            <?php foreach(config_model::$module as $key => $mod):?>-->
                            <!--            <option <?=set_value('module',$this->input->post('module')) == $mod ? "selected" : ""?> value="<?=$mod?>"><?=$mod?></option>-->
                            <!--            <?php endforeach;?>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Subject*</label>
                                    <!--<div class="input-group">-->
                                        <!--<span class="input-group-addon"><i class="fa fa-phone"></i></span>-->
                                        <input id="subject" maxlength="200" type="text" class="form-control" required name="subject" placeholder="Subject" value="<?=set_value('sub',$this->input->post('sub'))?>">
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                        <!--    <div class="col-xs-4">-->
                        <!--        <div class="form-group">-->
                        <!--            <label>Status*</label>-->
                        <!--            <select class="form-control" name="status" required>-->
                        <!--                <?php foreach(config_model::$status as $key => $status):?>-->
                        <!--                    <option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>-->
                        <!--                <?php endforeach;?>-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="row">-->
                        <!--    <div class="col-xs-12">-->
                        <!--        <div class="form-group">-->
                        <!--            <label>Subject*</label>-->
                        <!--            <select class="form-control" name="msg_subject" required>-->
                        <!--                <?php foreach(config_model::$subjects as $key => $subject):?>-->
                        <!--                    <?php $selected = $key == 1 ? "selected" : ""?>-->
                        <!--                    <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>-->
                        <!--                <?php endforeach;?>-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea class="ckeditor" id="editor1" name="message" cols="100" rows="10">
                                        <?= set_value('message', $this->input->post('message')) ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-default">Save</button>
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