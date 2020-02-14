<?php $locale_info = localeconv(); ?>
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
                        <?=form_open("admin/calls/add")?>
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
                                    <label>Objet de l'appel*</label>
                                    <select class="form-control" name="subject" required>
                                        <option value="">Objet de l'appel</option>
                                        <?php foreach(config_model::$call_subjects as $key => $subject):?>
                                            <option <?=set_value('subject',$this->input->post('subject')) == $subject ? "selected" : ""?> value="<?=$subject?>"><?=$subject?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Jours de Rappel*</label>
                                    <select class="form-control" name="days" required>
                                        <option value="">Jours de Rappel</option>
                                        <?php foreach(config_model::$call_days as $key => $day):?>
                                            <option <?=set_value('days',$this->input->post('days')) == $day ? "selected" : ""?> value="<?=$day?>"><?=$day?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label>From Time*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon normal-addon">DE</span>
                                        <select class="form-control" name="from_time" required>
                                            <?php for($i = 0; $i <= 24; $i++):
                                                $time = $i > 9 ? $i : "0".$i; ?>
                                                <option <?=set_value('from_time',$this->input->post('from_time')) == $time ? "selected" : ""?>  value="<?=$time?>"><?=$time?></option>
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
                                        <select class="form-control" name="to_time" required>
                                            <?php for($i = 0; $i <= 24; $i++):
                                                $time = $i > 9 ? $i : "0".$i; ?>
                                                <option <?=set_value('to_time',$this->input->post('to_time')) == $time ? "selected" : ""?> value="<?=$time?>"><?=$time?></option>
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
                                        <input id="phone-email" maxlength="100" type="email" class="form-control" required name="email" placeholder="Votre email" value="<?=set_value('email',$this->input->post('email'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Telephone*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input id="num2" maxlength="50" type="text" class="form-control" required name="num" placeholder="Telephone" value="<?=set_value('num',$this->input->post('num'),$this->input->post('name'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Entreprise ou Organisme (Optionnel)</label>
                                    <input type="text" class="form-control" name="company" placeholder="Entreprise ou Organisme (Optionnel)" value="<?=set_value('company',$this->input->post('company'))?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach(config_model::$status as $key => $status):?>
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
                                    <textarea name="message" required class="form-control"><?=set_value('message',$this->input->post('message'))?></textarea>
                                </div>
                            </div>
                        </div>
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
                                    <a href="<?=base_url("admin/calls")?>" class="btn btn-default">Cancel</a>
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
    $(document).ready(function(){
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });
    });
</script>