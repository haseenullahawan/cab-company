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
                        <?=form_open_multipart("admin/jobs/add")?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Civility*</label>
                                    <select class="form-control" name="civility" required>
                                        <?php foreach(config_model::$civility as $key => $civil):?>
                                            <option <?=set_value('civility',$this->input->post('civility')) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nom*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="name" placeholder="Nom*" value="<?=set_value('name',$this->input->post('name'))?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Prenom*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="prename" placeholder="Prenom*" value="<?=set_value('prename',$this->input->post('prename'))?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input id="phone-email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email" value="<?=set_value('email',$this->input->post('email'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Telephone*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input id="num2" maxlength="50" type="text" class="form-control" required name="tel" placeholder="Telephone" value="<?=set_value('tel',$this->input->post('tel'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Date de naissance*</label>
                                    <input type="text" class="bdatepicker form-control" name="dob" placeholder="Date de naissance" value="<?=set_value('dob',$this->input->post('dob'))?>">
                                </div>
                            </div>
                        </div>
                     
                           <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                <label>Addresse de facturation et du devis*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input id="address1" type="text" class="form-control" required name="address1" placeholder="Addresse de facturation et du devis*">
                                    </div>
                                </div>
                            </div>
                             <div class="col-xs-4">
                                <div class="form-group">
                                <label>D'addresse*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input id="address2" type="text" class="form-control" required name="address2" placeholder="complément d'adresse*">
                                    </div>
                                </div>
                            </div>
                           <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Code Postal*</label>
                                    <input type="text" maxlength="20" class="form-control" required name="postal_code" placeholder="Code postal*" value="<?=set_value('postal_code',$this->input->post('postal_code'))?>">
                                </div>
                            </div>
                        </div>
                           <div class="row">
                            
                            <div class="col-xs-4">
                                <div class="form-group"> 
                                <label>Ville*</label>
                                        <input type="text" class="form-control" required name="ville" placeholder="Ville*">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Situation</label>
                                    <select class="form-control" name="situation" required>
                                                  <option value="retirement">Retraite</option>
                                                    <option value="unemployment">Chomage</option>
                                                    <option value="rsa">RSA</option>
                                                    <option value="onpole">En poste</option>
                                    </select>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                             
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Lettre de Motivation</label>
                                    <input type="file" name="letter" accept=".pdf, .doc, .docx">
                                </div>
                            </div>
                             <div class="col-xs-4">
                                <div class="form-group">
                                    <label>CV*</label>
                                    <input type="file" name="cv" accept=".pdf, .doc, .docx">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Offer*</label>
                                    <select class="form-control" name="offer" required>
                                        <option value="">Sélectionnez l'Offre d'emploi</option>
                                        <?php foreach(config_model::$job_offers as $key => $offer):?>
                                            <option <?=set_value('offer',$this->input->post('offer')) == $offer ? "selected" : ""?> value="<?=$offer?>"><?=$offer?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach(config_model::$job_status as $key => $status):?>
                                            <option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Subject*</label>
                                    <select class="form-control" name="msg_subject" required>
                                        <?php foreach(config_model::$subjects as $key => $subject):?>
                                            <?php $selected = $key == 2 ? "selected" : ""?>
                                            <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-9">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Communication <input class="rating" name="communication" value="<?=set_value('communication',$this->input->post('communication'))?>">
                                    </div>
                                    <div class="col-sm-2">
                                        Presentation <input class="rating" name="presentation" value="<?=set_value('presentation',$this->input->post('presentation'))?>">
                                    </div>
                                    <div class="col-sm-2">
                                        Driving <input class="rating" name="driving" value="<?=set_value('driving',$this->input->post('driving'))?>">
                                    </div>
                                    <div class="col-sm-2">
                                        Look <input class="rating" name="look" value="<?=set_value('look',$this->input->post('look'))?>">
                                    </div>
                                    <div class="col-sm-2">
                                        Experience <input class="rating" name="experience" value="<?=set_value('experience',$this->input->post('experience'))?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1" style="padding-top: 5px">
                                Add note
                            </div>
                            <div class="col-md-8" id="noteDIv">
                                <div class="row">
                                    <div class="col-xs-10">
                                        <input type="text" class="form-control" placeholder="Write note here" name="note[]">
                                    </div>
                                    <div class="col-xs-2">
                                        <button type="button" class="btn btn-circle btn-success btn-sm addNote"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-right">
                                    <button class="btn btn-default">Save</button>
                                    <a href="<?=base_url("admin/jobs")?>" class="btn btn-default">Cancel</a>
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
<script src="<?php echo base_url(); ?>assets/system_design/scripts/simple-rating.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.rating').rating();
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });
    });
</script>