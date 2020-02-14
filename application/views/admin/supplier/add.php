<?php $locale_info = localeconv(); ?>
<style>
    @media only screen and (min-width: 1400px){
        .table-filter input, .table-filter select{
            max-width: 9% !important;
        }
        .table-filter select{
            max-width: 95px !important;
        }
        .table-filter .dpo {
            max-width: 90px !important;
        }
    }
</style>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="<?= base_url();?>admin/payment_methods.php"> <button>Pyment Methods</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/common/alert');?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                    </div>
                    <div class="module-body">
                        <?=form_open("admin/supplier/add")?>
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
                                    <input type="text" maxlength="100" class="form-control" required name="first_name" placeholder="Nom*" value="<?=set_value('first_name',$this->input->post('first_name'))?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Prenom*</label>
                                    <input type="text" maxlength="100" class="form-control" required name="last_name" placeholder="Prenom*" value="<?=set_value('last_name',$this->input->post('last_name'))?>">
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
                                        <input id="num2" maxlength="50" type="text" class="form-control" required name="phone" placeholder="Telephone" value="<?=set_value('phone',$this->input->post('phone'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" name="fax" placeholder="fax" value="<?=set_value('fax',$this->input->post('fax'))?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>delay*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input id="phone-email" maxlength="100" type="text" class="form-control" required name="delay" placeholder="delay" value="<?=set_value('delay',$this->input->post('delay'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>VAT*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input id="num2" maxlength="50" type="text" class="form-control" required name="VAT" placeholder="VAT" value="<?=set_value('VAT',$this->input->post('VAT'))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Reccurncy</label>
                                    <select class="form-control" name="reccurency" required>
                                        
                                            <option value="yes">Yes </option>
                                            <option value="no">No </option>
                                       
                                        
                                    </select>
                                </div>
                            </div>
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Amount</label>-->
                            <!--        <input type="text" class="form-control" name="amount" placeholder="Amount" value="<?=set_value('amount',$this->input->post('amount'))?>">-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>To pay*</label>-->
                            <!--        <div class="input-group">-->
                            <!--            <span class="input-group-addon"></span>-->
                            <!--            <input id="phone-email" maxlength="100" type="text" class="form-control" required name="to_pay" placeholder="to pay" value="<?=set_value('to_pay',$this->input->post('to_pay'))?>">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>reccurency*</label>-->
                            <!--        <div class="input-group">-->
                            <!--            <span class="input-group-addon"></span>-->
                            <!--            <input id="num2" maxlength="50" type="text" class="form-control" required name="reccurency" placeholder="reccurency" value="<?=set_value('reccurency',$this->input->post('reccurency'))?>">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Invoice number</label>-->
                            <!--        <input type="text" class="form-control" name="invoice_number" placeholder="invoice number" value="<?=set_value('invoice_number',$this->input->post('invoice_number'))?>">-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Category*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <select name="category" id="category" required>
                                            <option value="New">New</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Old">Old</option>
                                            <!--<option></option>-->
                                        </select>
                                        <!--<input id="phone-email" maxlength="100" type="text" class="form-control" required name="category" placeholder="category" value="<?=set_value('to_pay',$this->input->post('to_pay'))?>">-->
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Invoice date*</label>-->
                            <!--        <div class="input-group">-->
                            <!--            <span class="input-group-addon"></span>-->
                            <!--            <input id="num2" maxlength="50" type="date" class="form-control" required name="invoice_date" placeholder="invoice date" value="<?=set_value('invoice_date',$this->input->post('invoice_date'))?>">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>period</label>
                                    <input type="text" class="form-control" name="period" placeholder="period" value="<?=set_value('period',$this->input->post('period'))?>">
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
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Payment Method*</label>
                                    <select class="form-control" name="payment_method_id" required>
                                        <?php $pm = getPayMethods();
                                        foreach($pm as $p){ ?>
                                            <option value="<?= $p['id']; ?>"><?= $p['name']; ?> </option>
                                       <?php }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                       
                        
                        <div class="text-right">
                            <button class="btn btn-default">Save</button>
                            <a href="<?=base_url("admin/supplier")?>" class="btn btn-default">Cancel</a>
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