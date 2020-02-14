<?php $locale_info = localeconv(); ?>
<?php $status_arr = array("New", "Pending", "Done", "Closed"); ?>

<link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">
<style>
    .attach-div {
        width: 77%;
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
                        <?= form_open_multipart("admin/tasks/store") ?>
                        <div class="column">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('added_by_firstname'); ?>*</label>
                                            <input onchange="setNote2()" type="text" class="form-control" readonly="" name="added_by_firstname" placeholder="" value="<?= set_value('added_by_firstname', $user->first_name) ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('added_by_lastname'); ?>*</label>
                                            <input onchange="setNote2()" type="text" class="form-control" readonly="" name="added_by_lastname" placeholder="" value="<?= set_value('added_by_lastname', $user->last_name) ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 15px">
                                        <div class="form-group">
                                            <input onchange="setNote2()" type="text" class="bdatepicker-date form-control" name="date" placeholder="<?php echo $this->lang->line('date'); ?>" value="<?= set_value('date', $this->input->post('date')) ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 15px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group">
                                                <select onchange="setNote2()" class="form-control" name="date_hour" required>
                                                    <?php
                                                    for ($i = 0; $i < 24; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date_hour', $this->input->post('date_hour')) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">H</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 15px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group">
                                                <select onchange="setNote2()" class="form-control" name="date_minute" required>
                                                    <?php
                                                    for ($i = 0; $i < 60; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date_minute', $this->input->post('date_minute')) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">M</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('status'); ?>*</label>
                                            <select class="form-control" name="status" required>
                                                <?php foreach ($status_arr as $key => $statusName): ?>
                                                    <option <?= set_value('status', $this->input->post('status')) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= $statusName ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('priority'); ?>*</label>
                                            <select class="form-control" name="priority" required>
                                                <?php foreach (config_model::$priority_types as $key => $statusName): ?>
                                                    <option <?= set_value('priority', $this->input->post('priority')) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= $statusName ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('affected_department'); ?>*</label>
                                            <select onchange="setNote2()" class="form-control" name="affected_department" required>
                                                <?php foreach ($departments as $key => $row): ?>
                                                    <option <?= set_value('affected_department', $this->input->post('affected_department')) == $row['id'] ? "selected" : "" ?> value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('affected_user'); ?>*</label>
                                            <select class="form-control" name="affected_user" required>
                                                <?php foreach ($users as $key => $user): ?>
                                                    <option <?= set_value('affected_user', $this->input->post('affected_user')) == $user['id'] ? "selected" : "" ?> value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <label><?= $this->lang->line('to_be_done_before'); ?>*</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 5px">
                                        <div class="form-group">
                                            <input type="text" class="bdatepicker form-control" name="date2" placeholder="<?php echo $this->lang->line('date2'); ?>" value="<?= set_value('date2', $this->input->post('date2')) ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 5px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group">
                                                <select class="form-control" name="date2_hour" required>
                                                    <?php
                                                    for ($i = 0; $i < 24; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date2_hour', $this->input->post('date2_hour')) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">H</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 5px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group">
                                                <select class="form-control" name="date2_minute" required>
                                                    <?php
                                                    for ($i = 0; $i < 60; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date2_minute', $this->input->post('date2_minute')) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">M</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('task_description'); ?>*</label>
                                            <textarea rows="8" name="note" required class="form-control" style="resize: none;"><?= set_value('note', $this->input->post('note')) ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-md-offset-5">
                                        <label style="padding-top: 10px;"><?= $this->lang->line('add_files'); ?>*</label>
                                        <div class="attach-div" style="" id="attachDiv">
                                            <div class="attach-main">
                                                <div class="attach-file">
                                                    <input type="file" name="files[]">
                                                </div>

                                                <div class="attach-buttons">
                                                    <button type="button" class="btn btn-circle btn-success btn-sm addFile2"><iR class="fa fa-plus"></iR></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xs-12" style="margin-top: 15px;">
                                <div class="text-right">
                                    <!--<button type="button" class="btn btn-default replyBtn">Cancel</button>-->
                                    <a href="<?= base_url("admin/tasks") ?>" class="btn btn-default">Cancel</a>
                                    <button class="btn btn-default">Save</button>
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
    function setNote2() {
        var firstname = $('[name="added_by_firstname"]').val();

        var lastname = "";
        //        var lastname = $('[name="added_by_lastname"]').val();

        //            var affected_department = $('[name="affected_department"]').val();

        var affected_department = $('[name="affected_department"] option:selected').text();

        var date = $('[name="date"]').val();

        var date_hour = $('[name="date_hour"]').val();

        var date_minute = $('[name="date_minute"]').val();

        //        $('[name="note2"]').val("Added By: "firstname + ' ' + lastname + ' ' + affected_department + ' ' + date + ' ' + date_hour + ':' + date_minute);
    }

    $(document).ready(function () {
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });

        $(".bdatepicker-date").datepicker({
            format: "dd/mm/yyyy"
        }).datepicker("setDate", new Date());

        var date = (new Date());

        var hours = date.getHours();

        var minutes = date.getMinutes();

        hours < 10 ? hours = '0' + hours : '';

        minutes < 10 ? minutes = '0' + minutes : '';

        $("[name='date_hour']").val(hours);

        $("[name='date_minute']").val(minutes);

        setNote2();
        
        
        $(document.body).on("click",".addFile2", function () {
            $("#attachDiv").append('<div class="attach-main"> <div class="attach-file"> <input type="file" name="files[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addFile2"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm delFile2"><i class="fa fa-minus"></i></button></div></div>');
        });

        $(document.body).on("click",".delFile2", function () {
            $(this).closest('.attach-main').remove();
        });
    });
</script>