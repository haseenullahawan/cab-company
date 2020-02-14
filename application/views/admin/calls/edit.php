<?php $locale_info = localeconv(); ?>
<style type="text/css">
    h2{
        font-size: 22px;
        font-weight: 600;
    }
    .text_company p{
        margin-bottom:0px;
    }

    .text_company p:nth-last-child(1){  
     margin-top:15px;
     margin-bottom:10px;
    }
    .image-file-wrap {
        width: 100%;
        min-height: 220px;
        margin-top: 30px;
    }
   
    .social_icons {
        position:absolute;
        bottom:11px;
        left:41%;
        margin-bottom:0px;
    }
    .social_icons a{
        font-size: 12px;
        display: inline-block;
        height: 25px;
        width: 25px;
        background: #fff;
        border-radius: 50%;
        text-align: center;
        line-height: 25px;
        margin-right: 15px;
    }
    .profile_circle{
        width: 200px;
        height: 200px;
        border-radius: 50%;
        display: inline-block;
        overflow: hidden;
        margin-top: 15px;
    }
    .profile_circle img{
        width: 100%;
    }
    .text_company{
        margin-top: 24px;
    }
    .text_company > p >span:nth-child(1){
        font-weight: 600;
        font-size: 16px;
        width: auto;
        display: inline-block;
    }
    .circle_image{
        width: 200px;
        height: 200px;
        border-radius: 100% !important;
        overflow: hidden;
    }
    .circle_image img{
        max-width: 100%;
        height: 100%;
    }
    .company_image img{
        width: 100%;
        max-width: 300px;
        max-height: 370px;
    }
    .section-company-info{
        margin: 10px 0px;
        max-height: 600px;
        border: 2px solid #a4a8ab;
        position:relative;
    }
    .main-signature{
        background: -webkit-linear-gradient(white, white, whitesmoke, whitesmoke, #ECECEC, #CECECE);
    }
</style>
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
                        <?=form_open("admin/calls/".$data->id."/update")?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Civility*</label>
                                    <select disabled class="form-control" name="civility" required>
                                        <?php foreach(config_model::$civility as $key => $civil):?>
                                            <option <?=set_value('civility',$data->civility) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nom*</label>
                                    <input readonly type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*" value="<?=set_value('name',$data->first_name)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Prenom*</label>
                                    <input readonly type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom*" value="<?=set_value('prename',$data->last_name)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Objet de l'appel*</label>
                                    <select disabled class="form-control" name="subject" required>
                                        <option value="">Objet de l'appel</option>
                                        <?php foreach(config_model::$call_subjects as $key => $subject):?>
                                            <option <?=set_value('subject',$data->subject) == $subject ? "selected" : ""?> value="<?=$subject?>"><?=$subject?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Jours de Rappel*</label>
                                    <select disabled class="form-control" name="days" required>
                                        <option value="">Jours de Rappel</option>
                                        <?php foreach(config_model::$call_days as $key => $day):?>
                                            <option <?=set_value('days',$data->days) == $day ? "selected" : ""?> value="<?=$day?>"><?=$day?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>From Time*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon normal-addon">DE</span>
                                        <select disabled class="form-control" name="from_time" required>
                                            <?php for($i = 0; $i <= 24; $i++):
                                                $time = $i > 9 ? $i : "0".$i; ?>
                                                <option <?=set_value('from_time',$data->from_time) == $time ? "selected" : ""?>  value="<?=$time?>"><?=$time?></option>
                                            <?php endfor;?>
                                        </select>
                                        <span class="input-group-addon normal-addon">H</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>To Time*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon normal-addon">A</span>
                                        <select disabled class="form-control" name="to_time" required>
                                            <?php for($i = 0; $i <= 24; $i++):
                                                $time = $i > 9 ? $i : "0".$i; ?>
                                                <option <?=set_value('to_time',$data->to_time) == $time ? "selected" : ""?> value="<?=$time?>"><?=$time?></option>
                                            <?php endfor;?>
                                        </select>
                                        <span class="input-group-addon normal-addon">H</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input readonly id="phone-email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email" value="<?=set_value('email',$data->email)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Telephone*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input readonly id="num2" maxlength="50" type="text" class="form-control" required name="num" placeholder="Telephone" value="<?=set_value('num',$data->telephone)?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Entreprise ou Organisme (Optionnel)</label>
                                    <input readonly type="text" class="form-control" name="company" placeholder="" value="<?=set_value('company',$data->company)?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach(config_model::$status as $key => $status):?>
                                            <option <?=set_value('status',$data->status) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Subject*</label>
                                    <select style="width:66%;" disabled class="form-control" name="msg_subject" required>
                                        <?php foreach(config_model::$subjects as $key => $subject):?>
                                            <?php $selected = $key == 0 ? "selected" : ""?>
                                            <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <pre class="disabled" style="background: #eee;height:100px;"><?=set_value('message',$data->message)?></pre>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1" style="padding-top: 5px">
                                Add note
                            </div>
                            <div class="col-md-8" id="noteDIv">
                                <?php if($notes != false){?>
                                    <?php foreach($notes as $key => $note):?>
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <input type="text" class="form-control" placeholder="Write note here" name="note[]" value="<?=$note->note?>">
                                            </div>
                                            <div class="col-xs-2">
                                                <button type="button" class="btn btn-circle btn-success btn-sm addNote"><i class="fa fa-plus"></i></button>
                                                <?php if($key > 0){?>
                                                    <button type="button" class="btn btn-circle btn-danger btn-sm delNote"><i class="fa fa-minus"></i></button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <input type="text" class="form-control" placeholder="Write note here" name="note[]">
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="button" class="btn btn-circle btn-success btn-sm addNote"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <div class="text-right">
                                    <button type="button" class="btn btn-default replyBtn">Close</button>
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/calls")?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <br>
                        <?php if(isset($replies) && !empty($replies)){?>
                            <?php foreach($replies as $key => $item):?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <ul style="display: inline-block;padding-left:0px;">
                                                <li style="display: inline-block"><?=create_request_reply_uid($item->id,$item->addedBy,1);?></li>
                                                <?php $department = create_request_reply_uid($item->id,$item->addedBy,2); 
                                                if($department != ""){
                                                ?>
                                                    <li style="display: inline-block;padding-left:5px;"> From <?=$department?> department</li>
                                                <?php } ?>
                                                <li style="display: inline-block;padding-left:5px;"><?=from_unix_date($item->created_at)?></li>
                                                <li style="display: inline-block;padding-left:5px;"><?=from_unix_time($item->created_at)?></li>
                                            </ul>
                                            <?php $row_data = $this->userx_model->get(['user.id' => $item->addedBy]); ?>
                                            <div class="main-signature">
                                                <p class="disabled" style="background:none;margin-top: -10px;min-height: 15px;border-radius: 0;border: 1px solid #a4a8ab;border-bottom: 0;border-top-left-radius: 5px;border-top-right-radius: 5px;"><span style="display: block;width: 55%;padding: 5px 10px 10px 15px;"><?=strip_tags($item->message);?></span></p>
                                                <div class="row section-company-info" style="margin-top: -10px;border: 1px solid #a4a8ab;border-top: 0;border-radius: 5px; border-top-right-radius: 0px;border-top-left-radius: 0px;border-bottom-right-radius:5px;">
                                                <p class="social_icons">
                                                            <?php if(isset($company_data['facebook_link']) && !empty($company_data['facebook_link'])){?>
                                                                <a href="<?php echo $company_data['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                            <?php } ?>
                                                            <?php if(isset($company_data['youtube_link']) && !empty($company_data['youtube_link'])){?>
                                                                <a href="<?php echo $company_data['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                                            <?php } ?>
                                                            <?php if(isset($company_data['instagram_link']) && !empty($company_data['instagram_link'])){?>
                                                                <a href="<?php echo $company_data['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                                            <?php } ?>
                                                        </p>   
                                                <div class="col-lg-3 col-md-6">
                                                        <?php if(!empty($row_data['image'])){ ?>
                                                            <div class="profile_image">
                                                                <a href="" class="profile_circle"><img style="width: 100%; height: 100%" class="user_avatar_preview" <?php if(!empty($row_data['image'])){ ?>src="<?php echo base_url('uploads/user').'/'.$row_data['image'];?>" <?php } ?> alt=""></a>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="text_company">
                                                            <?php if(isset($company_data['name']) && !empty($company_data['name'])){?>
                                                                <p style="color:#0072bb;"><span><?php echo $company_data['name']; ?></span></p>
                                                            <?php } ?>
                                                            <p style="color:#0072bb; margin-bottom:20px;"><span style="width: 0px;"></span><span style="font-size: 13px; font-weight: 600;" id="civ-spider-area"><?=ucfirst($row_data['gender']);?></span>   <span id="first-spider-area" style="font-size: 13px; font-weight: 600;"><?=$row_data['first_name'];?></span>  <span style="font-size: 13px; font-weight: 600;" id="last-spider-area"><?=$row_data['last_name'];?></span></p>
                                                            <?php if(isset($company_data['email']) && !empty($company_data['email'])){?>
                                                                <p><i class="fa fa-envelope" style="color:#0072bb;font-size:18px;width:20px"></i>&nbsp;<span>Email :</span>&nbsp;<span style="color:#0072bb;"><a style="text-decoration: underline !important" href="mailto:<?php echo $company_data['email']; ?>"><?php echo $company_data['email']; ?></a></span></p>
                                                            <?php } ?>
                                                            <?php if(isset($company_data['phone']) && !empty($company_data['phone'])){?>
                                                                <p><i class="fa fa-phone" style="color:#0072bb;font-size:18px;width:20px"></i>&nbsp;<span>Phone :</span>&nbsp;<span style="color:#0072bb;"><a style="text-decoration: underline !important" href="tel:<?php echo $company_data['phone']; ?>"><?php echo $company_data['phone']; ?></a></span></p>
                                                            <?php } ?>
                                                            <?php if(isset($company_data['fax']) && !empty($company_data['fax'])){?>
                                                                <p><i class="fa fa-print" style="color:#0072bb;font-size:18px;width:18px"></i>&nbsp; <span>Fax :</span>&nbsp;<span style="color:#0072bb;"><a style="text-decoration: underline !important" href="fax:<?php echo $company_data['fax']; ?>"><?php echo $company_data['fax']; ?></a></span></p>
                                                            <?php } ?>
                                                            <?php if(isset($company_data['city']) && !empty($company_data['city'])){?>
                                                                <p><i class="fa fa-map-marker" style="color:#0072bb;font-size:18px;width:20px"></i>&nbsp;<span>Address :</span>&nbsp;<span style="color:#0072bb;"><?php echo $company_data['city'].' '.$company_data['country']; ?></span></p>
                                                            <?php } ?>
                                                            <?php if(isset($company_data['website']) && !empty($company_data['website'])){?>
                                                                <p><i class="fa fa-globe" style="color:#0072bb;font-size:18px;width:20px"></i>&nbsp;<span>Website :</span>&nbsp;<span style="color:#0072bb;"><a style="text-decoration: underline !important" target="_blank" href="<?php echo $company_data['website']; ?>"><?php echo $company_data['website']; ?></a></span></p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 " style="margin-top: 18px;">
                                                        <div class="profile_image">
                                                            <a href="" class="company_image"><img
                                                                <?php if(isset($company_data['logo']) && !empty($company_data['logo'])){?>
                                                                src="<?= base_url('uploads/company').'/'.$company_data['logo'];?>"
                                                                <?php } ?> alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php if($item->attachments != ""){ ?>
                                            <div class="form-group pull-right btn-default" style="height: 35px;padding: 5px;width: auto;border: 1px solid #a4a8ab;border-radius: 5px;">
                                                <?php 
                                                    $attachments = $item->attachments;
                                                    if($attachments != ""){
                                                        $attachments = explode(",", $attachments);
                                                        $count = count($attachments);
                                                        foreach ($attachments as $a) { ?>
                                                            <a target="_blank" href="<?=base_url()."assets/attachment/".$a?>"><?=$a?></a> <?php if($count > 1){ echo "|"; } ?>
                                                    <?php } } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>
                        <br>
                        <?=form_open("admin/calls/".$data->id . "/reply", 'enctype="multipart/form-data"')?>
                        <div class="row replyDiv">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea rows="5" class="form-control reply_message" id="reply_message" name="reply_message" required placeholder="Write your message"><?=set_value('reply_message')?></textarea>
                                    <script>
                                        CKEDITOR.replace("reply_message", {
                                            customConfig: "<?=base_url("assets/system_design/config.js")?>"
                                        });
                                    </script>
                                </div>
                            </div><div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1 col-xs-12" style="padding-top: 5px;white-space: nowrap">
                                        Quick reply:
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="num2" class="form-control" style="margin-top:2px;">
                                                <option value="">---Select---</option>
                                                <?php foreach ($quick_replies as $q) { ?>
                                                    <option value="<?=$q->id?>"><?=$q->name?></option>
                                                <?php } ?>
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
                                    <div class="col-md-2 col-xs-12">
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
<input type="hidden" id = "replyType" value="3">
<script type="text/javascript">
    $(document).ready(function(){
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });
        // $("select[id='num2']").change(function(){
        //     var val = $(this).val();
        //     CKEDITOR.instances['reply_message'].insertHtml(val);
        // });
    });
</script>