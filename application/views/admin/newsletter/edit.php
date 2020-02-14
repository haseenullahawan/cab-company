<?php $locale_info = localeconv(); ?>
<?php $arr = array("Send now", "Sheduled"); ?>

<link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style>
    .input-group-addon {
        padding: 0px !important;
    }
</style>

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
                        <?= form_open("admin/newsletters/" . $data->id . "/update") ?>

                        <div class="row">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label><?= $this->lang->line('status'); ?>*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach (config_model::$newsletter_status as $key => $statusName): ?>
                                            <option <?= set_value('status', $data->status) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= $statusName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label><?= $this->lang->line('users'); ?>*</label>
                                    
                                    <select class="form-control" name="user_type" required>
                                        <option <?= set_value('user_type', $data->user_type) == 0 ? "selected" : "" ?> value="0"><?= $this->lang->line('select_all'); ?></option>
                                        <?php foreach (config_model::$user_types as $key => $user_type): ?>
                                            <option <?= set_value('user_type', $data->user_type) == $user_type['id'] ? "selected" : "" ?> value="<?= $user_type['id'] ?>"><?= $user_type['label'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label><?= $this->lang->line('category'); ?>*</label>
                                    <select class="form-control" name="category" required>
                                        <?php foreach (config_model::$categories as $key => $category): ?>
                                            <option <?= set_value('category', $data->category) == $category ? "selected" : "" ?> value="<?= $category ?>"><?= $category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-1">
                                <div class="form-group">
                                    <label><?= $this->lang->line('status'); ?>*</label>
                                    <select class="form-control" name="user_status" required>
                                        <?php foreach (config_model::$user_status as $key => $u_status): ?>
                                            <option <?= set_value('user_status', $data->user_status) == $category ? "selected" : "" ?> value="<?= $u_status ?>"><?= $u_status ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                <div class="form-group">
                                    <label><?= $this->lang->line('subject'); ?>*</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?= set_value('subject', $data->subject) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                <div class="form-group">              
                                    <label><?php echo $this->lang->line('newsletter'); ?></label>
                                    <textarea class="ckeditor" id="editor1" name="description" cols="100" rows="10">
                                        <?= set_value('description', html_entity_decode($data->description)) ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3" style="margin-bottom: 15px">-->
                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2" style="margin-bottom: 15px">
                                <div class="form-group">
                                    <input type="text" class="form-control" id = "email" name="email" value="<?php echo $data->email; ?>" placeholder="Test Email">
                                </div>
                            </div>
                            <!--<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2" style="margin-bottom: 15px">
                                <div class="form-group">
                                    <a href="" class="btn btn-default">Send Test</a>
                                </div>
                            </div>-->
                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2" style="margin-bottom: 15px;min-width: 150px;">
                                <div class="form-group">
                                    <input type="hidden" name="send_date_minute" value="">
                                    <select class="form-control shedule" name="type" required>
                                        <?php
                                        foreach ($arr as $k => $vv):
//                                            $selected = ($vv == $data->shedule) ? "selected" : "";
                                            ?>
                                            <option value="<?= $vv; ?>" <?php echo $selected; ?>><?= $vv; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="if-shedule">
                                <?php if ($data->shedule == "Sheduled"): ?>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2" style="margin-bottom: 15px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>Date*</label>-->
                                            <input type="text" class="bdatepicker form-control" name="send_date" placeholder="Date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-1" style="margin-bottom: 15px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group" style="padding-left:0px !important">
                                                <span class="input-group-addon normal-addon" style="padding-left:0px !important"></span>
                                                <select class="form-control" name="send_date_hour" required>
                                                    <?php
                                                    for ($i = 0; $i < 24; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('send_date_hour', $data->send_date_hour) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">H</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7" style="margin-bottom: 15px">
                            <div class="text-right">
                                <a href="<?= base_url("admin/newsletters") ?>" class="btn btn-default">Cancel</a>
                                <button class="btn btn-default">Send</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <br>
                        <?= form_open("admin/newsletter/" . $data->id . "/reply") ?>
                        <input type="hidden" id = "email1" name="email" value="<?php echo $data->email; ?>" placeholder="Test Email" value="">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px">
                                <div class="form-group">
                                    <button class="btn btn-default">Send Test</button>
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
         $("#email").change(function(){
            $("#email1").val($(this).val());
        });
        $(document).on("change", ".shedule", function () {
            var shedule_val = $(this).val();

            $('.if-shedule').empty();

            if (shedule_val == "Sheduled") {
                var if_schedule = '<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2" style="margin-bottom: 15px;max-width: 130px;">' +
                        '<div class="form-group">' +
                        '<input type="text" class="bdatepicker form-control" name="send_date" placeholder="Date" autocomplete="off">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-xs-6 col-sm-3 col-md-2 col-lg-1" style="margin-bottom: 15px;max-width: 130px;">' +
                        '<div class="form-group">' +
                        '<div class="input-group">' +
                        '<select class="form-control" name="send_date_hour" required><?php for ($i = 0; $i < 24; $i++): $time = $i > 9 ? $i : "0" . $i; ?> <option <?= set_value('send_date_hour', $data->send_date_hour) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option> <?php endfor; ?> </select> ' +
                        '<span class="input-group-addon normal-addon">H</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                $('.if-shedule').append(if_schedule);

                $(".bdatepicker").datepicker({
                    format: "dd/mm/yyyy",
                }).datepicker("setDate", new Date("<?= set_value('send_date', $data->send_date) ?>"));
            }
        });

        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy",
        }).datepicker("setDate", new Date("<?= set_value('send_date', $data->send_date) ?>"));
    });
</script>