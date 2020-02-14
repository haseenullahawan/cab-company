<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: lightseagreen;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
                        <?=form_open("admin/popups/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-1">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <div class="w-100">
                                        <label class="switch">
                                            <input id="checkbox1" type="checkbox" <?php if($data->status1 == 1){echo 'checked';} ?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status1" value="<?=$data->status1?>">
                                    <!-- <select name="status1" id="status1" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status1 == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status1 == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>Request Closing Days*</label>
                                    <select class="form-control" name="request_closing_days_1" id="request_closing_days_1">
                                        <?php for($i = 0; $i < 31; $i++){ ?>
                                            <option <?php if($i == $data->request_closing_days_1){echo "selected";} ?> value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Name of Popup*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name1" placeholder="Name*" value="<?=set_value('name1',$data->name1)?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Auto Open*</label>
                                    <select name="auto_open1" id="auto_open1" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->auto_open1 == 1){echo 'selected';} ?> value="1">Yes</option>
                                        <option <?php if($data->auto_open1 == 0){echo 'selected';} ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Position*</label>
                                    <select name="position1" id="position1" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->position1 == 1){echo 'selected';} ?> value="1">Top</option>
                                        <option <?php if($data->position1 == 2){echo 'selected';} ?> value="2">Left</option>
                                        <option <?php if($data->position1 == 3){echo 'selected';} ?> value="3">Right</option>
										<option <?php if($data->position1 == 4){echo 'selected';} ?> value="4">Bottom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Success Message*</label>
                                    <textarea rows="4" class="form-control message1" name="message1" placeholder="Message"><?=set_value('name1',$data->success_message1)?></textarea>
                                    <script>
                                        CKEDITOR.replace("message1", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-1">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <div class="w-100">
                                        <label class="switch">
                                            <input id="checkbox2" type="checkbox" <?php if($data->status2 == 1){echo 'checked';} ?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status2" value="<?=$data->status2?>">
                                    <!-- <select name="status2" id="status2" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status2 == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status2 == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>Request Closing Days*</label>
                                    <select class="form-control" name="request_closing_days_2" id="request_closing_days_2">
                                        <?php for($i = 0; $i < 31; $i++){ ?>
                                            <option <?php if($i == $data->request_closing_days_2){echo "selected";} ?> value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Name of Popup*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name2" placeholder="Name*" value="<?=set_value('name2',$data->name2)?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Auto Open*</label>
                                    <select name="auto_open2" id="auto_open2" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->auto_open2 == 1){echo 'selected';} ?> value="1">Yes</option>
                                        <option <?php if($data->auto_open2 == 0){echo 'selected';} ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Position*</label>
                                    <select name="position2" id="position2" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->position2 == 1){echo 'selected';} ?> value="1">Top</option>
                                        <option <?php if($data->position2 == 2){echo 'selected';} ?> value="2">Left</option>
                                        <option <?php if($data->position2 == 3){echo 'selected';} ?> value="3">Right</option>
										<option <?php if($data->position2 == 4){echo 'selected';} ?> value="4">Bottom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Success Message*</label>
                                    <textarea rows="4" class="form-control message2" name="message2" placeholder="Message"><?=set_value('name2',$data->success_message2)?></textarea>
                                    <script>
                                        CKEDITOR.replace("message2", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-1">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <div class="w-100">
                                        <label class="switch">
                                            <input id="checkbox3" type="checkbox" <?php if($data->status3 == 1){echo 'checked';} ?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status3" value="<?=$data->status3?>">
                                    <!-- <select name="status3" id="status3" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status3 == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status3 == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>Request Closing Days*</label>
                                    <select class="form-control" name="request_closing_days_3" id="request_closing_days_3">
                                        <?php for($i = 0; $i < 31; $i++){ ?>
                                            <option <?php if($i == $data->request_closing_days_3){echo "selected";} ?> value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Name of Popup*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name3" placeholder="Name*" value="<?=set_value('name1',$data->name3)?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Auto Open*</label>
                                    <select name="auto_open3" id="auto_open3" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->auto_open3 == 1){echo 'selected';} ?> value="1">Yes</option>
                                        <option <?php if($data->auto_open3 == 0){echo 'selected';} ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Position*</label>
                                    <select name="position3" id="position3" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->position3 == 1){echo 'selected';} ?> value="1">Top</option>
                                        <option <?php if($data->position3 == 2){echo 'selected';} ?> value="2">Left</option>
                                        <option <?php if($data->position3 == 3){echo 'selected';} ?> value="3">Right</option>
										<option <?php if($data->position3 == 4){echo 'selected';} ?> value="4">Bottom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Success Message*</label>
                                    <textarea rows="4" class="form-control message3" name="message3" placeholder="Message"><?=set_value('name1',$data->success_message3)?></textarea>
                                    <script>
                                        CKEDITOR.replace("message3", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-xs-1">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <div class="w-100">
                                        <label class="switch">
                                            <input id="checkbox4" type="checkbox" <?php if($data->status4 == 1){echo 'checked';} ?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status4" value="<?=$data->status4?>">
                                    <!-- <select name="status1" id="status1" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->status4 == 1){echo 'selected';} ?> value="1">Enabled</option>
                                        <option <?php if($data->status4 == 0){echo 'selected';} ?> value="0">Disabled</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>Request Closing Days*</label>
                                    <select class="form-control" name="request_closing_days_4" id="request_closing_days_4">
                                        <?php for($i = 0; $i < 31; $i++){ ?>
                                            <option <?php if($i == $data->request_closing_days_4){echo "selected";} ?> value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Name of Popup*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name4" placeholder="Name*" value="<?=set_value('name1',$data->name4)?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Auto Open*</label>
                                    <select name="auto_open4" id="auto_open4" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->auto_open4 == 1){echo 'selected';} ?> value="1">Yes</option>
                                        <option <?php if($data->auto_open4 == 0){echo 'selected';} ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Position*</label>
                                    <select name="position4" id="position4" class="form-control" required >
                                        <option value="">---Select---</option>
                                        <option <?php if($data->position4 == 1){echo 'selected';} ?> value="1">Top</option>
                                        <option <?php if($data->position4 == 2){echo 'selected';} ?> value="2">Left</option>
                                        <option <?php if($data->position4 == 3){echo 'selected';} ?> value="3">Right</option>
                                        <option <?php if($data->position4 == 4){echo 'selected';} ?> value="4">Bottom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Success Message*</label>
                                    <textarea rows="4" class="form-control message4" name="message4" placeholder="Message"><?=set_value('name4',$data->success_message4)?></textarea>
                                    <script>
                                        CKEDITOR.replace("message4", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/popups/1/edit")?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <hr>
                        <br>
                        <!-- <?=form_open("admin/settings/".$data1->id."/update")?>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Request Closing Days*</label>
                                    <select class="form-control" name="request_closing_days" id="request_closing_days">
                                        <?php for($i = 0; $i < 31; $i++){ ?>
                                            <option <?php if($i == $data1->request_closing_days){echo "selected";} ?> value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/popups/1/edit")?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?> -->
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
        $('#checkbox1').click(function(){
            if($(this).prop("checked") == true){
                $("input[name='status1']").val("1");
            }
            else if($(this).prop("checked") == false){
                $("input[name='status1']").val("0");
            }
        });
        $('#checkbox2').click(function(){
            if($(this).prop("checked") == true){
                $("input[name='status2']").val("1");
            }
            else if($(this).prop("checked") == false){
                $("input[name='status2']").val("0");
            }
        });
        $('#checkbox3').click(function(){
            if($(this).prop("checked") == true){
                $("input[name='status3']").val("1");
            }
            else if($(this).prop("checked") == false){
                $("input[name='status3']").val("0");
            }
        });
        $('#checkbox4').click(function(){
            if($(this).prop("checked") == true){
                $("input[name='status4']").val("1");
            }
            else if($(this).prop("checked") == false){
                $("input[name='status4']").val("0");
            }
        });
    });
</script>