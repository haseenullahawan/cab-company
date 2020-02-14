<?php 
    $locale_info = localeconv(); 
     $ci = get_instance(); // CI_Loader instance 
     $ci->load->config('car_settings');
?>
<link href="<?=base_url();?>assets/css/timepicki.css" rel="stylesheet">
<script src="<?=base_url();?>assets/css/timepicki.js"></script>
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

                        <div class="col-md-8" style="padding-left: 0px;padding-right: 0px;">

                            <span style="float: left;padding: 3px;padding-top: 6px">Search keyword</span>

                            <input type="text" id="searchStatut" class="form-control" style="width: 20%;float:left; " value="">

                            <select name="status" style="float: left;width:18%;" class="form-control">
                                                        <option value="All status"> All status </option>
                                                        <option value="done">done</option>
                                                        <option value="pending">pending</option>
                                                        <option value="confirmed">confirmed</option>
                                                        <option value="cancelled">cancelled</option>
                             </select>

                            <input class="btn" type="button" id="SearchStatutBtn" value="Search" style="float:left;width: 8%;">

                            <input class="btn"  type="reset" id="resetStaut" value="Reset" style="float:left;width: 8%;">

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

                                        <th  ></th>

                                        <th  style="text-align: center"  align="center"> ID# </th>

                                        <th align="center"  style="text-align: center">Registration Number</th>

                                        <th align="center"  style="text-align: center">Registration Date</th>

                                        <th align="center"  style="text-align: center">Entery Date</th>
                                        <th align="center"  style="text-align: center">Mark</th>
                                        <th align="center"  style="text-align: center">Series</th>
                                        <th align="center"  style="text-align: center">Places</th>
                                        <th align="center"  style="text-align: center">Fuel</th>
                                        <th align="center"  style="text-align: center">Image</th>
                                        <th align="center"  style="text-align: center">Age</th>
                                        <th align="center"  style="text-align: center">Status</th>


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
            
           
                  <ul class="nav nav-tabs">

                   <li><a href="#Profil"role="tab" data-toggle="tab">Profil</a></li>
										<li><a href="#Assurance"role="tab" data-toggle="tab">Assurance</a></li>
										<li><a href="#Controle_technique" role="tab" data-toggle="tab">Controle technique</a></li>
										<li><a href="#Entretiens" role="tab" data-toggle="tab">Entretiens</a></li>
										<li><a href="#Reparations" role="tab" data-toggle="tab">Reparations</a></li>
										<li><a href="#Sinistres"role="tab" data-toggle="tab">Sinistres</a></li>
										<li><a href="#Couts"role="tab" data-toggle="tab">Couts</a></li>

                </ul>
                <br>
       
              <div class="tab-content responsive" style="width:100%;display: table;">

                    <!--status tab starts-->

                 	<div class="tab-pane fade in  active" id="Profil"> 
											<form id="submitdevisexpress"   method="post" action="<?php echo base_url(); ?>admin/insert_caradded" enctype="multipart/form-data"  style="width: 100%;background-image: none;">
												<div class="col-md-6" style="padding: 0px;">
													<div class="row" style="margin-top: 10px;">
													
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Statut </span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="statut">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('car_status');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value="">New</option> -->
																</select>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Immatriculation</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="immatriculation" class="form-control">
																</div>

															</div>
														</div>
														
													</div>
													
													
													<div class="row" style="margin-top: 10px;">
													
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Marque</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="marque">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Marque');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																	</select>
																</div>

															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Modele</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="modele">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Modele');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																	</select>
																</div>

															</div>
														</div>
														
													</div>
													
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Nombre De place </span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="nombre_de_place">
																		<option value="">Select</option>
																		<?php 
                                                                        $car_status = $ci->config->item('NombreDeplace');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Date d'immatriculation</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="date_immatriculation" class="form-control agedatepicker datepicker chagefindagecar">
																</div>

															</div>
														</div>
													</div>
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Age du Vehicule</span>
																</div>
																<div class="col-md-7" style="padding: 0px;">
																	<input type="text" name="age"  class="form-control getcarAge">
																</div>

															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Serie</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="serie">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Serie');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																	</select>
																</div>

															</div>
														</div>


													</div>
													
													
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Boite a Vitesse</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="boite">
																		<option value="Mannuelle">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('BoiteaVitesse');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value="">></option> -->
																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Carburant</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="carburant">
																		<option value="Diesel">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Carburant');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																	</select>
																</div>

															</div>
														</div>
													</div>
													
												</div>
												<div class="col-md-6" style="padding: 0px;">
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Car Image</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="file" class="clarimage" name="car_image" >
																</div>

															</div>
														</div>
														
														<div class="col-md-6">
															<img id="preview_car" alt="Preview Logo"  src="<?=base_url()?>images/no-preview.jpg" style="border: 1px solid;cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
														</div>
														
													</div>
												</div>
												
												<div class="" style="clear: both"></div>
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Courroie</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="courroie">
																		<option value="Courroie">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Courroie');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																	</select>
																</div>

															</div>
														</div>


													</div>

													<div class="row" style="margin-top: 10px;">
														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Couleur</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="couleur">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Couleur');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->

																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Nature</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="nature">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Nature');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->

																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Type</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<select class="form-control" name="type">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('Type');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->

																	</select>
																</div>

															</div>
														</div>


													</div>


													<div class="row" style="margin-top: 10px;">
														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Date Dentree</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="date_dentree" class="form-control datepicker">
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Kilometrage dentree</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="kilometrage_dentree" class="form-control">
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Prix dachat</span>
																</div>
																<div class="col-md-5" style="padding: 0px;">
																	<input type="text" class="form-control" name="prix_dachat">
																</div>
																<div class="col-md-3" style="padding: 0px;">
																	<select class="form-control" name="currency">
																		<option value="TTC">TTC</option>
																		<option value="HT">HT</option>
																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<input type="file" name="image1">
														</div>


													</div>


													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="col-md-6"><span style="font-weight: bold;font-size: 18px;">Vendeur</span></div>
														</div>
													</div>

													<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Civilite</span>
																</div>
																<div class="col-md-3" style="padding: 0px;">
																	<select class="form-control" name="seller_civilite">
																		<option value="">Select</option>
                                                                        <?php 
                                                                        $car_status = $ci->config->item('VendeurCivilite');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																		
																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Nom</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="seller_nom" class="form-control">
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Prenom</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="seller_prenom" class="form-control">
																</div>

															</div>
														</div>

														<div class="col-md-3" style="padding: 0px;">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Societe</span>
																</div>
																<div class="col-md-4" style="padding: 0px;margin-right: 7px;">
																	<input type="text" name="seller_societe" class="form-control">
																</div>
																<div class="col-md-5" style="padding: 0px;">
																	<input type="file" name="image2" >
																</div>

															</div>
														</div>

													</div>

													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Address</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="seller_address" class="form-control">
																</div>
															</div>
														</div>
													</div>
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;"></span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text"  class="form-control">
																</div>
															</div>
														</div>
													</div>

													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;"></span>
																</div>
																<div class="col-md-4" style="padding: 0px;">
																	<div class="col-md-4" style="padding: 0px;margin-top: 10px;">
																		Code Postal
																	</div>
																	<div class="col-md-8" style="padding: 0px;">
																		<input type="text" name="seller_postal_code" class="form-control">
																	</div>
																</div>

																<div class="col-md-4" style="padding: 0px;">
																	<div class="col-md-4" style="margin-top: 10px;">
																		Ville
																	</div>
																	<div class="col-md-8" style="padding: 0px;">
																		<input type="text" name="ville" class="form-control">
																	</div>
																</div>

															</div>
														</div>
													</div>

													<div class="row" style="margin-top: 10px;">
															<div class="col-md-6">
																<div class="col-md-6"><span style="font-weight: bold;font-size: 18px;">Acheteur</span></div>
															</div>
													</div>

													<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Date De Sortie</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="date_de_sortie" class="form-control datepicker">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Kilometrage</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="buyer_kilometrage" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Prix dachat</span>
																</div>
																<div class="col-md-5" style="padding: 0px;">
																	<input type="text" name="buyer_prix_dachat" class="form-control">
																</div>
																<div class="col-md-3" style="padding: 0px;">
																	<select class="form-control" name="buyer_currency">
																		<option value="TTC">TTC</option>
																		<option value="HT">HT</option>
																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<input type="file" name="image3">
														</div>


													</div>

													<div class="row" style="margin-top: 10px;">

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Civilite</span>
																</div>
																<div class="col-md-3" style="padding: 0px;">
																	<select class="form-control" name="buyer_civilite">
									                                   <option value="">Select</option>
                                                                       <?php 
                                                                        $car_status = $ci->config->item('AcheteurCivilite');
                                                                        // var_dump($car_status);
                                                                        foreach ($car_status as $key => $value) {
                                                                            echo '<option value="'.$value.'">'.$value.'</option>';
                                                                        } ?>
<!-- <option value=""></option> -->
																	</select>
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 5px;" >
																	<span style="font-weight: bold;">Nom</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="buyer_nom" class="form-control">
																</div>

															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<div class="col-md-4" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Prenom</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="buyer_prenom" class="form-control">
																</div>

															</div>
														</div>

														<div class="col-md-3" style="padding: 0px;">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Societe</span>
																</div>
																<div class="col-md-4" style="padding: 0px;margin-right: 7px;">
																	<input type="text" name="buyer_societe" class="form-control">
																</div>
																<div class="col-md-5" style="padding: 0px;">
																	<input type="file" name="image4" >
																</div>

															</div>
														</div>

													</div>

													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;">Address</span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="buyer_address" class="form-control">
																</div>
															</div>
														</div>
													</div>
													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;"></span>
																</div>
																<div class="col-md-8" style="padding: 0px;">
																	<input type="text" name="date_dentree" class="form-control">
																</div>
															</div>
														</div>
													</div>

													<div class="row" style="margin-top: 10px;">
														<div class="col-md-6">
															<div class="form-group">
																<div class="col-md-2" style="margin-top: 10px;" >
																	<span style="font-weight: bold;"></span>
																</div>
																<div class="col-md-4" style="padding: 0px;">
																	<div class="col-md-4" style="padding: 0px;margin-top: 10px;">
																		Code Postal
																	</div>
																	<div class="col-md-8" style="padding: 0px;">
																		<input type="text" name="buyer_postal_code" class="form-control">
																	</div>
																</div>

																<div class="col-md-4" style="padding: 0px;">
																	<div class="col-md-4" style="margin-top: 10px;">
																		Ville
																	</div>
																	<div class="col-md-8" style="padding: 0px;">
																		<input type="text" name="buyer_ville" class="form-control">
																	</div>
																</div>

															</div>
														</div>
													</div>

												<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
													<div class="col-md-12">
														<button class="btn" style="float: right;" href="#" onclick="hideAdd()"><span class="delete-icon" >Cancel</span></button>
														<button style="margin-right: 10px;float:right;" type="button" class="btn"><span class="save-icon"></span> Save</button>
														<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'css/loading.gif' ?>" />
													</div>
												</div>

											</form>
										</div>

                    <!--profile tab ends-->
                    <!-- assurance tab starts -->
                    	<div class="tab-pane fade" id="Assurance"> 
											<div class="ListAssurance" >	
												<div class="filter-group">
													<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
														<div class="col-md-1">
															<div class="filter-label" style="margin-top: 4px;">
																<div>Filter By</div>
															</div>
														</div>

														<div class="col-md-6">
															<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
															&nbsp;<input class="btn" type="button" name="search_by" id="SearchStatutBtn" value="Search" style="float:left" />
														</div>
													</form>
													<div class="col-md-5">
														<div class="page-action">
														<form id="submitdevisexpress"   method="post" action="<?php echo base_url(); ?>admin/assurance" >
        										        <button class="btn" onclick="AddAssurance()"><span class="add-icon"> Add</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Edit" ><span class="edit-icon"> Edit</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Delete"><span class="delete-icon">Delete</button>&nbsp; 
										
														
														</div>
													</div>
												</div>
												<input type="hidden" class="chk-Assurance-btn" value="">
												<table class="table table-bordered data-table dataTable">
													<thead>
														<tr>
															<th width="5%"></th>
															<th>ID#</th>
															<th>Statut </th>
															<th>Car</th>
															<th> Price / Month </th>
															<th> % TVA </th>
															<th> Numero de Contrat </th>
															<th>Compagnie d'assurance </th>
															<th>Brie Glasse </th>
															<th>Franchise</th>
															<th>From Date </th>
															<th>End Date </th>
														</tr>
													</thead>
													<tbody class="eewo">
											

											</tbody>
												</table>
												</form>
											</div>	

											<div class="DeleteAssurance" style="display: none;">
											  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
												  <form method="post" action="<?php echo base_url('admin/delete_Assurance');?>" style="padding: 10px;">
													  <input type="hidden" id="Assurance_id" name="Assurance_id" value="">
													  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
													  <input class="btn" type="button" id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
													  <button class="btn" href="#" onclick="cancelAssurance()">No</button>
												  </form>
											  </div>	
											</div>


											<div class="AddAssurance" style="display: none;" >	
												<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
													<form action="<?php echo base_url(); ?>admin/insert_carassurance" method="post" style="width: 100%; background-image: none;" >


																	<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Statut </span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																						<select class="form-control" name="statut">
																		                    <option value="">Select</option>

<option value=""></option>

																	                    </select>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Car</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select class="form-control" name="car">
																							<option value="">Select</option>
<option value=""></option>
																						</select>
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Price</span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																						<input type="text" name="price" class="form-control">
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">% TVA</span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																						<select class="form-control" name="tva">
																							<option value="0">0</option>
																							<option value="10">10</option>
																							<option value="20">20</option>
																						</select>
																					</div>

																				</div>
																			</div>

																		</div>



																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 5px;">
																						<span style="font-weight: bold;">Numero de Contrat </span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required name="numero_de_contrat" class="form-control">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 5px;">
																						<span style="font-weight: bold;">Compagnie d'assurance</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required="" name="compagnie_assurance" class="form-control">
																					</div>

																				</div>
																			</div>

																		</div>



																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Brie Glasse</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select class="form-control" name="brie_glasse">
																							<option value="">Select</option>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Franchise</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" required="" name="franchise" class="form-control">
																					</div>

																				</div>
																			</div>

																		</div>


																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">From Date</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" required name="from_date" class="form-control datepicker">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">End Date</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" required="" name="end_date" class="form-control datepicker">
																					</div>

																				</div>
																			</div>

																		</div>




															<div class="row" style="margin-bottom: 20px;margin-top: 10px;">
																<div class="col-md-12">
																	<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelAssurance()"><span class="delete-icon"> Cancel </span></button>
																	<button style="margin-right: 7px;float:right;" type="button" class="btn"><span class="save-icon"></span> Enregistrer </button>
																</div>
															</div>


														</form>
											   </div>
											</div> 

										</div>
                    <!-- assurance tab ends -->
                    <!-- control technique tab starts -->
                    	<div class="tab-pane fade" id="Controle_technique"> 
											<div class="ListControle_technique" >	
												<div class="filter-group">
													<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
														<div class="col-md-1">
															<div class="filter-label" style="margin-top: 4px;">
																<div>Filter By</div>
															</div>
														</div>

														<div class="col-md-6">
															<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
															&nbsp;<input class="btn" type="button" name="search_by" id="SearchStatutBtn" value="Search" style="float:left" />
														</div>
													</form>
													<div class="col-md-5">
														<div class="page-action">
														<form id="submitdevisexpress"   method="post" action="<?php echo base_url(); ?>admin/controle" >
        										        <button class="btn" onclick="AddControle_technique()"><span class="add-icon"> Add</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Edit" ><span class="edit-icon"> Edit</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Delete"><span class="delete-icon">Delete</button>&nbsp; 
														
															
														</div>
													</div>
												</div>
												<input type="hidden" class="chk-Controle_technique-btn" value="">
												<table class="table table-bordered data-table dataTable">
													<thead>
														<tr>
														    
															<th width="5%"></th>
															<th>ID#</th>
															<th>Statut  </th>
															<th>Car</th>
															<th> Garage</th>
															<th> Date </th>
															<th> Kilometrage</th>
															<th> End Date </th>
															<th>Kilometrage</th>
															<th>Note</th>
															<th>Upload</th>
														</tr>
													</thead>
													<tbody class="eewo">
											

											</tbody>
												</table>
												</form>       
											</div>	

											<div class="DeleteControle_technique" style="display: none;">
											  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
												  <form method="post" action="<?php echo base_url('admin/delete_Controle_technique');?>" style="padding: 10px;">
													  <input type="hidden" id="Controle_technique_id" name="Controle_technique_id" value="">
													  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
													  <input class="btn" type="button" id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
													  <button class="btn" href="#" onclick="cancelControle_technique()">No</button>
												  </form>
											  </div>	
											</div>


											<div class="AddControle_technique" style="display: none;" >	
												<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
													<form action="<?=base_url()?>admin/insert_controle" method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">


																	<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Statut </span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																							<select class="form-control" name="statut">
																		                    <option value="">Select</option>
                                                                                            <option value=""></option>


																	                    </select>
																					</div>
																				</div>
																			</div>
								

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Car</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select class="form-control" name="car">
																							<option value="">Select</option>

<option value=""></option>

																						</select>
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Garage</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select class="form-control GarageChange" name="garage">
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
																						<span style="font-weight: bold;">Date</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" required value="" name="date" class="form-control datepicker">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Kilometrage</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required value="" name="kilometrage" class="form-control">
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">End Date</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" required value="" name="end_date" class="form-control datepicker">
																					</div>

																				</div>
																			</div>
																			
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Kilometrage</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required value="" name="end_kilometrage" class="form-control">
																					</div>

																				</div>
																			</div>

																		</div>
							
																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-6">
																				<div class="form-group">
																					<div class="col-md-2" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Note</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<textarea rows="5" name="note" class="form-control"></textarea>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Upload</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="file" name="file"   class="">
																					</div>
																				</div>
																			</div>

																		

																		</div>


															<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
																<div class="col-md-9">
																	<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelControle_technique()"><span class="delete-icon"> Cancel </span></button>
																	<button style="margin-right: 7px;float:right;" type="button" class="btn"><span class="save-icon"></span> Enregistrer </button>
																</div>
															</div>


														</form>
											   </div>
											</div> 

										</div>
                    <!-- control technique tab ends -->
                    	<div class="tab-pane fade" id="Entretiens"> 
											<div class="ListEntretiens" >	
												<div class="filter-group">
													<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
														<div class="col-md-1">
															<div class="filter-label" style="margin-top: 4px;">
																<div>Filter By</div>
															</div>
														</div>

														<div class="col-md-6">
															<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
															&nbsp;<input class="btn" type="button" name="search_by" id="SearchStatutBtn" value="Search" style="float:left" />
														</div>
													</form>
													<div class="col-md-5">
														<div class="page-action">
														<form id="submitdevisexpress"   method="post" action="<?php echo base_url(); ?>admin/entretiens" >
        										        <button class="btn" onclick="AddEntretiens()"><span class="add-icon"> Add</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Edit" ><span class="edit-icon"> Edit</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Delete"><span class="delete-icon">Delete</button>&nbsp; 
														    
														
														
														</div>
													</div>
												</div>
												<input type="hidden" class="chk-Entretiens-btn" value="">
												<table class="table table-bordered data-table dataTable">
													<thead>
														<tr>
															<th width="5%"></th>
															<th>ID#</th>
															<th>Entrerien  </th>
															<th>Car</th>
															<th> Price</th>
															<th>  % TVA  </th>
															<th>  Kilometrage of Start </th>
															<th> Date of Start </th>
															<th> Kilometrage of End </th>
															<th>  Date of End </th>
														</tr>
													</thead>
													<tbody class="eewo">
											

											</tbody>
												</table> 
												</form>
											</div>	

											<div class="DeleteEntretiens" style="display: none;">
											  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
												  <form method="post" action="<?php echo base_url('admin/delete_Entretiens');?>" style="padding: 10px;">
													  <input type="hidden" id="Entretiens_id" name="Entretiens_id" value="">
													  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
													  <input class="btn" type="button" id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
													  <button class="btn" href="#" onclick="cancelEntretiens()">No</button>
												  </form>
											  </div>	
											</div>


											<div class="AddEntretiens" style="display: none;" >	
												<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
													<form action="<?=base_url()?>admin/insert_entretiens" method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">
															
															<div class="row" style="margin-top: 10px;">	
																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">Entrerien </span>
																			</div>
																			<div class="col-md-5" style="padding: 0px;">
																				<select class="form-control" name="entrerien">
																					<option value="">Select</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">Car</span>
																			</div>
																			<div class="col-md-8" style="padding: 0px;">
																			<select class="form-control" name="car">
																							<option value="">Select</option>
<option value=""></option>
																						</select>
																			</div>

																		</div>
																	</div>

																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">Price</span>
																			</div>
																			<div class="col-md-4" style="padding: 0px;">
																				<input type="text" class="form-control" name="price" required="">
																			</div>

																		</div>
																	</div>

																	<div class="col-md-3">
																		<div class="form-group">
																			<div class="col-md-4" style="margin-top: 10px;">
																				<span style="font-weight: bold;">% TVA</span>
																			</div>
																			<div class="col-md-5" style="padding: 0px;">
																				<select class="form-control" name="tva">
																					<option value="%">%</option>
																					<option value="TVA">TVA</option>
																				</select>
																			</div>

																		</div>
																	</div>

																</div>



															<div class="row" style="margin-top: 10px;">	
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 5px;">
																			<span style="font-weight: bold;">Kilometrage of Start</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input type="text" required value="" name="kilometrage" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Date of Start</span>
																		</div>
																		<div class="col-md-4" style="padding: 0px;">
																			<input type="text" required="" name="start_date" class="form-control ">
																		</div>

																	</div>
																</div>

															</div>



															<div class="row" style="margin-top: 10px;">	
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Kilometrage of End</span>
																		</div>
																		<div class="col-md-8" style="padding: 0px;">
																			<input type="text" required name="end_kilometrage" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<div class="col-md-4" style="margin-top: 10px;">
																			<span style="font-weight: bold;">Date of End</span>
																		</div>
																		<div class="col-md-4" style="padding: 0px;">
																			<input type="text" required="" name="end_date" >
																		</div>

																	</div>
																</div>

															</div>
									
															
															<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
																<div class="col-md-12">
																	<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelEntretiens()"><span class="delete-icon"> Cancel </span></button>
																	<button style="margin-right: 7px;float:right;" type="button" class="btn"><span class="save-icon"></span> Enregistrer </button>
																</div>
															</div>


														</form>
											   </div>
											</div> 

															</div>
										


										<div class="tab-pane fade" id="Reparations"> 
											<div class="ListReparations" >	
												<div class="filter-group">
													<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
														<div class="col-md-1">
															<div class="filter-label" style="margin-top: 4px;">
																<div>Filter By</div>
															</div>
														</div>

														<div class="col-md-6">
															<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
															&nbsp;<input class="btn" type="button" name="search_by" id="SearchStatutBtn" value="Search" style="float:left" />
														</div>
													</form>
													<div class="col-md-5">
														<div class="page-action">
														<form id="submitdevisexpress"   method="post" action="<?php echo base_url(); ?>admin/reparations" >
        										        <button class="btn" onclick="AddReparations()"><span class="add-icon"> Add</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Edit" ><span class="edit-icon"> Edit</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Delete"><span class="delete-icon">Delete</button>&nbsp; 
														    
														
														
														</div>
													</div>
												</div>
												<input type="hidden" class="chk-Reparations-btn" value="">
												<table class="table table-bordered data-table dataTable">
													<thead>
														<tr>
															<th width="5%"></th>
															<th>ID#</th>
															<th>Reparation </th>
															<th>Car</th>
															<th>Price</th>
															<th>%/TVA </th>
															<th>List des reparations</th>
															<th colspan="2">Action</th>
														</tr>
													</thead>
														<tbody class="eewo">
											

											</tbody>
												</table>
												</form>
											</div>	

											<div class="DeleteReparations" style="display: none;">
											  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
												  <form method="post" action="<?php echo base_url('admin/delete_Reparations');?>" style="padding: 10px;">
													  <input type="hidden" id="Reparations_id" name="Reparations_id" value="">
													  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
													  <input class="btn" type="button" id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
													  <button class="btn" href="#" onclick="cancelReparations()">No</button>
												  </form>
											  </div>	
											</div>


											<div class="AddReparations" style="display: none;" >	
												<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
													<form action="<?=base_url()?>admin/insert_reparations" method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">


																	<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Reparation </span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select class="form-control" name="reparation">
																							<option value="">Select</option>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Car</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<select class="form-control" name="car">
																							<option value="">Select</option>
<option value=""></option>
																						</select>
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Price</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" name="price" class="form-control" required="">
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">% TVA</span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																						<select class="form-control" name="tva">
																							<option value="%">%</option>
																							<option value="TVA">TVA</option>
																						</select>
																					</div>

																				</div>
																			</div>

																		</div>



																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Kilometrage</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required name="kilometrage" class="form-control">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Date</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" required="" name="date" class="form-control">
																					</div>

																				</div>
																			</div>

																		</div>

																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-12">
																				<div class="col-md-12"><span style="font-weight: bold;">List des reparations</span></div>
																			</div>
																		</div>
														
																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-4">
																				<div class="form-group">
																					<div class="col-md-12">
																						<input type="text" required name="list_des_reparations" class="form-control">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-1">
																				<div class="form-group">
																					<div class="col-md-12">
																						<button class="btn AppendRep" ><span class="add-icon">Add</span></button>
																					</div>
																				</div>
																			</div>
																		</div>
														
																		<span id="appendReparations"></span>
																	
														
																			
														
																	




															<div class="row" style="margin-bottom: 20px;margin-top: 10px;">
																<div class="col-md-12">
																	<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelReparations()"><span class="delete-icon"> Cancel </span></button>
																	<button style="margin-right: 7px;float:right;" type="button" class="btn"><span class="save-icon"></span> Enregistrer </button>
																</div>
															</div>


														</form>
											   </div>
											</div> 
										</div>


										<div class="tab-pane fade" id="Sinistres"> 
											<div class="ListSinistres" >	
												<div class="filter-group">
													<form method="get" action="" style="background-image: none; margin-bottom: 0px; padding: 0px;border: 0px solid;">
														<div class="col-md-1">
															<div class="filter-label" style="margin-top: 4px;">
																<div>Filter By</div>
															</div>
														</div>

														<div class="col-md-6">
															<input type="text" class="form-control" name="pdf_name" style="float: left;width:27%;" >
															&nbsp;<input class="btn" type="button" name="search_by" id="search_by" value="Search" style="float:left" />
														</div>
													</form>
													<div class="col-md-5">
														<div class="page-action">
														<form id="submitdevisexpress"   method="post" action="<?php echo base_url(); ?>admin/sinistres" >
        										        <button class="btn" onclick="AddSinistres()"><span class="add-icon"> Add</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Edit" ><span class="edit-icon"> Edit</span></button>&nbsp;
            											<button type="button" class="btn"  name="submit" value="Delete"><span class="delete-icon">Delete</button>&nbsp; 
														   
														
															
														</div>
													</div>
												</div>
												<input type="hidden" class="chk-Sinistres-btn" value="">
												<table class="table table-bordered data-table dataTable">
													<thead>
														<tr>
															<th width="5%"></th>
															<th>ID#</th>
															<th>Statut  </th>
															<th>Date</th>
															<th> Garage</th>
															<th> Driver </th>
															<th> Car</th>
															<th>Responsability</th>
															<th>Constat</th>
															<th>Report</th>
															<th>Invoice</th>
														</tr>
													</thead>
													<tbody class="eewo">
											

											</tbody>
												</table>  
												</form>
											</div>	

											<div class="DeleteSinistres" style="display: none;">
											  <div class="col-md-12  " style="padding-left: 3px;margin-bottom: 10px">
												  <form method="post" action="<?php echo base_url('admin/delete_Sinistres');?>" style="padding: 10px;">
													  <input type="hidden" id="Sinistres_id" name="Sinistres_id" value="">
													  <div style="display: inline-block;float:left;margin-top: 10px;margin-right: 10px;"> Are you sure you want to delete selected faq?</div>
													  <input class="btn" type="button" id="SearchStatutBtn" value="Yes" style="float:left;width: 50px" />
													  <button class="btn" href="#" onclick="cancelSinistres()">No</button>
												  </form>
											  </div>	
											</div>


											<div class="AddSinistres" style="display: none;" >	
												<div class="col-md-12" style="border:0px solid #ccc;padding: 0px;margin-bottom: 10px">
													<form action="<?=base_url()?>admin/insert_sinistres" method="post" style="width: 100%; background-image: none;" enctype="multipart/form-data">


																	<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Statut </span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																							<select class="form-control" name="statut">
																		                    <option value="">Select</option>

<option value=""></option>

																	                    </select>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Date</span>
																					</div>
																					<div class="col-md-4" style="padding: 0px;">
																						<input type="text" name="date" class="form-control ">
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Garage</span>
																					</div>
																					<div class="col-md-5" style="padding: 0px;">
																						<select class="form-control SinistresChangeGarage" name="garage" >
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
																						<span style="font-weight: bold;">Driver</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required name="driver" class="form-control">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Car</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required name="car" class="form-control">
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Responsability</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="text" required name="responsabilty" class="form-control">
																					</div>

																				</div>
																			</div>

																		</div>
                                    
																		<div class="row" style="margin-top: 10px;">	
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Constat</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="file" name="constat" class="">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Report</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="file"  name="report" class="">
																					</div>

																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<div class="col-md-4" style="margin-top: 10px;">
																						<span style="font-weight: bold;">Invoice</span>
																					</div>
																					<div class="col-md-8" style="padding: 0px;">
																						<input type="file"  name="invoice" class="">
																					</div>

																				</div>
																			</div>

																		</div>


															<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
																<div class="col-md-9">
																	<button class="btn" style="float:right;margin-right: 0px;" onclick="cancelSinistres()"><span class="delete-icon"> Cancel </span></button>
																	<button style="padding: 3px 13px;margin-right: 7px;float:right;" type="button" class="btn"><span class="save-icon"></span> Enregistrer </button>
																</div>
															</div>


														</form>
											   </div>
											</div> 

										</div>


										<div class="tab-pane fade" id="Couts"> 
											Couts
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
    	function AddAssurance()
	{
		setupDivAssurance();
		$(".AddAssurance").show();
	}
	function cancelAssurance()
	{
		setupDivAssurance();
		$(".ListAssurance").show();
	}
	
	function setupDivAssurance()
	{
		$(".AddAssurance").hide();
		
		$(".ListAssurance").hide();
		$(".EditAssurance").hide();
		$(".DeleteAssurance").hide();
	}
	
		// Reparations part

	function AddReparations()
	{
		setupDivReparations();
		$(".AddReparations").show();
	}
	
	function cancelReparations()
	{
		setupDivReparations();
		$(".ListReparations").show();
	}
	
	function setupDivReparations()
	{
		$(".AddReparations").hide();
		
		$(".ListReparations").hide();
		$(".EditReparations").hide();
		$(".DeleteAssurance").hide();
	}	
	
	
	
	
		// Sinistres part

	function AddSinistres()
	{
		setupDivSinistres();
		$(".AddSinistres").show();
	}
	
	function cancelSinistres()
	{
		setupDivSinistres();
		$(".ListSinistres").show();
	}
	
	function setupDivSinistres()
	{
		$(".AddSinistres").hide();
		
		$(".ListSinistres").hide();
		$(".EditSinistres").hide();
		$(".DeleteSinistres").hide();
	}	
	
	
	
		// Controle_technique part

	function AddControle_technique()
	{
		setupDivControle_technique();
		$(".AddControle_technique").show();
	}
	
	function cancelControle_technique()
	{
		setupDivControle_technique();
		$(".ListControle_technique").show();
	}
	
	function setupDivControle_technique()
	{
		$(".AddControle_technique").hide();
		
		$(".ListControle_technique").hide();
		$(".EditControle_technique").hide();
		$(".DeleteControle_technique").hide();
	}	
	
	
	
		// Entretiens part

	function AddEntretiens()
	{
		setupDivEntretiens();
		$(".AddEntretiens").show();
	}
	
	function cancelEntretiens()
	{
		setupDivEntretiens();
		$(".ListEntretiens").show();
	}
	
	function setupDivEntretiens()
	{
		$(".AddEntretiens").hide();
		
		$(".ListEntretiens").hide();
		$(".EditEntretiens").hide();
		$(".DeleteEntretiens").hide();
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

