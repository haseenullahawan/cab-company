<?php $locale_info = localeconv(); ?>
    <script src="<?php echo base_url(); ?>/assets/system_design/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>
<?php // print_r($data); ?> 
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
                        <?=form_open("admin/supplier/".$data['id']."/update")?>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Civility*</label>
                                    <select disabled class="form-control" name="civility" required>
                                        <?php foreach(config_model::$civility as $key => $civil):?>
                                            <option <?=set_value('civility',$data['civility']) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nom*</label>
                                    <input disabled type="text" maxlength="100" class="form-control" required name="first_name" value="<?=set_value('first_name',$data['first_name'])?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Prenom*</label>
                                    <input disabled type="text" maxlength="100" class="form-control" required name="last_name" value="<?=set_value('last_name',$data['last_name'])?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input id="phone-email" maxlength="100" type="email" class="form-control" required name="email" value="<?=set_value('email',$data['email'])?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Telephone*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input id="num2" maxlength="50" type="text" class="form-control" required name="phone" value="<?=set_value('phone',$data['phone'])?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" name="fax" value="<?=set_value('fax',$data['fax'])?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>delay*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input id="phone-email" maxlength="100" type="text" class="form-control" required name="delay" value="<?=set_value('delay',$data['delay'])?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>VAT*</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input id="num2" maxlength="50" type="text" class="form-control" required name="VAT" value="<?=set_value('VAT',$data['VAT'])?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Reccurency</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        
                                        <select name="reccurency">
                                            <option value="yes" <?php if($data['reccurency'] == 'yes') echo "selected"; ?>> Yes </option>
                                            <option value="no" <?php if($data['reccurency'] == 'no') echo "selected"; ?>> No</option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Amount</label>-->
                            <!--        <input type="text" class="form-control" name="amount" placeholder="Amount" value="<?=set_value('email',$data['email'])?>">-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>To pay*</label>-->
                            <!--        <div class="input-group">-->
                            <!--            <span class="input-group-addon"></span>-->
                            <!--            <input id="phone-email" maxlength="100" type="text" class="form-control" required name="to_pay" placeholder="to pay" value="<?=set_value('email',$data['email'])?>">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>reccurency*</label>-->
                            <!--        <div class="input-group">-->
                            <!--            <span class="input-group-addon"></span>-->
                            <!--            <input id="num2" maxlength="50" type="text" class="form-control" required name="reccurency" placeholder="reccurency" value="<?=set_value('email',$data['email'])?>">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-xs-4">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Invoice number</label>-->
                            <!--        <input type="text" class="form-control" name="invoice_number" placeholder="invoice number" value="<?=set_value('email',$data['email'])?>">-->
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
                                            <option value="New" <?php if($data['category']=='New') echo "selected"; ?>>New</option>
                                            <option value="Regular"<?php if($data['category']=='Regular') echo "selected"; ?>>Regular</option>
                                            <option value="Old"<?php if($data['category']=='Old') echo "selected"; ?>>Old</option>
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
                            <!--            <input id="num2" maxlength="50" type="date" class="form-control" required name="invoice_date" placeholder="invoice date" value="<?=set_value('email',$data['email'])?>">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>period</label>
                                    <input type="text" class="form-control" name="period" value="<?=set_value('period',$data['period'])?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" required>
                                        <?php foreach(config_model::$status as $key => $status):?>
                                            <option <?=set_value('status',$data['status']) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
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
                                            <option value="<?= $p['id']; ?>"  <?php if($data['payment_method_id']==$p['id']) echo "selected"; ?>><?= $p['name']; ?> </option>
                                       <?php }
                                        ?>
                                       
                                       
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                       <div class="text-right">
                            <button class="btn btn-default">Update</button>
                            <a href="<?=base_url("admin/supplier")?>" class="btn btn-default">Cancel</a>
                        </div>
                                                <?php echo form_close(); ?>
                        <br>
                      
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