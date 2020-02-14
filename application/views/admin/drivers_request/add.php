<?php $locale_info = localeconv(); ?>

<div class="col-md-12"><!--col-md-10 padding white right-p-->

    <div class="content">

        <?php $this->load->view('admin/common/breadcrumbs');?>

        <div class="row">

            <div class="col-md-12">

                <?php $this->load->view('admin/common/alert');?>

                <div class="module" style="height: 75vh;">

                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo validation_errors(); ?>

                    <div class="module-head">

                    </div>

                    <div class="module-body">

                        <div class="row">

                            <div class="col-xs-2">

                                <div class="form-group">

                                    <label>Please select request type*</label>

                                    <select class="form-control" name="request_type" id="request_type" required>
                                        <option value="">--- Select request type ---</option>
                                        <option value="absence_request">Absence Request</option>
                                        <option value="vacation_request">Medical Vacation Request</option>
                                        <option value="salary_advance_request">Salary Advance Request</option>
                                        <option value="notes_refund_request" selected>Notes Refund Request</option>
                                    </select>

                                </div>

                            </div>
                            
                        </div>
                        <?php $attributes = array("enctype" => 'multipart/form-data'); ?>
                        <div id="absence_request" class="drivers_request_div" style="display: none;">
                         
                         <?=form_open("admin/drivers_requests/absence_request_store", $attributes)?>
                         <input type="hidden" name="type" value="absence_request">
                         <input type="hidden" class="form-control" name="request" readonly required value="Absence">
                            <div class="row">

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Status*</label>

                                        <select class="form-control" name="status" id="status1" required>
                                            <option value="">--- Select status ---</option>
                                            <option value="1" selected>New</option>
                                            <option value="2">Pending</option>
                                            <option value="3">approved</option>
                                            <option value="4">Denied</option>
                                            <option value="5">Closed</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Driver*</label>

                                        <select class="form-control" name="">
                                            <option value="">--- Select Driver ---</option>
                                            <option value="1">Driver 1</option>
                                            <option value="2">Driver 2</option>
                                            <option value="3">Driver 3</option>
                                        </select>

                                    </div>

                                </div>
                                
                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>From*</label>

                                        <input type="text" class="form-control bdatepicker" name="from_date" autocomplete="off" required >

                                    </div>

                                </div>
                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Day*</label>

                                        <select class="form-control" name="from_morning" required>
                                            <option value="">--- Select ---</option>
                                            <option value="morning">Morning</option>
                                            <option value="evening">Evening</option>
                                            <option value="all_day">All day</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>To*</label>

                                        <input type="text" class="form-control bdatepicker" name="to_date" autocomplete="off" required>

                                    </div>

                                </div>

                                <div class="col-xs-2">

                                    <div class="form-group">

                                        <label>Day*</label>

                                        <select class="form-control" name="to_morning" required>
                                            <option value="">--- Select ---</option>
                                            <option value="morning">Morning</option>
                                            <option value="evening">Evening</option>
                                            <option value="all_day">All day</option>
                                        </select>

                                    </div>

                                </div>                                

                            </div>

                            <div class="row">
                                <div class="col-xs-6">

                                    <div class="form-group">

                                        <label>Description*</label>

                                        <textarea class="form-control" name="text" rows="4" required></textarea>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-6" id="reason1" style="display:none;">

                                    <div class="form-group">

                                        <label>Raison*</label>

                                        <textarea class="form-control" name="comment" id="comment1" disabled rows="4" required></textarea>

                                    </div>

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
                                <br>
                                <div class="col-md-12">
                                    <div class="text-right">

                                        <button class="btn btn-default">Save</button>

                                        <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>                              
                                    <div class="clearfix"></div>
                            </div>
                            <!-- </form> -->
                            <?php echo form_close(); ?>
                        </div> 
                        

                        <div id="vacation_request" class="drivers_request_div" style="display: none;">
                            <?=form_open("admin/drivers_requests/vacation_request_store", $attributes)?>
                            <input type="hidden" name="type" value="vacation_request">
                                <div class="row">

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Status*</label>

                                            <select class="form-control" name="status" id="status2" required>
                                                <option value="">--- Select status ---</option>
                                                <option value="1" selected>New</option>
                                                <option value="2">Pending</option>
                                                <option value="3">approved</option>
                                                <option value="4">Denied</option>
                                                <option value="5">Closed</option>
                                            </select>

                                        </div>

                                    </div>
                                
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Driver*</label>

                                            <select class="form-control" name="driver_name">
                                                <option value="">--- Select Driver ---</option>
                                                <option value="1">Driver 1</option>
                                                <option value="2">Driver 2</option>
                                                <option value="3">Driver 3</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>From*</label>

                                            <input type="text" class="form-control bdatepicker" name="from_date" autocomplete="off" required >

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Day*</label>

                                            <select class="form-control" name="from_morning" required>
                                                <option value="">--- Select ---</option>
                                                <option value="morning">Morning</option>
                                                <option value="evening">Evening</option>
                                                <option value="all_day">All day</option>
                                            </select>

                                        </div>

                                    </div>                                    

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>To*</label>

                                            <input type="text" class="form-control bdatepicker" name="to_date" autocomplete="off" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Day*</label>

                                            <select class="form-control" name="to_morning" required>
                                                <option value="">--- Select ---</option>
                                                <option value="morning">Morning</option>
                                                <option value="evening">Evening</option>
                                                <option value="all_day">All day</option>
                                            </select>

                                        </div>

                                    </div>                                    
                                </div>

                                <div class="row">
                                
                                <div class="col-xs-6">

                                    <div class="form-group">

                                        <label>Description*</label>

                                        <textarea class="form-control" name="text" rows="4" required></textarea>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                    <div class="col-xs-6" id="reason2" style="display:none;">

                                        <div class="form-group">

                                            <label>Raison*</label>

                                            <textarea class="form-control" name="comment" id="comment2" disabled rows="4" required></textarea>

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                        Add Medical proof document files*
                                    </div>
                                    <div class="col-md-3" id="attachDiv2">
                                        <div class="row">
                                            <div class="col-xs-8" style="overflow: hidden">
                                                <input type="file" name="attachment[]" required >
                                            </div>
                                            <div class="col-xs-4">
                                                <button type="button" class="btn btn-circle btn-success btn-sm addFile2 custombtn"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <button class="btn btn-default">Save</button>

                                            <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>   
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="salary_advance_request" class="drivers_request_div" style="display: none;">
                        <?=form_open("admin/drivers_requests/salary_request_store", $attributes)?>
                        <input type="hidden" class="form-control" name="request" readonly required value="Salary Advance">
                            <div class="row">
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Status*</label>

                                            <select class="form-control" name="status" id="status3" required>
                                                <option value="">--- Select status ---</option>
                                                <option value="1" selected>New</option>
                                                <option value="2">Pending</option>
                                                <option value="3">approved</option>
                                                <option value="4">Denied</option>
                                                <option value="5">Closed</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Driver*</label>

                                            <select class="form-control" name="driver_name">
                                                <option value="">--- Select Driver ---</option>
                                                <option value="1">Driver 1</option>
                                                <option value="2">Driver 2</option>
                                                <option value="3">Driver 3</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Requested Amount*</label>

                                            <input type="number" class="form-control" name="amount" id="amount" required>

                                        </div>

                                    </div>


                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Times*</label>

                                            <select class="form-control" name="time_deduce" id="time_deduce" required>
                                                <option value="">--- Times ---</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>

                                        </div>

                                    </div>
                                   

                                    <div class="clearfix"></div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Amount to Deduce</label>

                                            <input type="number" class="form-control" readonly id="paid_amount" required >

                                        </div>

                                    </div>
                                     <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>From*</label>
                                            <input type="hidden" id="month_number" value="<?php echo date('n'); ?>" >
                                            <input type="text" class="form-control" name="from_month" readonly required value="<?php echo date('F',strtotime('first day of +1 month')); ?>">

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>To*</label>

                                            <input type="text" class="form-control" name="to_month" id="to_month" readonly>

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Paid Amount By Employeer</label>

                                            <input type="number" class="form-control" name="paid_by_employeer" id="paid_by_employeer" required >

                                        </div>

                                    </div>                                                                                                         
                                    <!-- <div class="clearfix"></div>  -->


                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Date*</label>

                                            <input type="text" class="form-control bdatepicker" name="date_employeer" autocomplete="off" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Payment Method*</label>

                                            <select class="form-control" name="payment_method_employeer" required>
                                                <option value="">--- Select payment method ---</option>
                                                <option value="cash">Cash</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="Bank Wire">Bank Wire</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Due Amount*</label>

                                            <input type="text" class="form-control" readonly id="due_employeer" name="rest_due_employeer" required>

                                        </div>

                                    </div>  
                                    <div class="clearfix"></div>
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Paid Amount By Driver</label>

                                            <input type="number" class="form-control" name="paid_by_driver" id="paid_by_driver" required >

                                        </div>

                                    </div>                                                                                                         
                                    <!-- <div class="clearfix"></div>  -->


                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Date*</label>

                                            <input type="text" class="form-control bdatepicker" name="date" autocomplete="off" required>

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Payment Method*</label>

                                            <select class="form-control" name="payment_method" required>
                                                <option value="">--- Select payment method ---</option>
                                                <option value="cash">Cash</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="Bank Wire">Bank Wire</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Rest To Pay*</label>

                                            <input type="text" class="form-control" readonly id="due" name="rest_due" required>

                                        </div>

                                    </div>                                    
                                     <div class="clearfix"></div>
                                    <div class="col-xs-6">

                                        <div class="form-group">

                                            <label>Description*</label>

                                            <textarea class="form-control" name="text" rows="4" required></textarea>

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-xs-6" id="reason3" style="display:none;">

                                        <div class="form-group">

                                            <label>Raison*</label>

                                            <textarea class="form-control" name="comment" id="comment3" disabled rows="4"   required></textarea>

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>
                                    <!-- <div class="col-xs-4">

                                        <div class="form-group">

                                            <label>Add proof document files (optional)</label>

                                            <input type="file" class="form-control" name="attachments[]" multiple >

                                        </div>

                                    </div>   -->

                                    <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                        Add proof document files (optional)
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
                                    <!-- <div class="col-xs-12">

                                        <div class="form-group">

                                            <input type="submit" class="btn btn-primary" value="Submit">

                                        </div>

                                    </div> -->
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <button class="btn btn-default">Save</button>

                                            <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>

                        <div id="notes_refund_request" class="drivers_request_div">
                        <?=form_open("admin/drivers_requests/notes_request_store", $attributes)?>
                            <div class="row">
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Status*</label>

                                            <select class="form-control" name="status" id="status4" required>
                                                <option value="">--- Select status ---</option>
                                                <option value="1" selected>New</option>
                                                <option value="2">Pending</option>
                                                <option value="3">approved</option>
                                                <option value="4">Denied</option>
                                                <option value="5">Closed</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Driver*</label>

                                            <select class="form-control" name="driver_name">
                                                <option value="">--- Select Driver ---</option>
                                                <option value="1">Driver 1</option>
                                                <option value="2">Driver 2</option>
                                                <option value="3">Driver 3</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Date*</label>

                                            <input type="text" class="form-control bdatepicker" autocomplete="off" name="date" required>

                                        </div>

                                    </div>                                    

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Time*</label>

                                            <input type="text" id="time" class="form-control" name="time" >

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Category*</label>

                                            <select class="form-control" name="category" required>
                                                <option value="">--- Select category ---</option>
                                                <option value="carburant">Carburant</option>
                                                <option value="parking">Parking</option>
                                                <option value="car wash">Car Wash</option>
                                                <option value="others">Others</option>
                                                
                                            </select>

                                        </div>
                                    </div>
                                    <!-- <div class="clearfix"></div> -->
                                    
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Amount*</label>

                                            <input type="number" class="form-control" id="notes_amount" name="notes_amount" required>

                                        </div>

                                    </div> 

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Paid Amount*</label>

                                            <input type="number" class="form-control" id="notes_paid_amount" name="notes_paid_amount" required >

                                        </div>

                                    </div>

                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Date of payment*</label>

                                            <input type="text" class="form-control bdatepicker" autocomplete="off" name="payment_date" required>

                                        </div>

                                    </div>                                      


                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Payment Method*</label>

                                            <select class="form-control" name="payment_method" required>
                                            <option value="">--- Select payment method ---</option>
                                                <option value="cash">Cash</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="Bank Wire">Bank Wire</option>
                                            </select>

                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-2">

                                        <div class="form-group">

                                            <label>Rest Due*</label>

                                            <input type="text" class="form-control" id="notes_rest_due" name="notes_rest_due" readonly required>

                                        </div>

                                    </div>                                    

                                    <div class="clearfix"></div>

                                    <div class="col-xs-6">

                                        <div class="form-group">

                                            <label>Description*</label>

                                            <textarea class="form-control" name="text" rows="4" required></textarea>

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-xs-6" id="reason4" style="display:none;">

                                    <div class="form-group">

                                        <label>Raison*</label>

                                        <textarea class="form-control" name="comment" id="comment4" disabled rows="4" required></textarea>

                                    </div>

                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-3" style="padding-top: 5px;width:230px;">
                                        Add bills proof document files*
                                    </div>
                                    <div class="col-md-3" id="attachDiv4">
                                        <div class="row">
                                            <div class="col-xs-8" style="overflow: hidden">
                                                <input type="file" name="attachment[]" required >
                                            </div>
                                            <div class="col-xs-4">
                                                <button type="button" class="btn btn-circle btn-success btn-sm addFile4 custombtn"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <!-- <div class="col-xs-4"> -->
                                        
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <button class="btn btn-default">Save</button>

                                            <a href="<?=base_url("admin/drivers_requests")?>" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>  

                                    <!-- </div> -->


                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                        


                    </div>

                </div>

            </div>

        </div>

        <!--/.module-->

    </div>

    <!--/.content-->

</div>

<script type="text/javascript">
let i=2;
    $(document).ready(function(){
        
        $(".bdatepicker").datepicker({

            // format: "dd/mm/yyyy"
            format: "mm/dd/yyyy"

        });
        $("#request_type").on("change", function(){
            let request = $(this).val();
            console.log("#"+request);
            $(".drivers_request_div").hide();
            $("#"+request).show();
        });

        $("#time_deduce").on("change", function(){
            let amount = $("#amount").val();
            let times = $(this).val();
            let paid_by_driver = $("#paid_by_driver").val();
            let month_number = $("#month_number").val();
            
            let total_month_count = parseInt(month_number) + parseInt(times);
            // console.log(total_month_count+" check");
            if(amount > 0 && times > 0){
                let months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                let to_month = months[total_month_count-1];
                $("#to_month").val(to_month);

                let paid_amount = amount / times;
                $("#paid_amount").val(paid_amount.toFixed(2));


                if(paid_by_driver != "" && paid_by_driver > 0){
                    let due = amount - paid_by_driver;
                    $("#due").val(due.toFixed(2));
                }else{
                    // alert("aa");
                    let due = amount;
                    // console.log(due+"ee");
                    $("#due").val(parseFloat(amount).toFixed(2));
                }




            }
        });

        $("#amount").on("change", function(){
            let amount = $(this).val();
            let times = $("#time_deduce").val();
            let paid_by_driver = $("#paid_by_driver").val();
            let month_number = $("#month_number").val();
            let total_month_count = parseInt(month_number) + parseInt(times);
            if(amount > 0 && times > 0){
                let months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                let to_month = months[total_month_count];
                $("#to_month").val(to_month);

                let paid_amount = amount / times;
                $("#paid_amount").val(paid_amount.toFixed(2));

                

                if(paid_by_driver != "" && paid_by_driver > 0){
                    let due = amount - paid_by_driver;
                    $("#due").val(due.toFixed(2));
                }else{
                    // alert("aa");
                    let due = amount;
                    $("#due").val(parseFloat(due).toFixed(2));
                }
            }

        });


        $("#paid_by_driver").on("change", function(){
            let amount = $("#amount").val();
            let times = $("#time_deduce").val();
            let paid_by_driver = $(this).val();

            if(amount > 0 && times > 0 && paid_by_driver > 0){

                if(paid_by_driver != "" && paid_by_driver > 0){
                    let due = amount - paid_by_driver;
                    $("#due").val(due.toFixed(2));
                }else{
                    // alert("aa");
                    let due = amount;
                    $("#due").val(parseFloat(due).toFixed(2));
                }
            }

        });

        $("#notes_amount").on("change", function(){
            let amount = $(this).val();
            let notes_paid_amount = $("#notes_paid_amount").val();

            let due = amount - notes_paid_amount;
            $("#notes_rest_due").val(due.toFixed(2));

        });

        $("#notes_paid_amount").on("change", function(){
            let notes_paid_amount = $(this).val();
            let notes_amount = $("#notes_amount").val();

            let due = notes_amount - notes_paid_amount;
            $("#notes_rest_due").val(due.toFixed(2));
            
            

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

        $('#time').timepicker({ 'timeFormat': 'H:i' });

    });

</script>