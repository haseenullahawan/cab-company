<?php $locale_info = localeconv(); ?>
<link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">

<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/common/alert'); ?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                    </div>
                    <div class="module-body">
                        <?= form_open("admin/newsletters/add") ?>
                        <div class="row">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label><?= $this->lang->line('status'); ?>*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach (config_model::$newsletter_status as $key => $statusName): ?>
                                            <option <?= set_value('status', $this->input->post('status')) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= $statusName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label><?= $this->lang->line('users'); ?>*</label>
                                    <select class="form-control" name="user_type" required>
                                        <option value="0"><?= $this->lang->line('select_all'); ?></option>
                                        <?php foreach (config_model::$user_types as $key => $user_type): ?>
                                            <option <?= set_value('user_type', $this->input->post('user_type')) == $user_type['id'] ? "selected" : "" ?> value="<?= $user_type['id'] ?>"><?= $user_type['label'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label><?= $this->lang->line('category'); ?>*</label>
                                    <select class="form-control" name="category" required>
                                        <?php foreach (config_model::$categories as $key => $category): ?>
                                            <option <?= set_value('category', $this->input->post('category')) == $category ? "selected" : "" ?> value="<?= $category ?>"><?= $category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-1">
                                <div class="form-group">
                                    <label><?= $this->lang->line('status'); ?>*</label>
                                    <select class="form-control" name="user_status" required>
                                        <?php foreach (config_model::$user_status as $key => $u_status): ?>
                                            <option <?= set_value('user_status', $this->input->post('user_status')) == $category ? "selected" : "" ?> value="<?= $u_status ?>"><?= $u_status ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                <div class="form-group">
                                    <label><?= $this->lang->line('subject'); ?>*</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?= set_value('subject', $this->input->post('subject')) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7" style="margin-top: 15px;">
                                <div class="form-group">                    
                                    <label><?php echo $this->lang->line('newsletter'); ?></label>
                                    <textarea class="ckeditor" id="editor1" name="description" cols="100" rows="10">
                                        <?= set_value('description', $this->input->post('description')) ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-1" style="margin-bottom: 15px;min-width: 150px">
                                <div class="form-group">
                                    <!--<label>Date*</label>-->
                                    <input type="text" class="bdatepicker form-control" name="send_date" placeholder="<?php echo $this->lang->line('send_date'); ?>" value="<?= set_value('send_date', $this->input->post('send_date')) ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-1" style="margin-bottom: 15px;max-width: 130px;">
                                <div class="form-group">
                                    <!--<label>From Time*</label>-->
                                    <div class="input-group">
                                        <!--<span class="input-group-addon normal-addon"></span>-->
                                        <select class="form-control" name="send_date_hour" required>
                                            <?php
                                            for ($i = 0; $i < 24; $i++):
                                                $time = $i > 9 ? $i : "0" . $i;
                                                ?>
                                                <option <?= set_value('send_date_hour', $this->input->post('send_date_hour')) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <span class="input-group-addon normal-addon">H</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-1" style="margin-bottom: 15px;max-width: 130px;">
                                <div class="form-group">
                                    <!--<label>From Time*</label>-->
                                    <div class="input-group">
                                        <!--<span class="input-group-addon normal-addon"></span>-->
                                        <select class="form-control" name="send_date_minute" required>
                                            <?php
                                            for ($i = 0; $i < 60; $i++):
                                                $time = $i > 9 ? $i : "0" . $i;
                                                ?>
                                                <option <?= set_value('send_date_minute', $this->input->post('send_date_minute')) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <span class="input-group-addon normal-addon">M</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 15px">
                                <div class="text-right">
                                    <a href="<?= base_url("admin/newsletters") ?>" class="btn btn-default">Cancel</a>
                                    <button class="btn btn-default">Send</button>
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
<script type="text/javascript">
    $(document).ready(function () {
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        }).datepicker("setDate", new Date("<?= set_value('send_date', $this->input->post('send_date')) ?>"));
    });
</script>