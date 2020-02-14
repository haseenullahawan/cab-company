<?php $locale_info = localeconv(); ?>

    <script src="<?php echo base_url(); ?>/assets/system_design/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>
<?php
                                    if($data->driver_name == 1){
                                        $driver = "Driver 1";
                                    }else if($data->driver_name == 2){
                                        $driver = "Driver 2";
                                    }else if($data->driver_name == 3){
                                        $driver = "Driver 3";
                                    }else{
                                        $driver = "";
                                    }
?>


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
                    <?php $attributes = array("enctype" => 'multipart/form-data'); ?>
                    <?php if($data->request_type == 1){ ?>
                        <div id="absence_request" class="drivers_request_div">

                        <?=form_open("admin/drivers_requests/".$data->id."/absence_vacation_update", $attributes)?>
                            <div class="row">

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Status*</label>

                                    <select class="form-control" name="status" id="status1" required >
                                        <option value="">--- Select status ---</option>
                                        <option value="1" <?php if($data->status == 1){ echo "selected"; } ?> >New</option>
                                        <option value="2" <?php if($data->status == 2){ echo "selected"; } ?> >Pending</option>
                                        <option value="3" <?php if($data->status == 3){ echo "selected"; } ?> >approved</option>
                                        <option value="4" <?php if($data->status == 4){ echo "selected"; } ?> >Denied</option>
                                        <option value="5" <?php if($data->status == 5){ echo "selected"; } ?> >Closed</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Request Type</label>

                                    <input type="text" class="form-control" disabled value="Absence Request">
                                
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Driver</label>

                                    <input type="text" class="form-control" value="<?=$driver?>" disabled >
                                
                                </div>

                            </div>                                                      

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>From</label>

                                    <input type="text" class="form-control" name="from_date" disabled value="<?=set_value('from_date',$data->from_date)?>">
                                
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Day</label>
                                    
                                    <input type="text" class="form-control" name="from_morning" disabled value="<?=set_value('from_morning',$data->from_morning)?>">
                                </div>

                            </div>                            

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>To</label>

                                    <input type="text" class="form-control" name="to_date" disabled value="<?=set_value('to_date',$data->to_date)?>">

                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Day</label>

                                    <input type="text" class="form-control" name="to_morning" disabled value="<?=set_value('to_morning',$data->to_morning)?>">
                                </div>

                            </div>                            
                        </div>

                        <div class="row"> 
                            <div class="col-xs-6" >

                                <div class="form-group">

                                    <label>Description</label>

                                    <textarea class="form-control" name="text" rows="4"  ><?=set_value('text',$data->text)?></textarea>

                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-xs-6" <?php if($data->status != 4){ ?>style="display:none;"<?php } ?> id="reason1" >

                                <div class="form-group">

                                    <label>Raison</label>

                                    <textarea class="form-control" name="comment" rows="4" ><?=set_value('comment',$data->comment)?></textarea>

                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12">
								<div class="form-group">
									<label> Files </label><br/>
                                    <?php
                                            $dayQuery =  $this->db->query("SELECT  * FROM vbs_driver_request_attachments WHERE  driver_request_id = $data->id");

                                            $attachments = $dayQuery->result();

                                    ?>
									<?php if(!empty($attachments)){ ?>
									<?php foreach($attachments as $k=>$v){?>
									<a target="_blank" href="<?php echo 'http://handi-express.fr/uploads/drivers_request/'.$v->attachments; ?>"><?php echo $v->attachments; ?></a><br/>
									<?php } ?>
									<?php } ?>
								</div>
								<div class="clearfix"></div>
							</div>

                            <div class="clearfix"></div>

                            <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                Add proof document files (optional):
                                    </div>
                                    <div class="col-md-3" id="attachDiv">
                                        <div class="row">
                                            <div class="col-xs-8" style="overflow: hidden">
                                                <input type="file" name="attachment[]" >
                                            </div>
                                            <div class="col-xs-4">
                                                <button type="button" class="btn btn-circle btn-success btn-sm addFile custombtn"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <div class="clearfix"></div>

                                <div class="text-right">

                                    <button class="btn btn-default">Save</button>

                                    <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>

                                </div>                             

                        </div>
                        <!-- </form> -->
                        <?php echo form_close(); ?>
                        </div> 

                        <?php } if($data->request_type == 2){ ?>
                        <div id="vacation_request" class="drivers_request_div">
                        <?=form_open("admin/drivers_requests/".$data->id."/absence_vacation_update", $attributes)?>
                            <div class="row">

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Status*</label>

                                        <select class="form-control" name="status" id="status2" required>
                                            <option value="">--- Select status ---</option>
                                            <option value="1" <?php if($data->status == 1){ echo "selected"; } ?> >New</option>
                                            <option value="2" <?php if($data->status == 2){ echo "selected"; } ?> >Pending</option>
                                            <option value="3" <?php if($data->status == 3){ echo "selected"; } ?> >approved</option>
                                            <option value="4" <?php if($data->status == 4){ echo "selected"; } ?> >Denied</option>
                                            <option value="5" <?php if($data->status == 5){ echo "selected"; } ?> >Closed</option>
                                        </select>

                                    </div>

                                </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Request Type</label>

                                    <input type="text" class="form-control" disabled value="Medical Vacation Request">
                                
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Driver</label>

                                    <input type="text" class="form-control" value="<?=$driver?>" disabled >
                                
                                </div>

                            </div>   

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>From</label>

                                        <input type="text" class="form-control" name="from_date" disabled value="<?=set_value('from_date',$data->from_date)?>">

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Day</label>

                                        <input type="text" class="form-control" name="from_morning" disabled value="<?=set_value('from_morning',$data->from_morning)?>">
                                    </div>

                                </div>                                

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>To</label>

                                        <input type="text" class="form-control" name="to_date" disabled value="<?=set_value('to_date',$data->to_date)?>">

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Day</label>

                                        <input type="text" class="form-control" name="to_morning" disabled value="<?=set_value('to_morning',$data->to_morning)?>">
                                    </div>

                                </div>                                

                            </div>

                            <div class="row">

                            <div class="col-xs-6" >

                                <div class="form-group">

                                    <label>Description</label>

                                    <textarea class="form-control" name="text" rows="4"  ><?=set_value('text',$data->text)?></textarea>

                                </div>

                            </div>

                            <div class="clearfix"></div>                            

                                <div class="col-xs-6" <?php if($data->status != 4){ ?>style="display:none;"<?php } ?> id="reason2" >

                                    <div class="form-group">

                                        <label>Raison</label>

                                        <textarea class="form-control" name="comment" rows="4" ><?=set_value('comment',$data->comment)?></textarea>

                                    </div>

                                </div>
                                
                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Files </label><br/>
                                        <?php
                                                $dayQuery =  $this->db->query("SELECT  * FROM vbs_driver_request_attachments WHERE  driver_request_id = $data->id");

                                                $attachments = $dayQuery->result();

                                        ?>
                                        <?php if(!empty($attachments)){ ?>
                                        <?php foreach($attachments as $k=>$v){?>
                                        <a target="_blank" href="<?php echo 'http://handi-express.fr/uploads/drivers_request/'.$v->attachments; ?>"><?php echo $v->attachments; ?></a><br/>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                    Add Medical proof document files (optional):
                                </div>
                                <div class="col-md-3" id="attachDiv2">
                                    <div class="row">
                                        <div class="col-xs-8" style="overflow: hidden">
                                            <input type="file" name="attachment[]" >
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-circle btn-success btn-sm addFile2 custombtn"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="text-right">

                                    <button class="btn btn-default">Save</button>

                                    <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>

                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                        <?php } if($data->request_type == 3){ ?>
                        <div id="salary_advance_request" class="drivers_request_div">
                        <?=form_open("admin/drivers_requests/".$data->id."/salary_notes_update", $attributes)?>
                        <?php
                        $per_month = $data->amount / $data->time_deduce;
                        
                        ?>
                        <div class="row">
                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Status*</label>

                                        <select class="form-control" name="status" id="status3" required>
                                            <option value="">--- Select status ---</option>
                                            <option value="1" <?php if($data->status == 1){ echo "selected"; } ?> >New</option>
                                            <option value="2" <?php if($data->status == 2){ echo "selected"; } ?> >Pending</option>
                                            <option value="3" <?php if($data->status == 3){ echo "selected"; } ?> >approved</option>
                                            <option value="4" <?php if($data->status == 4){ echo "selected"; } ?> >Denied</option>
                                            <option value="5" <?php if($data->status == 5){ echo "selected"; } ?> >Closed</option>
                                        </select>

                                    </div>
                                </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Request Type</label>

                                    <input type="text" class="form-control" disabled value="Salary Advance Request">
                                
                                </div>

                            </div>                                

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Driver</label>

                                    <input type="text" class="form-control" value="<?=$driver?>" disabled >
                                
                                </div>

                            </div>   

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Requested Amount*</label>

                                        <input type="number" class="form-control" name="amount" id="amount" value="<?=set_value('amount',$data->amount)?>" required>

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Times*</label>

                                        <input type="number" class="form-control" disabled id="time_deduce" disabled value="<?=set_value('time_deduce',$data->time_deduce)?>" >

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>To Pay Each Month</label>

                                        <input type="text" class="form-control" value="<?=$per_month?>" name="per_month"  readonly >
                                    </div>

                                </div>                                
                                <div class="clearfix"></div>
                                

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>From</label>

                                        <input type="text" class="form-control" name="from_month" disabled value="<?=set_value('from_month',$data->from_month)?>" >

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>To</label>

                                        <input type="text" class="form-control" name="to_month" id="to_month" disabled value="<?=set_value('to_month',$data->to_month)?>" >

                                    </div>

                                </div>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Rest Due</label>

                                        <input type="text" class="form-control" readonly value="<?=set_value('rest_due',$data->rest_due)?>" id="due" name="rest_due">

                                    </div>

                                </div>

                                <!-- <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Paid Amount</label>

                                        <input type="text" class="form-control" id="paid_amount" value="<?=set_value('paid_amount',$data->paid_by_driver)?>" name="paid_amount" >
                                        <input type="hidden" value="<?php //echo $data->paid_amount; ?>" name="get_paid_amount" >
                                    </div>

                                </div> -->

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Paid by Employee</label>

                                        <input type="text" class="form-control" id="paid_by_employee" value="<?=set_value('paid_by_employee',$data->amount)?>" name="paid_by_employee" readonly >
        
                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Paid by Driver</label>

                                        <input type="text" class="form-control" id="paid_by_driver" value="<?=set_value('paid_by_driver',$data->paid_by_driver)?>" name="paid_by_driver" readonly >
        
                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Date</label>

                                        <input type="text" class="form-control" name="date" disabled value="<?=set_value('date',$data->date)?>">

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                    <label>Payment Method</label>
                                    <?php
                                    $new_payment = str_replace("_"," ",$data->payment_method);
                                    ?>
                                    <input type="text" class="form-control" name="payment_method" disabled value="<?=set_value('payment_method',ucwords($new_payment))?>">

                                    </div>
                                </div>                                                             
                                <div class="clearfix"></div>
                                <div class="col-xs-6" >

                                    <div class="form-group">

                                        <label>Description</label>

                                        <textarea class="form-control" name="text" rows="4"  ><?=set_value('text',$data->text)?></textarea>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-6" <?php if($data->status != 4){ ?>style="display:none;"<?php } ?> id="reason3" >

                                    <div class="form-group">

                                        <label>Raison (optional)</label>

                                        <textarea class="form-control" name="comment" rows="4"><?=set_value('comment',$data->comment)?></textarea>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Files </label><br/>
                                        <?php
                                                $dayQuery =  $this->db->query("SELECT  * FROM vbs_driver_request_attachments WHERE  driver_request_id = $data->id");

                                                $attachments = $dayQuery->result();

                                        ?>
                                        <?php if(!empty($attachments)){ ?>
                                        <?php foreach($attachments as $k=>$v){?>
                                        <a target="_blank" href="<?php echo 'http://handi-express.fr/uploads/drivers_request/'.$v->attachments; ?>"><?php echo $v->attachments; ?></a><br/>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                    Add proof document files (optional):
                                </div>
                                <div class="col-md-3" id="attachDiv3">
                                    <div class="row">
                                        <div class="col-xs-8" style="overflow: hidden">
                                            <input type="file" name="attachment[]" >
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-circle btn-success btn-sm addFile3 custombtn"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="text-right">

                                    <button class="btn btn-default">Save</button>

                                    <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>

                                </div>

                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        </div>
                        <?php } if($data->request_type == 4){ ?>
                        <div id="notes_refund_request" class="drivers_request_div">
                        <?=form_open("admin/drivers_requests/".$data->id."/salary_notes_update", $attributes)?>
                        <div class="row">
                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Status*</label>

                                        <select class="form-control" name="status" id="status4" required>
                                            <option value="">--- Select status ---</option>
                                            <option value="1" <?php if($data->status == 1){ echo "selected"; } ?> >New</option>
                                            <option value="2" <?php if($data->status == 2){ echo "selected"; } ?> >Pending</option>
                                            <option value="3" <?php if($data->status == 3){ echo "selected"; } ?> >approved</option>
                                            <option value="4" <?php if($data->status == 4){ echo "selected"; } ?> >Denied</option>
                                            <option value="5" <?php if($data->status == 5){ echo "selected"; } ?> >Closed</option>
                                        </select>

                                    </div>
                                </div>

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Request Type</label>

                                    <input type="text" class="form-control" disabled value="Notes Refund Request">
                                
                                </div>

                            </div>                                

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Driver</label>

                                    <input type="text" class="form-control" value="<?=$driver?>" disabled >
                                
                                </div>

                            </div>                                   

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Date</label>

                                        <input type="text" class="form-control" name="date" disabled value="<?=set_value('date',$data->date)?>">

                                    </div>

                                </div>                                    

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Time</label>

                                        <input type="text" class="form-control" name="notes_time" disabled value="<?=$data->notes_time?>" >

                                    </div>

                                </div>

                                <!-- <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Category</label>

                                        <input type="text" class="form-control" name="notes_category" disabled value="<?=set_value('notes_category',$data->notes_category)?>" >

                                    </div>
                                </div> -->
                                
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Category*</label>

                                            <select class="form-control" name="category" required>
                                                <option value="">--- Select category ---</option>
                                                <option value="carburant" <?php if($data->notes_category == "carburant"){ echo "selected"; }?> >Carburant</option>
                                                <option value="parking" <?php if($data->notes_category == "parking"){ echo "selected"; }?> >Parking</option>
                                                <option value="car wash" <?php if($data->notes_category == "car wash"){ echo "selected"; }?> >Car Wash</option>
                                                <option value="others" <?php if($data->notes_category == "others"){ echo "selected"; }?> >Others</option>
                                                
                                            </select>

                                        </div>
                                    </div>


                                <div class="clearfix"></div>
                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Amount*</label>

                                        <input type="number" class="form-control" id="notes_amount" name="amount" required value="<?=set_value('amount',$data->amount)?>">

                                    </div>

                                </div> 

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Paid Amount</label>

                                        <input type="number" class="form-control" id="notes_paid_amount" name="notes_paid_amount" value="<?=set_value('notes_paid_amount',$data->paid_amount)?>" >

                                    </div>

                                </div> 

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Date of payment</label>

                                            <input type="text" class="form-control bdatepicker" autocomplete="off" name="payment_date" value="<?=set_value('payment_date',$data->payment_date)?>" >

                                        </div>

                                    </div> 

                                <!-- <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Payment Method</label>

                                        <input type="text" class="form-control" name="payment_method" value="<?=set_value('payment_method',$data->payment_method)?>" disabled>

                                    </div>
                                </div>  -->
                                

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Payment Method*</label>

                                            <select class="form-control" name="payment_method" required>
                                                <option value="">--- Select payment method ---</option>
                                                <option value="cash" <?php if($data->payment_method == "cash"){ echo "selected"; }?> >Cash</option>
                                                <option value="cheque" <?php if($data->payment_method == "cheque"){ echo "selected"; }?> >Cheque</option>
                                                <option value="credit_card" <?php if($data->payment_method == "credit_card"){ echo "selected"; }?> >Credit Card</option>
                                                <option value="Bank Wire" <?php if($data->payment_method == "Bank Wire"){ echo "selected"; }?> >Bank Wire</option>
                                            </select>

                                        </div>
                                    </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Due Amount</label>

                                        <input type="text" class="form-control" id="notes_rest_due" name="notes_rest_due" readonly value="<?=set_value('notes_rest_due',$data->rest_due)?>">

                                    </div>

                                </div>                                

                                <div class="clearfix"></div>

                                <div class="col-xs-6" >

                                    <div class="form-group">

                                        <label>Description</label>

                                        <textarea class="form-control" name="text" rows="4"  ><?=set_value('text',$data->text)?></textarea>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-6" <?php if($data->status != 4){ ?>style="display:none;"<?php } ?> id="reason4">

                                    <div class="form-group">

                                        <label>Raison</label>

                                        <textarea class="form-control" name="comment" rows="4"><?=set_value('comment',$data->comment)?></textarea>

                                    </div>

                                </div>

                                <!-- <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Add bills proof document files</label>

                                    <input type="file" class="form-control" name="attachments[]" multiple >

                                </div>

                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Files </label><br/>
                                        <?php
                                                $dayQuery =  $this->db->query("SELECT  * FROM vbs_driver_request_attachments WHERE  driver_request_id = $data->id");

                                                $attachments = $dayQuery->result();

                                        ?>
                                        <?php if(!empty($attachments)){ ?>
                                        <?php foreach($attachments as $k=>$v){?>
                                        <a target="_blank" href="<?php echo 'http://handi-express.fr/uploads/drivers_request/'.$v->attachments; ?>"><?php echo $v->attachments; ?></a><br/>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                    Add bills proof document files (optional):
                                </div>
                                <div class="col-md-3" id="attachDiv4">
                                    <div class="row">
                                        <div class="col-xs-8" style="overflow: hidden">
                                            <input type="file" name="attachment[]" >
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-circle btn-success btn-sm addFile4 custombtn"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="text-right">

                                    <button class="btn btn-default">Save</button>

                                    <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>

                                </div>

                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        </div>
                    <?php } ?>

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

        $("#notes_amount").on("change", function(){
            let amount = $(this).val();
            let notes_paid_amount = $("#notes_paid_amount").val();

            let due = amount - notes_paid_amount;
            $("#notes_rest_due").val(due.toFixed(2));

        });

        $("#amount").on("change", function(){
            let amount = $(this).val();
            let paid_amount = $("#paid_amount").val();

            let due = amount - paid_amount;
            $("#due").val(due.toFixed(2));

        });

        $("#notes_amount").on("change", function(){
            let amount = $(this).val();
            let notes_paid_amount = $("#notes_paid_amount").val();


                if(notes_paid_amount != "" && notes_paid_amount > 0){
                    let due = amount - notes_paid_amount;
                    $("#notes_rest_due").val(due.toFixed(2));
                }else{
                    // alert("aa");
                    let due = amount;
                    $("#notes_rest_due").val(parseFloat(due).toFixed(2));
                }

        });

        $("#notes_paid_amount").on("change", function(){
            let amount = $("#notes_amount").val();
            let notes_paid_amount = $(this).val();


                if(notes_paid_amount != "" && notes_paid_amount > 0){
                    let due = amount - notes_paid_amount;
                    $("#notes_rest_due").val(due.toFixed(2));
                }else{
                    // alert("aa");
                    let due = amount;
                    $("#notes_rest_due").val(parseFloat(due).toFixed(2));
                }

        });

        $(document.body).on("click",".addFile2", function () {
            $("#attachDiv2").append('<div class="attach-main"> <div class="attach-file"> <input type="file" name="attachment[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addFile2"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm delFile2"><i class="fa fa-minus"></i></button></div></div>');
        });

        $(document.body).on("click",".delFile2", function () {
            $(this).closest('.attach-main').remove();
        });

        $(document.body).on("click",".addFile3", function () {
            $("#attachDiv3").append('<div class="attach-main"> <div class="attach-file"> <input type="file" name="attachment[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addFile3"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm delFile3"><i class="fa fa-minus"></i></button></div></div>');
        });

        $(document.body).on("click",".delFile3", function () {
            $(this).closest('.attach-main').remove();
        });

        $(document.body).on("click",".addFile4", function () {
            $("#attachDiv4").append('<div class="attach-main"> <div class="attach-file"> <input type="file" name="attachment[]"> </div> <div class="attach-buttons"> <button type="button" class="btn btn-circle btn-success btn-sm addFile4"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-circle btn-danger btn-sm delFile4"><i class="fa fa-minus"></i></button></div></div>');
        });

        $(document.body).on("click",".delFile4", function () {
            $(this).closest('.attach-main').remove();
        });

        $("#status1").on("change",function(){
            let status = $(this).val();
            if(status == 4){
                $("#reason1").show();
                $("#comment1").attr("disabled", false);
            }else{
                $("#reason1").hide();
                $("#comment1").attr("disabled", true);
            }
        });

        $("#status2").on("change",function(){
            let status = $(this).val();
            if(status == 4){
                $("#reason2").show();
                $("#comment2").attr("disabled", false);
            }else{
                $("#reason2").hide();
                $("#comment2").attr("disabled", true);
            }
        });

        $("#status3").on("change",function(){
            let status = $(this).val();
            if(status == 4){
                $("#reason3").show();
                $("#comment3").attr("disabled", false);
            }else{
                $("#reason3").hide();
                $("#comment3").attr("disabled", true);
            }
        });

        $("#status4").on("change",function(){
            let status = $(this).val();
            if(status == 4){
                $("#reason4").show();
                $("#comment4").attr("disabled", false);
            }else{
                $("#reason4").hide();
                $("#comment4").attr("disabled", true);
            }
        });

    });

</script>