<?php $locale_info = localeconv(); ?>
    <script src="<?php echo base_url(); ?>/assets/system_design/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>

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
                        <?=form_open("admin/request/".$data->id."/update")?>
                        <div class="row">
                           
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nom*</label>
                                    <input disabled type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*" value="<?=set_value('name',$data->registered_name)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input disabled id="phone-email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email" value="<?=set_value('email',$data->email)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Phone*</label>
                                    <input disabled type="text" maxlength="100" class="form-control" required name="phone" placeholder="phone*" value="<?=set_value('phone',$data->phone)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Pick up Date*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input disabled id="pick-up-date" maxlength="100" type="email" class="form-control" required name="pick_date" placeholder="Votre datetime" value="<?=set_value('email',$data->pick_date)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Pick up time*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input disabled id="num2" maxlength="50" type="text" class="form-control" required name="pick_time" placeholder="pick time" value="<?=set_value('tel',$data->pick_time)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>book date</label>
                                    <input disabled type="text" class="form-control" name="bookdate" placeholder="" value="<?=set_value('bookdate',$data->bookdate)?>">
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Pick point*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input disabled id="pick_point"  type="text" class="form-control" required name="pick_point" placeholder="Votre pick point" value="<?=set_value('pick_point',$data->pick_point)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Drop point*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input disabled id="num2"  type="text" class="form-control" required name="drop_point" placeholder="pick drop_point" value="<?=set_value('drop_point',$data->drop_point)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Distance</label>
                                    <input disabled type="text" class="form-control" name="distance" placeholder="" value="<?=set_value('distance',$data->distance)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="is_conformed" required>
                                        <?php foreach(config_model::$status_booking as $key => $status):?>
                                            <option <?=set_value('is_conformed',$data->is_conformed) == strtolower($status) ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Cost</label>
                                    <input type="text" class="form-control" name="cost_of_journey" placeholder="" value="<?=set_value('cost_of_journey',$data->cost_of_journey)?>">
                                </div>
                            </div>
                        </div>
                     <!--    <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Subject*</label>
                                    <select disabled class="form-control" name="msg_subject" required>
                                        <?php

                                      //   foreach(config_model::$subjects as $key => $subject):?>
                                            <?php //$selected = $key == 1 ? "selected" : ""?>
                                            <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>
                                        <?php //endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <pre class="disabled" style="background: #eee"><?php  //echo set_value('message',$data->message)?></pre>
                                </div>
                            </div>
                        </div> -->
                        <div class="text-right">
                            <button type="button" class="btn btn-default replyBtn">Close</button>
                            <button class="btn btn-default">Update</button>
                            <a href="<?=base_url("admin/bookings")?>" class="btn btn-default">Cancel</a>
                        </div>
                        <?php echo form_close(); ?>
                        <br>
                        <?=form_open("admin/bookings/".$data->id . "/reply")?>
                        <div class="row replyDiv">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea class="form-control reply_message" id="reply_message" name="reply_message" required placeholder="Write your message"><?=set_value('reply_message')?></textarea>
                                    <script>
                                        CKEDITOR.replace("reply_message", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1" style="padding-top: 5px;white-space: nowrap">
                                        Quick reply:
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="num2">
                                                <option>Test</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="attach-label">Add files: </div>
                                        <div class="attach-div" style="" id="attachDiv">
                                            <div class="attach-main">
                                                <div class="attach-file">
                                                    <input type="file" name="attachment[]">
                                                </div>
                                                <div class="attach-buttons">
                                                    <button type="button" class="btn btn-circle btn-success btn-sm addFile"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-right">
                                            <button class="btn btn-default">Send</button>
                                            <button type="button" class="btn btn-default replyBtn">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
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