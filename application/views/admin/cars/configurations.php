<?php $locale_info = localeconv(); ?>

<style>

    .table-filter .dpo {

        max-width: 62px;

    }

    input[type="file"]{
            border: 1px solid #ccc;
    width: 100%;
    width: 200px;
    padding: 3px 0px 3px 5px;
    /* background: #fff; */
    background: #fffdfd;

    }

    input[type="file"]:hover{
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 0 3px rgba(0, 0, 0, 0.2);

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

                    <li class="active"><a data-toggle="tab" href="#status">STATUS</a></li>

                   <!-- <li><a data-toggle="tab" href="#civility">CIVILITY</a></li>-->

                    <li><a data-toggle="tab" href="#post">POST</a></li>

                    <li><a data-toggle="tab" href="#pattern">PATTERN</a></li>

                    <li><a data-toggle="tab" href="#age">Car Age</a></li>

                    <li><a data-toggle="tab" href="#series">Series</a></li>

                    <li><a data-toggle="tab" href="#boite">Gear Box</a></li>

                    <li><a data-toggle="tab" href="#fuel">Fuel</a></li>

                    <li><a data-toggle="tab" href="#mail">Mail</a></li>

                    <li><a data-toggle="tab" href="#color">Color</a></li>

                    <li ><a data-toggle="tab" href="#nature">Nature</a></li>

                    <li><a data-toggle="tab" href="#type">TYPE</a></li>

                </ul>



                <div class="tab-content">

                    <!--status tab starts-->

                    <div id="status" class="tab-pane fade in active" style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                    <div class="row" id="seracTab">

                        <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                            <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                            <input type="text" id="searchStatut" class="form-control" style="width: 20%;float:left; " value="">

                            <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                            <input type="date" id="start_statut" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                            <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                            <input type="date" id="end_statut" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                            <input class="btn" type="button" id="SearchStatutBtn" value="Search" style="float:left;width: 8%;">

                            <input class="btn"  type="reset" id="resetStaut" value="Reset" style="float:left;width: 8%;">

                        </div>

                        <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddStatus"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditStatut" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteStatut"><span class="fa fa-close"> Delete</span></button>&nbsp;



                        </div>

                    </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="StatusTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Statut</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="StatutTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddStatusForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Statut:</span>

                                    <input  class="form-control" type="text" id="realstatut" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveStatus"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelStatus"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="StatusError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateStatusForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Statut:</span>

                                    <input  class="form-control" type="text" id="update_stat"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateStatus"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelStatus"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateStatusError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--status tab ends-->



                    <!--civility tab statrs-->

                    <!--<div id="civility" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchCivilite" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Civilite" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Civilite" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchCiviliteBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetCivilite" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddCivilite"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditCivilite" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteCivilite"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="CiviliteTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Civilite</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="CivilityTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddCiviliteForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Civilite:</span>

                                    <input  class="form-control" type="text" id="realCivilite" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveCivilite"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelCivilite"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="CiviliteError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateCiviliteForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Civilite:</span>

                                    <input  class="form-control" type="text" id="update_Civi"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCivilite"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelCivilite"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateCiviliteError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>-->

                    <!--civility tab ends-->





                    <!--post tab statrs-->

                    <div id="post" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchPost" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Post" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Post" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchPostBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetPost" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddPost"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditPost" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deletePost"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="PostTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Post</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="PostTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddPostForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Post:</span>

                                    <input  class="form-control" type="text" id="realPost" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SavePost"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelPost"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="PostError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdatePostForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Post:</span>

                                    <input  class="form-control" type="text" id="update_pos"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdatePost"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelPost"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdatePostError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--civility tab ends-->



                    <!--pattern tab statrs-->

                    <div id="pattern" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchPattern" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Pattern" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Pattern" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchPatternBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetPattern" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddPattern"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditPattern" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deletePattern"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="PatternTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Pattern</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="PatternTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddPatternForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Pattern:</span>

                                    <input  class="form-control" type="text" id="realPattern" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SavePattern"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelPattern"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="PatternError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdatePatternForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Post:</span>

                                    <input  class="form-control" type="text" id="update_Patt"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdatePattern"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelPattern"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdatePatternError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--pattern tab ends-->



                    <!--age tab statrs-->

                    <div id="age" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchAge" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Age" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Age" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchAgeBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetAge" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddAge"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditAge" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteAge"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="AgeTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Age</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="AgeTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddAgeForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Age:</span>

                                    <input  class="form-control" type="text" id="realAge" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveAge"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelAge"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="AgeError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateAgeForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Post:</span>

                                    <input  class="form-control" type="text" id="update_Ag"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateAge"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelAge"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateAgeError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Age tab ends-->



                    <!--Series tab statrs-->

                    <div id="series" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchSeries" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Series" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Series" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchSeriesBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetSeries" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddSeries"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditSeries" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteSeries"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="SeriesTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Series</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="SeriesTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddSeriesForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Series:</span>

                                    <input  class="form-control" type="text" id="realSeries" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveSeries"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelSeries"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="SeriesError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateSeriesForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Series:</span>

                                    <input  class="form-control" type="text" id="update_Ser"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateSeries"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelSeries"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateSeriesError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Series tab ends-->


                     <!--Fuel tab statrs-->

                    <div id="fuel" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchFuel" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Fuel" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Fuel" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchFuelBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetFuel" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddFuel"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditFuel" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteFuel"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="FuelTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Fuel</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="FuelTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddFuelForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Fuel:</span>

                                    <input  class="form-control" type="text" id="realFuel" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveFuel"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelFuel"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="FuelError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateFuelForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Fuel:</span>

                                    <input  class="form-control" type="text" id="update_Fue"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateFuel"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelFuel"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateFuelError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--FUel tab ends-->    

                     <!--Boite tab statrs-->

                    <div id="boite" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchBoite" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Boite" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Boite" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchBoiteBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetBoite" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddBoite"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditBoite" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteBoite"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="BoiteTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Gear Box</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="BoiteTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddBoiteForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Gear Box:</span>

                                    <input  class="form-control" type="text" id="realBoite" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveBoite"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelBoite"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="BoiteError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateBoiteForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Gear Box:</span>

                                    <input  class="form-control" type="text" id="update_Bot"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateBoite"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelBoite"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateBoiteError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Boite tab ends-->    


                     <!--Mail tab statrs-->

                    <div id="mail" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchMail" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Mail" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Mail" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchMailBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetMail" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddMail"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditMail" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteMail"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="MailTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Mail</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="MailTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddMailForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Mail:</span>

                                    <input  class="form-control" type="text" id="realMail" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveMail"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelMail"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="MailError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateMailForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Mail:</span>

                                    <input  class="form-control" type="text" id="update_Mai"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateMail"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelMail"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateMailError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Mail tab ends-->    

                     <!--Color tab statrs-->

                    <div id="color" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchColor" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Color" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Color" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchColorBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetColor" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddColor"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditColor" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteColor"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="ColorTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Color</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="ColorTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddColorForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Color:</span>

                                    <input  class="form-control" type="text" id="realColor" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveColor"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelColor"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="ColorError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateColorForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Color:</span>

                                    <input  class="form-control" type="text" id="update_Col"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateColor"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelColor"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateColorError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Color tab ends-->    


                     <!--Nature tab statrs-->

                    <div id="nature" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

                        <div class="row" id="seracTab">

                            <div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">

                                <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                                <input type="text" id="searchNature" class="form-control" style="width: 20%;float:left; " value="">

                                <span style="float: left;padding: 3px;padding-top: 3px">From</span>

                                <input type="date" id="start_Nature" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <span style="float: left;padding: 3px;padding-top: 6px">To</span>

                                <input type="date" id="end_Nature" class="form-control" style="width: 20%;float:left;height: 36px; " value="">

                                <input class="btn" type="button" id="SearchNatureBtn" value="Search" style="float:left;width: 8%;">

                                <input class="btn"  type="reset" id="resetNature" value="Reset" style="float:left;width: 8%;">

                            </div>

                            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="AddNature"><span class="fa fa-plus"> Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditNature" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteNature"><span class="fa fa-close"> Delete</span></button>&nbsp;



                            </div>

                        </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="NatureTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="15%" ></th>

                                        <th  style="text-align: center" width="15%" align="center"> ID </th>

                                        <th align="center" width="35%" style="text-align: center">Nature</th>

                                        <th align="center" width="35%" style="text-align: center">Created Date</th>

                                    </tr>

                                    </thead>

                                    <tbody id="NatureTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row hide" style="width: 100%" id="AddNatureForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Nature:</span>

                                    <input  class="form-control" type="text" id="realNature" ><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="SaveNature"><span class="fa fa-save"></span> Save</button>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateCancelNature"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="NatureError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <div class="row hide" style="width: 100%" id="UpdateNatureForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Nature:</span>

                                    <input  class="form-control" type="text" id="update_Nat"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateNature"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelNature"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateNatureError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Nature tab ends-->    


                      <!--Type tab statrs-->

                    <div id="type" class="tab-pane fade in " style="width: 100%;border: 1px solid #ccc;padding-top: 10px">

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

                        <div class="row" style="padding:0px;margin: 0px" id="NatureTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th width="" ></th>

                                        <th  style="text-align: center" width="" align="center"> ID </th>

                                        <th align="center" width="" style="text-align: center">Type Name</th>

                                        <th align="center" width="" style="text-align: center">Udaptation</th>

                                        <th align="center" width="" style="text-align: center">Passengers</th>
                                        <th align="center" width="" style="text-align: center">Luggages</th>
                                        <th align="center" width="" style="text-align: center">Weelchairs</th>
                                        <th align="center" width="" style="text-align: center">Baby Sets</th>
                                        <th align="center" width="" style="text-align: center">Animals</th>
                                        <th align="center" width="" style="text-align: center">Car Icon</th>
                                        <th align="center" width="" style="text-align: center">Created Date</th>


                                    </tr>

                                    </thead>

                                    <tbody id="TypeTbody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <div class="row" style="margin-top: 10px;" class="AddTypeForm">
                                        
                                        <div class="col-md-3" style="width: 10%;padding: 0px;margin: 0px">
                                            <div class="form-group">
                                                <div class="col-md-4" style="margin-top: 10px;margin-top: 5px;padding-left: 5px;">
                                                    <small style="font-weight: bold;font-size: 12px">Type Name</small>
                                                </div>
                                                <div class="col-md-8" style="padding: 0px;">
                                                    <input name="type" required="" class="form-control" type="text">
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3" style="width: 13%;padding: 0px;margin: 0px;" >
                                            <div class="form-group">
                                                <div class="col-md-5" style="margin-top: 10px;text-align: left;padding-left: 0px;">
                                                    <span style="font-weight: bold;font-size: 12px;text-align: left;">Udaptation</span>
                                                </div>
                                                <div class="col-md-7" style="padding: 0px;">
                                                    <select name="updation" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="TPMR">TPMR</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1" style="width: 11%;padding: 0px;">
                                            <div class="form-group">
                                                <div class="col-md-7" style="margin-top: 10px;padding: 0px;text-align: center;">
                                                    <span style="font-weight: bold;font-size: 12px">Passengers</span>
                                                </div>
                                                <div class="col-md-5" style="padding: 0px;">
                                                    <select name="pessenger" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-1" style="width: 10%;margin: 0px;padding: 0px">
                                            <div class="form-group">
                                                <div class="col-md-6" style="margin-top: 10px;padding: 0px;text-align: center;">
                                                    <span style="font-weight: bold;font-size: 12px">Lugages</span>
                                                </div>
                                                <div class="col-md-6" style="padding: 0px;">
                                                    <select name="lagages" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1" style="width: 10.7%;padding-left: 0px;margin: 0px;padding: 0px;">
                                            <div class="form-group">
                                                <div class="col-md-6" style="margin-top: 10px;padding: 0px;">
                                                    <span style="font-weight: bold;font-size: 12px;font-size: 12px">Weelchairs</span>
                                                </div>
                                                <div class="col-md-6" style="padding: 0px;">
                                                    <select name="wheelchair" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1" style="width: 10.7%;padding-left: 0px;margin: 0px;padding: 0px;">
                                            <div class="form-group">
                                                <div class="col-md-6" style="margin-top: 10px;padding: 0px;text-align: center;">
                                                    <span style="font-weight: bold;font-size: 12px">Baby Sets</span>
                                                </div>
                                                <div class="col-md-6" style="padding: 0px;">
                                                    <select name="babyseat" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="width: 10.7%;padding-left: 0px;margin: 0px;padding: 0px;">
                                            <div class="form-group">
                                                <div class="col-md-6" style="margin-top: 10px;padding: 0px;text-align: center;">
                                                    <span style="font-weight: bold;font-size: 12px">Animals</span>
                                                </div>
                                                <div class="col-md-6" style="padding: 0px;">
                                                    <select name="animal" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-1" style="width: 3%;padding: 0px;margin-top: 0px;padding-left: 3px;">
                                            <button type="button" class="btn-success btn-sm" id="Deletediv"><span class="fa fa-plus"></span></button>
                                        </div> 
                                        
                                        <div class="col-md-1" style="width: 17.7%;padding-left: 0px;padding: 0px;">
                                            <div class="form-group">
                                                <div class="col-md-3" style="margin-top: 5px;padding: 0px;text-align: center">
                                                    <span style="font-weight: bold;font-size: 12px">Car Icon</span>
                                                </div>
                                                <div class="col-md-9" style="padding: 0px;">
                                                    <input type="file" name="userFiles">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <span id="RowToAdd"></span>
                                        

                                        <div class="col-md-12" style="text-align: right">
                                        <button class="btn" style="margin-top: 10px" id="SaveType"><span class="fa fa-save"></span> Save</button>
                                        <button class="btn" style="margin-top: 10px" id="UpdateCancelType"><span class="fa fa-close"> Cancel</span></button>
                                        <img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="https://cab-booking-script.com/demo/css/loading.gif">
                                    </div>
                            

                                    </div>

                        <div class="row hide" style="width: 100%" id="UpdateNatureForm">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <span style="font-weight: bold;">Nature:</span>

                                    <input  class="form-control" type="text" id="update_Nat"><br><br>

                                    <button  class="btn" style="margin-top: 10px" id="UpdateNature"><span class="fa fa-save"></span> Update</button>

                                    <button  class="btn" style="margin-top: 10px" id="CancelNature"><span class="fa fa-close"> Cancel</span></button>

                                    <br>

                                    <span class="text-danger text-center" id="UpdateNatureError"></span>





                                </div>

                            </div>

                            <div class="col-md-4"></div>

                        </div>

                        <br><br><br>

                    </div>

                    <!--Type tab ends-->    
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



        $('#searchStatut').keyup(function(){

            getStatut($(this).val(),'','');

        });



        getStatut('','','');

        function  getStatut(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getstaut.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#StatutTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                //alert(response);

                    if(response != ""){

                        $('#StatutTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddStatus').click(function(){

           $('#StatusTable').attr('class','row hide');

           $('#AddStatusForm').attr('class','row show');

            $('#UpdateStatusForm').attr('class','row hide');

            $('#StatusError').html('');

            $('#realstatut').val('');

        });



        $('#CancelStatus').click(function(){

            $('#StatusTable').attr('class','row show');

            $('#AddStatusForm').attr('class','row hide');

            $('#UpdateStatusForm').attr('class','row hide');

            $('#StatusError').html('');

            $('#realstatut').val('');

        });





        $('#UpdateCancelStatus').click(function(){

            $('#StatusTable').attr('class','row show');

            $('#AddStatusForm').attr('class','row hide');

            $('#UpdateStatusForm').attr('class','row hide');

            $('#StatusError').html('');

            $('#realstatut').val('');

        });



        $('#SaveStatus').click(function(){

            var statut= $('#realstatut').val();



            if(statut == ""){

                $('#StatusError').html('please enter status name');

            }else{

                $('#StatusError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addstatus.php",

                    method:"get",

                    data:{statut,statut},

                    success:function(response){

                       //alert(response);

                        if(response == "success"){

                            $('#realstatut').val('');

                            $('#StatusTable').attr('class','row show');

                            $('#AddStatusForm').attr('class','row hide');

                            $('#UpdateStatusForm').attr('class','row hide');

                            getStatut('','','');

                        }else{

                            $('#StatusError').html('Duplicate name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetStaut').click(function () {

            $('#searchStatut').val('');

            $('#start_statut').val('');

            $('#end_statut').val('');

            getStatut('','','');

        });



        $('#SearchStatutBtn').click(function(){

            var fromdate = $('#start_statut').val();

            var todate = $('#end_statut').val();

             //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getStatut('',fromdate,todate);

            }

        });

        var statut_id = '';

        var update_statut = '';

        $('body').delegate('#check','click',function(){

            //for unchecking checked check box

          if($(this).attr("checked") == "checked"){

              //alert('Hello world');

              $(this).prop("checked",'false');

              $(this).removeAttr('checked');

              statut_id = '';

              update_statut = '';

          }else{

              update_statut = $(this).parent().find('#update_statut').val();

              statut_id = $(this).val();

              //alert(statut_id + update_statut);

              var checkboxes = document.getElementsByClassName("StautClass");

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



        $('#EditStatut').click(function(){



            if(statut_id == ""){

                 alert('Please Select Row To Update');

            }else{

                $('#update_stat').val(update_statut);

                console.log(update_statut);

                $('#UpdateStatusForm').attr('class','row show');

                $('#StatusTable').attr('class','row hide');

                $('#AddStatusForm').attr('class','row hide');

                $('#StatusError').html('');

                $('#realstatut').val('');

            }

        });



        $('#UpdateStatus').click(function(){

                var Updstatut = $('#update_stat').val();



                if(Updstatut == ""){

                    $('#UpdateStatusError').html('Please enter updated statuts name');

                }else{

                    $('#UpdateStatusError').html('');

                    $.ajax({

                        url:"<?php /*echo site_url(); */?>/admin/updatestatus.php",

                        method:"GET",

                        data:{statut:Updstatut,id:statut_id},

                        success:function(response){

                           // alert(response);

                            if(response == "success"){

                                $('#realstatut').val('');

                                $('#update_stat').val('');

                                $('#StatusTable').attr('class','row show');

                                $('#AddStatusForm').attr('class','row hide');

                                $('#UpdateStatusForm').attr('class','row hide');

                                getStatut('','','');

                            }else{

                                $('#UpdateStatusError').html('This name is already exists');

                            }

                        },error:function(xhr){

                            console.log(xhr.responseText);

                        }

                    });

                }

        });





           $('#deleteStatut').click(function(){

               if(statut_id == ''){

                   alert('Please Select a row to delete');

               }else{

                 var conf = confirm('Are you sure you want to delete');



                 if(conf == true){

                     $.ajax({

                         url:"<?php /*echo site_url(); */?>/admin/deletestatus.php",

                         method:"get",

                         data:{id:statut_id},

                         success:function(response){

                             //alert(response);

                             if(response == "success"){



                                 getStatut('','','');

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

<!--End Script for status tabs-->



<!--Script for Civility Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchCivilite').keyup(function(){

            getcivility($(this).val(),'','');

        });



        getcivility('','','');

        function  getcivility(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getcivility.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#CivilityTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#CivilityTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddCivilite').click(function(){

            $('#CiviliteTable').attr('class','row hide');

            $('#AddCiviliteForm').attr('class','row show');

            $('#UpdateCiviliteForm').attr('class','row hide');

            $('#CiviliteError').html('');

            $('#realCivilite').val('');

        });



        $('#CancelCivilite').click(function(){

            $('#CiviliteTable').attr('class','row show');

            $('#AddCiviliteForm').attr('class','row hide');

            $('#UpdateCiviliteForm').attr('class','row hide');

            $('#CiviliteError').html('');

            $('#realCivilite').val('');

        });





        $('#UpdateCancelCivilite').click(function(){

            $('#CiviliteTable').attr('class','row show');

            $('#AddCiviliteForm').attr('class','row hide');

            $('#UpdateCiviliteForm').attr('class','row hide');

            $('#CiviliteError').html('');

            $('#realCivilite').val('');

        });



        $('#SaveCivilite').click(function(){

            var civilite= $('#realCivilite').val();



            if(civilite == ""){

                $('#CiviliteError').html('please enter civilite name');

            }else{

                $('#CiviliteError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addcivilite.php",

                    method:"get",

                    data:{civilite:civilite},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realCivilite').val('');

                            $('#CiviliteTable').attr('class','row show');

                            $('#AddCiviliteForm').attr('class','row hide');

                            $('#UpdateCiviliteForm').attr('class','row hide');

                            getcivility('','','');

                        }else{

                            $('#CiviliteError').html('Duplicate name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetCivilite').click(function () {

            $('#searchCivilite').val('');

            $('#start_Civilite').val('');

            $('#end_Civilite').val('');

            getcivility('','','');

        });



        $('#SearchCiviliteBtn').click(function(){

            var fromdate = $('#start_Civilite').val();

            var todate = $('#end_Civilite').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getcivility('',fromdate,todate);

            }

        });

        var civilite_id = '';

        var update_civilite = '';

        $('body').delegate('#CivilityCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                civilite_id = '';

                update_civilite = '';

            }else{

                update_civilite = $(this).parent().find('#update_civility').val();

                civilite_id = $(this).val();

                //alert(statut_id + update_statut);

                var checkboxes = document.getElementsByClassName("CivilityClass");

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



        $('#EditCivilite').click(function(){



            if(civilite_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Civi').val(update_civilite);

                console.log(update_civilite);

                $('#UpdateCiviliteForm').attr('class','row show');

                $('#CiviliteTable').attr('class','row hide');

                $('#AddCiviliteForm').attr('class','row hide');

                $('#CiviliteError').html('');

                $('#realCivilite').val('');

            }

        });



        $('#UpdateCivilite').click(function(){

            var Updcivilite = $('#update_Civi').val();



            if(Updcivilite == ""){

                $('#UpdateCiviliteError').html('Please enter updated civilite name');

            }else{

                $('#UpdateCiviliteError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatecivilite.php",

                    method:"GET",

                    data:{civilite:Updcivilite,id:civilite_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realCivilite').val('');

                            $('#update_Civi').val('');

                            $('#CiviliteTable').attr('class','row show');

                            $('#AddCiviliteForm').attr('class','row hide');

                            $('#UpdateCiviliteForm').attr('class','row hide');

                            getcivility('','','');

                        }else{

                            $('#UpdateCiviliteError').html('This civilite name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteCivilite').click(function(){

            if(civilite_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete Civilite');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletecivilite.php",

                        method:"get",

                        data:{id:civilite_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getcivility('','','');

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



<!--Script for Post Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchPost').keyup(function(){

            getPost($(this).val(),'','');

        });



        getPost('','','');

        function  getPost(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getpost.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#PostTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#PostTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddPost').click(function(){

            $('#PostTable').attr('class','row hide');

            $('#AddPostForm').attr('class','row show');

            $('#UpdatePostForm').attr('class','row hide');

            $('#PostError').html('');

            $('#realPost').val('');

        });



        $('#CancelPost').click(function(){

            $('#PostTable').attr('class','row show');

            $('#AddPostForm').attr('class','row hide');

            $('#UpdatePostForm').attr('class','row hide');

            $('#PostError').html('');

            $('#realPost').val('');

        });





        $('#UpdateCancelPost').click(function(){

            $('#PostTable').attr('class','row show');

            $('#AddPostForm').attr('class','row hide');

            $('#UpdatePostForm').attr('class','row hide');

            $('#PostError').html('');

            $('#realPost').val('');

        });



        $('#SavePost').click(function(){

            var post= $('#realPost').val();



            if(post == ""){

                $('#PostError').html('please enter Post name');

            }else{

                $('#PostError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addpost.php",

                    method:"get",

                    data:{post:post},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realPost').val('');

                            $('#PostTable').attr('class','row show');

                            $('#AddPostForm').attr('class','row hide');

                            $('#UpdatePostForm').attr('class','row hide');

                            getPost('','','');

                        }else{

                            $('#PostError').html('Duplicate Post name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetPost').click(function () {

            $('#searchPost').val('');

            $('#start_Post').val('');

            $('#end_Post').val('');

            getPost('','','');

        });



        $('#SearchPostBtn').click(function(){

            var fromdate = $('#start_Post').val();

            var todate = $('#end_Post').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getPost('',fromdate,todate);

            }

        });

        var post_id = '';

        var update_post = '';

        $('body').delegate('#postCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                post_id = '';

                update_post = '';

            }else{

                update_post = $(this).parent().find('#update_post').val();

                post_id = $(this).val();

                //alert(statut_id + update_statut);

                var checkboxes = document.getElementsByClassName("PostClass");

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



        $('#EditPost').click(function(){



            if(post_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_pos').val(update_post);

                console.log(update_post);

                $('#UpdatePostForm').attr('class','row show');

                $('#PostTable').attr('class','row hide');

                $('#AddPostForm').attr('class','row hide');

                $('#PostError').html('');

                $('#realPost').val('');

            }

        });



        $('#UpdatePost').click(function(){

            var Updpost = $('#update_pos').val();



            if(Updpost == ""){

                $('#UpdatePostError').html('Please enter updated civilite name');

            }else{

                $('#UpdatePostError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatepost.php",

                    method:"GET",

                    data:{post:Updpost,id:post_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realPost').val('');

                            $('#update_pos').val('');

                            $('#PostTable').attr('class','row show');

                            $('#AddPostForm').attr('class','row hide');

                            $('#UpdatePostForm').attr('class','row hide');

                            getPost('','','');

                        }else{

                            $('#UpdatePostError').html('This Post name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deletePost').click(function(){

            if(post_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletepost.php",

                        method:"get",

                        data:{id:post_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getPost('','','');

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

<!--End Script for Post Tables Tabs-->



<!--Script for Pattern Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchPattern').keyup(function(){

            getPattern($(this).val(),'','');

        });



        getPattern('','','');

        function  getPattern(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getpattern.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#PatternTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#PatternTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddPattern').click(function(){

            $('#PatternTable').attr('class','row hide');

            $('#AddPatternForm').attr('class','row show');

            $('#UpdatePatternForm').attr('class','row hide');

            $('#PatternError').html('');

            $('#realPattern').val('');

        });



        $('#CancelPattern').click(function(){

            $('#PatternTable').attr('class','row show');

            $('#AddPatternForm').attr('class','row hide');

            $('#UpdatePatternForm').attr('class','row hide');

            $('#PatternError').html('');

            $('#realPattern').val('');

        });





        $('#UpdateCancelPattern').click(function(){

            $('#PatternTable').attr('class','row show');

            $('#AddPatternForm').attr('class','row hide');

            $('#UpdatePatternForm').attr('class','row hide');

            $('#PatternError').html('');

            $('#realPattern').val('');

        });



        $('#SavePattern').click(function(){

            var pattern= $('#realPattern').val();



            if(pattern == ""){

                $('#PatternError').html('please enter Post name');

            }else{

                $('#PatternError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addpattern.php",

                    method:"get",

                    data:{pattern:pattern},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realPattern').val('');

                            $('#PatternTable').attr('class','row show');

                            $('#AddPatternForm').attr('class','row hide');

                            $('#UpdatePatternForm').attr('class','row hide');

                            getPattern('','','');

                        }else{

                            $('#PatternError').html('Duplicate Pattern name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetPattern').click(function () {

            $('#searchPattern').val('');

            $('#start_Pattern').val('');

            $('#end_Pattern').val('');

            getPattern('','','');

        });



        $('#SearchPatternBtn').click(function(){

            var fromdate = $('#start_Pattern').val();

            var todate = $('#end_Pattern').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getPattern('',fromdate,todate);

            }

        });

        var pattern_id = '';

        var update_pattern = '';

        $('body').delegate('#PatternCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                pattern_id = '';

                update_pattern = '';

            }else{

                update_pattern = $(this).parent().find('#update_pattern').val();

                pattern_id = $(this).val();

                //alert(statut_id + update_statut);

                var checkboxes = document.getElementsByClassName("PatternClass");

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



        $('#EditPattern').click(function(){



            if(pattern_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Patt').val(update_pattern);

                //console.log(update_pattern);

                $('#UpdatePatternForm').attr('class','row show');

                $('#PatternTable').attr('class','row hide');

                $('#AddPatternForm').attr('class','row hide');

                $('#PatternError').html('');

                $('#realPattern').val('');

            }

        });



        $('#UpdatePattern').click(function(){

            var Updpattern = $('#update_Patt').val();



            if(Updpattern == ""){

                $('#UpdatePostError').html('Please enter updated Pattern name');

            }else{

                $('#UpdatePostError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatepattern.php",

                    method:"GET",

                    data:{pattern:Updpattern,id:pattern_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realPattern').val('');

                            $('#update_Patt').val('');

                            $('#PatternTable').attr('class','row show');

                            $('#AddPatternForm').attr('class','row hide');

                            $('#UpdatePatternForm').attr('class','row hide');

                            getPattern('','','');

                        }else{

                            $('#UpdatePatternError').html('This Pattern name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deletePattern').click(function(){

            if(pattern_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletepattern.php",

                        method:"get",

                        data:{id:pattern_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getPattern('','','');

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

<!--End Script for Pattern Tables Tabs-->



<!--Script for Age Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchAge').keyup(function(){

            getAge($(this).val(),'','');

        });



        getAge('','','');

        function  getAge(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getage.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#AgeTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#AgeTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddAge').click(function(){

            $('#AgeTable').attr('class','row hide');

            $('#AddAgeForm').attr('class','row show');

            $('#UpdateAgeForm').attr('class','row hide');

            $('#AgeError').html('');

            $('#realAge').val('');

        });



        $('#CancelAge').click(function(){

            $('#AgeTable').attr('class','row show');

            $('#AddAgeForm').attr('class','row hide');

            $('#UpdateAgeForm').attr('class','row hide');

            $('#AgeError').html('');

            $('#realAge').val('');

        });





        $('#UpdateCancelAge').click(function(){

            $('#AgeTable').attr('class','row show');

            $('#AddAgeForm').attr('class','row hide');

            $('#UpdateAgeForm').attr('class','row hide');

            $('#AgeError').html('');

            $('#realAge').val('');

        });



        $('#SaveAge').click(function(){

            var age= $('#realAge').val();



            if(age == ""){

                $('#AgeError').html('please enter Car Age name');

            }else{

                $('#AgeError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addage.php",

                    method:"get",

                    data:{age:age},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realAge').val('');

                            $('#AgeTable').attr('class','row show');

                            $('#AddAgeForm').attr('class','row hide');

                            $('#UpdateAgeForm').attr('class','row hide');

                            getAge('','','');

                        }else{

                            $('#AgeError').html('Duplicate Car Age name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetAge').click(function () {

            $('#searchAge').val('');

            $('#start_Age').val('');

            $('#end_Age').val('');

            getAge('','','');

        });



        $('#SearchAgeBtn').click(function(){

            var fromdate = $('#start_Age').val();

            var todate = $('#end_Age').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getAge('',fromdate,todate);

            }

        });

        var age_id = '';

        var update_age = '';

        $('body').delegate('#AgeCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                age_id = '';

                update_age = '';

            }else{

                update_age = $(this).parent().find('#update_age').val();

                age_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("AgeClass");

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



        $('#EditAge').click(function(){



            if(age_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Ag').val(update_age);

                //console.log(update_pattern);

                $('#UpdateAgeForm').attr('class','row show');

                $('#AgeTable').attr('class','row hide');

                $('#AddAgeForm').attr('class','row hide');

                $('#AgeError').html('');

                $('#realAge').val('');

            }

        });



        $('#UpdateAge').click(function(){

            var Updage = $('#update_Ag').val();



            if(Updage == ""){

                $('#UpdateAgeError').html('Please enter updated Age name');

            }else{

                $('#UpdateAgeError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updateage.php",

                    method:"GET",

                    data:{age:Updage,id:age_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realAge').val('');

                            $('#update_Ag').val('');

                            $('#AgeTable').attr('class','row show');

                            $('#AddAgeForm').attr('class','row hide');

                            $('#UpdateAgeForm').attr('class','row hide');

                            getAge('','','');

                        }else{

                            $('#UpdateAgeError').html('This Car Age name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteAge').click(function(){

            if(age_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deleteage.php",

                        method:"get",

                        data:{id:age_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getAge('','','');

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

<!--End Script for Age Tables Tabs-->



<!--Script for Series Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchSeries').keyup(function(){

            getSeries($(this).val(),'','');

        });



        getSeries('','','');

        function  getSeries(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getseries.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#SeriesTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#SeriesTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddSeries').click(function(){

            $('#SeriesTable').attr('class','row hide');

            $('#AddSeriesForm').attr('class','row show');

            $('#UpdateSeriesForm').attr('class','row hide');

            $('#SeriesError').html('');

            $('#realSeries').val('');

        });



        $('#CancelSeries').click(function(){

            $('#SeriesTable').attr('class','row show');

            $('#AddSeriesForm').attr('class','row hide');

            $('#UpdateSeriesForm').attr('class','row hide');

            $('#SeriesError').html('');

            $('#realSeries').val('');

        });





        $('#UpdateCancelSeries').click(function(){

            $('#SeriesTable').attr('class','row show');

            $('#AddSeriesForm').attr('class','row hide');

            $('#UpdateSeriesForm').attr('class','row hide');

            $('#SeriesError').html('');

            $('#realSeries').val('');

        });



        $('#SaveSeries').click(function(){

            var series= $('#realSeries').val();



            if(series == ""){

                $('#SeriesError').html('please enter Car Age name');

            }else{

                $('#SeriesError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addseries.php",

                    method:"get",

                    data:{series:series},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realSeries').val('');

                            $('#SeriesTable').attr('class','row show');

                            $('#AddSeriesForm').attr('class','row hide');

                            $('#UpdateSeriesForm').attr('class','row hide');

                            getSeries('','','');

                        }else{

                            $('#SeriesError').html('Duplicate Car Series name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetSeries').click(function () {

            $('#searchSeries').val('');

            $('#start_Series').val('');

            $('#end_Series').val('');

            getSeries('','','');

        });



        $('#SearchSeriesBtn').click(function(){

            var fromdate = $('#start_Series').val();

            var todate = $('#end_Series').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getSeries('',fromdate,todate);

            }

        });

        var series_id = '';

        var update_series = '';

        $('body').delegate('#SeriesCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                series_id = '';

                update_series = '';

            }else{

                update_series = $(this).parent().find('#update_series').val();

                series_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("SeriesClass");

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



        $('#EditSeries').click(function(){



            if(series_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Ser').val(update_series);

                //console.log(update_pattern);

                $('#UpdateSeriesForm').attr('class','row show');

                $('#SeriesTable').attr('class','row hide');

                $('#AddSeriesForm').attr('class','row hide');

                $('#SeriesError').html('');

                $('#realSeries').val('');

            }

        });



        $('#UpdateSeries').click(function(){

            var Updseries = $('#update_Ser').val();



            if(Updseries == ""){

                $('#UpdateSeriesError').html('Please enter updated Series name');

            }else{

                $('#UpdateSeriesError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updateseries.php",

                    method:"GET",

                    data:{series:Updseries,id:series_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realSeries').val('');

                            $('#update_Ser').val('');

                            $('#SeriesTable').attr('class','row show');

                            $('#AddSeriesForm').attr('class','row hide');

                            $('#UpdateSeriesForm').attr('class','row hide');

                            getSeries('','','');

                        }else{

                            $('#UpdateSeriesError').html('This Car Series name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteSeries').click(function(){

            if(series_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deleteseries.php",

                        method:"get",

                        data:{id:series_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getSeries('','','');

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

<!--End Script for Series Tables Tabs-->

<!--Script for Boite Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchBoite').keyup(function(){

            getBoite($(this).val(),'','');

        });



        getBoite('','','');

        function  getBoite(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getboite.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#BoiteTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#BoiteTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddBoite').click(function(){

            $('#BoiteTable').attr('class','row hide');

            $('#AddBoiteForm').attr('class','row show');

            $('#UpdateBoiteForm').attr('class','row hide');

            $('#BoiteError').html('');

            $('#realBoite').val('');

        });



        $('#CancelBoite').click(function(){

            $('#BoiteTable').attr('class','row show');

            $('#AddBoiteForm').attr('class','row hide');

            $('#UpdateBoiteForm').attr('class','row hide');

            $('#BoiteError').html('');

            $('#realBoite').val('');

        });





        $('#UpdateCancelBoite').click(function(){

            $('#BoiteTable').attr('class','row show');

            $('#AddBoiteForm').attr('class','row hide');

            $('#UpdateBoiteForm').attr('class','row hide');

            $('#BoiteError').html('');

            $('#realBoite').val('');

        });



        $('#SaveBoite').click(function(){

            var boite= $('#realBoite').val();



            if(boite == ""){

                $('#BoiteError').html('please enter Gear Box name');

            }else{

                $('#BoiteError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addboite.php",

                    method:"get",

                    data:{boite:boite},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realBoite').val('');

                            $('#BoiteTable').attr('class','row show');

                            $('#AddBoiteForm').attr('class','row hide');

                            $('#UpdateBoiteForm').attr('class','row hide');

                            getBoite('','','');

                        }else{

                            $('#BoiteError').html('Duplicate Car Gear Box name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetBoite').click(function () {

            $('#searchBoite').val('');

            $('#start_Boite').val('');

            $('#end_Boite').val('');

            getBoite('','','');

        });



        $('#SearchBoiteBtn').click(function(){

            var fromdate = $('#start_Boite').val();

            var todate = $('#end_Boite').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getBoite('',fromdate,todate);

            }

        });

        var boite_id = '';

        var update_boite = '';

        $('body').delegate('#BoiteCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                boite_id = '';

                update_boite = '';

            }else{

                update_boite = $(this).parent().find('#update_boite').val();

                boite_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("BoiteClass");

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



        $('#EditBoite').click(function(){



            if(boite_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Bot').val(update_boite);

                //console.log(update_pattern);

                $('#UpdateBoiteForm').attr('class','row show');

                $('#BoiteTable').attr('class','row hide');

                $('#AddBoiteForm').attr('class','row hide');

                $('#BoiteError').html('');

                $('#realBoite').val('');

            }

        });



        $('#UpdateBoite').click(function(){

            var Updboite = $('#update_Bot').val();



            if(Updboite == ""){

                $('#UpdateBoiteError').html('Please enter updated Gear Box name');

            }else{

                $('#UpdateBoiteError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updateboite.php",

                    method:"GET",

                    data:{boite:Updboite,id:boite_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realBoite').val('');

                            $('#update_Bot').val('');

                            $('#BoiteTable').attr('class','row show');

                            $('#AddBoiteForm').attr('class','row hide');

                            $('#UpdateBoiteForm').attr('class','row hide');

                            getBoite('','','');

                        }else{

                            $('#UpdateBoiteError').html('This Car Gear Box name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteBoite').click(function(){

            if(boite_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deleteboite.php",

                        method:"get",

                        data:{id:boite_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getBoite('','','');

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

<!--End Script for Boite tbas --->

<!--Script for Fuel Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchFuel').keyup(function(){

            getFuel($(this).val(),'','');

        });



        getFuel('','','');

        function  getFuel(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getfuel.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#FuelTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#FuelTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddFuel').click(function(){

            $('#FuelTable').attr('class','row hide');

            $('#AddFuelForm').attr('class','row show');

            $('#UpdateFuelForm').attr('class','row hide');

            $('#FuelError').html('');

            $('#realFuel').val('');

        });



        $('#CancelFuel').click(function(){

            $('#FuelTable').attr('class','row show');

            $('#AddFuelForm').attr('class','row hide');

            $('#UpdateFuelForm').attr('class','row hide');

            $('#FuelError').html('');

            $('#realFuel').val('');

        });





        $('#UpdateCancelFuel').click(function(){

            $('#FuelTable').attr('class','row show');

            $('#AddFuelForm').attr('class','row hide');

            $('#UpdateFuelForm').attr('class','row hide');

            $('#FuelError').html('');

            $('#realFuel').val('');

        });



        $('#SaveFuel').click(function(){

            var fuel= $('#realFuel').val();



            if(fuel == ""){

                $('#FuelError').html('please enter Fuel name');

            }else{

                $('#FuelError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addfuel.php",

                    method:"get",

                    data:{fuel:fuel},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realFuel').val('');

                            $('#FuelTable').attr('class','row show');

                            $('#AddFuelForm').attr('class','row hide');

                            $('#UpdateFuelForm').attr('class','row hide');

                            getFuel('','','');

                        }else{

                            $('#FuelError').html('Duplicate Fuel name found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetFuel').click(function () {

            $('#searchFuel').val('');

            $('#start_Fuel').val('');

            $('#end_Fuel').val('');

            getFuel('','','');

        });



        $('#SearchFuelBtn').click(function(){

            var fromdate = $('#start_Fuel').val();

            var todate = $('#end_Fuel').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getFuel('',fromdate,todate);

            }

        });

        var fuel_id = '';

        var update_fule = '';

        $('body').delegate('#FuelCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                fuel_id = '';

                update_fuel = '';

            }else{

                update_fuel = $(this).parent().find('#update_fuel').val();

                fuel_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("FuelClass");

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



        $('#EditFuel').click(function(){



            if(fuel_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Fue').val(update_fuel);

                //console.log(update_pattern);

                $('#UpdateFuelForm').attr('class','row show');

                $('#FuelTable').attr('class','row hide');

                $('#AddFuelForm').attr('class','row hide');

                $('#FuelError').html('');

                $('#realFuel').val('');

            }

        });



        $('#UpdateFuel').click(function(){

            var Updfuel = $('#update_Fue').val();



            if(Updfuel == ""){

                $('#UpdateFuelError').html('Please enter updated Fuel');

            }else{

                $('#UpdateFuelError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatefuel.php",

                    method:"GET",

                    data:{fuel:Updfuel,id:fuel_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realFuel').val('');

                            $('#update_Fue').val('');

                            $('#FuelTable').attr('class','row show');

                            $('#AddFuelForm').attr('class','row hide');

                            $('#UpdateFuelForm').attr('class','row hide');

                            getFuel('','','');

                        }else{

                            $('#UpdateFuelError').html('This Fuel name is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteFuel').click(function(){

            if(fuel_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletefuel.php",

                        method:"get",

                        data:{id:fuel_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getFuel('','','');

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

<!--End Script for Fuel tbas --->


<!--Script for Mail Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchMail').keyup(function(){

            getMail($(this).val(),'','');

        });



        getMail('','','');

        function  getMail(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getmail.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#MailTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#MailTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddMail').click(function(){

            $('#MailTable').attr('class','row hide');

            $('#AddMailForm').attr('class','row show');

            $('#UpdateMailForm').attr('class','row hide');

            $('#MailError').html('');

            $('#realMail').val('');

        });



        $('#CancelMail').click(function(){

            $('#MailTable').attr('class','row show');

            $('#AddMailForm').attr('class','row hide');

            $('#UpdateMailForm').attr('class','row hide');

            $('#MailError').html('');

            $('#realMail').val('');

        });





        $('#UpdateCancelMail').click(function(){

            $('#MailTable').attr('class','row show');

            $('#AddMailForm').attr('class','row hide');

            $('#UpdateMailForm').attr('class','row hide');

            $('#MailError').html('');

            $('#realMail').val('');

        });



        $('#SaveMail').click(function(){

            var mail= $('#realMail').val();



            if(mail == ""){

                $('#MailError').html('please enter Mail');

            }else{

                $('#MailError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addmail.php",

                    method:"get",

                    data:{mail:mail},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realMail').val('');

                            $('#MailTable').attr('class','row show');

                            $('#AddMailForm').attr('class','row hide');

                            $('#UpdateMailForm').attr('class','row hide');

                            getMail('','','');

                        }else{

                            $('#MailError').html('Duplicate Mail found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetMail').click(function () {

            $('#searchMail').val('');

            $('#start_Mail').val('');

            $('#end_Mail').val('');

            getMail('','','');

        });



        $('#SearchMailBtn').click(function(){

            var fromdate = $('#start_Mail').val();

            var todate = $('#end_Mail').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getMail('',fromdate,todate);

            }

        });

        var mail_id = '';

        var update_mail = '';

        $('body').delegate('#MailCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                mail_id = '';

                update_mail = '';

            }else{

                update_mail = $(this).parent().find('#update_mail').val();

                mail_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("MailClass");

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



        $('#EditMail').click(function(){



            if(mail_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Mai').val(update_mail);

                //console.log(update_pattern);

                $('#UpdateMailForm').attr('class','row show');

                $('#MailTable').attr('class','row hide');

                $('#AddMailForm').attr('class','row hide');

                $('#MailError').html('');

                $('#realMail').val('');

            }

        });



        $('#UpdateMail').click(function(){

            var Updmail = $('#update_Mai').val();



            if(Updmail == ""){

                $('#UpdateMailError').html('Please enter updated Mail');

            }else{

                $('#UpdateMailError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatemail.php",

                    method:"GET",

                    data:{mail:Updmail,id:mail_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realMail').val('');

                            $('#update_Mai').val('');

                            $('#MailTable').attr('class','row show');

                            $('#AddMailForm').attr('class','row hide');

                            $('#UpdateMailForm').attr('class','row hide');

                            getMail('','','');

                        }else{

                            $('#UpdateMailError').html('This Mail is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteMail').click(function(){

            if(mail_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletemail.php",

                        method:"get",

                        data:{id:mail_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getMail('','','');

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

<!--End Script for Mail tbas --->



<!--Script for Color Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchColor').keyup(function(){

            getColor($(this).val(),'','');

        });



        getColor('','','');

        function  getColor(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getcolor.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#ColorTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#ColorTbody').html(response);

                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddColor').click(function(){

            $('#ColorTable').attr('class','row hide');

            $('#AddColorForm').attr('class','row show');

            $('#UpdateColorForm').attr('class','row hide');

            $('#ColorError').html('');

            $('#realColor').val('');

        });



        $('#CancelColor').click(function(){

            $('#ColorTable').attr('class','row show');

            $('#AddColorForm').attr('class','row hide');

            $('#UpdateColorForm').attr('class','row hide');

            $('#ColorError').html('');

            $('#realColor').val('');

        });





        $('#UpdateCancelColor').click(function(){

            $('#ColorTable').attr('class','row show');

            $('#AddColorForm').attr('class','row hide');

            $('#UpdateColorForm').attr('class','row hide');

            $('#ColorError').html('');

            $('#realColor').val('');

        });



        $('#SaveColor').click(function(){

            var color= $('#realColor').val();



            if(color == ""){

                $('#ColorError').html('please enter Color');

            }else{

                $('#ColorError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addcolor.php",

                    method:"get",

                    data:{color:color},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realColor').val('');

                            $('#ColorTable').attr('class','row show');

                            $('#AddColorForm').attr('class','row hide');

                            $('#UpdateColorForm').attr('class','row hide');

                            getColor('','','');

                        }else{

                            $('#ColorError').html('Duplicate Color found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetColor').click(function () {

            $('#searchColor').val('');

            $('#start_Color').val('');

            $('#end_Color').val('');

            getColor('','','');

        });



        $('#SearchColorBtn').click(function(){

            var fromdate = $('#start_Color').val();

            var todate = $('#end_Color').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getColor('',fromdate,todate);

            }

        });

        var color_id = '';

        var update_color = '';

        $('body').delegate('#ColorCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                color_id = '';

                update_color = '';

            }else{

                update_color = $(this).parent().find('#update_color').val();

                color_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("ColorClass");

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



        $('#EditColor').click(function(){



            if(color_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Col').val(update_color);

                //console.log(update_pattern);

                $('#UpdateColorForm').attr('class','row show');

                $('#ColorTable').attr('class','row hide');

                $('#AddColorForm').attr('class','row hide');

                $('#ColorError').html('');

                $('#realColor').val('');

            }

        });



        $('#UpdateColor').click(function(){

            var Updcolor = $('#update_Col').val();



            if(Updcolor == ""){

                $('#UpdateColorError').html('Please enter updated Color');

            }else{

                $('#UpdateColorError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatecolor.php",

                    method:"GET",

                    data:{color:Updcolor,id:color_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realColor').val('');

                            $('#update_Col').val('');

                            $('#ColorTable').attr('class','row show');

                            $('#AddColorForm').attr('class','row hide');

                            $('#UpdateColorForm').attr('class','row hide');

                            getColor('','','');

                        }else{

                            $('#UpdateColorError').html('This Color is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteColor').click(function(){

            if(color_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletecolor.php",

                        method:"get",

                        data:{id:color_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getColor('','','');

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

<!--End Script for Color tbas --->


<!--Script for Nature Tables Tabs-->

<script>

    $(document).ready(function(){



        $('#searchNature').keyup(function(){

            getNature($(this).val(),'','');

        });



        getNature('','','');

        function  getNature(name,from,to){

            $.ajax({

                url:"<?php echo site_url(); ?>/admin/getnature.php",

                method:"get",

                data:{name:name,from:from,to:to},

                beforeSend:function(){

                    $('#NatureTbody').html('<tr><td colspan="4"><b>Loading....</b></td></td>');

                },

                success:function(response){

                    // alert(response);

                    if(response != ""){

                        $('#NatureTbody').html(response);
                        //console.log(response);    
                    }

                },error:function(xhr){

                    console.log(xhr.responseText);

                }

            });

        }





        $('#AddNature').click(function(){

            $('#NatureTable').attr('class','row hide');

            $('#AddNatureForm').attr('class','row show');

            $('#UpdateNatureForm').attr('class','row hide');

            $('#NatureError').html('');

            $('#realNature').val('');

        });



        $('#CancelNature').click(function(){

            $('#NatureTable').attr('class','row show');

            $('#AddNatureForm').attr('class','row hide');

            $('#UpdateNatureForm').attr('class','row hide');

            $('#NatureError').html('');

            $('#realNature').val('');

        });





        $('#UpdateCancelNature').click(function(){

            $('#NatureTable').attr('class','row show');

            $('#AddNatureForm').attr('class','row hide');

            $('#UpdateNatureForm').attr('class','row hide');

            $('#NatureError').html('');

            $('#realNature').val('');

        });



        $('#SaveNature').click(function(){

            var nature= $('#realNature').val();



            if(nature == ""){

                $('#NatureError').html('please enter Nature');

            }else{

                $('#NatureError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/addnature.php",

                    method:"get",

                    data:{nature:nature},

                    success:function(response){

                        //alert(response);

                        if(response == "success"){

                            $('#realNature').val('');

                            $('#NatureTable').attr('class','row show');

                            $('#AddNatureForm').attr('class','row hide');

                            $('#UpdateNatureForm').attr('class','row hide');

                            getNature('','','');

                        }else{

                            $('#NatureError').html('Duplicate Car Nature found please use another');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });



        $('#resetNature').click(function () {

            $('#searchNature').val('');

            $('#start_Nature').val('');

            $('#end_Nature').val('');

            getNature('','','');

        });



        $('#SearchNatureBtn').click(function(){

            var fromdate = $('#start_Nature').val();

            var todate = $('#end_Nature').val();

            //alert('hello world');

            //alert(fromdate);

            if(fromdate == "" || todate == ""){

                alert('Please Select the dates first');

            }else{

                getNature('',fromdate,todate);

            }

        });

        var nature_id = '';

        var update_nature = '';

        $('body').delegate('#NatureCheck','click',function(){

            //for unchecking checked check box

            if($(this).attr("checked") == "checked"){

                //alert('Hello world');

                $(this).prop("checked",'false');

                $(this).removeAttr('checked');

                nature_id = '';

                update_nature = '';

            }else{

                update_nature = $(this).parent().find('#update_nature').val();

                nature_id = $(this).val();

                //alert(age_id + update_age);

                var checkboxes = document.getElementsByClassName("NatureClass");

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



        $('#EditNature').click(function(){



            if(nature_id == ""){

                alert('Please Select Row To Update');

            }else{

                $('#update_Nat').val(update_nature);

                //console.log(update_pattern);

                $('#UpdateNatureForm').attr('class','row show');

                $('#NatureTable').attr('class','row hide');

                $('#AddNatureForm').attr('class','row hide');

                $('#NatureError').html('');

                $('#realNature').val('');

            }

        });



        $('#UpdateNature').click(function(){

            var Updnature = $('#update_Nat').val();



            if(Updnature == ""){

                $('#UpdateNatureError').html('Please enter updated Nature');

            }else{

                $('#UpdateNatureError').html('');

                $.ajax({

                    url:"<?php echo site_url(); ?>/admin/updatenature.php",

                    method:"GET",

                    data:{nature:Updnature,id:nature_id},

                    success:function(response){

                        // alert(response);

                        if(response == "success"){

                            $('#realNature').val('');

                            $('#update_Nat').val('');

                            $('#NatureTable').attr('class','row show');

                            $('#AddNatureForm').attr('class','row hide');

                            $('#UpdateNatureForm').attr('class','row hide');

                            getNature('','','');

                        }else{

                            $('#UpdateNatureError').html('This Nature is already exists');

                        }

                    },error:function(xhr){

                        console.log(xhr.responseText);

                    }

                });

            }

        });





        $('#deleteNature').click(function(){

            if(nature_id == ''){

                alert('Please Select a row to delete');

            }else{

                var conf = confirm('Are you sure you want to delete post');



                if(conf == true){

                    $.ajax({

                        url:"<?php echo site_url(); ?>/admin/deletenature.php",

                        method:"get",

                        data:{id:nature_id},

                        success:function(response){

                            //alert(response);

                            if(response == "success"){



                                getNature('','','');

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

<!--End Script for Color tbas --->






<script>

            var row = 1;
    $('body').delegate('.DeleteRow','click',function(){
       var id = $(this).attr('id');
       $('#RemoveRow'+id).remove();
    });
    
        $('#Deletediv').click(function(){
        var html= '<div id="RemoveRow'+row+'" style="margin-bottom:10px;" class="col-md-12"><div class="col-md-6" style="width: 13%;padding: 0px;margin: 0px;" ></div><div class="col-md-6" style="width: 10%;padding: 0px;margin: 0px;" ></div><div class="col-md-1" style="width: 11%;padding: 0px;"><div class="form-group"><div class="col-md-7" style="margin-top: 10px;padding: 0px;text-align: center;"><span style="font-weight: bold;font-size: 12px">Passengers</span></div><div class="col-md-5" style="padding: 0px;"><select name="pessenger" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select></div></div></div><div class="col-md-1" style="width: 10%;margin: 0px;padding: 0px"><div class="form-group"><div class="col-md-6" style="margin-top: 10px;padding: 0px;text-align: center;"><span style="font-weight: bold;font-size: 12px">Lugages</span></div><div class="col-md-6" style="padding: 0px;"><select name="lagages" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select> </div> </div></div> <div class="col-md-1" style="width: 10.7%;padding-left: 0px;margin: 0px;padding: 0px;"> <div class="form-group"><div class="col-md-6" style="margin-top: 10px;padding: 0px;"><span style="font-weight: bold;font-size: 12px;font-size: 12px">Weelchairs</span> </div> <div class="col-md-6" style="padding: 0px;"><select name="wheelchair" class="form-control"> <option value="0">0</option> <option value="1">1</option><option value="2">2</option> <option value="3">3</option><option value="4">4</option> </select> </div> </div> </div> <div class="col-md-1" style="width: 10.7%;padding-left: 0px;margin: 0px;padding: 0px;"> <div class="form-group"><div class="col-md-6" style="margin-top: 10px;padding: 0px;text-align: center;"><span style="font-weight: bold;font-size: 12px">Baby Sets</span></div><div class="col-md-6" style="padding: 0px;"><select name="babyseat" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option> <option value="5">5</option> <option value="6">6</option><option value="7">7</option> <option value="8">8</option> </select>  </div></div> </div> <div class="col-md-1" style="width: 10.7%;padding-left: 0px;margin: 0px;padding: 0px;"><div class="form-group"><div class="col-md-6" style="margin-top: 10px;padding: 0px;text-align: center;"><span style="font-weight: bold;font-size: 12px">Animals</span> </div><div class="col-md-6" style="padding: 0px;"><select name="animal" class="form-control"><option value="0">0</option><option value="1">1</option><option value="2">2</option> <option value="3">3</option><option value="4">4</option></select> </div> </div> </div><div class="col-md-1" style="width: 3%;padding: 0px;margin-top: 0px;padding-left: 3px;"> <button type="button" id="'+row+'" class="btn-danger btn-sm DeleteRow"><span class="fa fa-close"></span></button> </div>  <div class="col-md-1" style="width: 17.7%;padding-left: 0px;padding: 0px;"> </div> </div>';
    
            $('#RowToAdd').append(html);
            row++;
  });
</script>