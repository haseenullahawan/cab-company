<?php $locale_info = localeconv(); ?>

<style>

    .table-filter .dpo {

        max-width: 62px;

    }

    .table-filter span {

        margin: 4px 2px 0 3px;

    }

    .table-filter input[type="number"]{

        max-width: 48px;

    }

    @media only screen and (min-width: 1400px){

        .table-filter input, .table-filter select{

            max-width: 6% !important;

        }

        .table-filter select{

            max-width: 85px !important;

        }

        .table-filter .dpo {

            max-width: 90px !important;

        }

    }

    

    .nav-tabs > li.active {

        background: linear-gradient(#ffffff, #ffffff 25%, #d0d0d0) !important;
    border-bottom: none;


    }

    

    .nav-tabs > li {

            background-image: linear-gradient(to bottom, #fff 0, #e0e0e0 100%);
            border-left: 1px solid #ccc !important;
    height: 55px;
    margin: 0px !important;

    }

    .nav-tabs > li > a {

    color: #616161 !important;
    font-size: 12px;
    padding-left: 10px;
    display: block !important;
    width: 100% !important;
    height: 100% !important;
    text-transform: uppercase;
    font-weight: bold;
    transition: 0.2s;
    outline: none;
    border: none;
    border-radius: 0px;
}

    }



    #seracTab {

        background: linear-gradient(to bottom, #ffffff 0%, #f6f6f6 47%, #ddd 100%);

        height: 45px;

        margin: 0px 0px 20px 0px;

        border-radius: 4px;

        border: solid 1px #efefef;

        padding: 4px;

        text-align: center;

    }

    thead{

        background: transparent;

        border-bottom: 1px solid #111111;


        font-family: inherit;

        font-size: 100%;

        font-style: inherit;

        font-weight: inherit;

        line-height: 100%;

        vertical-align: baseline;

    }

    th{

        text-shadow: 0 -1px 0 #ffffff;

    }

    .tab-pane{

        padding: 30px;

    }

    table, .col-md-12{

        padding: 0px;

    }

   /*  table.dataTable, table.dataTable th, table.dataTable td {
   
       -webkit-box-sizing: content-box;
   
       -moz-box-sizing: content-box;
   
       box-sizing: content-box;
   
       padding: 0px;
   
   } */

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    background: #eee;
    color: #2c2c2c;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;

    }
    .table tbody tr td{
        background-color: white;
    }

    .table{
        padding: 0px;
         margin: 0 auto;
    clear: both;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 12px !important
    }
    .table thead > tr > th{
        background: linear-gradient(#ffffff, #ffffff 25%, #d0d0d0) !important;
        padding: 15px;
        color: #2c2c2c;
        font-weight: bolder;
        font-size: 13px;
    }
    .table-bordered > thead > tr > th, .table-bordered > thead > tr > td {

        border-bottom-width: 1px;

    }



    td{

        padding: 8px;

        line-height: 1.42857143;

        vertical-align: top;

        background-color: #f1f1f1;

    }

    
    input[type="text"],input[type="date"]{
    float: left;
    width: 100%;
    height: 32px !important;
    padding: 2px !important;
    margin-right: 2px !important;
    font-size: 12px;
    }
    input[type="date"]{
        width: 13%;
    }

    input.btn, .btn,button.btn {

        min-height: 28px;

        border: 1px solid #bbb;

        min-width: 80px;

        background-image: linear-gradient(to bottom, #fff 0, #e0e0e0 100%);
        background-repeat: repeat-x;
    border-color: #dbdbdb;
    text-shadow: 0 1px 0 #fff;
    border-color: #ccc;

    }



  /*   button.btn, .btn{
  
      min-height: 20px;
  
      border: 1px solid #bbb;
  
      min-width: 50px;
  
  } */

     .nav-tabs>li>a:hover{

        color: #333;
    background-color: #d4d4d4;
    border-color: #8c8c8c;
}

button.btn:hover, input.btn:hover{
    background-color: #e0e0e0;
    background-position: 0 -15px;
}
    



</style>

<div class="col-md-12"><!--col-md-10 padding white right-p-->

    <div class="content">

        <?php $this->load->view('admin/common/breadcrumbs');?>

        <br>

        <div class="row">

            <div class="col-md-12">

                <ul class="nav nav-tabs">

                    <li class="active"><a data-toggle="tab" href="#type">TYPE OF CLIENT</a></li>

                    <li><a data-toggle="tab" href="#payment">PAYMENT METHOD</a></li>

                    <li><a data-toggle="tab" href="#delay">DELAY OF PAYMENT</a></li>


                </ul>



                <div class="tab-content">

                    <!--status tab starts-->

                    <div id="type" class="tab-pane fade in active" style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                    <div class="row" id="seracTab">

                        <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                            <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                            <input type="text" id="searchType" class="form-control" style="width: 20%;float:left; " value="">

                            <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                            <input type="date" id="start_Type" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                            <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                            <input type="date" id="end_Type" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                            <input class="btn" type="button" id="SearchTypeBtn" value="Search" style="float:left;width: 8%;">

                            <input class="btn"  type="reset" id="resetType" value="Reset" style="float:left;width: 8%;">

                        </div>

                        <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddType"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditType" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteType"><span class="fa fa-close"> Delete</span></button>&nbsp;



                        </div>

                    </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="TypeTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Type Of Client</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="TypeTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddTypeForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Type Of Client:</span>

                                    <input  class="form-control" type="text" id="realType" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveType"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelType"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="TypeError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateTypeForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Type Of Client:</span>

                                    <input  class="form-control" type="text" id="update_Typ"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateType"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelType"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateTypeError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--status tab ends-->



                    <!--post tab statrs-->

                    <div id="payment" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchPayment" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Payment" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Payment" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchPaymentBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetPayment" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddPayment"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditPayment" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deletePayment"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="PaymentTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Payment Method</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="PaymentTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddPaymentForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Payment Method:</span>

                                    <input  class="form-control" type="text" id="realPayment" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SavePayment"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelPayment"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="PaymentError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdatePaymentForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Payment Method:</span>

                                    <input  class="form-control" type="text" id="update_Pay"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdatePayment"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelPayment"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdatePaymentError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--civility tab ends-->



                    <!--Delay tab statrs-->

                    <div id="delay" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchDelay" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Delay" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Delay" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchDelayBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetDelay" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddDelay"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditDelay" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteDelay"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="DelayTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable" id="table1">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Payment Delay</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="DelayTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddDelayForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Payment Delay:</span>

                                    <input  class="form-control" type="text" id="realDelay" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveDelay"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelDelay"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="DelayError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateDelayForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Payment Delay:</span>

                                    <input  class="form-control" type="text" id="update_Del"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateDelay"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelDelay"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateDelayError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--pattern tab ends-->


                </div>

            </div></div></div></div>

            </div>

        </div>

        <!--/.module-->

    </div>

    <!--/.content-->

</div>

<style>

     label > input {

        visibility: hidden;

    }



     label {

        display: block;

        margin: 0 0 0 -10px;

        padding: 0 0 20px 0;

        height: 20px;

        width: 150px;

    }



   label > img {

        display: inline-block;

        padding: 0px;

        height:10px;

        width:10px;

        background: none;

    }



     label > input:checked +img {

        background: url(http://cdn1.iconfinder.com/data/icons/onebit/PNG/onebit_34.png);

        background-repeat: no-repeat;

        background-position:center center;

        background-size:10px 10px;

    }

     .nav-tabs > li > a:hover {

         background-image: linear-gradient(to bottom, #ddd 0%, #f6f6f6 47%, #ffffff 100%);

     }

     button:hover, .btn:hover, .button:hover, .dataTables_paginate span.paginate_active:hover {

         background-color: #f1f1f1;

         background-image: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#ffffff));

     }

     .form-control {

         display: block;

         width: 100%;

         height: 34px;

         padding: 6px 12px;

         font-size: 14px;

         line-height: 1.42857143;

         color: #555;

         background-color: #fff;

         background-image: none;

         border: 1px solid #ccc;

         border-radius: 4px;

         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);

         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);

         -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;

         -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

         transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

     }

     button:active, .btn:active, .button:active, .dataTables_paginate span.paginate_active {

         background-color: #f1f1f1;

         border-color: #b2b2b2 #c7c7c7 #c7c7c7 #b2b2b2;

         -webkit-box-shadow: inset 0 2px 1px rgba(0, 0, 0, 0.1);

         -moz-box-shadow: inset 0 2px 1px rgba(0, 0, 0, 0.1);

         box-shadow: inset 0 2px 1px rgba(0, 0, 0, 0.1);

     }

    input.date{

        width: 13%;

        float: left;

        height: 34px;

    }

</style>

<!--Script for Status Tabs-->

<script>

    $(document).ready(function(){



        $('#searchType').keyup(function(){

            getType($(this).val(),'','');

        });



        getType('','','');

        function  getType(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getclienttype.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#TypeTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#TypeTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddType').click(function(){

           $('#TypeTable').attr('class','row hide');

           $('#AddTypeForm').attr('class','row show');

            $('#UpdateTypeForm').attr('class','row hide');

            $('#TypeError').html('');

            $('#realType').val('');

        });



        $('#CancelType').click(function(){

            $('#TypeTable').attr('class','row show');

            $('#AddTypeForm').attr('class','row hide');

            $('#UpdateTypeForm').attr('class','row hide');

            $('#TypeError').html('');

            $('#realType').val('');

        });





        $('#UpdateCancelType').click(function(){

            $('#TypeTable').attr('class','row show');

            $('#AddTypeForm').attr('class','row hide');

            $('#UpdateTypeForm').attr('class','row hide');

            $('#TypeError').html('');

            $('#realType').val('');

        });



        $('#SaveType').click(function(){

            var type= $('#realType').val();



            if(type == ""){

                $('#TypeError').html('please enter type of clinet');

            }else{

                $('#TypeError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addclienttype.php",

                    method:"get",

                    data:{type,type},

                    success:function(response){

                       //alert(response);

                        if(response == "success"){

                            $('#realType').val('');

                            $('#TypeTable').attr('class','row show');

                            $('#AddTypeForm').attr('class','row hide');

                            $('#UpdateTypeForm').attr('class','row hide');

                            getType('','','');

                        }else{

                            $('#TypeError').html('Duplicate Client Type found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetType').click(function () {

            $('#searchType').val('');

            $('#start_Type').val('');

            $('#end_Type').val('');

            getType('','','');

        });



        $('#SearchTypeBtn').click(function(){

            var fromdate = $('#start_Type').val();

            var todate = $('#end_Type').val();

             //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getType('',fromdate,todate);

            }

        });

        var type_id = '';

        var update_type = '';

        $('body').delegate('#TypeCheck','click',function(){

            //for unchecking checked check box

          if($(this).attr("checked") == "checked"){

              //alert('Hello world');

              $(this).prop("checked",'false');

              $(this).removeAttr('checked');

              type_id = '';

              update_type = '';

          }else{

              update_type = $(this).parent().find('#update_type').val();

              type_id = $(this).val();

              //alert(statut_id + update_statut);

              var checkboxes = document.getElementsByClassName("TypeClass");

              for(var i = 0; i < checkboxes.length; i++)

              {

                  //uncheck all

                  if(checkboxes[i].checked == true)

                  {

                      checkboxes[i].checked = false;

                  }

              }





              if($(this).checked == true)

              {

                  $(this).checked = false;

                  console.log('working')

              }

              else

              {

                  $(this).prop('checked','true');

                  $(this).attr('checked','true');

                  console.log('not working');

              }

          }



        });



        $('#EditType').click(function(){



            if(type_id == ""){

                 alert('Please Select Row To Update');

            }else{

                $('#update_Typ').val(update_type);

                console.log(update_type);

                $('#UpdateTypeForm').attr('class','row show');

                $('#TypeTable').attr('class','row hide');

                $('#AddTypeForm').attr('class','row hide');

                $('#TypeError').html('');

                $('#realType').val('');

            }

        });



        $('#UpdateType').click(function(){

                var Updtype = $('#update_Typ').val();



                if(Updtype == ""){

                    $('#UpdateTypeError').html('Please enter updated Type Name');

                }else{

                    $('#UpdateTypeError').html('');

                    $.ajax({

                        url:"<?php /*echo site_url(); */?>/admin/updateclienttype.php",

                        method:"GET",

                        data:{type:Updtype,id:type_id},

                        success:function(response){

                           // alert(response);

                            if(response == "success"){

                                $('#realType').val('');

                                $('#update_Typ').val('');

                                $('#TypeTable').attr('class','row show');

                                $('#AddTypeForm').attr('class','row hide');

                                $('#UpdateTypeForm').attr('class','row hide');

                                type_id = '';

                                update_type = '';

                                getType('','','');

                            }else{

                                $('#UpdateTypeError').html('This Type Of Client is already exists');

                            }

                        },error:function(xhr){

                            console.log(xhr.responseText);

                        }

                    });

                }

        });





           $('#deleteType').click(function(){

               if(type_id == ''){

                   alert('Please Select a row to delete');

               }else{

                 var conf = confirm('Are you sure you want to delete');



                 if(conf == true){

                     $.ajax({

                         url:"<?php echo site_url(); ?>/admin/deleteclienttype.php",

                         method:"get",

                         data:{id:type_id},

                         success:function(response){

                             //alert(response);

                             if(response == "success"){

                                 type_id = '';

                                update_type = '';       

                                 getType('','','');

                             }else{

                             }

                         },error:function(xhr){

                             console.log(xhr.responseText);

                         }

                     });

                 }

               }



           }) ;











    })

</script>

<!--End Script for Type tabs-->



<!--Script for Payment Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchPayment').keyup(function(){

            getPayment($(this).val(),'','');

        });



        getPayment('','','');

        function  getPayment(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getclientpayment.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#PaymentTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#PaymentTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddPayment').click(function(){

            $('#PaymentTable').attr('class','row hide');

            $('#AddPaymentForm').attr('class','row show');

            $('#UpdatePaymentForm').attr('class','row hide');

            $('#PaymentError').html('');

            $('#realPayment').val('');

        });



        $('#CancelPayment').click(function(){

            $('#PaymentTable').attr('class','row show');

            $('#AddPaymentForm').attr('class','row hide');

            $('#UpdatePaymentForm').attr('class','row hide');

            $('#PaymentError').html('');

            $('#realPayment').val('');

        });





        $('#UpdateCancelPayment').click(function(){

            $('#PaymentTable').attr('class','row show');

            $('#AddPaymentForm').attr('class','row hide');

            $('#UpdatePaymentForm').attr('class','row hide');

            $('#PaymentError').html('');

            $('#realPayment').val('');

        });



        $('#SavePayment').click(function(){

            var payment= $('#realPayment').val();



            if(payment == ""){

                $('#CiviliteError').html('please enter civilite name');

            }else{

                $('#CiviliteError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addclientpayment.php",

                    method:"get",

                    data:{payment:payment},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realPayment ').val('');

                            $('#PaymentTable').attr('class','row show');

                            $('#AddPaymentForm').attr('class','row hide');

                            $('#UpdatePaymentForm').attr('class','row hide');

                            getPayment ('','','');

                        }else{

                            $('#PaymentError').html('Duplicate Payment  found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetPayment').click(function () {

            $('#searchPayment').val('');

            $('#start_Payment').val('');

            $('#end_Payment').val('');

            getPayment('','','');

        });



        $('#SearchPaymentBtn').click(function(){

            var fromdate = $('#start_Payment').val();

            var todate = $('#end_Payment').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getPayment('',fromdate,todate);

            }

        });

        var payment_id = '';

        var update_payment = '';

        $('body').delegate('#PaymentCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                payment_id = '';

                update_payment = '';

            }else{

                update_payment = $(this).parent().find('#update_payment').val();

                payment_id = $(this).val();

                //alert(statut_id + update_statut);

                var checkboxes = document.getElementsByClassName("PaymentClass");

                for(var i = 0; i < checkboxes.length; i++)

                {

                    //uncheck all

                    if(checkboxes[i].checked == true)

                    {

                        checkboxes[i].checked = false;

                    }

                }





                if($(this).checked == true)

                {

                    $(this).checked = false;

                    console.log('working')

                }

                else

                {

                    $(this).prop('checked','true');

                    $(this).attr('checked','true');

                    console.log('not working');

                }

            }



        });



        $('#EditPayment').click(function(){



            if(payment_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Pay').val(update_payment);

                console.log(update_payment);

                $('#UpdatePaymentForm').attr('class','row show');

                $('#PaymentTable').attr('class','row hide');

                $('#AddPaymentForm').attr('class','row hide');

                $('#PaymentError').html('');

                $('#realPayment').val('');

            }

        });



        $('#UpdatePayment').click(function(){

            var Updpayment = $('#update_Pay').val();



            if(Updpayment == ""){

                $('#UpdatePaymentError').html('Please enter updated civilite name');

            }else{

                $('#UpdatePaymentError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updateclientpayment.php",

                    method:"GET",

                    data:{payment:Updpayment,id:payment_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realPayment').val('');

                            $('#update_Pay').val('');

                            $('#PaymentTable').attr('class','row show');

                            $('#AddPaymentForm').attr('class','row hide');

                            $('#UpdatePaymentForm').attr('class','row hide');

                             payment_id = '';

                            update_payment = '';

                            getPayment('','','');

                        }else{

                            $('#UpdatePaymentError').html('This Payment Method is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deletePayment').click(function(){

            if(payment_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete Payment');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deleteclientpayment.php",

                        method:"get",

                        data:{id:payment_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){

                                payment_id = '';

                            update_payment = '';    

                                getPayment('','','');

                            }else{

                            }

                        },error:function(xhr){

                            console.log(xhr.responseText);

                        }

                    });

                }

            }



        }) ;











    })

</script>

<!--End Script for Civility Tables Tabs-->



<!--Script for Delay Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchDelay').keyup(function(){

            getDelay($(this).val(),'','');

        });



        getDelay('','','');

        function  getDelay(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getclientdelay.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#DelayTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#DelayTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddDelay').click(function(){

            $('#DelayTable').attr('class','row hide');

            $('#AddDelayForm').attr('class','row show');

            $('#UpdateDelayForm').attr('class','row hide');

            $('#DelayError').html('');

            $('#realDelay').val('');

        });



        $('#CancelDelay').click(function(){

            $('#DelayTable').attr('class','row show');

            $('#AddDelayForm').attr('class','row hide');

            $('#UpdateDelayForm').attr('class','row hide');

            $('#DelayError').html('');

            $('#realDelay').val('');

        });





        $('#UpdateCancelDelay').click(function(){

            $('#DelayTable').attr('class','row show');

            $('#AddDelayForm').attr('class','row hide');

            $('#UpdatePostForm').attr('class','row hide');

            $('#DelayError').html('');

            $('#realDelay').val('');

        });



        $('#SaveDelay').click(function(){

            var delay= $('#realDelay').val();



            if(delay == ""){

                $('#DelayError').html('please enter Post name');

            }else{

                $('#DelayError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addclientdelay.php",

                    method:"get",

                    data:{delay:delay},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realDelay').val('');

                            $('#DelayTable').attr('class','row show');

                            $('#AddDelayForm').attr('class','row hide');

                            $('#UpdateDelayForm').attr('class','row hide');

                            getDelay('','','');

                        }else{

                            $('#DelayError').html('Duplicate Payment Delay found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetDelay').click(function () {

            $('#searchDelay').val('');

            $('#start_Delay').val('');

            $('#end_Delay').val('');

            getDelay('','','');

        });



        $('#SearchDelayBtn').click(function(){

            var fromdate = $('#start_Delay').val();

            var todate = $('#end_Delay').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getDelay('',fromdate,todate);

            }

        });

        var delay_id = '';

        var update_delay = '';

        $('body').delegate('#DelayCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                delay_id = '';

                update_delay = '';

            }else{

                update_delay = $(this).parent().find('#update_delay').val();

                delay_id = $(this).val();

                //alert(statut_id + update_statut);

                var checkboxes = document.getElementsByClassName("DelayClass");

                for(var i = 0; i < checkboxes.length; i++)

                {

                    //uncheck all

                    if(checkboxes[i].checked == true)

                    {

                        checkboxes[i].checked = false;

                    }

                }





                if($(this).checked == true)

                {

                    $(this).checked = false;

                    console.log('working')

                }

                else

                {

                    $(this).prop('checked','true');

                    $(this).attr('checked','true');

                    console.log('not working');

                }

            }



        });



        $('#EditDelay').click(function(){



            if(delay_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Del').val(update_delay);


                $('#UpdateDelayForm').attr('class','row show');

                $('#DelayTable').attr('class','row hide');

                $('#AddDelayForm').attr('class','row hide');

                $('#DelayError').html('');

                $('#realDelay').val('');

            }

        });



        $('#UpdateDelay').click(function(){

            var Upddelay = $('#update_Del').val();



            if(Upddelay == ""){

                $('#UpdateDelayError').html('Please enter updated Payment Delay');

            }else{

                $('#UpdateDelayError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updateclientdelay.php",

                    method:"GET",

                    data:{delay:Upddelay,id:delay_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realDelay').val('');

                            $('#update_Del').val('');

                            $('#DelayTable').attr('class','row show');

                            $('#AddDelayForm').attr('class','row hide');

                            $('#UpdateDelayForm').attr('class','row hide');


                delay_id = '';

                update_delay = '';

                            getDelay('','','');

                        }else{

                            $('#UpdateDelayError').html('This Payment Delay is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteDelay').click(function(){

            if(delay_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deleteclientdelay.php",

                        method:"get",

                        data:{id:delay_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){

                                 delay_id = '';

                                  update_delay = '';        

                                getDelay('','','');

                            }else{

                            }

                        },error:function(xhr){

                            console.log(xhr.responseText);

                        }

                    });

                }

            }



        }) ;



           $('#table1').DataTable();

    })


</script>
