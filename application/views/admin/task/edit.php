<?php $locale_info = localeconv(); ?>
<link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">
<style>
    .attach-div {
        width: 77%;
    }
    input[type="text"][name="note_added_by[]"]:focus {
        border:none !important;
        box-shadow: none !important;
    }
    input[type="text"][name="note_added_by[]"] {
        border: 0 none !important;
        margin-bottom: 5px;
    }
    .border-box {
        border: 1px solid #ccc;
        padding: 15px;
        margin: 15px;
    }

    .border-left{
        border-left: 1px solid #ccc;
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
                        <?= form_open_multipart("admin/tasks/" . $data->id . "/update") ?>
                        <div class="column">
                            <div class="col-xs-12 col-sm-12 col-md-6">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('added_by_firstname'); ?>*</label>
                                            <!--<input onchange="setNote2()" type="text" class="form-control" readonly="" name="added_by_firstname" placeholder="" value="<?/*= set_value('added_by_firstname', $data->added_by_firstname) */?>">-->
                                            <select name="added_by_firstname" id="" class="form-control" onchange="setNote2()">
                                                <?php foreach ($users as $item): ?>
                                                    <option value="<?php echo $item['first_name']; ?>" <?php echo $item['first_name'] == $data->added_by_firstname ? 'selected="selected"' : ''; ?>><?php echo $item['first_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('added_by_lastname'); ?>*</label>
                                            <!--<input onchange="setNote2()" type="text" class="form-control" readonly="" name="added_by_lastname" placeholder="" value="<?/*= set_value('added_by_lastname', $data->added_by_lastname) */?>">-->
                                            <select name="added_by_lastname" id="" class="form-control" onchange="setNote2()">
                                                <?php foreach ($users as $item): ?>
                                                    <option value="<?php echo $item['last_name']; ?>" <?php echo $item['last_name'] == $data->added_by_lastname ? 'selected="selected"' : ''; ?>><?php echo $item['last_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('added_by_department'); ?>*</label>
                                            <!--<input onchange="setNote2()" type="text" class="form-control" readonly="" name="added_by_lastname" placeholder="" value="<?/*= set_value('added_by_lastname', $data->added_by_lastname) */?>">-->
                                            <input type="text" class="form-control" readonly="" placeholder="" value="<?php echo $data->affected_department_name; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 15px">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('date'); ?>*</label>
                                            <input onchange="setNote2()" type="text" class="bdatepicker-date form-control" name="date" placeholder="<?php echo $this->lang->line('date'); ?>" value="<?= set_value('date', $data->date) ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 15px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group">
                                                <label><?= $this->lang->line('hours'); ?></label>
                                                <select onchange="setNote2()" class="form-control" name="date_hour" required>
                                                    <?php
                                                    for ($i = 0; $i < 24; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date_hour', $data->date_hour) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">H</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="margin-top: 15px;max-width: 130px;">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <label><?= $this->lang->line('mints'); ?></label>
                                            <div class="input-group">
                                                <select onchange="setNote2()" class="form-control" name="date_minute" required>
                                                    <?php
                                                    for ($i = 0; $i < 60; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date_minute', $data->date_minute) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
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
                                                <?php foreach (config_model::$task_status as $key => $statusName): ?>
                                                    <option <?= set_value('status', $data->status) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= ucfirst($statusName) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('priority'); ?>*</label>
                                            <select class="form-control" name="priority" required>
                                                <?php foreach (config_model::$priority_types as $key => $statusName): ?>
                                                    <option <?= set_value('priority', $data->priority) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= ucfirst($statusName) ?></option>
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
                                                    <option <?= set_value('affected_department', $data->affected_department) == $row['id'] ? "selected" : "" ?> value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('affected_user'); ?>*</label>
                                            <select class="form-control" name="affected_user" required>
                                                <?php foreach ($users as $key => $user): ?>
                                                    <option <?= set_value('affected_user', $data->affected_user) == $user['id'] ? "selected" : "" ?> value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
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
                                            <input type="text" class="bdatepicker date2 form-control" name="date2" placeholder="<?php echo $this->lang->line('date2'); ?>" value="<?= set_value('date2', $data->date2) ?>">
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
                                                        <option <?= set_value('date2_hour', $data->date2_hour) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
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
                                                        f<option <?= set_value('date2_minute', $data->date2_minute) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon">M</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 border-left">
                                <div class="border-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('task_description'); ?>*</label>
                                                <textarea rows="5" name="note" required class="form-control" readonly="" style="resize: none;"><?= set_value('note', $data->note) ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-7 col-md-7 col-md-offset-5">
                                            <label style="padding-top: 10px;"><?= $this->lang->line('add_files'); ?>*</label>
                                            <div class="attach-div" style="" id="attachDiv">
                                                <div class="attach-main">
                                                    <div class="attach-file">
                                                        <input type="file" name="files[]" >
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

                                <div class="border-box">
                                    <div class="row">
                                        <div class="col-xs-12" id="noteDIv" style="max-height: 400px;overflow: scroll;overflow-x: hidden;margin-top: 15px;margin-bottom: 15px;">
                                            <?php if ($notes != false) { ?>
                                                <?php foreach ($notes as $key => $note): ?>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                <input name="note_added_by[]" type="text" required class="form-control" readonly="" value="<?= $note->note_added_by ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <textarea rows="2" name="note2[]" required class="form-control" readonly="" style="resize: none;"><?= $note->note ?></textarea>
                                                        </div>
                                                        <div class="col-xs-12 text-right">
                                                            <button type="button" class="btn btn-circle btn-success btn-sm addNote2"><i class="fa fa-plus"></i></button>
                                                            <?php if ($key > 0) { ?>
                                                                <button type="button" class="btn btn-circle btn-danger btn-sm delNote2"><i class="fa fa-minus"></i></button>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php } else { ?>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <input name="note_added_by[]" type="text" class="form-control" readonly="" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <textarea rows="2" name="note2[]" required class="form-control" style="resize: none;"></textarea>
                                                    </div>
                                                    <div class="col-xs-12 text-right">
                                                        <button type="button" class="btn btn-circle btn-success btn-sm addNote2"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xs-12">
                                <div class="text-right">
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
    function setNote2()
    {
        var firstname = $('[name="added_by_firstname"]').val();
        var from_lbl = "<?= $this->lang->line('from'); ?>";
        var from_lbl = "from";
        var lastname = $('[name="added_by_lastname"]').val();
//            var affected_department = $('[name="affected_department"]').val();
        var affected_department = $('[name="affected_department"] option:selected').text();
        var date = $('[name="date"]').val();
        var date_hour = $('[name="date_hour"]').val();
        var date_minute = $('[name="date_minute"]').val();

        var last_added_by = 'Added by : ' + firstname + ' ' + lastname + ' ' + from_lbl + ' ' + affected_department + ' ' + date + ' ' + date_hour + ':' + date_minute;

        $("input[name='note_added_by[]']:last").val(last_added_by);
    }

    $(document).ready(function () {

        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });

        $(".bdatepicker-date").datepicker({
            format: "dd/mm/yyyy"
        }).datepicker("setDate", new Date("<?= set_value('date2', $data->date) ?>"));

        $(".date2").datepicker({
            format: "dd/mm/yyyy"
        }).datepicker("setDate", new Date("<?= set_value('date2', $data->date2) ?>"));

        $(document.body).on("click", ".addNote2", function () {

            var note2 = '<div class="row">\n\
                        <div class="col-xs-12">\n\
                            <div class="form-group">\n\
                                <input name="note_added_by[]" type="text" class="form-control" readonly="" value="">\n\
                            </div>\n\
                        </div>\n\
                        <div class="col-xs-12">\n\
                            <textarea rows="2" name="note2[]" required class="form-control" style="resize: none;"></textarea>\n\
                        </div>\n\
                        <div class="col-xs-12 text-right">\n\
                            <button type="button" class="btn btn-circle btn-success btn-sm addNote2"><i class="fa fa-plus"></i></button>\n\
                            <button type="button" class="btn btn-circle btn-danger btn-sm delNote2"><i class="fa fa-minus"></i></button>\n\
                        </div>\n\
                    </div>';

            $("#noteDIv").append(note2);
            setNote2();
        });

        $(document.body).on("click", ".delNote2", function () {
            $(this).closest('.row').remove();
        });

        $(document.body).on("click", ".addFile2", function () {
            $("#attachDiv").append('<div class="attach-main"> <div class="attach-file"> <input type="file" name="files[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addFile2"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm delFile2"><i class="fa fa-minus"></i></button></div></div>');
        });

        $(document.body).on("click", ".delFile2", function () {
            $(this).closest('.attach-main').remove();
        });
        setNote2();
    });
</script>