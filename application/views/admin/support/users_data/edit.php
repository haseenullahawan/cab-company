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
        <?php $this->load->view('admin/support/common/breadcrumbs');?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/support/common/alert');?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                    </div>
                    <div class="module-body">
						<?php $attributes = array("enctype" => 'multipart/form-data'); ?>
                        <?=form_open("user/support/".$data->id."/ticket_update", $attributes)?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Civility*</label>
                                    <select disabled class="form-control" name="civility" required>
                                        <?php foreach(config_model::$civility as $key => $civil):?>
                                            <option <?=set_value('civility',$data->p_title) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nom*</label>
                                    <input readonly type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*" value="<?=set_value('name',$data->fname)?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Prenom*</label>
                                    <input readonly type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom*" value="<?=set_value('prename',$data->lname)?>">
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Entreprise ou Organisme</label>
									<input readonly type="text" name="company_name" class="form-control" placeholder="Entreprise" value="<?=set_value('company_name',$data->company)?>">
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
                                        <input readonly id="num2" maxlength="50" type="text" class="form-control" required name="tel" placeholder="Telephone" value="<?=set_value('tel',$data->phone)?>">
                                    </div>
                                </div>
                            </div>
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
							
							<div class="col-md-4">   
								<div class="form-group"><label>Mobile</label>
									<input readonly type="text" class="form-control" name="mobile" maxlength="11" placeholder="Mobile" value="<?=set_value('mobile',$data->mobile)?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Department <span class="mandatory">*</span></label>  
									 <select disabled class="form-control" name="department">
										<option value="10" <?php echo $data->department==10?'selected':''; ?>>Booking service</option>
										<option value="11" <?php echo $data->department==11?'selected':''; ?>>Clients Service</option>
										<option value="12" <?php echo $data->department==12?'selected':''; ?>>Driver Service</option>
										<option value="13" <?php echo $data->department==13?'selected':''; ?>>Accounting Service</option>
										<option value="14" <?php echo $data->department==14?'selected':''; ?>>Sales Department</option>
										<option value="15" <?php echo $data->department==15?'selected':''; ?>>Technical Service</option>
										<option value="16" <?php echo $data->department==16?'selected':''; ?>>Disclaimer Service</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Priorité  <span class="mandatory">*</span></label>
									<select disabled class="form-control" name="priority">
										<option value="High" <?php echo $data->priority=='High'?'selected':''; ?>>High</option>
										<option value="Medium" <?php echo $data->priority=='Medium'?'selected':''; ?>>Medium</option>
										<option value="Low" <?php echo $data->priority=='Low'?'selected':''; ?>>Low</option>
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
                                            <?php $selected = $key == 1 ? "selected" : ""?>
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
                                    <pre class="disabled" style="background: #eee;white-space: pre-wrap;word-break: break-word;"><?=set_value('message',$data->message)?></pre>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4 pull-right">
								<div class="form-group">
									<label> Attached File(s): </label>
									<?php $attachments = $obj->GetSupportAttachments($data->id); ?>
									<?php if(!empty($attachments)){ ?>
									<?php foreach($attachments as $k=>$v){ ?>
									<a target="_blank" class="btn btn-default pull-right" href="<?php echo 'http://handi-express.fr/uploads/contact_files/'.$v->filename; ?>"><?php echo $v->filename; ?></a><br/><br/>
									<?php } ?>
									<?php } ?>
								</div>
								<div class="clearfix"></div>
							</div>
                        </div>
                        <div class="text-right">
                            <!--<button type="button" onclick="window.location.href='<?php echo 'http://handi-express.fr/admin/support/closeTicket'.'/'.$data->id ?>'" class="btn btn-default">Close</button>-->
                            <!--<button type="button" class="btn btn-default replyBtn">Reply</button>-->
                            <a href="<?=base_url("admin/support")?>" class="btn btn-default">Cancel</a>
							<button class="btn btn-default">Update</button>
                        </div>
                        <?php echo form_close(); ?>
                        <br>
                        <?php if(isset($previous_replies) && !empty($previous_replies)){?>
                            <?php foreach($previous_replies as $key => $item):?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <ul style="display: inline-block;padding-left:0px;">
                                                <li style="display: inline-block"><?=create_support_reply_uid($item->id,$item->addedBy,1);?></li>
                                                <?php $department = create_support_reply_uid($item->id,$item->addedBy,2); 
                                                if($department != ""){
                                                ?>
                                                    <li style="display: inline-block;padding-left:5px;"> From <?=$department?> department</li>
                                                <?php } ?>
                                                <li style="display: inline-block;padding-left:5px;"><?=from_unix_date($item->created_on)?></li>
                                                <li style="display: inline-block;padding-left:5px;"><?=from_unix_time($item->created_on)?></li>
                                            </ul>
                                            <?php $row_data = $this->userx_model->get(['user.id' => $item->addedBy]); ?>
                                            <div class="main-signature">
                                                <p class="disabled" style="background:none;margin-top: -10px;min-height: 15px;border-radius: 0;border: 1px solid #a4a8ab;border-bottom: 0;border-top-left-radius: 5px;border-top-right-radius: 5px;"><span style="display: block;width: 55%;padding: 5px 10px 10px 15px;"><?php //strip_tags($item->message);?></span></p>
												<div class="col-md-12 main-sig-message">
												<?php
													$mess1 = str_replace("{sender_name}",$user->first_name." ".$user->last_name,$item->message);
													$mess2 = str_replace("{user_name}",$user->username,$mess1);
													$mess3 = str_replace("{department_name}",$user->department,$mess2);
													$mess4 = str_replace("{support_status}",$data->status,$mess3);
													$mess5 = str_replace("{date}",from_unix_date($data->created_on),$mess4);
													$mess6 = str_replace("{time}",from_unix_time($data->created_on),$mess5);

													echo $mess6;
													//strip_tags($item->message);
												?>
												</div>
												
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
						
                        <?=form_open("user/support/".$data->id . "/ticket_reply", 'enctype="multipart/form-data"')?>
                        <div class="row replyDiv">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea rows="5" maxlength="5000" class="form-control" id="reply_message" name="reply_message" required placeholder="Write your message"><?=set_value('reply_message')?></textarea>
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
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select id="num2" class="form-control" name="quick_replies" style="margin-top:2px;">
                                                <option value="">---Select---</option>
                                                <?php foreach ($quick_replies as $q) { ?>
                                                    <option value="<?=$q->id?>"><?=$q->name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="padding-top: 5px">
                                        Add files:
                                    </div>
                                    <div class="col-md-3" id="attachDiv">
                                        <div class="row">
                                            <div class="col-xs-8" style="overflow: hidden">
                                                <input type="file" name="attachment[]">
                                            </div>
                                            <div class="col-xs-4">
                                                <button type="button" class="btn btn-circle btn-success btn-sm addFile"><i class="fa fa-plus"></i></button>
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
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>USEFUL CODES TO USE:</label>
                                    <br>
                                    <span><a href="javascript:void();" onclick="appendText('{sender_name}')" >{sender_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{user_name}')" >{user_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{department_name}')" >{department_name}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{support_status}')" >{support_status}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{date}')" >{date}</a></span>
                                    <span><a href="javascript:void();" onclick="appendText('{time}')" >{time}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<div style="display:none;">
<?php foreach ($quick_replies as $q) { ?>
	<span id="message-<?=$q->id?>"><?=$q->message_sentence?></span>
<?php } ?>
</div>
<input type="hidden" id = "replyType" value="4">
<script type="text/javascript">
	var textarea = document.querySelector('textarea');

	textarea.addEventListener('keydown', autosize);
				 
	function autosize(){
	  var el = this;
	  setTimeout(function(){
		el.style.cssText = 'height:auto; padding:0';
		// for box-sizing other than "content-box" use:
		// el.style.cssText = '-moz-box-sizing:content-box';
		el.style.cssText = 'height:' + el.scrollHeight + 'px';
	  },0);
	}

    $(document).ready(function(){
        $("select[id='quick_replies']").change(function(){
            var val = $(this).val();
			if(val != ''){
				// $.ajax({
					// type: "POST",
					// url: "https://handi-express.fr/support/getQuickReply/"+ val,
					// data: { id: val },
					// success: function(res){
						// alert(res);
						// $("#reply_message").text("");
						// $("#reply_message").text(res);
						// $("#reply_message").attr('readonly',true);
					// }
				// });
				var msg = $('#message-'+val).text();
				$("#reply_message").text(msg);
				
				//$("#reply_message").attr('readonly',true);
				
			}else{
				$("#reply_message").text("");
				//$("#reply_message").attr('readonly',false);
			}
        });
    });
	function appendText(text){
        CKEDITOR.instances['reply_message'].insertHtml(text);
    }
</script>