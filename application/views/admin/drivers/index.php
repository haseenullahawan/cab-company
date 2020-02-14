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

                    <div class="row" id="seracTab">

                      <div class="col-md-7" style="padding-left: 0px;">
												<form id="formone" method="post" action="<?php echo base_url('admin/employees'); ?>" style="display: inline;">
													<input type="hidden" name="type" value="search">
													<input type="text" name="search-word" id="search-word" class="form-control" style="width: 23%;float:left; " placeholder="Search keyword" value="<?php if(isset($searched_word)){ echo $searched_word; } ?>" />
													<select name="status" style="float: left;width:18%;" class="form-control">
														<option value="All status" <?php if($searched_status=="All status" ){ echo "selected" ;} ?>> All status </option>
														<option value="done" <?php if($searched_status=="done" ){ echo "selected" ;} ?>>done</option>
														<option value="pending" <?php if($searched_status=="pending" ){ echo "selected" ;} ?>>pending</option>
														<option value="confirmed" <?php if($searched_status=="confirmed" ){ echo "selected" ;} ?>>confirmed</option>
														<option value="cancelled" <?php if($searched_status=="cancelled" ){ echo "selected" ;} ?>>cancelled</option>
													</select>
													<select name="job" style=";float:left;width:18%;"   class="form-control">
														<option value="All jobs" <?php if($searched_job=="All jobs" ){ echo "selected" ;} ?>> All jobs </option>
														<option value="driver" <?php if($searched_job =="driver" ){echo "selected";} ?> > Driver </option>
														<option value="accountant" <?php if($searched_job =="accountant" ){echo "selected";} ?> > Accountant </option>
														<option value="manager" <?php if($searched_job =="manager" ){echo "selected";} ?> > Manager </option>
													</select>
												<input class="btn" type="button" id="SearchStatutBtn" value="Search" style="float:left;width: 8%;">
													<button class="btn" style="float: left" href="http://handi-express.org/admin/employees.php">Reset</button>
												</form>
											</div>
                        
                        

                        <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">

                                <button  class="btn" id="MainAdd" ><span class="fa fa-plus" > Add</span></button>&nbsp;

                                <button class="btn" name="submit" id="EditStatut" value="Edit"><span class="fa fa-edit"> Edit</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteStatut"><span class="fa fa-close"> Delete</span></button>&nbsp;

                                <button   class="btn" name="submit" value="Delete" id="deleteStatut">View Calander</span></button>&nbsp;

                        </div>

                    </div>

                        <br>

                        <div class="row" style="padding:0px;margin: 0px" id="StatusTable">

                            <div class="col-md-12">

                                <table class="table table-bordered data-table dataTable">

                                    <input type="hidden" class="clicked-btn" value="0">

                                    <thead>

                                    <tr>

                                      	<th></th>
													<th>ID#</th>
													<th>Civility</th>
													<th>Firstname</th>
													<th>Lastname</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Hire date</th>
													<th>Job </th>
													<th>Address</th>
													<th>City</th>
													<th>Zipcode</th>
													<th>Status</th>

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

        <div class="col-md-12 hide" style="border:1px solid #ccc;padding: 0px;margin-bottom: 10px;margin-left:20px;"  id="ShowTabs">
            
           
                  <ul class="nav nav-tabs">

                   <li><a href="#Profil"role="tab" data-toggle="tab">Profil</a></li>
										<li><a href="#Drivers"role="tab" data-toggle="tab">Drivers</a></li>
										<li><a href="#Cars"role="tab" data-toggle="tab">Cars</a></li>
										<li><a href="#Documents"role="tab" data-toggle="tab">Documents</a></li>
										<li><a href="#Ressources"role="tab" data-toggle="tab">Ressources</a></li>
										<li><a href="#Bookings"role="tab" data-toggle="tab">Bookings</a></li>
										<li><a href="#Timesheet"role="tab" data-toggle="tab">Timesheet </a></li>
										<li><a href="#Availability" role="tab" data-toggle="tab">Availability</a></li>
										<li><a href="#Requests"role="tab" data-toggle="tab">Requests</a></li>
										<li><a href="#Infractions"role="tab" data-toggle="tab">Infractions</a></li>
										<li><a href="#Payments"role="tab" data-toggle="tab">Payments</a></li>
										<li><a href="#Support"role="tab" data-toggle="tab">Support</a></li>
										<li><a href="#Messages"role="tab" data-toggle="tab">Messages</a></li>

                </ul>
                <br>
            
              <div  class="tab-content responsive" style="width:100%;display: table;">
<!-- Profile tab starts -->
	<div class="tab-pane fade in  active" id="Profil"> 
											<!--<form method="post" action="<?php echo base_url('admin/employees');?>" style="background-image: none;">-->
											<form method="POST" action="" style="background-image: none;">
												
												<div class="col-md-6" style="padding: 0px;">
												
													<div class="row" style="margin-top: 10px;">

															<div class="col-md-6">
																<div class="form-group">
																	<div class="col-md-4" style="margin-top: 10px;">
																		<span style="font-weight: bold;">Statut </span>
																	</div>
																	<div class="col-md-8" style="padding: 0px;">
																		<select class="form-control">
																			<option value="DISPONIBLE">DISPONIBLE</option>
																			<option value="EN CONGE">EN CONGE</option>
																			<option value="EN ARRET MALADIE">EN ARRET MALADIE</option>
																			<option value="ABSENT">ABSENT</option>
																			<option value="INACTIF">INACTIF</option>
																		</select>
																	</div>
																</div>
															</div>

															<div class="col-md-6">
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



													</div>
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
																<div class="form-group">
																	<div class="col-md-4" style="margin-top: 10px;">
																		<span style="font-weight: bold;">Nom</span>
																	</div>
																	<div class="col-md-8" style="padding: 0px;">
																		<input name="nom" class="form-control" type="text">
																	</div>

																</div>
															</div>


															<div class="col-md-6">
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
														<div class="col-md-12">
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
															<div class="col-md-12">
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
														<div class="col-md-12">
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
												
												</div>
												
												<div class="col-md-6" style="padding: 0px;">
													<div class="row" style="margin-top: 10px;">
														
														<div class="col-md-6" style="text-align: center;">
															<img id="preview_driver" alt="Preview Logo" src="<?=base_url()?>images/no-preview.jpg" style="border: 1px solid;cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;">
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Driver Image</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input class="driver_image" name="" type="file">
																</div>

															</div>
														</div>
														
													</div>
												</div>
												
												
												<div style="clear: both"></div>

												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date de Naissance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input name="datedenaissance" required="" class="form-control datepicker" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Ville de Naissance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input name="villedenaissance" required="" class="form-control" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Pays de Naissance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input name="paysdenaissance" class="form-control" type="text">
																</div>

															</div>
														</div>

												</div>


												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Poste </span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control">
																		<option value="Chauffeur Accompagnateur">Chauffeur Accompagnateur</option>
																		<option value="Chauffeur">Chauffeur</option>
																		<option value="Secretaire">Secretaire</option>
																		<option value="Comptable">Comptable</option>
																		<option value="Regulateur">Regulateur</option>
																		<option value="Commercial">Commercial</option>
																		<option value="Responsable Parc">Responsable Parc</option>
																		<option value="Auxiliaire de vie">Auxiliaire de vie</option>
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Date Dentree</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date de Sortie</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>

															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Motif</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control">
																		<option value="">Select</option>
																	</select>
																</div>
															</div>
														</div>

												</div>

												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Type Contrat</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control">
																		<option value="CDI">CDI</option>
																		<option value="CDD">CDD</option>
																		<option value="SAISONNIERE">SAISONNIERE</option>
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Nature du Contrat</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control">
																		<option value="Temps Plein">Temps Plein</option>
																		<option value="Temps Partiel">Temps Partiel</option>
																		<option value="Scolaire">Scolaire</option>
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;padding-right: 0px;">
																	<span style="font-weight: bold;">Nombre Dheure Mensuel</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control">
																		<option value="104">104</option>
																		<option value="65">65</option>
																		<option value="151,67">151,67</option>
																	</select>
																</div>

															</div>
														</div>

												</div>


												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Type de Piece didentite</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control">
																		<option value="CIN">CIN</option>
																		<option value="Titre de sejour">Titre de sejour</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Upload</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;padding-right: 0px;">
																	<span style="font-weight: bold;">Numerro Piece Didentite</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>

															</div>
														</div>

												</div>


												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Numero Permis</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control" type="text">
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">Upload</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>

															</div>
														</div>

												</div>


												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Certificat Medicate</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>

															</div>
														</div>

												</div>


													<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">PSC1</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>

															</div>
														</div>

												</div>


												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Medecine de Travai</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="date">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control  datepicker" type="date">
																</div>

															</div>
														</div>

												</div>

												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Autre Diplome1</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Autre Diplome2</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required=""  type="file">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Autre Diplome3</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>

															</div>
														</div>

												</div>
				<div style="border: 1px solid #adadad;padding: 10px; margin-top: 15px;border-radius: 10px;background: #e6e6e6;width: 50%;" >
						<div class="row" style="">
							<div class="col-md-12" style="padding-left: 30px;">
								<span style="font-weight: bold;">Access Detail</span>
							</div>
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="col-md-5">
								<div class="form-group">
									<div class="col-md-4" style="margin-top: 10px;" >
										<span style="font-weight: bold;">Email</span>
									</div>
									<div class="col-md-8" style="padding: 0px;">
										<input type="email" name="email" required="" class="form-control">
									</div>
								</div>
							</div>
							
							<div class="col-md-5">
								<div class="form-group">
									<div class="col-md-4" style="margin-top: 10px;" >
										<span style="font-weight: bold;">Password</span>
									</div>
									<div class="col-md-8" style="padding: 0px;">
										<input type="password" name="password" required class="form-control">
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

												<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
														<div class="col-md-12">
															<button class="btn" style="float: right;" href="#" onclick="hideAdd()"><span class="delete-icon" >Cancel</span></button>
															<button style="margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
															<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'css/loading.gif' ?>" />
														</div>
												</div>
											</form>
										</div>
							<!-- Profile tab ends -->			
										<div class="tab-pane fade" id="Drivers"> 
											Drivers
										</div>
										<div class="tab-pane fade" id="Cars"> 
											Cars
										</div>


 <!-- Documents tab starts -->
 		
										<div class="tab-pane fade" id="Documents"> 
															<div class="listDocuments" >
																<div class="filter-group">
																  <div class="col-md-8" style="padding-left: 0px;">
																	  <form  method="get" action="" style="padding-top: 0px;background: none;" >
																			<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
																				<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
																			<span style="float: left;padding: 3px;padding-top: 10px">From</span>
																				<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
																			<span style="float: left;padding: 3px;padding-top: 10px">To</span>
																				<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
																			<input class="btn" type="button"  value="Search" style="float:left;width: 8%;" />
																			<button class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </button>
																		</form>
																	</div>

																	<div class="col-md-4">
																		<div class="page-action">
																			<button class="btn" onclick="DocumentsAdd()"><span class="add-icon"> Add</span></button>&nbsp;
																			<button class="btn" onclick="DocumentsEdit()"><span class="edit-icon"> Edit</span></button>&nbsp;
																			<button class="btn" onclick="DocumentsDelete()"><span class="delete-icon">Delete</button>&nbsp;
																		</div>
																	</div>
																</div>
																<table class="table table-bordered data-table dataTable">
																	<input type="hidden" class="clicked-btn" value="0">
																	<thead>
																		<tr>
																			<th></th>	
																			<th>Certificat Medicate </th>
																			<th>Date Delivrance </th>
																			<th>Date Dexpiration </th>
																			<th>PSC1</th>
																			<th>Date Delivrance</th>
																			<th>Date Dexpiration</th>
																			<th>Medecine de Travai</th>
																			<th>Date Delivrance</th>
																			<th>Date Dexpiration</th>
																			<th>Autre Diplome1</th>
																			<th>Autre Diplome2</th>
																			<th>Autre Diplome3</th>
																			<th>Created Date</th>
																		</tr>
																	</thead>
																	<tbody>

																	</tbody>
																</table>
															</div>


														<div class="col-md-12 DocumentsDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
															<form method="post" action="<?php echo base_url('admin/deletequotes');?>" style="padding: 30px;">
																<input type="hidden" id="submit-type" name="type" value="delete">
																<input type="hidden" id="delete-id" name="id" value="">
																<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected booking?</div>
																<input class="btn" type="button" id="SearchStatuBtn" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
																<button class="btn" href="#" style="margin-top: -11px;" onclick="DocumentsCancel()">No</button>
															</form>
														</div>


														<div class="col-md-12 DocumentsAdd" style="border:1px solid #ccc;margin-bottom: 10px;display: none; ">
														   <form action="" id="" method="post" style="width: 100%;background-image: none;">

																
												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Certificat Medicate</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>

															</div>
														</div>

												</div>


													<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;">
																	<span style="font-weight: bold;">PSC1</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>

															</div>
														</div>

												</div>


												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Medecine de Travai</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Delivrance</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control datepicker" type="text">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Date Dexpiration</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" class="form-control  datepicker" type="text">
																</div>

															</div>
														</div>

												</div>

												<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Autre Diplome1</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Autre Diplome2</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required=""  type="file">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;">
																	<span style="font-weight: bold;">Autre Diplome3</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input required="" type="file">
																</div>

															</div>
														</div>

												</div>


																<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
																	<div class="col-md-9">
																		<button class="btn" style="float: right;cursor: pointer;"  onclick="DocumentsCancel()"><span class="delete-icon" >Cancel</span></button>
																		<button style="margin-right: 10px;float:right;" type="button" class="btn"><span class="save-icon"></span> Save</button>
																		<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'css/loading.gif' ?>" />
																	</div>
																</div>

															</form>

														</div>
										</div>
										
										
										<div class="tab-pane fade" id="Ressources"> 
															<div class="listRessources" >
																<div class="filter-group">
																  <div class="col-md-8" style="padding-left: 0px;">
																	  <form  method="get" action="" style="padding-top: 0px;background: none;" >
																			<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
																				<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
																			<span style="float: left;padding: 3px;padding-top: 10px">From</span>
																				<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
																			<span style="float: left;padding: 3px;padding-top: 10px">To</span>
																				<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
																			<input class="btn" type="button"  value="Search" style="float:left;width: 8%;" />
																			<button class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </button>
																		</form>
																	</div>

																	<div class="col-md-4">
																		<div class="page-action">
																			<button class="btn" onclick="RessourcesAdd()"><span class="add-icon"> Add</span></button>&nbsp;
																			<button class="btn" onclick="RessourcesEdit()"><span class="edit-icon"> Edit</span></button>&nbsp;
																			<button class="btn" onclick="RessourcesDelete()"><span class="delete-icon">Delete</button>&nbsp;
																		</div>
																	</div>
																</div>
																<table class="table table-bordered data-table dataTable">
																	<input type="hidden" class="clicked-btn" value="0">
																	<thead>
																		<tr>
																			<th></th>	
																			<th>Remise de Materiel</th>
																			<th>Remise de Materiel</th>
																			<th>Date</th>
																			<th>Time</th>
																			<th>Employee</th>
																			<th>Telecharger</th>
																			<th>Etat</th>
																		</tr>
																	</thead>
																	<tbody>

																	</tbody>
																</table>
															</div>


														<div class="col-md-12 RessourcesDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
															<form method="post" action="<?php echo base_url('admin/deletequotes');?>" style="padding: 30px;">
																<input type="hidden" id="submit-type" name="type" value="delete">
																<input type="hidden" id="delete-id" name="id" value="">
																<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected booking?</div>
																<input class="btn" type="button" id="SearchStatutBtn" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
																<button class="btn" href="#" style="margin-top: -11px;" onclick="RessourcesCancel()">No</button>
															</form>
														</div>


														<div class="col-md-12 RessourcesAdd" style="border:1px solid #ccc;margin-bottom: 10px;display: none; ">
											<form action="" id="" method="post" style="width: 100%;background-image: none;">
					


											<div class="row" style="margin-top: 10px;">
												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-12" style="margin-top: 10px;">
															<span style="font-weight: bold;">Remise de Materiel</span>
														</div>
													</div>
												</div>

										
												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-5" style="margin-top: 10px;padding-left: 0px;">
															<span style="font-weight: bold;">Ressources</span>
														</div>
														<div class="col-md-7" style="padding: 0px;">
															<select class="form-control multiselect" multiple="">
															</select>
														</div>
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;">
															<span style="font-weight: bold;">Date</span>
														</div>
														<div class="col-md-6" style="padding: 0px;">
															<input name="" class="form-control datepicker" type="text">
														</div>
													</div>
												</div>


												<div class="col-md-1">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;padding: 0px;">
															<span style="font-weight: bold;">Time</span>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<input name="" class="form-control timepicker1" type="text">
														</div>
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;padding: 0px;">
															<span style="font-weight: bold;">Employee</span>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<select class="form-control">
																<option value="">Select</option>
															</select>
														</div>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;">
															<span style="font-weight: bold;">Telecharger</span>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<input type="file">
														</div>
													</div>
												</div>


											</div>

											<div class="row" style="margin-top: 10px;">
												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-12" style="margin-top: 10px;">
															<span style="font-weight: bold;">Etat</span>
														</div>
													</div>
												</div>

												<div class="col-md-9">
													<div class="form-group">
														<div class="col-md-12" style="padding: 0px;">
															<textarea class="form-control"></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-1">
													<button type="button" class="btn AddRemisedeMateriel">Add</button>
												</div>


											</div>

										<span class="RemisedeMateriel"></span>
										
										
											<div class="row" style="margin-top: 10px;">
												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-12" style="margin-top: 10px;">
															<span style="font-weight: bold;">Restitution de Materiel</span>
														</div>
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-5" style="margin-top: 10px;padding-left: 0px;">
															<span style="font-weight: bold;">Ressources</span>
														</div>
														<div class="col-md-7" style="padding: 0px;">
																<select class="form-control multiselect" multiple=""></select>
														</div>
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;">
															<span style="font-weight: bold;">Date</span>
														</div>
														<div class="col-md-6" style="padding: 0px;">
															<input name="" class="form-control datepicker" type="text">
														</div>
													</div>
												</div>


												<div class="col-md-1">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;padding: 0px;">
															<span style="font-weight: bold;">Time</span>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<input name="" class="form-control timepicker1" type="text">
														</div>
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;padding: 0px;">
															<span style="font-weight: bold;">Employee</span>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<select class="form-control">
																<option value="">Select</option>
															</select>
														</div>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="form-group">
														<div class="col-md-4" style="margin-top: 10px;">
															<span style="font-weight: bold;">Telecharger</span>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<input type="file">
														</div>
													</div>
												</div>

											</div>

											<div class="row" style="margin-top: 10px;">
												<div class="col-md-2">
													<div class="form-group">
														<div class="col-md-12" style="margin-top: 10px;">
															<span style="font-weight: bold;">Etat</span>
														</div>
													</div>
												</div>

												<div class="col-md-9">
													<div class="form-group">
														<div class="col-md-12" style="padding: 0px;">
															<textarea class="form-control"></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-1">
													<button type="button" class="btn AddRestitutiondeMateriel">Add</button>
												</div>
											</div>
											
										<span class="RestitutiondeMateriel"></span>
											
											

										



											<div class="row" style="margin-top: 20px;">
												<div class="col-md-12">
													<button class="btn" style="float: right;cursor: pointer;"  onclick="hideAdd()"><span class="delete-icon" >Cancel</span></button>
													<button style="margin-right: 10px;float:right;" type="button" class="btn"><span class="save-icon"></span> Save</button>
													<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'css/loading.gif' ?>" />
												</div>
											</div>

									</form>

														</div>
										</div>
										
										
										<div class="tab-pane fade" id="Bookings"> 
											Bookings 
										</div>
										<div class="tab-pane fade" id="Timesheet"> 
											Timesheet
										</div>
										<div class="tab-pane fade" id="Availability"> 
											Availability
										</div>
										
										<div class="tab-pane fade" id="Requests"> 
											Requests
										</div>
										<div class="tab-pane fade" id="Infractions"> 
											Infractions
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
 <!-- Documents tab ends -->
                
                
                
                
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
 	
	//	Documents
	function DocumentsAdd()
	{
		setupDocuments();
		$(".DocumentsAdd").show();
	}
	
	function DocumentsCancel()
	{
		setupDocuments();
		$(".listDocuments").show();
	}
	
	function setupDocuments()
	{
		$(".DocumentsAdd").hide();
		$(".DocumentsEdit").hide();
		$(".DocumentsDelete").hide();
		$(".listDocuments").hide();
	}	
	
	//	Ressources
	function RessourcesAdd()
	{
		setupRessources();
		$(".RessourcesAdd").show();
	}
	
	function RessourcesCancel()
	{
		setupRessources();
		$(".listRessources").show();
	}
	
	function setupRessources()
	{
		$(".RessourcesAdd").hide();
		$(".RessourcesEdit").hide();
		$(".RessourcesDelete").hide();
		$(".listRessources").hide();
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

</script>

