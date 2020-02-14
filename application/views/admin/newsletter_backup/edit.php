<?php $locale_info = localeconv(); ?>
    <link href="<?php echo base_url(); ?>assets/system_design/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
                        <?=form_open("admin/newsletter/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach(config_model::$newsletter_status as $key => $statusName):?>
                                        <option <?=set_value('status',$data->status) == $statusName ? "selected" : ""?> value="<?=$statusName?>"><?=$statusName?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>User type*</label>
                                    <select class="form-control" name="user_type" required>
                                        <?php foreach(config_model::$user_types as $key => $user_type):?>
                                        <option <?=set_value('user_type',$data->user_type) == $user_type ? "selected" : ""?> value="<?=$user_type?>"><?=$user_type?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Category*</label>
                                    <select class="form-control" name="category" required>
                                        <?php foreach(config_model::$categories as $key => $category):?>
                                        <option <?=set_value('category',$data->category) == $category ? "selected" : ""?> value="<?=$category?>"><?=$category?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Status of Users*</label>
                                    <select class="form-control" name="user_status" required>
                                        <?php foreach(config_model::$user_status as $key => $u_status):?>
                                        <option <?=set_value('user_status',$data->user_status) == $category ? "selected" : ""?> value="<?=$u_status?>"><?=$u_status?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Subject*</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?=set_value('subject',$data->subject)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">                    
                                    <label><?php echo $this->lang->line('description');?></label>
                                    <textarea class="ckeditor" id="editor1" name="description" cols="100" rows="10">
                                        <?=set_value('description', html_entity_decode($data->description))?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="form-group">
                                     <!--<label>Date*</label>-->
                                    <button class="btn btn-default">Send Now</button>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <!--<label>Date*</label>-->
                                    <input type="text" class="bdatepicker form-control" name="send_date" placeholder="Date" value="<?=set_value('send_date',$data->send_date)?>">
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <!--<label>From Time*</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon normal-addon"></span>
                                        <select class="form-control" name="send_date_hour" required>
                                            <?php for($i = 0; $i < 24; $i++):
                                                $time = $i > 9 ? $i : "0".$i; ?>
                                                <option <?=set_value('send_date_hour',$data->send_date_hour) == $time ? "selected" : ""?>  value="<?=$time?>"><?=$time?></option>
                                            <?php endfor;?>
                                        </select>
                                        <span class="input-group-addon normal-addon">H</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <!--<label>From Time*</label>-->
                                    <div class="input-group">
                                        <span class="input-group-addon normal-addon"></span>
                                        <select class="form-control" name="send_date_minute" required>
                                            <?php for($i = 0; $i < 60; $i++):
                                                $time = $i > 9 ? $i : "0".$i; ?>
                                                <option <?=set_value('send_date_minute',$data->send_date_minute) == $time ? "selected" : ""?>  value="<?=$time?>"><?=$time?></option>
                                            <?php endfor;?>
                                        </select>
                                        <span class="input-group-addon normal-addon">M</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<!--                        <div class="text-left">
                            <button class="btn btn-default">Send Now</button>
                            <a href="<?=base_url("admin/newsletter")?>" class="btn btn-default">Cancel</a>
                        </div>-->
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