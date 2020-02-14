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
        width: 100%;
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

            <div class="col-md-12" id="MainTab">



                    <div id="status" class="tab-pane fade in active" style="width: 100%;border: 1px solid #ccc;padding-top: 10px">
                    	<div class="col-md-1" style="padding-left: 0px">
												<div class="filter-label">
													<div>Filter By</div>
												</div>
											</div>
                    <div class="col-md-6" style="padding-left: 0px;">
												<form id="formone" method="post" action="<?php echo base_url('admin/clients'); ?>" style="display: inline;">
													<input type="hidden" name="type" value="search">

													<select name="client" style="float: left;width:18%;" class="form-control">
														<option value="All clients" <?php if ($searched_client == "All clients") {
																echo "selected";
															} ?>> All clients </option>
														<?php foreach ($clients as $key => $value) { ?>
															<option value="<?php echo $value['id']; ?>" <?php if ($searched_clients == $value['id']) {
															echo "selected";
														} ?>> <?php echo $value['civility'] . ' ' . $value['firstname'] . ' ' . $value['lastname']; ?> </option>
																<?php } ?>
													</select>

													<select name="status" style="float: left;width:18%;" class="form-control">
														<option value="All status" <?php if ($searched_status == "All status") {
																echo "selected";
															} ?>> All status </option>
														<option value="done" <?php if ($searched_status == "done") {
																echo "selected";
															} ?>>done</option>
														<option value="pending" <?php if ($searched_status == "pending") {
																echo "selected";
															} ?>>pending</option>
														<option value="confirmed" <?php if ($searched_status == "confirmed") {
															echo "selected";
															} ?>>confirmed</option>
														<option value="cancelled" <?php if ($searched_status == "cancelled") {
																echo "selected";
															} ?>>cancelled</option>
													</select>

													<input class="btn" type="button" id="SearchStatutBtn" value="Search" style="float:left;width: 8%;" />
													<button class="btn" style="float: left" href="http://handi-express.org/admin/clients.php"> Reset </button>
												</form>
											</div>

                        <div class="col-md-5" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="MainAdd" ><span class="fa fa-plus" > Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditStatut" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteStatut"><span class="fa fa-close"> Delete</span></button>&nbsp;

                               <button class="btn"><span class="pdf-icon"> Export PDF</span></button>
								<button class="btn"><span class="csv-icon"> Export CSV</span></button>

                        </div>

                    </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="StatusTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                        <th  style="min-width:0;width:20px">
                                <!--input type="checkbox" name="all"/-->
                            </th>
                            <th>ID</th>
                            <th>Status</th>
                             <th>Type</th>
                            <th style="min-width:0;width:20px">Civility</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                           <th>City</th>
                            <th>Zip code</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Fax</th>
                            <th>Payment delay</th>
                           <th>Refferred</th>


                                    </tr>

                                    </thead>

                                    <tbody id="tableBody">



                                    </tbody>

                                </table>



                            </div>

                        </div>

                    

                    </div>
            </div>



        </div>

        <div class="col-md-12 hide"  id="ShowTabs" style="border:1px solid #ccc;padding: 0px;margin-bottom: 10px; margin-left:20px;">
            
           	<ul class="nav nav-tabs responsive">
										<li><a href="#Profil"role="tab" data-toggle="tab">Profil</a></li>
										<li><a href="#Contacts"role="tab" data-toggle="tab">Contacts</a></li>
										<li><a href="#PaiementsMethodes"role="tab" data-toggle="tab">Paiements Methodes</a></li>
										<li><a href="#Passengers"role="tab" data-toggle="tab">Passengers</a></li>
										<li><a href="#Rides"role="tab" data-toggle="tab">Rides</a></li>
										<li><a href="#Bookings" role="tab" data-toggle="tab">Bookings</a></li>
										<li><a href="#Quotes" role="tab" data-toggle="tab">Quotes</a></li>
										<li><a href="#Contracts" role="tab" data-toggle="tab">Contracts</a></li>
										<li><a href="#Invoices"role="tab" data-toggle="tab">Invoices</a></li>
										<li><a href="#Payments"role="tab" data-toggle="tab">Payments</a></li>
										<li><a href="#Support"role="tab" data-toggle="tab">Support</a></li>
										<li><a href="#Messages"role="tab" data-toggle="tab">Messages</a></li>
										
									</ul>
              <div class="tab-content responsive" style="width:100%;display: table;">

                    <!--status tab starts-->

                 	<div class="tab-pane fade in  active" id="Profil"> 					
													<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
														<form id="save_data" action=""  method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">
															
															<div class="row" style="margin-top: 10px;">
																	<div class="col-md-3" style="width: 12.5%">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px; padding: 0px;">
																				<span style="font-weight: bold;">Statut</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<select class="form-control" name="status">
																					<option value="dummy">Select</option>
																				</select>
																			</div>

																		</div>
																	</div>
																	<div class="col-md-3" style="width: 12.5%">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px; padding: 0px;">
																				<span style="font-weight: bold;">Civilite</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<select class="form-control" name="civilite">
																					<option value="Mr">Mr</option>
																					<option value="Miss">Miss</option>
																					<option value="Mme">Mme</option>
																				</select>
																			</div>

																		</div>
																	</div>

																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 5px;">
																				<span style="font-weight: bold;">Nom</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<input name="nom" class="form-control" type="text">
																			</div>

																		</div>
																	</div>

																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">Prenom</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<input name="pre_nom" class="form-control" type="text">
																			</div>

																		</div>
																	</div>

																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">Company</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<input name="company" class="form-control" type="text">
																			</div>
																		</div>
																	</div>
															</div>
															
															<div class="row" style="margin-top: 10px;">
																<div class="col-md-6">
																	<div class="form-group">
																		<div class="col-md-2" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Address</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input name="address1" class="form-control" type="text">
																		</div>
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Email</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input name="email" type="email" class="form-control" type="text">
																		</div>
																	</div>
																</div>

																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Phone</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input name="phone" class="form-control" type="text">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row" style="margin-top: 10px;">
																<div class="col-md-6">
																	<div class="form-group">
																		<div class="col-md-2" style="margin-top: 10px;">
																			<span style="font-weight: bold;"></span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input name="address2" class="form-control" type="text">
																		</div>
																	</div>
																</div>
																
																
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Mobile Phone</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input name="mobile" class="form-control" type="text">
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Fax</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input name="fax" class="form-control" type="text">
																		</div>
																	</div>
																</div>
															</div>
			
															<div class="row" style="margin-top: 10px;">
																<div class="col-md-6">
																	<div class="form-group">
																		<div class="col-md-2" style="margin-top: 10px;">
																			<span style="font-weight: bold;"></span>
																		</div>
																		<div class="col-md-4" style="padding: 0px;">
																			<div class="col-md-4" style="padding: 0px;margin-top: 10px;">
																				<span style="font-weight: bold;">Code Postal</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<input name="code_postal" class="form-control" type="text">
																			</div>
																		</div>

																		<div class="col-md-4" style="padding: 0px;">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">Ville</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																				<input name="ville" class="form-control" type="text">
																			</div>
																		</div>

																	</div>
																</div>
															</div>


																	


																		<div class="row" style="margin-top: 10px;">

																	
																			
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Type Of Client</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select name="client_type" class="form-control">
																							<option value="dummy">Select</option>
																						</select>
																					</div>

																				</div>
																			</div>
																			
																			
																			<div class="col-md-2">
																				<div class="form-group">
																					<div class="col-md-5" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Bird Day</span>
																					</div>
																					<div class="col-md-7" style="padding: 0px;">
																						<input name="birthday" class="form-control datepicker" >
																					</div>

																				</div>
																			</div>

																			<div class="col-md-2">
																				<div class="form-group">
																					<div class="col-md-5" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Disabled</span>
																					</div>
																					<div class="col-md-6" style="padding: 0px;">
																						<select name="disabled" class="form-control ClientDisabled">
																							<option value="No">No</option>
																							<option value="Yes">Yes</option>
																						</select>
																					</div>

																				</div>
																			</div>
																			<span id="DisableShowClient" style="display: none;">
																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Disable Type</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<select class="form-control">
																								<option value="">Select</option>
																							</select>
																						</div>
																					</div>
																				</div>

																				<div class="col-md-2">
																					<div class="form-group">
																						<div class="col-md-5" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Weelchair</span>
																						</div>
																						<div class="col-md-6" style="padding: 0px;">
																							<select class="form-control">
																								<option value="Yes">Yes</option>
																								<option value="No">No</option>
																							</select>
																						</div>
																					</div>
																				</div>
																				
																				
																				
																			</span>

																		</div>

																		
															
															
															
															
																	<div class="row" style="margin-top: 10px;">

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 5px;">
																						<span style="font-weight: bold;">Payment Methode</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select name="payment_method" class="form-control">
																							<option value="dummy">Select</option>
																						</select>
																					</div>

																				</div>
																			</div>
																		
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 5px;">
																						<span style="font-weight: bold;">Delay of Payment</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select name="payment_delay" class="form-control">
																							<option value="dummy">Select</option>
																						</select>
																					</div>

																				</div>
																			</div>
																			
																			<div class="col-md-6">
																				<div class="form-group">
																					<div class="col-md-2" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Note</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<textarea name="note" class="form-control"></textarea>
																					</div>
																				</div>
																			</div>
																		</div>
															
															
													
																<div class="col-md-6" style="padding: 0px;">
																	
																</div>
															
															
																<div class="col-md-6" style="padding: 0px;">
																	<div style="border: 1px solid #adadad;padding: 10px; margin-top: 15px;border-radius: 10px;background: #e6e6e6;" >
																			<div class="row" style="">
																				<div class="col-md-12" style="padding-left: 30px;">
																					<span style="font-weight: bold;">Access Detail</span>
																				</div>
																			</div>
																			<div class="row" style="margin-top: 15px;">
																				<div class="col-md-5">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px; padding: 0px" >
																							<span style="font-weight: bold;">Login Email</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input type="email" name="email"  class="form-control">
																						</div>
																					</div>
																				</div>

																				<div class="col-md-5">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;" >
																							<span style="font-weight: bold;">Password</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input type="password" name="password"  class="form-control">
																						</div>
																					</div>
																				</div>

																				<div class="col-md-2">
																					<div class="form-group">
																						<div class="col-md-12" style="margin-top: 0px; padding: 0px;" >
																							<button type="button" class="btn">SEND</button>
																						</div>
																					</div>
																				</div>							

																			</div>
																		</div>
																</div>


															<div style="clear: both"></div>

															<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
																<div class="col-md-12">
																	<button class="btn" style="float:right;margin-right: 0px;" onclick="hideAdd()"><span class="delete-icon"> Cancel </span></button>
																	<button type="button" id="save" name="save" style="margin-right: 7px;float:right;"  class="btn"><span class="save-icon"></span> Enregistrer </button>
																</div>
															</div>


														</form>
												   </div>
													
												</div>
                  	<div class="tab-pane fade" id="Contacts"> 
													<div class="ListContracts" >	
													<div class="filter-group">
														<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
															<div class="col-md-1">
																<div class="filter-label" style="margin-top: 4px;">
																	<div>Filter By</div>
																</div>
															</div>

															<div class="col-md-6">
																<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
																&nbsp;<input class="btn"  name="search_by" id="SearchStatutBtn" value="Search" style="float:left" />
															</div>
														</form>
														<div class="col-md-5">
															<div class="page-action">
																<button class="btn" onclick="AddContracts()"><span class="add-icon">Add</span></button>&nbsp;
																<button class="btn" onclick="EditContracts()"><span class="edit-icon">Edit</span></button>&nbsp;
																<button class="btn" onclick="DeleteContracts()"><span class="delete-icon">Delete</span></button>&nbsp;
															</div>
														</div>
													</div>
													<input type="hidden" class="chk-Contracts-btn" value="">
													<table class="table table-bordered data-table dataTable">
														<thead>
															<tr>
																<th width="5%"></th>
																<th>Civilite  </th>
																<th>Nom</th>
																<th>Prenom</th>
																<th>Phone</th>
																<th>Mobile </th>
																<th>Fax</th>
																<th>Email</th>
																<th>Job</th>
																<th>Department</th>
																<th>Address </th>
																<th>Code Postal </th>
																<th>Ville</th>
															</tr>
														</thead>
														<tbody>

														</tbody>
													</table>       
												</div>	

												<div class="DeleteContracts" style="display: none;">
												  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
													  <form method="post" action="<?php echo base_url('admin/delete_Contracts');?>" style="padding: 10px;">
														  <input type="hidden" id="Passengers_id" name="Contracts_id" value="">
														  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
														  <input class="btn"  id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
														  <button class="btn" href="#" onclick="cancelContracts()">No</button>
													  </form>
												  </div>	
												</div>

												<div class="AddContracts" style="display: none;" >	
													<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
															<form action="<?=base_url()?>admin/insert_Passengers" method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">


																			<div class="row" style="margin-top: 10px;">

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Civilite</span>
																						</div>
																						<div class="col-md-3" style="padding: 0px;">
																							<select class="form-control" name="civilite">
																								<option value="Mr">Mr</option>
																								<option value="Miss">Miss</option>
																								<option value="Mme">Mme</option>
																							</select>
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 5px;">
																							<span style="font-weight: bold;">Nom</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="nom" class="form-control" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Prenom</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="nom" class="form-control" type="text">
																						</div>

																					</div>
																				</div>



																			</div>

																			<div class="row" style="margin-top: 10px;">

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Phone</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="phone" class="form-control" required="" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Mobile</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="mobile" class="form-control" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Fax</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="fax" class="form-control" type="text">
																						</div>
																					</div>
																				</div>


																			</div>
																			
															
															
																			<div class="row" style="margin-top: 10px;">

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Email</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="email" class="form-control" required="" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Job</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="job" class="form-control" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Department</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="department" class="form-control" type="text">
																						</div>
																					</div>
																				</div>


																			</div>


																			<div class="row" style="margin-top: 10px;">
																				<div class="col-md-6">
																					<div class="form-group">
																						<div class="col-md-2" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Address</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="date_dentree" class="form-control" type="text">
																						</div>
																					</div>
																				</div>
																			</div>


																			<div class="row" style="margin-top: 10px;">
																				<div class="col-md-6">
																					<div class="form-group">
																						<div class="col-md-2" style="margin-top: 10px;">
																							<span style="font-weight: bold;"></span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="date_dentree" class="form-control" type="text">
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="row" style="margin-top: 10px;">
																				<div class="col-md-6">
																					<div class="form-group">
																						<div class="col-md-2" style="margin-top: 10px;">
																							<span style="font-weight: bold;"></span>
																						</div>
																						<div class="col-md-4" style="padding: 0px;">
																							<div class="col-md-4" style="padding: 0px;margin-top: 10px;">
																								<span style="font-weight: bold;">Code Postal</span>
																							</div>
																							<div class="col-md-8" style="padding: 0px;">
																								<input name="code_postal" class="form-control" type="text">
																							</div>
																						</div>

																						<div class="col-md-4" style="padding: 0px;">
																							<div class="col-md-4" style="margin-top: 10px;">
																								<span style="font-weight: bold;">Ville</span>
																							</div>
																							<div class="col-md-8" style="padding: 0px;">
																								<input name="ville" class="form-control" type="text">
																							</div>
																						</div>

																					</div>
																				</div>
																			</div>


																			


																			

																<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
																	<div class="col-md-9">
																		<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelContracts()"><span class="delete-icon"> Cancel </span></button>
																		<button style="margin-right: 7px;float:right;"  class="btn"><span class="save-icon"></span> Enregistrer </button>
																	</div>
																</div>


															</form>
												   </div>
												</div> 
												</div>
											
												<div class="tab-pane fade" id="PaiementsMethodes"> 
													PaiementsMethodes
												</div>
											
											
											
											<div class="tab-pane fade" id="Passengers"> 
												<div class="ListPassengers" >	
													<div class="filter-group">
														<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
															<div class="col-md-1">
																<div class="filter-label" style="margin-top: 4px;">
																	<div>Filter By</div>
																</div>
															</div>

															<div class="col-md-6">
																<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
																&nbsp;<input class="btn"  name="search_by" id="SearchStatutBtn" value="Search" style="float:left" />
															</div>
														</form>
														<div class="col-md-5">
															<div class="page-action">
																<button class="btn" onclick="AddPassengers()"><span class="add-icon">Add</span></button>&nbsp;
																<button class="btn" onclick="EditPassengers()"><span class="edit-icon">Edit</span></button>&nbsp;
																<button class="btn" onclick="DeletePassengers()"><span class="delete-icon">Delete</span></button>&nbsp;
															</div>
														</div>
													</div>
													<input type="hidden" class="chk-Passengers-btn" value="">
													<table class="table table-bordered data-table dataTable">
														<thead>
															<tr>
																<th width="5%"></th>
																<th>Civilite  </th>
																<th>Nom</th>
																<th>Prenom</th>
																<th>Address </th>
																<th>Code Postal </th>
																<th>Ville</th>
																<th>Phone</th>
																<th>Mobile Phone </th>
																<th>Email</th>
																<th>Disble Type  </th>
																<th>Wheelchair</th>
																<th>Electrique</th>
																<th>Transfert</th>
																<th>Note</th>
															</tr>
														</thead>
														<tbody>

														</tbody>
													</table>       
												</div>	

												<div class="DeletePassengers" style="display: none;">
												  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
													  <form method="post" action="<?php echo base_url('admin/delete_Passengers');?>" style="padding: 10px;">
														  <input type="hidden" id="Passengers_id" name="Passengers_id" value="">
														  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
														  <input class="btn"  id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
														  <button class="btn" href="#" onclick="cancelPassengers()">No</button>
													  </form>
												  </div>	
												</div>

												<div class="AddPassengers" style="display: none;" >	
													<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
														<form action="<?=base_url()?>admin/insert_Passengers" method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">


																			<div class="row" style="margin-top: 10px;">

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Civilite</span>
																						</div>
																						<div class="col-md-3" style="padding: 0px;">
																							<select class="form-control" name="civilite">
																								<option value="Mr">Mr</option>
																								<option value="Miss">Miss</option>
																								<option value="Mme">Mme</option>
																							</select>
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 5px;">
																							<span style="font-weight: bold;">Nom</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="nom" class="form-control" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Prenom</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="nom" class="form-control" type="text">
																						</div>

																					</div>
																				</div>



																			</div>





																			<div class="row" style="margin-top: 10px;">
																				<div class="col-md-6">
																					<div class="form-group">
																						<div class="col-md-2" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Address</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="date_dentree" class="form-control" type="text">
																						</div>
																					</div>
																				</div>
																			</div>


																			<div class="row" style="margin-top: 10px;">
																				<div class="col-md-6">
																					<div class="form-group">
																						<div class="col-md-2" style="margin-top: 10px;">
																							<span style="font-weight: bold;"></span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="date_dentree" class="form-control" type="text">
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="row" style="margin-top: 10px;">
																				<div class="col-md-6">
																					<div class="form-group">
																						<div class="col-md-2" style="margin-top: 10px;">
																							<span style="font-weight: bold;"></span>
																						</div>
																						<div class="col-md-4" style="padding: 0px;">
																							<div class="col-md-4" style="padding: 0px;margin-top: 10px;">
																								<span style="font-weight: bold;">Code Postal</span>
																							</div>
																							<div class="col-md-8" style="padding: 0px;">
																								<input name="code_postal" class="form-control" type="text">
																							</div>
																						</div>

																						<div class="col-md-4" style="padding: 0px;">
																							<div class="col-md-4" style="margin-top: 10px;">
																								<span style="font-weight: bold;">Ville</span>
																							</div>
																							<div class="col-md-8" style="padding: 0px;">
																								<input name="ville" class="form-control" type="text">
																							</div>
																						</div>

																					</div>
																				</div>
																			</div>


																			<div class="row" style="margin-top: 10px;">

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Phone</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="phone" class="form-control" required="" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Mobile Phone</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="nom" class="form-control" type="text">
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Email</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<input name="nom" class="form-control" type="text">
																						</div>
																					</div>
																				</div>


																			</div>


																			<div class="row" style="margin-top: 10px;">

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Disble Type</span>
																						</div>
																						<div class="col-md-8" style="padding: 0px;">
																							<select class="form-control" name="civilite">
																								<option value="">Select</option>
																							</select>
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Wheelchair</span>
																						</div>
																						<div class="col-md-4" style="padding: 0px;">
																							<select class="form-control">
																								<option value="">Select</option>
																								<option value="Yes">Yes</option>
																								<option value="No">No</option>
																							</select>
																						</div>

																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Electrique</span>
																						</div>
																						<div class="col-md-4" style="padding: 0px;">
																							<select class="form-control">
																								<option value="">Select</option>
																								<option value="Yes">Yes</option>
																								<option value="No">No</option>
																							</select>
																						</div>
																					</div>
																				</div>

																				<div class="col-md-3">
																					<div class="form-group">
																						<div class="col-md-4" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Transfert</span>
																						</div>
																						<div class="col-md-4" style="padding: 0px;">
																							<select class="form-control">
																								<option value="">Select</option>
																								<option value="Yes">Yes</option>
																								<option value="No">No</option>
																							</select>
																						</div>
																					</div>
																				</div>


																			</div>


																			<div class="row" style="margin-top: 15px;">

																				<div class="col-md-12">
																					<div class="form-group">
																						<div class="col-md-1" style="margin-top: 10px;">
																							<span style="font-weight: bold;">Note</span>
																						</div>
																						<div class="col-md-11" style="padding: 0px;">
																							<textarea class="form-control" rows="5"></textarea>
																						</div>

																					</div>
																				</div>
																			</div>

																<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
																	<div class="col-md-12">
																		<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelPassengers()"><span class="delete-icon"> Cancel </span></button>
																		<button style="margin-right: 7px;float:right;"  class="btn"><span class="save-icon"></span> Enregistrer </button>
																	</div>
																</div>


															</form>
												   </div>
												</div> 
												
											</div>
											
											
												<div class="tab-pane fade" id="Rides"> 
													Rides
												</div>
											
											
												<div class="tab-pane fade" id="Bookings"> 
													Bookings
												</div>
												<div class="tab-pane fade" id="Quotes"> 
													Quotes
												</div>
											
												<div class="tab-pane fade" id="Contracts"> 
													Contracts
												</div>
												<div class="tab-pane fade" id="Quotes"> 
													Quotes
												</div>
												<div class="tab-pane fade" id="Invoices"> 
													Invoices
												</div>
												<div class="tab-pane fade" id="Payments"> 
													Payments
												</div>
												<div class="tab-pane fade" id="Support"> 
													Support
												</div>
												<div class="tab-pane fade" id="Messages"> 
													Messages
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

        width: 100%;

        float: left;

        height: 34px;

    }

</style>

<script>
	jQuery(function($){
	$.datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: '&#x3c;Préc',
		nextText: 'Suiv&#x3e;',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
		'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
		monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
		'Jul','Aou','Sep','Oct','Nov','Dec'],
		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
		dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
		weekHeader: 'Sm',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: '',
		maxDate: '+12M +0D',
		showButtonPanel: true
		};
	$.datepicker.setDefaults($.datepicker.regional['fr']);
});
    $(document).ready(function(){
        $( ".datepicker" ).datepicker({
		dateFormat: "dd-mm-yy",
		regional: "fr"
	});
        $('#MainAdd').click(function(){

            $('#MainTab').hide();
            $('#ShowTabs').attr('class','row');

        });
        
    });
    		// Passengers part

	function AddPassengers()
	{
		setupDivPassengers();
		$(".AddPassengers").show();
	}
	
	function cancelPassengers()
	{
		setupDivPassengers();
		$(".ListPassengers").show();
	}
	
	function setupDivPassengers()
	{
		$(".AddPassengers").hide();
		
		$(".ListPassengers").hide();
		$(".EditPassengers").hide();
		$(".DeletePassengers").hide();
	}	
	
		
	// Contracts part

	function AddContracts()
	{
		setupDivContracts();
		$(".AddContracts").show();
	}
	
	function cancelContracts()
	{
		setupDivContracts();
		$(".ListContracts").show();
	}
	
	function setupDivContracts()
	{
		$(".AddContracts").hide();
		
		$(".ListContracts").hide();
		$(".EditContracts").hide();
		$(".DeleteContracts").hide();
	}	
	

    function getCaraddes(){
        $.ajax({
            url:"<?php echo base_url('admin/getCaradded') ?>",
            method:"GET",
            success:function(success){
                $('#tableBody').html(success);
            },error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    }


 $('#save').on('click',function(){
    savedata();
 })


</script>
<?php

function savedata()
	{
	
		//Check submit button 
	
		//get form's data and store in local varable
		$status=$_POST['status'];
		$civilite=$_POST['civilite'];
		$nom=$_POST['nom'];
		$pre_nom=$_POST['pre_nom'];
		$company=$_POST['company'];
		$address1=$_POST['address1'];
		$address2=$_POST['address2'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$mobile=$_POST['mobile'];
		$fax=$_POST['fax'];
		$code_postal=$_POST['code_postal'];
		$ville=$_POST['ville'];
		$client_type=$_POST['client_type'];
		$birthday=$_POSTt['birthday'];
		$disabled=$_POST['disabled'];
		$payment_method=$_POST['payment_method'];
		$payment_delay=$_POST['payment_delay'];
		$note=$_POST['note'];
		
	    	$query="insert into vbs_client values('$status','$civilite','$nom','$pre_nom','$company','$address1','$address2','$email','$phone','$mobile','$fax','$code_postal','$ville'
	                                        ,'$client_type','$birthday','$disabled','$payment_method','$payment_delay','$note')";
	$this->db->query($query);
	header('location:https://cab-booking-script.com/demo/cab-company/admin/clients.php');
//call saverecords method of Hello_Model and pass variables as parameter
//		saverecords($status,$civilite,$nom,$pre_nom,$company,$address1,$address2,$email,$phone,$mobile,$fax,$code_postal,$ville,$client_type,$birthday,$disabled,$payment_method,$payment_delay,$note);		
		echo 'data inserted';
	
		
	}
		  function saverecords($status,$civilite,$nom,$pre_nom,$company,$address1,$address2,$email,$phone,$mobile,$fax,$code_postal,$ville,$client_type,$birthday,$disabled,$payment_method,$payment_delay,$note)
	{
	$query="insert into vbs_client values('$status','$civilite','$nom','$pre_nom','$company','$address1','$address2','$email','$phone','$mobile','$fax','$code_postal','$ville'
	                                        ,'$client_type','$birthday','$disabled','$payment_method','$payment_delay','$note')";
	$this->db->query($query);
	header('location:https://cab-booking-script.com/demo/cab-company/admin/clients.php');
	}


?>
