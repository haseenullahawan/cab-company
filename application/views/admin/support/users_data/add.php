<?php $locale_info = localeconv(); ?>
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
                        <?=form_open("user/support/ticket_add", $attributes)?>
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
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Entreprise ou Organisme</label>
									<input type="text" name="company_name" class="user-name form-control" placeholder="Entreprise" value="">
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
							
							<div class="col-md-4">   
								<div class="form-group"><label>Mobile</label>
									<input type="text" class="phone1 form-control" name="mobile" maxlength="11" placeholder="Mobile" value="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Department <span class="mandatory">*</span></label>  
									 <select class="form-control" name="department">
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
							<div class="col-md-4">
								<div class="form-group">
									<label>Priorité  <span class="mandatory">*</span></label>
									<select class="form-control" name="priority">
										<option value="High">High</option>
										<option value="Medium">Medium</option>
										<option value="Low">Low</option>
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
                                    <textarea name="message" required class="form-control"><?=set_value('message',$this->input->post('message'))?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group">
									<label> Télécharger </label>
									<input class="form-control" type="file" name="attachments[]" multiple placeholder="Télécharger" />
								</div>
								<div class="clearfix"></div>
							</div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-default">Save</button>
                            <a href="<?=base_url("support/my_tickets")?>" class="btn btn-default">Cancel</a>
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