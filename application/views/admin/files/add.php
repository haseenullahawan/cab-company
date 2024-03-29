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
                        <?= form_open_multipart("admin/files/store") ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <div class="row">
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="margin-top: 15px">
                                        <div class="form-group">
                                            <!--<input type="text" onchange="setNote2()" class="form-control" readonly="" name="added_by_firstname" placeholder="" value="<?/*= set_value('added_by_firstname', $user->first_name) */?>">-->
                                            <select name="added_by_firstname" id="" class="form-control" onchange="setNote2()">
                                            <?php foreach ($users as $item): ?>
                                                <option value="<?php echo $item['first_name']; ?>" <?php echo $item['first_name'] == $user->first_name ? 'selected="selected"' : ''; ?>><?php echo $item['first_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="margin-top: 15px">
                                        <div class="form-group">
                                            <!--<input type="text" onchange="setNote2()" class="form-control" readonly="" name="added_by_lastname" placeholder="" value="<?/*= set_value('added_by_lastname', $user->last_name) */?>">-->
                                            <select name="added_by_lastname" id="" class="form-control" onchange="setNote2()">
                                                <?php foreach ($users as $item): ?>
                                                    <option value="<?php echo $item['last_name']; ?>" <?php echo $item['last_name'] == $user->last_name ? 'selected="selected"' : ''; ?>><?php echo $item['last_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2" style="margin-top: 15px">
                                        <div class="form-group">
                                            <!--<label>Date*</label>-->
                                            <input type="text" onchange="setNote2()" class="bdatepicker form-control" readonly="" name="send_date" placeholder="Date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2" style="margin-top: 15px;max-width: 130px;min-width: 85px;padding-right: 0">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group" style="padding-left:0px !important">
                                                <select  onchange="setNote2()" class="form-control" name="send_date_hour" readonly="" required>
                                                    <?php
                                                    for ($i = 0; $i < 24; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('send_date_hour', $data->send_date_hour) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon" style="padding: 2px">H</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2" style="margin-top: 15px;max-width: 130px;min-width: 85px;padding-right: 0">
                                        <div class="form-group">
                                            <!--<label>From Time*</label>-->
                                            <div class="input-group">
                                                <select onchange="setNote2()" class="form-control" name="date_minute" readonly="" required>
                                                    <?php
                                                    for ($i = 0; $i < 60; $i++):
                                                        $time = $i > 9 ? $i : "0" . $i;
                                                        ?>
                                                        <option <?= set_value('date_minute', $data->date_minute) == $time ? "selected" : "" ?>  value="<?= $time ?>"><?= $time ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <span class="input-group-addon normal-addon" style="padding: 2px">M</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('status'); ?>*</label>
                                            <select class="form-control" name="status" required>
                                                <?php foreach (config_model::$file_status as $key => $statusName): ?>
                                                    <option <?= set_value('status', $this->input->post('status')) == $statusName ? "selected" : "" ?> value="<?= $statusName ?>"><?= $statusName ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('type'); ?>*</label>
                                            <select class="form-control" name="type" required>
                                                <?php foreach (config_model::$file_types as $key => $file_type): ?>
                                                    <option <?= set_value('type', $this->input->post('file_type')) == $file_type ? "selected" : "" ?> value="<?= $file_type ?>"><?= $file_type ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('nature'); ?>*</label>
                                            <select class="form-control" name="nature" required>
                                                <?php foreach (config_model::$nature_types as $key => $nature): ?>
                                                    <option <?= set_value('nature', $this->input->post('nature')) == $nature ? "selected" : "" ?> value="<?= $nature ?>"><?= $nature ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('priority'); ?>*</label>
                                            <select class="form-control" name="priority" required>
                                                <?php foreach (config_model::$priority_types as $key => $priority_type): ?>
                                                    <option <?= set_value('priority', $this->input->post('priority_type')) == $priority_type ? "selected" : "" ?> value="<?= $priority_type ?>"><?= $priority_type ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('name_selection'); ?>*</label>
                                            <!--<input type="search" id="search_player_id" name="q" class="form-control search-input" placeholder="Search player" autocomplete="off">-->
                                            <input type="text" class="form-control" name="name_selection" placeholder="" value="<?= set_value('name_selection') ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('date'); ?>*</label>
                                            <input type="text" class="bdatepicker-date form-control" name="date" placeholder="<?php echo $this->lang->line('date'); ?>" value="<?= set_value('date', $this->input->post('date')) ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('sender_name'); ?>*</label>
                                            <input type="search" class="form-control search-input" name="q" placeholder="" value="<?= set_value('selection') ?>" autocomplete="off">
                                            <!--<input type="text" class="form-control" name="selection" placeholder="" value="<?= set_value('selection') ?>">-->
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?php echo $this->lang->line('delay_date'); ?>*</label>
                                            <input type="text" class="bdatepicker-delay_date form-control" name="delay_date" placeholder="<?php echo $this->lang->line('delay_date'); ?>" value="<?= set_value('delay_date', $this->input->post('delay_date')) ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <?php $alert_on_flag = false; ?>
                                    <?php foreach (config_model::$alert_types as $key => $alert_type): ?>
                                    <?php if($alert_type == 'On') { $alert_on_flag = true;} ?>
                                    <?php endforeach; ?>

                                    <?php if($alert_on_flag): ?>
                                    <div class="col-xs-4 col-sm-2 col-md-2 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('alert'); ?>*</label>
                                            <select class="form-control shedule" name="alert" required>
                                                <?php foreach (config_model::$alert_types as $key => $alert_type): ?>
                                                    <!--<option <?= set_value('alert', $this->input->post('alert_type')) == $alert_type ? "selected" : "" ?> value="<?= $alert_type ?>"><?= $alert_type ?></option>-->
                                                    <option <?= "Off" == $alert_type ? "selected" : "" ?> value="<?= $alert_type ?>"><?= $alert_type ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="if-shedule"></div>
                                    <?php endif; ?>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('destination'); ?>*</label>
                                            <select  onchange="setNote2()" class="form-control" name="destination" required>
                                                <?php foreach (config_model::$destination_types as $key => $destination_type): ?>
                                                    <option <?= set_value('destination', $this->input->post('destination_type')) == $destination_type ? "selected" : "" ?> value="<?= $destination_type ?>"><?= $destination_type ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('affected_user'); ?>*</label>
                                            <select class="form-control" name="name" required>
                                                <?php foreach ($users as $key => $user): ?>
                                                    <option <?= set_value('affected_user', $this->input->post('affected_user')) == $user['id'] ? "selected" : "" ?> value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-md-offset-5">
                                        <label style="padding-top: 10px;"><?= $this->lang->line('add_files'); ?>*</label>
                                        <div class="attach-div" style="" id="attachDiv">
                                            <div class="attach-main">
                                                <div class="attach-file">
                                                    <input type="file" name="files[]" required="">
                                                </div>
                                                <div class="attach-buttons">
                                                    <button type="button" class="btn btn-circle btn-success btn-sm addFile2"><iR class="fa fa-plus"></iR></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label><?= $this->lang->line('description'); ?>*</label>
                                            <textarea rows="3" name="description" required class="form-control" style="resize: none;"><?= set_value('note', $this->input->post('note')) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-xs-12" id="noteDIv" style="max-height: 400px;overflow: scroll;overflow-x: hidden;margin-top: 15px;margin-bottom: 15px;">
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
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-12">
                                <div class="text-right">
                                    <a href="<?= base_url("admin/filemanagement") ?>" class="btn btn-default">Cancel</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/bloodhound.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/typeahead.jquery.min.js"></script>

<script type="text/javascript">
                                                function setNote2() {
                                                    var firstname = $('[name="added_by_firstname"]').val();
                                                    var from_lbl = "<?= $this->lang->line('from'); ?>";
                                                    var from_lbl = "from";
                                                    var lastname = $('[name="added_by_lastname"]').val();
                                                    //var affected_department = $('[name="affected_department"]').val();
                                                    var affected_department = $('[name="destination"] option:selected').text();
                                                    var date = $('[name="send_date"]').val();
                                                    var date_hour = $('[name="send_date_hour"]').val();
                                                    var date_minute = $('[name="date_minute"]').val();

                                                    var last_added_by = 'Added by : ' + firstname + ' ' + lastname + ' ' + from_lbl + ' ' + affected_department + ' ' + date + ' ' + date_hour + ':' + date_minute;
                                                    $("input[name='note_added_by[]']:last").val(last_added_by);
                                                }

                                                $(document).ready(function () {
                                                    $(".bdatepicker-date").datepicker({
                                                        format: "dd/mm/yyyy"
                                                    }).datepicker("setDate", new Date());

                                                    $(".bdatepicker-delay_date").datepicker({
                                                        format: "dd/mm/yyyy"
                                                    }).datepicker("setDate", new Date("<?= set_value('delay_date', $this->input->post('delay_date')) ?>"));

                                                    $(".bdatepicker").datepicker({
                                                        format: "dd/mm/yyyy",
                                                    }).datepicker("setDate", new Date());


                                                    $(document.body).on("click", ".addFile2", function () {
                                                        $("#attachDiv").append('<div class="attach-main"> <div class="attach-file"> <input type="file" name="files[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addFile2"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm delFile2"><i class="fa fa-minus"></i></button></div></div>');
                                                    });

                                                    $(document.body).on("click", ".delFile2", function () {
                                                        $(this).closest('.attach-main').remove();
                                                    });

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

                                                    $(document).on("change", ".shedule", function () {
                                                        var shedule_val = $(this).val();
                                                        $('.if-shedule').empty();
                                                        if (shedule_val == "On") {
                                                            var if_schedule = '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3" style="margin-top:5px;">' +
                                                                    '<div class="form-group">' +
                                                                    '<label>Number of days before</label>' +
                                                                    '<div class="input-group">' +
                                                                    '<select class="form-control" name="alert_before_day" required><?php for ($i = 0; $i < 30; $i++): $time = $i > 9 ? $i : "0" . $i; ?> <option value="<?= $time ?>"><?= $time ?></option> <?php endfor; ?> </select> ' +
                                                                    '<span class="input-group-addon normal-addon"><button type="button" class="btn btn-circle btn-success btn-sm"><i class="fa fa-plus"></i></button></span>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>';
                                                            $('.if-shedule').append(if_schedule);
                                                        }
                                                    });

                                                    setNote2();

                                                    var find_url = "<?php echo site_url(); ?>admin/files/search_user";

                                                    // Set the Options for "Bloodhound" suggestion engine
                                                    // Referance URLs
                                                    // typeahead : https://scotch.io/tutorials/implementing-smart-search-with-laravel-and-typeahead-js
                                                    // https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md#options

                                                    var engine = new Bloodhound({
                                                        remote: {
                                                            url: find_url + '?q=%QUERY%',
                                                            wildcard: '%QUERY%',
                                                            replace: function (url, uriEncodedQuery) {
                                                                var search_query = jQuery("input.search-input[name=q]").val();
                                                                return url + '&query=' + encodeURIComponent(search_query)
                                                            },
                                                        },
                                                        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                                                        queryTokenizer: Bloodhound.tokenizers.whitespace
                                                    });

                                                    $(".search-input").typeahead({
                                                        hint: true,
                                                        highlight: true,
                                                        minLength: 1
                                                    }, {
                                                        source: engine.ttAdapter(),

                                                        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                                                        name: 'usersList',

                                                        // the key from the array we want to display (name,id,email,etc...)
                                                        templates: {
                                                            empty: [
                                                                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                                                            ],
                                                            header: [
                                                                '<div class="list-group search-results-dropdown">'
                                                            ],
                                                            suggestion: function (data) {
                                                                //                var all_clusters = jQuery(".all_clusters option:selected").val();
                                                                //                var all_hospitals = jQuery(".all_hospitals option:selected").val();
                                                                //                var all_departments = jQuery(".all_departments option:selected").val();
                                                                return '<a href="javascript:void(0);" class="list-group-item">' + data + '</a>'
                                                            }
                                                        }
                                                    });
                                                });
</script>