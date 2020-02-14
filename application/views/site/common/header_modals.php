<style> 
.alert alert-success{
    word-break: break-word !important;
}
.chat_loader{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #0000009e;
    z-index: 9999;
    display: none;
}
.chat_loader img{
    position: relative;
    top: 50%;
    width: 40px; 
}
.floating-form {
    height: 510px;
}
.input_area_emoji > div{
    bottom: 80px;
    z-index: 9999;
}
.input_area_emoji > span{
 display: none;
}
</style>
<?php 
$data = $this->base_model->run_query("SELECT * FROM ".$this->db->dbprefix('popups_settings')." where id = 1")[0];
?>
<?php if($data->status1 == 1){ ?>
<div class="<?php if($data->position1 == 1){echo "floating-form-2 ";}else{echo "floating-form ";} ?> <?=$data->auto_open1 == 1 ? "visiable" : ""?>"  id="<?php if($data->position1 == 1){echo "contact_form_2";}else if($data->position1 == 2){echo "jobs_form";}else{echo "contact_form";} ?>">
    <div class="<?php if($data->position1 == 1){echo "contact-opener-2";}else if($data->position1 == 2){echo "contact-opener-3";}else{echo "contact-opener";} ?>"><?php echo $data->name1?></div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <a href="javascript:;" class="close-btn-2"><i class="fa fa-times-circle-o"></i></a>
        <?php echo form_open_multipart('auth/callMe', ['id' => 'the-contact-form-2', 'class' => 'form']); ?>
        <input type="hidden" name="success_message" value="<?=strip_tags($data->success_message1)?>">
        <h4 style="text-align: center; margin: 0 0 8px">DEMANDE DE RAPPEL <?php // $data->name1?></h4>
        <div class="row">
            <div class="col-xs-3 form-group" style="padding:0 10px">
                <select class="form-control" name="civility" style="height: 35px !important;" required>
                    <?php foreach(config_model::$civility as $key => $civil):?>
                        <option value="<?=$civil?>"><?=$civil?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class=" form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*">
            </div>

            <div class="form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom*">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <input id="enterprise" maxlength="50" type="text" class="form-control" name="company" placeholder="Entreprise ou Organisme (Optionnel)">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="num2" maxlength="50" type="text" class="form-control" required name="num" placeholder="Telephone*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="phone-email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group" style="padding:0 10px">
                <select class="form-control" style="height: 35px !important;" name="subject" required>
                    <option value="">Objet de l'appel*</option>
                    <?php foreach(config_model::$call_subjects as $key => $subject):?>
                        <option value="<?=$subject?>"><?=$subject?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 form-group" style="padding:0 0 0 10px; width: 42% !important;">
                <select class="form-control" style="height: 35px !important;" name="days" required>
                    <option value="">Jours de Rappel*</option>
                    <?php foreach(config_model::$call_days as $key => $day):?>
                        <option value="<?=$day?>"><?=$day?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-xs-4 form-group" style="padding:0 4px; width: 30%">
                <div class="input-group">
                    <span class="input-group-addon normal-addon" style="border: 0; background: #f2f2f2; padding: 6px">DE</span>
                    <select class="form-control" style="height: 35px !important;" name="from_time" style="width: 38px !important;" required>
                        <?php for($i = 0; $i <= 24; $i++):
                            $time = $i > 9 ? $i : "0".$i; ?>
                            <option value="<?=$time?>"><?=$time?></option>
                        <?php endfor;?>
                    </select>
                    <span class="input-group-addon normal-addon" style="border: 0; background: #f2f2f2; padding: 6px 0">H</span>
                </div>
            </div>
            <div class="col-xs-4 form-group" style="padding:0 4px 0 0; width: 26%">
                <div class="input-group">
                    <span class="input-group-addon normal-addon" style="border: 0; background: #f2f2f2; padding: 6px">A</span>
                    <select class="form-control" style="height: 35px !important;" name="to_time" style="width: 38px !important;" required>
                        <?php for($i = 0; $i <= 24; $i++):
                            $time = $i > 9 ? $i : "0".$i; ?>
                            <option value="<?=$time?>"><?=$time?></option>
                        <?php endfor;?>
                    </select>
                    <span class="input-group-addon normal-addon" style="border: 0; background: #f2f2f2; padding: 6px 0">H</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <textarea rows="3" maxlength="3000" class="form-control" name="message" placeholder="Merci de nous communiquer le motif de votre appel"></textarea>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input type="text" class="bdatepicker" name="dob" placeholder="Date de naissance">
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <button class="btn-successs" type="submit">Rappelez moi</button>
            </div>
        </div>
        <?=form_close();?>
    </div>
</div>
<!-- / End Call Back Form -->
<?php } ?>

<?php if($data->status2 == 1){ ?>
<!-- Jobs Slide Form -->
<div class="<?php if($data->position2 == 1){echo "floating-form-2 ";}else{echo "floating-form ";} ?> <?=$data->auto_open2 == 1 ? "visiable" : ""?>"  id="<?php if($data->position2 == 1){echo "contact_form_2";}else if($data->position2 == 2){echo "jobs_form";}else{echo "contact_form";} ?>">
    <div class="<?php if($data->position2 == 1){echo "contact-opener-2";}else if($data->position2 == 2){echo "contact-opener-3";}else{echo "contact-opener";} ?>"><?=$data->name2?></div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <a href="javascript:;" class="close-btn-3 closee-btn"><i class="fa fa-times-circle-o"></i></a>
        <?php echo form_open_multipart('auth/submitJobForm', ['id' => 'the-job-form', 'class' => 'form']); ?>
        <input type="hidden" name="success_message" value="<?=strip_tags($data->success_message2)?>">
        <div class="row">
            <div class="col-xs-3 form-group" style="padding:0 10px">
                <select class="form-control" style="height: 35px !important;" name="civility" required>
                    <?php foreach(config_model::$civility as $key => $civil):?>
                        <option value="<?=$civil?>"><?=$civil?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class=" form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*">
            </div>

            <div class="form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom*">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="tel" maxlength="50" type="text" class="form-control" required name="tel" placeholder="Telephone*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Email*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input id="address1" type="text" class="form-control" required name="address1" placeholder="Addresse de facturation et du devis*">
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input id="address2" type="text" class="form-control"  name="address2" placeholder="Complément d'adresse">
                    </div>
                </div>
            </div>
        </div>
     
        <div class="row">
            
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" maxlength="20" class="form-control" required name="postal_code" placeholder="Code postal*">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" required name="ville" placeholder="Ville*">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <select class="form-control" style="height: 35px !important;" name="situation">
                        <option value="retirement">Retraite</option>
                        <option value="unemployment">Chomage</option>
                        <option value="rsa">RSA</option>
                        <option value="onpole">En poste</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" class="bdatepicker" name="dob" required placeholder="Date de naissance">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                <select class="form-control" style="height: 35px !important;" name="offer" required>
                    <option value="">Sélectionnez l'Offre d'emploi</option>
                    <?php foreach($jobs_listing as $key => $offer):?>
                    
                    <?php $selected=""; if($job_detail){
                         if($job_detail->row()->id==$offer->id){
                      $selected='selected';
                    } 
                    } ?>
                        <option <?=$selected?> value="<?=$offer->id?>"><?=$offer->job_title?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12">
                <label>CV*</label>
                <input type="file" required name="cv" accept=".pdf, .doc, .docx">
            </div>
            <div class="form-group col-xs-12">
                <label>Lettre de Motivation</label>
                <input type="file" name="letter" accept=".pdf, .doc, .docx">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <button class="btn-successs" type="submit">Postuler</button>
                <img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />

            </div>
        </div>
        <?=form_close();?>
    </div>
</div>
<?php } ?>

<?php if($data->status3 == 1){ ?>
<!-- Contact Slide Form -->
<div class="<?php if($data->position3 == 1){echo "floating-form-2 ";}else{echo "floating-form ";} ?> <?=$data->auto_open3 == 1 ? "visiable" : ""?>" id="<?php if($data->position3 == 1){echo "contact_form_2";}else if($data->position3 == 2){echo "jobs_form";}else{echo "contact_form";} ?>">
    <div class="<?php if($data->position3 == 1){echo "contact-opener-2";}else if($data->position3 == 2){echo "contact-opener-3";}else{echo "contact-opener";} ?>"><?=$data->name3?></div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <a href="javascript:;" class="close-btn closee-btn"><i class="fa fa-times-circle-o"></i></a>
        <?php echo form_open_multipart('auth/submitContactForm', ['id' => 'the-contact-form', 'class' => 'form']); ?>
        <input type="hidden" name="success_message" value="<?=strip_tags($data->success_message3)?>">
        <div class="row">
            <div class="col-xs-3 form-group" style="padding:0 10px">
                <select class="form-control" style="height: 35px !important;" name="civility" required>
                    <?php foreach(config_model::$civility as $key => $civil):?>
                        <option value="<?=$civil?>"><?=$civil?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class=" form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*">
            </div>

            <div class="form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom*">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <input id="enterprise2" maxlength="50" type="text" class="form-control" name="company" placeholder="Entreprise ou Organisme  (Optionnel)">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="tel" maxlength="50" type="text" class="form-control" required name="tel" placeholder="Telephone*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input id="address1" type="text" class="form-control" required name="address1" placeholder="Addresse de facturation et du devis*">
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input id="address2" type="text" class="form-control"  name="address2" placeholder="Complément d'adresse">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" maxlength="20" class="form-control" required name="postal_code" placeholder="Code postal*">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" required name="ville" placeholder="Ville*">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <textarea rows="3" style="height: 160px" maxlength="3000" class="form-control" name="message" required placeholder="Merci de nous indiquez toutes les informations nécessaires afin de vous fournir un devis pour la prestation de transport souhaitée*"></textarea>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input type="text" class="bdatepicker" name="dob" placeholder="Date de naissance">
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <button class="btn-successs" type="submit">ENVOYER</button>
            </div>
        </div>
        <?=form_close();?>
    </div>
</div>
<?php } ?>

<?php if($data->status4 == 1){ ?>
<!-- Jobs Slide Form -->
<div class="<?php if($data->position4 == 1){echo "floating-form-2 ";}else{echo "floating-form ";} ?> <?=$data->auto_open4 == 1 ? "visiable" : ""?>"  id="<?php if($data->position4 == 1){echo "contact_form_2";}else if($data->position4 == 2){echo "jobs_form";}else{echo "support_form";} ?>">
    <div class="<?php if($data->position4 == 1){echo "contact-opener-2";}else if($data->position4 == 2){echo "contact-opener-3";}else{echo "contact-opener-4";} ?>"><?=$data->name4?></div>
    <?
        $chat_settings = $this->base_model->run_query2("SELECT * FROM ".$this->db->dbprefix('header_settings'));
        if($chat_settings['chat_status']=="active"){
    ?>
    <div class="chat_loader text-center">
        <img src="assets/loader_image.gif">
    </div>
    <div class="basic-chat-detail" <?php if($this->session->userdata('chatuserexist')==true){ ?> style="display: none;" <?php } ?>>
        <div class="row">
            <div class="col-md-12">    
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="name" maxlength="100" type="text" class="form-control" required="required" name="name" placeholder="Name*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email2" maxlength="100" type="email" class="form-control" required="" name="email" placeholder="Email*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="telephone" maxlength="50" type="tel" class="form-control" required="required" name="telephone" placeholder="Telephone*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <button class="btn-successs" type="button" onclick="validateinputdata()"><?php echo 'Continue';?></button>
            </div>
        </div>
        </div>
        <div class="start-chat-div" <?php if($this->session->userdata('chatuserexist')==true){}else{ echo 'style="display: none;"'; }?>>
            <div class="historychating" id="historychating">
                <?php if($this->session->userdata('chatuserexist')==true){ $message_history = $this->base_model->run_query3("SELECT * FROM ".$this->db->dbprefix('messages_history')." where userid_from=".$this->session->userdata('chatuserid')." or userid_to=1");?>
                <?php foreach($message_history as $val){ ?>
                <div class="users-chat-div2">
                   <div class="usercontent-div">
                    <p><strong><?php if($val->type==1){echo'Admin';}else{echo 'Me';} ?></strong></p>
                    <p><?php echo $val->message_text; ?></p>
                    <span class="real-chat-badge"><small><?php echo date('Y-m-d',strtotime($val->dateandtime)).' '.date('H:i',strtotime($val->dateandtime)); ?></small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                   </div>
                </div>               
               <?php } ?><?php }else{} ?> 
                
            </div>
            <?php //echo form_open_multipart('', ['id' => '', 'class' => 'form','action'=> '#']); ?>
            <div id="attachfile_div" class="text-center" style="width:45px;float: right;display: none;">
                <div id="otherfieattacmentdiv"></div>
                <img src="" id="changeattachfileimage" style="width: 100%;border: 1px solid #ddd; border-radius: 4px; padding: 3px;">
                <!-- <div class="text-center" id="attachfilename" style="line-height: 1;"></div> -->
            </div>
            <!-- <form action="<?php echo base_url(); ?>Messages/insertchatmessagedata" enctype="multipart/form-data" id="the-chat-form" class="form"> -->
            <?php echo form_open_multipart('', ['id' => 'the-chat-form', 'class' => 'form']); ?>
            <div class="form-group input_area_emoji" style="clear: both;">
                <input type="text" name="messagetext" id="input-left-position" class="form-control" placeholder="Type message" style="height: inherit !important;" required="required">
                <input type="hidden" name="userid" id="chatuserid" <?php if(!$this->session->userdata('chatuserid')){}else{echo "value='".$this->session->userdata('chatuserid')."'";} ?>>
            </div>
            <div class="row" style="width: 100%; margin: 0px !important;">
                <div class="col-xs-6" style="padding-left: 10px;">
                    <input type="file" name="chatfile" id="chatfile" style="visibility: hidden;height: 0px;width: 0px;" onchange="addattachfileto_div()">
                    <i class="fa fa-paperclip" aria-hidden="true" onclick="addchatfile()" style="cursor: pointer; font-size: 20px;"></i> &nbsp;
                    <i class="fa fa-smile-o" aria-hidden="true" onclick="openemojis()" style="cursor: pointer; font-size: 20px;"></i>
                </div>
                <div class="col-xs-6" style="text-align: right;">
                    <button class="btn-successs" type="submit"><?php echo 'Send';?> <img src="assets/btn_loader.gif" style="display: none;width: 16px; position: relative; top: 3px; left: 3px;" id="btn_loader"></button>
                </div>
            </div>
            <?=form_close();?>
        </div>
    <?php }else{ ?>
    <div id="contact_results"></div>
    <div id="contact_body">
        <a href="javascript:;" class="close-btn-4"><i class="fa fa-times-circle-o"></i></a>
        <?php echo form_open_multipart('auth/submitContactFormPopup', ['id' => 'the-support-form', 'class' => 'form']); ?>
        <input type="hidden" name="success_message" value="<?=strip_tags($data->success_message4)?>">
        <div class="row">
            <div class="col-xs-3 form-group" style="padding:0 10px">
                <select class="form-control" style="height: 35px !important;" name="civility" required>
                    <?php foreach(config_model::$civility as $key => $civil):?>
                        <option value="<?=$civil?>"><?=$civil?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class=" form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="first_name" placeholder="Nom*">
            </div>

            <div class="form-group col-xs-4">
                <input type="text" maxlength="100" class="form-control" required name="last_name" placeholder="Prenom*">
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="tel" maxlength="50" type="text" class="form-control" required name="telephone" placeholder="Telephone*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Email*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" name="company_name" class="user-name form-control" placeholder="Entreprise" value="">
                </div>
            </div>
            <div class="col-xs-6">   
                    <input type="text" class="phone1 form-control" name="mobile" maxlength="11" placeholder="Mobile" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                     <select class="form-control" style="height: 35px !important;" name="department">
                        <option value="">-- Department* --</option>
                        <option value="10">Booking service</option>
                        <option value="11">Clients Service</option>
                        <option value="12">Driver Service</option>
                        <option value="13">Accounting Service</option>
                        <option value="14">Sales Department</option>
                        <option value="15">Technical Service</option>
                        <option value="16">Disclaimer Service</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <select class="form-control" style="height: 35px !important;" name="priority">
                        <option value="">-- Priorité* --</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">    
                <div class="form-group">
                    <input type="text" name="subject" class="user-name form-control" placeholder="Matière" value="" required>
                </div>
            </div>
            <div class="col-md-12">    
                <div class="form-group">
                    <textarea class="message form-control" name="visit_message" placeholder="Votre message" rows="25" required></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label> Télécharger </label>
                    <input class="form-control" type="file" name="attachments[]" multiple placeholder="Télécharger" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <button class="btn-successs" type="submit"><?php echo $this->lang->line('contact_us_button');?></button>
            </div>
        </div>
        <?=form_close();?>
    <?php } ?>
    </div>
<?php } ?>
<audio id="pop" style="visibility: hidden;height: 0px;width: 0px;">
  <source src="<?php echo base_url(); ?>assets/chat_audio_sound.mp3" type="audio/mpeg">
</audio>   
<style type="text/css">
.contact-opener-5
{
    position: absolute;
    top: -50px;
    left: 0;
    padding: 10px 0 13px;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.43);
    cursor: pointer;
    border-radius: 5px 5px 0 0;
    background-color: #5cb85c;
    font-size: 16px;
    font-weight: bold;
    width: 300px;
    text-align: center;
    background-image: linear-gradient(to bottom,#a40185 0%, #7b2e67 39%, #a40185 100%);
    border: 1px solid #a40185;
}
.users-chat-div2{
    clear: both;
    padding-bottom: 8px;
    position: relative;
    background-color: lightgrey;
    border: 1px solid lightgrey;
    margin-bottom: 5px;
    border-radius: 5px;
}
.user-image-div{
    float: left;
}
.usercontent-div{
    padding-left: 10px;
}
.usercontent-div p{
    margin: 0px;
}
.usercontent-div small{
    
}
.real-chat-badge{
    position: absolute;
    top: 0px;
    right: 10px;
    color: grey;
}
.historychating{
    height: 335px;
    overflow: auto;
    margin-bottom: 10px;
}
.historychating::-webkit-scrollbar{
    background-color: lightgrey;
    width: 5px;
}
.historychating::-webkit-scrollbar-thumb{
    background-color: darkgrey;
    width: 5px;
}
</style>
<!-- <div class="<?php if($data->position5 == 5){echo "floating-form-2 ";}else{echo "floating-form ";} ?> <?=$data->auto_open5 == 1 ? "visiable" : ""?>"  id="<?php if($data->position5 == 5){echo "chatform";}else if($data->position5 == 2){echo "jobs_form";}else{echo "support_form";} ?>">
    <div class="<?php if($data->position5 == 5){echo "contact-opener-5";}else if($data->position4 == 2){echo "contact-opener-3";}else{echo "contact-opener-4";} ?>"><i class="fa fa-envelope-o"></i> <?=$data->name5?></div>
        <div class="basic-chat-detail">
        <div class="row">
            <div class="col-md-12">    
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="name" maxlength="100" type="text" class="form-control" required="required" name="name" placeholder="Name*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email2" maxlength="100" type="email" class="form-control" required="" name="email" placeholder="Email*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="telephone" maxlength="50" type="text" class="form-control" required="required" name="telephone" placeholder="Telephone*">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <button class="btn-successs" type="button" onclick="validateinputdata()"><?php echo 'Continue';?></button>
            </div>
        </div>
        </div>
        <div class="start-chat-div" style="display: none;">
            <div class="historychating">
                <div class="users-chat-div2">
                   <div class="usercontent-div">
                    <p><strong>Haseen awan</strong></p>
                    <p>Hello world i am here catch me.</p>
                    <span class="real-chat-badge"><small>01-02-2020</small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                   </div>
               </div>

               <div class="users-chat-div2">
                   <div class="usercontent-div">       
                   <p><span><small>01-02-2020</small></span></p>             
                    <p>Hello world i am here catch me.</p>
                     <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i> 
                    <p class="real-chat-badge"  style="color: #000;"><strong>Me</strong></p>
                   </div>
               </div>
               <div class="users-chat-div2">
                   <div class="usercontent-div">       
                   <p><span><small>01-02-2020</small></span></p>             
                    <p>Hello world i am here catch me.</p>
                      <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i>
                    <p class="real-chat-badge"  style="color: #000;"><strong>Me</strong></p>
                   </div>
               </div>
               <div class="users-chat-div2">
                   <div class="usercontent-div">       
                   <p><span><small>01-02-2020</small></span></p>             
                    <p>Hello world i am here catch me.</p>
                      <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i> 
                    <p class="real-chat-badge"  style="color: #000;"><strong>Me</strong></p>
                   </div>
               </div>
            </div>
            <?php echo form_open_multipart('', ['id' => 'the-chat-form', 'class' => 'form']); ?>
            <div class="form-group">
                <textarea class="form-control" rows="2" placeholder="Enter message" style="height: inherit !important;"></textarea>
            </div>
            <div class="row">
                <div class="col-xs-12" style="text-align: center">
                    <button class="btn-successs" type="button" onclick="validateinputdata()"><?php echo 'Send';?></button>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div> -->
<script type="text/javascript">
function updatemessagesoundforuser(userid)
{
    // var userid = $('#chatuserid').val();
    $.ajax({
        url:'<?php echo base_url(); ?>Messages/updatemessagesoundforuserdatadiv',
        method:'get',
        data:'userid='+userid,
        success:function(result)
        {
            console.log("Chat sound updated!");
        }
    });
}
function getvisitorsmessages()
{
    var userid = $('#chatuserid').val();
    $.ajax({
        url:'<?php echo base_url(); ?>Messages/getvisitorschathistory',
        method:'get',
        data:'userid='+userid,
        success:function(result)
        {
            $('#historychating').html(result);
            var elem = document.getElementById('historychating');
            elem.scrollTop = elem.scrollHeight;
            setTimeout(getvisitorsmessages.bind(null,userid),4000);
            updatemessagesoundforuser(userid);
        }
    });
}
var userid = $('#chatuserid').val();
getvisitorsmessages(userid);
</script>
<script src="<?php echo base_url(); ?>/assets/system_design/scripts/modals_script.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src='<?php echo base_url(); ?>emojis_assets/front_end_emoji_assets/inputEmoji.js'></script>
<script type="text/javascript">
    $('#input-left-position').emoji({place: 'after'});
</script>
<script type="text/javascript">

    function validateinputdata()
    {
        var ipinfo;
        var name = $('#name').val();
        var email = $('#email2').val();
        var telephone = $('#telephone').val();
        
        if(name=="" || name==" " || email=="" || email==" " || telephone=="" || telephone==" ")
        {
            $('#name').css('border','2px solid red');
            $('#email2').css('border','2px solid red');
            $('#telephone').css('border','2px solid red');
        }
        else
        {
            $.ajax({
                url:'<?php echo base_url(); ?>Messages/insertchatdata',
                method:'get',
                async: false,
                data:'username='+name+'&email='+email+'&telephone='+telephone,
                
                beforeSend:function()
                {
                    $('.chat_loader').fadeIn('slow');
                },
                success:function(data)
                {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    if(obj.status=='false')
                    {
                        $('#chatuserid').val(obj.userid);                        
                    }
                    else
                    {
                        $('#chatuserid').val(obj.userid); 
                        $('#historychating').append(obj.message_history);    
                        var elem = document.getElementById('historychating');
                        elem.scrollTop = elem.scrollHeight;                   
                    }
                    $('.chat_loader').fadeOut('slow');
                    $('.basic-chat-detail').css('display','none');
                    $('.start-chat-div').fadeIn('slow');
                },
                error: function (data) {
                    alert('ERROR: ' + data.status + ' :: ' + data.statusText);
                }
            });
            
        }
    }

    $('#the-chat-form').on('submit',function(e)
    {
        e.preventDefault(); 
        var messagetext = $('#input-left-position').val();
        var userid = $('#chatuserid').val();
        // if(messagetext=="" || messagetext==" ")
        // {
        //     $('#input-left-position').css('border','1px solid red');
        //     return;
        // }
        // else
        // {
               
            var formData = new FormData(this);
            $('#input-left-position').css('border','');
           $.ajax({
            url:'<?php echo base_url(); ?>Messages/insertchatmessagedata',
            method:'post',
            data:formData,

            cache:false,

            contentType:false,

            processData:false,
            beforeSend:function()
            {
                $('#btn_loader').fadeIn('slow');
            },
            success:function(data)
            {                
                // alert(data);return;
                $('#btn_loader').fadeOut('slow');
                $('#historychating').append(data);
                $('#input-left-position').val('');
                $('#changeattachfileimage').css('display','none');
                $('#input-left-position').attr("required",true);
                var elem = document.getElementById('historychating');
                elem.scrollTop = elem.scrollHeight;
            },
            error: function (data) {
                alert('ERROR: ' + data.status + ' :: ' + data.statusText);
            }
           }); 
        // }
    });

    

    function addchatfile()

   {

    $('#chatfile').click();

   }

   function addattachfileto_div()

    {

        $('#attachfile_div').css({'display':'block'});

        var attachfilename_val = $('#chatfile').val();

        var extension = attachfilename_val.split('.').pop();

        // alert(extension);return;
        $('#changeattachfileimage').css('display','block');

        if(extension=="png" || extension=="PNG" || extension=="jpg" || extension=="jpeg" || extension=="gif")

        {

            var oFReader = new FileReader();

            oFReader.readAsDataURL(document.getElementById("chatfile").files[0]); 

            oFReader.onload = function (oFREvent){

            document.getElementById("changeattachfileimage").src = oFREvent.target.result;

         }            

        }

        else

        {

            $('#changeattachfileimage').attr('src','<?php echo base_url(); ?>assets/chat_files/file_upload_image.png');       

        }

        var attachfilename_vall = attachfilename_val.substring(attachfilename_val.lastIndexOf("\\") + 1, attachfilename_val.length);

        $('#attachfilename').text(attachfilename_vall);

        $('#input-left-position').attr("required",false);

    }

   function openemojis()
   {
        $('.input_area_emoji').find('div').show();
   }
    // window.setInterval(function() {
      var elem = document.getElementById('historychating');
      elem.scrollTop = elem.scrollHeight;
    // }, 2000);
</script>


   