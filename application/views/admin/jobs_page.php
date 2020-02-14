<link href="<?=base_url();?>assets/css/timepicki.css" rel="stylesheet">
<script src="<?=base_url();?>assets/css/timepicki.js"></script>


<link href="<?=base_url();?>assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src="<?=base_url();?>assets/css/jquery.multiselect.js"></script>
<style>
    
    .ms-options-wrap button{
        overflow:hidden;
    }
</style>


<script type="text/javascript">

			
//	Status
	function StatusAdd()
	{
		setupStatus();
		$(".StatusAdd").show();
	}
	
	function StatusCancel()
	{
		setupStatus();
		$(".listStatus").show();
	}
	
	
	
	function StatusEdit()
	{
		var val = $('.clicked-statut').val();
		
		if(val != "")
		{
			setupStatus();
			$(".StatusEdit").show();
			$("#StatusEditview"+val).show();
		}
	}
	
	function StatusDelete()
	{
		var val = $('.clicked-statut').val();
		if(val != "")
		{
			setupStatus();
			$(".StatusDelete").show();
			$("#statutid").val(val);
			
		}
	}
	
	
	function setupStatus()
	{
		$(".StatusAdd").hide();
		$(".StatusEdit").hide();
		$(".StatusEditEdit").hide();
		$(".StatusDelete").hide();
		$(".listStatus").hide();
	}	
	
	
//	TypeofContract
	function TypeofContractAdd()
	{
		setupTypeofContract();
		$(".TypeofContractAdd").show();
	}
	
	function TypeofContractCancel()
	{
		setupTypeofContract();
		$(".listTypeofContract").show();
	}
	
	function TypeofContractEdit()
	{
		var val = $('.clicked-typeofcontract').val();
		
		if(val != "")
		{
			setupTypeofContract();
			$(".TypeofContractEdit").show();
			$("#TypeofContractEditview"+val).show();
		}
	}
	
	function TypeofContractDelete()
	{
		var val = $('.clicked-typeofcontract').val();
		if(val != "")
		{
			setupTypeofContract();
			$(".TypeofContractDelete").show();
			$("#typeofcontractid").val(val);
			
		}
	}
	
	function setupTypeofContract()
	{
		$(".TypeofContractAdd").hide();
		$(".TypeofContractEdit").hide();
		$(".TypeofContractDelete").hide();
		$(".listTypeofContract").hide();
		$(".EditTypeofContractEdit").hide();
	}	
	
	
//	HoursPerMonth
	function HoursPerMonthAdd()
	{
		setupHoursPerMonth();
		$(".HoursPerMonthAdd").show();
	}
	
	function HoursPerMonthCancel()
	{
		setupHoursPerMonth();
		$(".listHoursPerMonth").show();
	}
	
	function HoursPerMonthEdit()
	{
		var val = $('.clicked-hourspermonth').val();
		
		if(val != "")
		{
			setupHoursPerMonth();
			$(".HoursPerMonthEdit").show();
			$("#HoursPerMonthEditview"+val).show();
		}
	}
	
	function HoursPerMonthDelete()
	{
		var val = $('.clicked-hourspermonth').val();
		if(val != "")
		{
			setupHoursPerMonth();
			$(".HoursPerMonthDelete").show();
			$("#hourspermonthid").val(val);
			
		}
	}
	
	function setupHoursPerMonth()
	{
		$(".HoursPerMonthAdd").hide();
		$(".HoursPerMonthEdit").hide();
		$(".EditHoursPerMonthEdit").hide();
		$(".HoursPerMonthDelete").hide();
		$(".listHoursPerMonth").hide();
	}	
	
//	Job
	function JobAdd()
	{
		setupJob();
		$(".JobAdd").show();
	}
	
	function JobCancel()
	{
		setupJob();
		$(".listJob").show();
	}
	
	function JobEdit()
	{
		var val = $('.clicked-job').val();
		
		if(val != "")
		{
			setupJob();
			$(".JobEdit").show();
			$("#JobEditview"+val).show();
		}
	}
	
	function JobDelete()
	{
		var val = $('.clicked-job').val();
		if(val != "")
		{
			setupJob();
			$(".JobDelete").show();
			$("#jobid").val(val);
			
		}
	}
	
	function setupJob()
	{
		$(".JobAdd").hide();
		$(".JobEdit").hide();
		$(".JobDelete").hide();
		$(".JobEditEdit").hide();
		$(".listJob").hide();
	}	
	
//	NatureofContract
	function NatureofContractAdd()
	{
		setupNatureofContract();
		$(".NatureofContractAdd").show();
	}
	
	function NatureofContractCancel()
	{
		setupNatureofContract();
		$(".listNatureofContract").show();
	}
	
	function NatureofContractEdit()
	{
		var val = $('.clicked-natureofcontract').val();
		
		if(val != "")
		{
			setupNatureofContract();
			$(".NatureofContractEdit").show();
			$("#NatureofContractEditview"+val).show();
		}
	}
	
	function NatureofContractDelete()
	{
		var val = $('.clicked-natureofcontract').val();
		if(val != "")
		{
			setupNatureofContract();
			$(".NatureofContractDelete").show();
			$("#natureofcontractid").val(val);
			
		}
	}
	
	function setupNatureofContract()
	{
		$(".NatureofContractAdd").hide();
		$(".NatureofContractEdit").hide();
		$(".NatureofContractEditEdit").hide();
		$(".NatureofContractDelete").hide();
		$(".listNatureofContract").hide();
	}	
	
//	WorkingPlace
	function WorkingPlaceAdd()
	{
		setupWorkingPlace();
		$(".WorkingPlaceAdd").show();
	}
	
	function WorkingPlaceCancel()
	{
		setupWorkingPlace();
		$(".listWorkingPlace").show();
	}
	
	function WorkingPlaceEdit()
	{
		var val = $('.clicked-workingplace').val();
		
		if(val != "")
		{
			setupWorkingPlace();
			$(".WorkingPlaceEdit").show();
			$("#WorkingPlaceEditview"+val).show();
		}
	}
	
	function WorkingPlaceDelete()
	{
		var val = $('.clicked-workingplace').val();
		if(val != "")
		{
			setupWorkingPlace();
			$(".WorkingPlaceDelete").show();
			$("#workingplaceid").val(val);
			
		}
	}
	
	function setupWorkingPlace()
	{
		$(".WorkingPlaceAdd").hide();
		$(".WorkingPlaceEdit").hide();
		$(".WorkingPlaceEditEdit").hide();
		$(".WorkingPlaceDelete").hide();
		$(".listWorkingPlace").hide();
	}	
	
//	RequiredExperiance
	function RequiredExperianceAdd()
	{
		setupRequiredExperiance();
		$(".RequiredExperianceAdd").show();
	}
	
	function RequiredExperianceCancel()
	{
		setupRequiredExperiance();
		$(".listRequiredExperiance").show();
	}
	
	
	function RequiredExperianceEdit()
	{
		var val = $('.clicked-requiredexperiance').val();
		
		if(val != "")
		{
			setupRequiredExperiance();
			$(".RequiredExperianceEdit").show();
			$("#RequiredExperianceEditview"+val).show();
		}
	}
	
	function RequiredExperianceDelete()
	{
		var val = $('.clicked-requiredexperiance').val();
		if(val != "")
		{
			setupRequiredExperiance();
			$(".RequiredExperianceDelete").show();
			$("#requiredexperianceid").val(val);
			
		}
	}
	
	
	function setupRequiredExperiance()
	{
		$(".RequiredExperianceAdd").hide();
		$(".RequiredExperianceEdit").hide();
		$(".RequiredExperianceEditEdit").hide();
		$(".RequiredExperianceDelete").hide();
		$(".listRequiredExperiance").hide();
	}	
	
	
//	RequiredDiploma
	function RequiredDiplomaAdd()
	{
		setupRequiredDiploma();
		$(".RequiredDiplomaAdd").show();
	}
	
	function RequiredDiplomaCancel()
	{
		setupRequiredDiploma();
		$(".listRequiredDiploma").show();
	}
	
	
	function RequiredDiplomaEdit()
	{
		var val = $('.clicked-requireddiploma').val();
		
		if(val != "")
		{
			setupRequiredDiploma();
			$(".RequiredDiplomaEdit").show();
			$("#RequiredDiplomaEditview"+val).show();
		}
	}
	
	function RequiredDiplomaDelete()
	{
		var val = $('.clicked-requireddiploma').val();
		if(val != "")
		{
			setupRequiredDiploma();
			$(".RequiredDiplomaDelete").show();
			$("#requireddiplomaid").val(val);
			
		}
	}
	
	function setupRequiredDiploma()
	{
		$(".RequiredDiplomaAdd").hide();
		$(".RequiredDiplomaEdit").hide();
		$(".RequiredDiplomaEditEdit").hide();
		$(".RequiredDiplomaDelete").hide();
		$(".listRequiredDiploma").hide();
	}	
	
//	RequiredDocument
	function RequiredDocumentAdd()
	{
		setupRequiredDocument();
		$(".RequiredDocumentAdd").show();
	}
	
	function RequiredDocumentCancel()
	{
		setupRequiredDocument();
		$(".listRequiredDocument").show();
	}
	
	function RequiredDocumentEdit()
	{
		var val = $('.clicked-requireddocument').val();
		
		if(val != "")
		{
			setupRequiredDocument();
			$(".RequiredDocumentEdit").show();
			$("#RequiredDocumentEditview"+val).show();
		}
	}
	
	function RequiredDocumentDelete()
	{
		var val = $('.clicked-requireddocument').val();
		if(val != "")
		{
			setupRequiredDocument();
			$(".RequiredDiplomaDelete").show();
			$("#requireddocumentid").val(val);
			
		}
	}
	
	function setupRequiredDocument()
	{
		$(".RequiredDocumentAdd").hide();
		$(".RequiredDocumentEdit").hide();
		$(".RequiredDocumentEditEdit").hide();
		$(".RequiredDocumentDelete").hide();
		$(".listRequiredDocument").hide();
	}	
	
//	JobCategory
	function JobCategoryAdd()
	{
		setupJobCategory();
		$(".JobCategoryAdd").show();
	}
	
	function JobCategoryCancel()
	{
		setupJobCategory();
		$(".listJobCategory").show();
	}
	
	
	function JobCategoryEdit()
	{
		var val = $('.clicked-jobcategory').val();
		
		if(val != "")
		{
			setupJobCategory();
			$(".JobCategoryEdit").show();
			$("#JobCategoryEditview"+val).show();
		}
	}
	
	function JobCategoryDelete()
	{
		var val = $('.clicked-jobcategory').val();
		if(val != "")
		{
			setupJobCategory();
			$(".JobCategoryDelete").show();
			$("#jobcategoryid").val(val);
			
		}
	}
	
	
	function setupJobCategory()
	{
		$(".JobCategoryAdd").hide();
		$(".JobCategoryEdit").hide();
		$(".JobCategoryEditEdit").hide();
		$(".JobCategoryDelete").hide();
		$(".listJobCategory").hide();
	}	
	
	
//	Childrens
	function ChildrensAdd()
	{
		setupChildrens();
		$(".ChildrensAdd").show();
	}
	
	function ChildrensCancel()
	{
		setupChildrens();
		$(".listChildrens").show();
	}
	
	function setupChildrens()
	{
		$(".ChildrensAdd").hide();
		$(".ChildrensEdit").hide();
		$(".ChildrensDelete").hide();
		$(".listChildrens").hide();
	}	
	
	
//	Car
	function CarAdd()
	{
		setupCar();
		$(".CarAdd").show();
	}
	
	function CarCancel()
	{
		setupCar();
		$(".listCar").show();
	}
	
	function setupCar()
	{
		$(".CarAdd").hide();
		$(".CarEdit").hide();
		$(".CarDelete").hide();
		$(".listCar").hide();
	}	
	
//	SituatonProfessionnelle
	function SituatonProfessionnelleAdd()
	{
		setupSituatonProfessionnelle();
		$(".SituatonProfessionnelleAdd").show();
	}
	
	function SituatonProfessionnelleCancel()
	{
		setupSituatonProfessionnelle();
		$(".listSituatonProfessionnelle").show();
	}
	
	function setupSituatonProfessionnelle()
	{
		$(".SituatonProfessionnelleAdd").hide();
		$(".SituatonProfessionnelleEdit").hide();
		$(".SituatonProfessionnelleDelete").hide();
		$(".listSituatonProfessionnelle").hide();
	}	
	
//	SituationFamiliate
	function SituationFamiliateAdd()
	{
		setupSituationFamiliate();
		$(".SituationFamiliateAdd").show();
	}
	
	function SituationFamiliateCancel()
	{
		setupSituationFamiliate();
		$(".listSituationFamiliate").show();
	}
	
	function setupSituationFamiliate()
	{
		$(".SituationFamiliateAdd").hide();
		$(".SituationFamiliateEdit").hide();
		$(".SituationFamiliateDelete").hide();
		$(".listSituationFamiliate").hide();
	}	
	
//	JobsCancel
	function JobsAdd()
	{
		setupJobs();
		$(".JobsAdd").show();
	}
	
	function JobsCancel()
	{
		setupJobs();
		$(".listJobs").show();
	}
	
	
	function JobsEdit()
	{
		var val = $('.clicked-mainjob').val();
		
		if(val != "")
		{
			setupJobs();
			$(".JobsEdit").show();
			$("#JobsEditview"+val).show();
		}
	}
	
	function JobsDelete()
	{
		var val = $('.clicked-mainjob').val();
		if(val != "")
		{
			setupJobs();
			$(".JobsDelete").show();
			$("#mainjobid").val(val);
			
		}
	}
	
	
	function setupJobs()
	{
		$(".JobsAdd").hide();
		$(".JobsEdit").hide();
		$(".JobsEditEdit").hide();
		$(".JobsDelete").hide();
		$(".listJobs").hide();
	}	
	
	
$(document).ready(function(){
	
	
		$('input.chk-typeofcontract-template').on('change', function() {
			$('input.chk-typeofcontract-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-typeofcontract').val(id);
		});
		
		$('input.chk-hourspermonth-template').on('change', function() {
			$('input.chk-hourspermonth-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-hourspermonth').val(id);
		});
		
		$('input.chk-job-template').on('change', function() {
			$('input.chk-job-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-job').val(id);
		});
		
		$('input.chk-natureofcontract-template').on('change', function() {
			$('input.chk-natureofcontract-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-natureofcontract').val(id);
		});
		
		$('input.chk-workingplace-template').on('change', function() {
			$('input.chk-workingplace-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-workingplace').val(id);
		});
		
		$('input.chk-requiredexperiance-template').on('change', function() {
			$('input.chk-requiredexperiance-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-requiredexperiance').val(id);
		});
		
		$('input.chk-requireddiploma-template').on('change', function() {
			$('input.chk-requireddiploma-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-requireddiploma').val(id);
		});
		
		$('input.chk-requireddocument-template').on('change', function() {
			$('input.chk-requireddocument-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-requireddocument').val(id);
		});
		
		$('input.chk-jobcategory-template').on('change', function() {
			$('input.chk-jobcategory-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-jobcategory').val(id);
		});
		
		
		$('input.chk-statut-template').on('change', function() {
			$('input.chk-statut-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-statut').val(id);
		});
		
		$('input.chk-mainjob-template').on('change', function() {
			$('input.chk-mainjob-template').not(this).prop('checked', false);
			var id = $(this).attr('data-input');
			$('.clicked-mainjob').val(id);
		});
		
		
});
		
	
	
</script>


<link href="<?=base_url();?>assets/css/timepicki.css" rel="stylesheet">
<script src="<?=base_url();?>assets/css/timepicki.js"></script>

<style type="text/css">
	.timepicker_wrap 
	{
				width: 124px !important;
				/*left:-40px !important;*/
				top:35px !important;
				
	}
</style>

<style>
	.ms-options-wrap button {
		width: 100% !important;
		border-color: #fff #fff #fff #fff;
		border-color: #bfbfbf;
		text-shadow: 0 0px 0 rgba(255, 255, 255, 0.7);
		color: #555555;
		background-color: #fff;
		-webkit-box-shadow: inset 0 0px 0 rgba(255, 255, 255, 0.6), inset 0 2px 5px rgba(255, 255, 255, 0.5), inset 0 -2px 5px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: inset 0 0px 0 rgba(255, 255, 255, 0.6), inset 0 2px 5px rgba(255, 255, 255, 0.5), inset 0 -2px 5px rgba(0, 0, 0, 0.1);
		box-shadow: inset 0 0px 0 rgba(255, 255, 255, 0.6), inset 0 2px 5px rgba(255, 255, 255, 0.5), inset 0 -2px 5px rgba(0, 0, 0, 0.1);
		background: transparent linear-gradient(#ffffff, #ffffff, #ffffff) repeat scroll 0% 0%;
		background-color: transparent;
		background-image: #ffffff;
		height: 34px;
		font-size: 17px;
	}
	.ms-options ul
	{
		margin-left: -16px;
		background: #fff !important;
	}
	.mycchhlls .form-group{
    width: 15%;
    float: left;
    margin-left: 10px;	}
    .mycchhlls .btn {
        height: 38px !important;
    margin-top: 26px !important;
    color: #787878 !important;
    padding: 7px 8px !important;
    }
</style>




	<input type="hidden" value="<?=date('d-m-Y')?>" id="CurrentDate">
	<input type="hidden" value="<?=date('H:i')?>" id="CurrentTime">
	<div  class="">
	<div  class="col-md-12 ">
	<div class="content">
        
<div class="main-hed" style="margin-top: 15px;box-shadow: 0 0 1px #fff;">
        
            <a href="<?php echo base_url();?>admin/dashboard" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home / </a> 
           <?php echo $title?>
        </div>
        
            <div class="">
                 <div class="tab-content responsive" >
					<div class="col-md-12">
					    <form method="post" action="">
					        <div class="mycchhlls">
                            
                            <div class="form-group">
                                <label>Function</label>
                                <select name="Function" class="form-control flt-select">
                                    <option value="0" selected="selected">Select Function</option>
                                    <?php
												foreach ($job_job as $job)
												{ ?>
												<option value="<?=$job->id?>"><?=$job->job?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control flt-select">
                                    <option value="0" selected="selected">Select</option>
                                    <?php
												foreach ($job_jobcategory as $jobcategory)
												{ ?>
												<option value="<?=$jobcategory->id?>"><?=$jobcategory->jobcategory?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>contract Type</label>
                                <select name="typeofcontract" class="form-control flt-select ">
                                    <option value="0">Select</option>
                                     <?php
												foreach ($job_typeofcontract as $typeofcontract)
												{ ?>
												<option value="<?=$typeofcontract->id?>"><?=$typeofcontract->typeofcontract?></option>
												    <?php } ?> 
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Contract Nature</label>
                                <select name="natureofcontract" class="form-control flt-select">
                                    <option value="0" selected="selected">Select</option>
                                    <?php
												foreach ($job_natureofcontract as $natureofcontract)
												{ ?>
												<option value="<?=$natureofcontract->id?>"><?=$natureofcontract->natureofcontract?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Monthly Hours</label>
                                <select name="hourspermonth" class="form-control flt-select">
                                    <option value="0" selected="selected">Select</option>
                                    <?php
												foreach ($job_hourspermonth as $hourspermonth)
												{ ?>
												<option value="<?=$hourspermonth->id?>"><?=$hourspermonth->hourspermonth?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label>Experience</label>
                                <select id="experience" name="experience" class="form-control flt-select cust_width2">
                                    <option value="">Select </option>
                                    <?php
												foreach ($job_requiredexperiance as $requiredexperiance)
												{ ?>
												<option value="<?=$requiredexperiance->id?>"><?=$requiredexperiance->requiredexperiance?></option>
												    <?php } ?> 
                                  
                                </select>
                            </div>
                        	<input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>" name="<?php echo $this->security->get_csrf_token_name();?>">
                            <input type="hidden" name="job_search" value='job_search'>
                            <div class="form-group">
                                <label>Workplace</label>
                                <select id="level" name="Workplace" class="form-control flt-select">
                                    <option value="">Select</option>
                                    <?php
												foreach ($job_workingplace as $workingplace)
												{ ?>
												<option value="<?=$workingplace->id?>"><?=$workingplace->workingplace?></option>
												    <?php } ?> 
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <lable> Date From</lable>
							<input type="text" style="    margin-top: 4px;" name="from_period" class="form-control flt-select bdatepicker" value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
                            </div>
                            
                            <div class="form-group">
                                <lable> Date To</lable>
                    	<input type="text" name="to_period"  style="    margin-top: 4px;" class="form-control flt-select  bdatepicker"  value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>

                            </div>
                            
                            <div class="col-md-2">
                            <button class="btn btn-default" type="submit" name="search_by" value="Search">Search</button>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
					    </form>
					</div>
					
					 
					<div class="tab-pane fade in  active" id="Jobs"> 
						<div class="listJobs" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <!--<form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="bdatepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="bdatepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;background: none;
    float: left;
    color: #4a88be;
    border: none;
    height: auto;
    font-weight: 100;
    text-transform: none;" />
										</form>-->
									</div>

									<div class="col-md-3">
										<div class="page-action">
											<a class="btn" onclick="JobsAdd()"><span class="add-icon btn btn-default"> Add</span></a>&nbsp;
											<a class="btn" onclick="JobsEdit()"><span class="edit-icon btn btn-default"> Edit</span></a>&nbsp;
											<a class="btn" onclick="JobsDelete()"><span class="delete-icon  btn btn-default">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="row">
								    <div class="col-md-12">
								        <input type="hidden" class="clicked-mainjob" value="">
								<div class=" table-responsive">
								<table class="table table-bordered data-table dataTable">
								
									<thead>
										<tr>
											<th></th>
											<th>ID</th>
											<th>Published Date</th>
											<th>Time</th>
											<th>To Date </th>
											<th>Time</th>
											<th>Type of Contract </th>
											<th>Hours per month </th>
											<th>Job</th>
											<th>Nature of Contract </th>
											<th>Working Place </th>
											<th>Required Experiance </th>
											<th>Required Diploma </th>
											<th>Required Document </th>
											<th>Job Category </th>
											<th>Job Title </th>
											<th>Statut</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($getjob as $value)
										{ ?>
											<tr>
												<td><input class="chk-mainjob-template" data-input="<?=$value->id?>" type="checkbox"></td>
											<td><?=create_timestamp_uid($value->published_date,$value->id);?></td>
												<td><?=$value->published_date?></td>
												<td><?=$value->published_time?></td>
												<td><?=$value->to_date?></td>
												<td><?=$value->to_time?></td>
												<td><?=$value->typeofcontract?></td>
												<td><?=$value->hourspermonth?></td>
												<td><?=$value->job?></td>
												<td><?=$value->natureofcontract?></td>
												<td><?=$value->workingplace?></td>
												<td><?=$value->requiredexperiance?></td>
												
												
												
												<td>
												<?php
												$stringdata =  '';
												foreach (explode(",", $value->requireddiploma_id) as $valueex)
												{
													$string = 	$this->sitemodel->requireddiploma_id($valueex);
													$stringdata.=$string->requireddiploma.',';
												}
												echo rtrim($stringdata,",");
												?>
												
												</td>
												<td>
												<?php
												$stringdatas =  '';
												foreach (explode(",", $value->requireddocument_id) as $valuex)
												{
													$strings = 	$this->sitemodel->requireddocument_id($valuex);
													$stringdatas.=$strings->requireddocument.',';
												}
												echo rtrim($stringdatas,",");
												?>
												</td>
												<td><?=$value->jobcategory?></td>
												<td><?=$value->job_title?></td>
												<td><?=$value->statut?></td>
												<td><?=$value->created_date?></td>
											</tr>
									<?php }
										?>
									</tbody>
								</table>
								</div>
								    </div>
								</div>
								
							</div>
			

					<div class="col-md-12 JobsDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
						<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
							<input  name="tablename" value="job" type="hidden" >
							<input type="hidden" id="mainjobid" name="id" value="">
							<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
							<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
							<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
							<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="StatusCancel()">No</a>
						</form>
					</div>	
					
						
				<div class="JobsEdit" style="display: none;">	
					<?php
					foreach ($getjob as $value)
					{ ?>
					
						
						
						<div id="JobsEditview<?=$value->id?>" class="JobsEditEdit" style="display: none;">
							<form action="<?=base_url();?>Rectruitement_config/UpdateSaveJob" class="" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
									<input type="hidden" value="<?=$value->id?>" name="id">
									<input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>" name="<?php echo $this->security->get_csrf_token_name();?>">

									<div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<span style="font-weight: bold;">Statut</span>
										</div>
										<div class="col-md-1" style="width:10%">
											<span style="font-weight: bold;">From Date</span>
										</div>
										<div class="col-md-1">
											<span style="font-weight: bold;">To Time</span>
										</div>
										<div class="col-md-1" style="width:10%">
											<span style="font-weight: bold;">To Date</span>
										</div>
										<div class="col-md-1">
											<span style="font-weight: bold;">Time</span>
										</div>


									</div>   


								   <div class="row" style="margin-top: 10px;">
									   <div class="col-md-2">
										   <select style="width:100%" class="form-control getJobStatutDynamic<?=$value->id?> getJobStatutDynamic" id="<?=$value->id?>" name="status_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_statut as $statut)
												{ 
													$selected = '';
													if($statut->id == $value->status_id)
													{
														$selected = 'selected';
													}
													?>
												<option <?=$selected?> value="<?=$statut->id?>"><?=$statut->statut?></option>
												<?php 
												}
												?>
											</select>
										</div>
									   <div class="col-md-1" style="width:10%">
										   <input type="text" class="form-control bdatepicker" value="<?=$value->published_date?>" name="published_date" id="PublishedDate<?=$value->id?>" required="" >  
										</div>
									   <div class="col-md-1">
											<input type="text" class="form-control timepicker1" value="<?=$value->published_time?>" name="published_time" id="PublishedTime<?=$value->id?>" required="" > 
										</div>
										<div class="col-md-1" style="width:10%">
											<input type="text" class="form-control bdatepicker" value="<?=$value->to_date?>" name="to_date" id="ToDate<?=$value->id?>" > 
										</div>
										
										<div class="col-md-1">
											<input type="text" class="form-control timepicker1"  value="<?=$value->to_time?>" name="to_time" id="ToTime<?=$value->id?>" >
										</div>

									</div>   



								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<span style="font-weight: bold;">Type of Contract</span>
										</div>

										<div class="col-md-2">
											<span style="font-weight: bold;">Hours per month</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Living Place</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Nature of Contract</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Working Place</span>
										</div>

									</div>   


								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="typeofcontract_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_typeofcontract as $typeofcontract)
												{ 
													$selected = '';
													if($typeofcontract->id == $value->typeofcontract_id)
													{
														$selected = 'selected';
													}
													
													?> 
												<option <?=$selected?> value="<?=$typeofcontract->id?>"><?=$typeofcontract->typeofcontract?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control"   name="hourspermonth_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_hourspermonth as $hourspermonth )
												{
													$selected = '';
													if($hourspermonth->id == $value->hourspermonth_id)
													{
														$selected = 'selected';
													}
													?> 
												<option <?=$selected?> value="<?=$hourspermonth->id?>"><?=$hourspermonth->hourspermonth ?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="job_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_job as $job)
												{
													$selected = '';
													if($job->id == $value->job_id)
													{
														$selected = 'selected';
													}
													?> 
												<option <?=$selected?> value="<?=$job->id?>"><?=$job->job?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="natureofcontract_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_natureofcontract as $natureofcontract)
												{ 
													$selected = '';
													if($natureofcontract->id == $value->natureofcontract_id)
													{
														$selected = 'selected';
													}
													?> 
												<option <?=$selected?> value="<?=$natureofcontract->id?>"><?=$natureofcontract->natureofcontract?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="workingplace_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_workingplace as $workingplace)
												{ 
													$selected = '';
													if($workingplace->id == $value->workingplace_id)
													{
														$selected = 'selected';
													}
													
													?> 
												<option <?=$selected?> value="<?=$workingplace->id?>"><?=$workingplace->workingplace?></option>
											<?php	}
												?>
											</select>
										</div>
									</div>   


									 <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<span style="font-weight: bold;">Required Experiance</span>
										</div>

										<div class="col-md-2">
											<span style="font-weight: bold;">Required Diploma</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Required Document</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Job Category</span>
										</div>
											<div class="col-md-2">
											<span style="font-weight: bold;">Brut Salary</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Upload Picture</span>
										</div>

									</div>   


								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="requiredexperiance_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_requiredexperiance as $requiredexperiance)
												{ 
													$selected = '';
													if($requiredexperiance->id == $value->requiredexperiance_id)
													{
														$selected = 'selected';
													}
													
													?> 
												<option <?=$selected?> value="<?=$requiredexperiance->id?>"><?=$requiredexperiance->requiredexperiance?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control multiselect" multiple="" name="requireddiploma_id[]" required="">
												
												<?php
												$anotherarrayexplode = explode(",", $value->requireddiploma_id);
												foreach ($job_requireddiploma as $requireddiploma)
												{ 
													$selected = '';
													foreach ($anotherarrayexplode as $daanotae)
													{
														if($requireddiploma->id == $daanotae)
														{
															$selected = 'selected';
														}
													}
												
													?> 
												<option <?=$selected?> value="<?=$requireddiploma->id?>"><?=$requireddiploma->requireddiploma?></option>
											<?php	}
												?>
											</select>
										</div>
									   
									   
										<div class="col-md-2">
											<select style="width:100%" class="form-control multiselect" multiple required="" name="requireddocument_id[]">
												
												<?php
												$arrayexplode = explode(",", $value->requireddocument_id);
												foreach ($job_requireddocument as $requireddocument)
												{ 
													$selected = '';
													foreach ($arrayexplode as $datae)
													{
														if($requireddocument->id == $datae)
														{
															$selected = 'selected';
														}
													}
													
													?> 
												<option <?=$selected?> value="<?=$requireddocument->id?>"><?=$requireddocument->requireddocument?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" required="" name="jobcategory_id">
												<option value="">Select</option>
												<?php
												foreach ($job_jobcategory as $jobcategory)
												{ 
													$selected = '';
													if($jobcategory->id == $value->jobcategory_id)
													{
														$selected = 'selected';
													}
													?> 
												<option <?=$selected?> value="<?=$jobcategory->id?>"><?=$jobcategory->jobcategory?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<input type="text" name="brut_salary" class="form-control" required=""  value="<?=$value->brut_salary?>" > 
										</div>
										<div class="col-md-2">
											<input type="file" name="fileToUpload"  > 
											<input type="hidden" name="old_file_name" value="<?=$value->picture?>" > 
										</div>
									   <div class="col-md-1">
										   <img src="<?=base_url()?>uploads/job/<?=$value->picture?>" style="height: 30px;width: 30px">
									   </div>
									</div>   


									<div class="row" style="margin-top: 10px;">
										<div class="col-md-8">
											<span style="font-weight: bold;">Job Title</span>
										</div>


										<div class="col-md-2">
											<span style="font-weight: bold;"></span>
										</div>
									</div>   


								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-8">
											<input type="text" value="<?=$value->job_title?>" class="form-control" name="job_title" required="">
										</div>
										<div class="col-md-2">
											
										</div>
									   <div class="col-md-1">
										   
									   </div>
									</div>   


									<div class="row" style="margin-top: 10px;">
										<div class="col-md-10">
											<span style="font-weight: bold;">Job Description</span>
										</div>
									</div>   


									<div class="row" style="margin-top: 10px;">
										<div class="col-md-10">
											<textarea name="description" class="texteditor_term" rows="10"><?=$value->description?></textarea>
										</div>
									</div>   

									<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
										<div class="col-md-10">
											<a class="btn" style="float: right;cursor: pointer" onclick="JobsCancel()"><span class="delete-icon" >Cancel</span></a>
											<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
											<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
										</div>
									</div>

								</form>
						</div>
					<?php
					}
					?>
					</div>
						


						<div class="col-md-12 JobsAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
							<form action="" id="JobFormSave" method="post" style="width: 100%;background-image: none;">
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<span style="font-weight: bold;">Statut</span>
										</div>
										<div class="col-md-1" style="width:10%">
											<span style="font-weight: bold;">From Date</span>
										</div>
										<div class="col-md-1">
											<span style="font-weight: bold;">Time</span>
										</div>
										<div class="col-md-1" style="width:10%">
											<span style="font-weight: bold;">To Date</span>
										</div>
										<div class="col-md-1">
											<span style="font-weight: bold;">To Time</span>
										</div>


									</div>   


								   <div class="row" style="margin-top: 10px;">
									   <div class="col-md-2">
											<select style="width:100%" class="form-control getJobStatut" name="status_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_statut as $statut)
												{ ?>
													<option value="<?=$statut->id?>"><?=$statut->statut?></option>
												<?php 
												}
												?>
											</select>
										</div>
									   <div class="col-md-1" style="width:10%">
										   <input type="text" class="form-control bdatepicker" name="published_date" id="PublishedDate" required="" >  
										</div>
									   <div class="col-md-1">
											<input type="text" class="form-control timepicker1" name="published_time" id="PublishedTime" required="" > 
										</div>
										<div class="col-md-1" style="width:10%">
											<input type="text" class="form-control bdatepicker" name="to_date" id="ToDate" > 
										</div>
										
										<div class="col-md-1">
											<input type="text" class="form-control timepicker1" name="to_time" id="ToTime" >
										</div>

									</div>   



								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<span style="font-weight: bold;">Type of Contract</span>
										</div>

										<div class="col-md-2">
											<span style="font-weight: bold;">Hours per month</span>
										</div>
										
										<div class="col-md-2">
											<span style="font-weight: bold;">Nature of Contract</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Living Place</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Working Place</span>
										</div>

									</div>   


								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="typeofcontract_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_typeofcontract as $typeofcontract)
												{ ?> 
													<option value="<?=$typeofcontract->id?>"><?=$typeofcontract->typeofcontract?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="hourspermonth_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_hourspermonth as $hourspermonth )
												{ ?> 
													<option value="<?=$hourspermonth->id?>"><?=$hourspermonth->hourspermonth ?></option>
											<?php	}
												?>
											</select>
										</div>
									
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="natureofcontract_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_natureofcontract as $natureofcontract)
												{ ?> 
													<option value="<?=$natureofcontract->id?>"><?=$natureofcontract->natureofcontract?></option>
											<?php	}
												?>
											</select>
										</div>
											<div class="col-md-2">
											<select style="width:100%" class="form-control" name="job_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_job as $job)
												{ ?> 
													<option value="<?=$job->id?>"><?=$job->job?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="workingplace_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_workingplace as $workingplace)
												{ ?> 
													<option value="<?=$workingplace->id?>"><?=$workingplace->workingplace?></option>
											<?php	}
												?>
											</select>
										</div>
									</div>   


									 <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<span style="font-weight: bold;">Required Experiance</span>
										</div>

										<div class="col-md-2">
											<span style="font-weight: bold;">Required Diploma</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Required Document</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Job Category</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Brut Salary</span>
										</div>
										<div class="col-md-2">
											<span style="font-weight: bold;">Upload Picture</span>
										</div>

									</div>   


								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-2">
											<select style="width:100%" class="form-control" name="requiredexperiance_id" required="">
												<option value="">Select</option>
												<?php
												foreach ($job_requiredexperiance as $requiredexperiance)
												{ ?> 
													<option value="<?=$requiredexperiance->id?>"><?=$requiredexperiance->requiredexperiance?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control multiselect" multiple="" name="requireddiploma_id[]" required="">
												<?php
												foreach ($job_requireddiploma as $requireddiploma)
												{ ?> 
													<option value="<?=$requireddiploma->id?>"><?=$requireddiploma->requireddiploma?></option>
											<?php	}
												?>
											</select>
										</div>
									   
									 
										   
										<div class="col-md-2">
											<select style="width:100%" class="form-control multiselect" multiple="" required="" name="requireddocument_id[]">
												<?php
												foreach ($job_requireddocument as $requireddocument)
												{ ?> 
													<option value="<?=$requireddocument->id?>"><?=$requireddocument->requireddocument?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<select style="width:100%" class="form-control" required="" name="jobcategory_id">
												<option value="">Select</option>
												<?php
												foreach ($job_jobcategory as $jobcategory)
												{ ?> 
													<option value="<?=$jobcategory->id?>"><?=$jobcategory->jobcategory?></option>
											<?php	}
												?>
											</select>
										</div>
										<div class="col-md-2">
											<input type="text" name="brut_salary" class="form-control" required=""  > 
										</div>
										<div class="col-md-2">
											<input type="file" name="fileToUpload"  > 
										</div>
									</div>   


									<div class="row" style="margin-top: 10px;">
										<div class="col-md-8">
											<span style="font-weight: bold;">Job Title</span>
										</div>


										<div class="col-md-2">
											<span style="font-weight: bold;"></span>
										</div>
									</div>   


								   <div class="row" style="margin-top: 10px;">
										<div class="col-md-8">
											<input type="text" class="form-control" name="job_title" required="">
										</div>
										<div class="col-md-2">
											
										</div>
									</div>   


									<div class="row" style="margin-top: 10px;">
										<div class="col-md-10">
											<span style="font-weight: bold;">Job Description</span>
										</div>
									</div>   


									<div class="row" style="margin-top: 10px;">
										<div class="col-md-10">
											<textarea name="description" class="texteditor_term" rows="10"></textarea>
										</div>
									</div>   

									<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
										<div class="col-md-10">
											<a class="btn btn-default" style="float: right;cursor: pointer" onclick="JobsCancel()"><span class="delete-icon" >Cancel</span></a>
											<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn btn-default"><span class="save-icon"></span> Save</button>
											<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
										</div>
									</div>
								</form>
						</div>
                    </div>
					 
					 
					<div class="tab-pane fade" id="statut"> 
						<div class="listStatus" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="StatusAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="StatusEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="StatusDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-statut" value="">
									<thead>
										<tr>
											<th></th>
											<th>Statut</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_statut as $statut)
										{ ?>
											<tr>
												<td><input class="chk-statut-template" data-input="<?=$statut->id?>" type="checkbox"></td>
												<td><?=$statut->statut?></td>
												<td><?=$statut->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

					
						
					<div class="col-md-12 StatusDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
						<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
							<input  name="tablename" value="vbs_job_statut" type="hidden" >
							<input type="hidden" id="statutid" name="id" value="">
							<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
							<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
							<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
							<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="StatusCancel()">No</a>
						</form>
					</div>	
					
						
					<div class="StatusEdit" style="display: none;">	
					<?php
					foreach ($job_statut as $statut)
					{ ?>
						<div id="StatusEditview<?=$statut->id?>" class="StatusEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 10px;" >
												<span style="font-weight: bold;">Statut</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$statut->statut?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="vbs_job_statut" type="hidden" >
												<input  name="fieldname" value="statut" type="hidden" >
												<input type="hidden" value="<?=$statut->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="StatusCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>
						
						
						<div class="col-md-12 StatusAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						  <form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 10px;" >
													<span style="font-weight: bold;">Statut</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="vbs_job_statut" type="hidden" >
													<input  name="fieldname" value="statut" type="hidden" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;" onclick="StatusCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					 
					
					
                    <div class="tab-pane fade" id="Childrens">
						<div class="listChildrens" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="ChildrensAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="ChildrensEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="ChildrensDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-btn" value="0">
									<thead>
										<tr>
											<th></th>
											<th>Childrens</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 ChildrensDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" action="<?php echo base_url('admin/deletequotes');?>" style="padding: 30px;">
								<input type="hidden" id="submit-type" name="type" value="delete">
								<input type="hidden" id="delete-id" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected booking?</div>
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" href="#" style="margin-top: -11px;" onclick="ChildrensCancel()">No</a>
							</form>
						</div>


						<div class="col-md-12 ChildrensAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" id="submitdevisexpress" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 10px;" >
													<span style="font-weight: bold;">Childrens</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" type="text" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="ChildrensCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					 
                    <div class="tab-pane fade" id="Car">
						<div class="listCar" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="CarAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="CarEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="CarDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-btn" value="0">
									<thead>
										<tr>
											<th></th>
											<th>Car</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 CarDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" action="<?php echo base_url('admin/deletequotes');?>" style="padding: 30px;">
								<input type="hidden" id="submit-type" name="type" value="delete">
								<input type="hidden" id="delete-id" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected booking?</div>
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" href="#" style="margin-top: -11px;" onclick="CarCancel()">No</a>
							</form>
						</div>


						<div class="col-md-12 CarAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" id="submitdevisexpress" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 10px;" >
													<span style="font-weight: bold;">Car</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" type="text" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="CarCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					 
                    <div class="tab-pane fade" id="SituatonProfessionnelle">
						<div class="listSituatonProfessionnelle" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="SituatonProfessionnelleAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="SituatonProfessionnelleEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="SituatonProfessionnelleDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-btn" value="0">
									<thead>
										<tr>
											<th></th>
											<th>Situaton Professionnelle</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 SituatonProfessionnelleDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" action="<?php echo base_url('admin/deletequotes');?>" style="padding: 30px;">
								<input type="hidden" id="submit-type" name="type" value="delete">
								<input type="hidden" id="delete-id" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected booking?</div>
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" href="#" style="margin-top: -11px;" onclick="SituatonProfessionnelleCancel()">No</a>
							</form>
						</div>


						<div class="col-md-12 SituatonProfessionnelleAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" id="submitdevisexpress" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 5px;" >
													<span style="font-weight: bold;">Situaton Professionnelle</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" type="text" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="SituatonProfessionnelleCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					 
                   
                    <div class="tab-pane fade" id="SituationFamiliate">
						<div class="listSituationFamiliate" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="SituationFamiliateAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="SituationFamiliateEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="SituationFamiliateDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-btn" value="0">
									<thead>
										<tr>
											<th></th>
											<th>Situation Familiate  </th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 SituationFamiliateDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" action="<?php echo base_url('admin/deletequotes');?>" style="padding: 30px;">
								<input type="hidden" id="submit-type" name="type" value="delete">
								<input type="hidden" id="delete-id" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected booking?</div>
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" href="#" style="margin-top: -11px;" onclick="SituationFamiliateCancel()">No</a>
							</form>
						</div>


						<div class="col-md-12 SituationFamiliateAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" id="submitdevisexpress" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 5px;" >
													<span style="font-weight: bold;">Situation Familiate  </span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" type="text" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="SituationFamiliateCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img id="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					 
               
					<div class="tab-pane fade" id="TypeofContract"> 
						<div class="listTypeofContract" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="TypeofContractAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="TypeofContractEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="TypeofContractDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-typeofcontract" value="">
									<thead>
										<tr>
											<th></th>
											<th>Type of Contract</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_typeofcontract as $typeofcontract)
										{ ?>
											<tr>
												<td><input class="chk-typeofcontract-template" data-input="<?=$typeofcontract->id?>" type="checkbox"></td>
												<td><?=$typeofcontract->typeofcontract?></td>
												<td><?=$typeofcontract->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

						
						
						<div class="col-md-12 TypeofContractDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
								<input  name="tablename" value="job_typeofcontract" type="hidden" >
								<input type="hidden" id="typeofcontractid" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
								<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" href="#" style="margin-top: -11px;" onclick="TypeofContractCancel()">No</a>
							</form>
						</div>
						
						
					<div class="TypeofContractEdit" style="display: none;">	
					<?php
					
					foreach ($job_typeofcontract as $typeofcontract)
					{
					?>
						<div id="TypeofContractEditview<?=$typeofcontract->id?>" class="EditTypeofContractEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 10px;" >
												<span style="font-weight: bold;">Type of Contract</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$typeofcontract->typeofcontract?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_typeofcontract" type="hidden" >
												<input  name="fieldname" value="typeofcontract" type="hidden" >
												<input type="hidden" value="<?=$typeofcontract->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="TypeofContractCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>


						<div class="col-md-12 TypeofContractAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						<form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 10px;" >
													<span style="font-weight: bold;">Type of Contract</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_typeofcontract" type="hidden" >
													<input  name="fieldname" value="typeofcontract" type="hidden" >
												</div>

											</div>
										</div>
									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="TypeofContractCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					<div class="tab-pane fade" id="HoursPerMonth"> 
						<div class="listHoursPerMonth" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="HoursPerMonthAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="HoursPerMonthEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="HoursPerMonthDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-hourspermonth" value="">
									<thead>
										<tr>
											<th></th>
											<th>Hours Per Month</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_hourspermonth as $hourspermonth)
										{ ?>
											<tr>
												<td><input class="chk-hourspermonth-template" data-input="<?=$hourspermonth->id?>" type="checkbox"></td>
												<td><?=$hourspermonth->hourspermonth?></td>
												<td><?=$hourspermonth->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

							
						<div class="col-md-12 HoursPerMonthDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
								<input  name="tablename" value="job_hourspermonth" type="hidden" >
								<input type="hidden" id="hourspermonthid" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
								<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="HoursPerMonthCancel()">No</a>
							</form>
						</div>

						
					<div class="HoursPerMonthEdit" style="display: none;">	
					<?php
					foreach ($job_hourspermonth as $hourspermonth)
					{ ?>
						<div id="HoursPerMonthEditview<?=$hourspermonth->id?>" class="EditHoursPerMonthEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 10px;" >
												<span style="font-weight: bold;">Hours Per Month</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$hourspermonth->hourspermonth?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_hourspermonth" type="hidden" >
												<input  name="fieldname" value="hourspermonth" type="hidden" >
												<input type="hidden" value="<?=$hourspermonth->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="HoursPerMonthCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>

						<div class="col-md-12 HoursPerMonthAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 10px;" >
													<span style="font-weight: bold;">Hours Per Month</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_hourspermonth" type="hidden" >
													<input  name="fieldname" value="hourspermonth" type="hidden" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="HoursPerMonthCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					<div class="tab-pane fade" id="Job"> 
						<div class="listJob" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="JobAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="JobEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="JobDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-job" value="">
									<thead>
										<tr>
											<th></th>
											<th>Job</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_job as $job)
										{ ?>
											<tr>
												<td><input class="chk-job-template" data-input="<?=$job->id?>" type="checkbox"></td>
												<td><?=$job->job?></td>
												<td><?=$job->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

								
						<div class="col-md-12 JobDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
								<input  name="tablename" value="job_job" type="hidden" >
								<input type="hidden" id="jobid" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
								<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="JobCancel()">No</a>
							</form>
						</div>

						
					<div class="JobEdit" style="display: none;">	
					<?php
					foreach ($job_job as $job)
					{ ?>
						<div id="JobEditview<?=$job->id?>" class="JobEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 10px;" >
												<span style="font-weight: bold;">Job</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$job->job?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_job" type="hidden" >
												<input  name="fieldname" value="job" type="hidden" >
												<input type="hidden" value="<?=$job->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="JobCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>



						<div class="col-md-12 JobAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
							<form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 10px;" >
													<span style="font-weight: bold;">Job</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_job" type="hidden" >
													<input  name="fieldname" value="job" type="hidden" >
												</div>
										</div>
									</div>
									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn btn-default" style="float: right;" href="#" onclick="JobCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn btn-default"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					
					<div class="tab-pane fade" id="NatureofContract"> 
						<div class="listNatureofContract" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="NatureofContractAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="NatureofContractEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="NatureofContractDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-natureofcontract" value="">
									<thead>
										<tr>
											<th></th>
											<th>Nature of Contract </th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_natureofcontract as $natureofcontract)
										{ ?>
											<tr>
												<td><input class="chk-natureofcontract-template" data-input="<?=$natureofcontract->id?>" type="checkbox"></td>
												<td><?=$natureofcontract->natureofcontract?></td>
												<td><?=$natureofcontract->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 NatureofContractDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
								<input  name="tablename" value="job_natureofcontract" type="hidden" >
								<input type="hidden" id="natureofcontractid" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
								<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="NatureofContractCancel()">No</a>
							</form>
						</div>

						
					<div class="NatureofContractEdit" style="display: none;">	
					<?php
					foreach ($job_natureofcontract as $natureofcontract)
					{ ?>
						<div id="NatureofContractEditview<?=$natureofcontract->id?>" class="NatureofContractEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 10px;" >
												<span style="font-weight: bold;">Nature of Contract</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$natureofcontract->natureofcontract?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_natureofcontract" type="hidden" >
												<input  name="fieldname" value="natureofcontract" type="hidden" >
												<input type="hidden" value="<?=$natureofcontract->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="NatureofContractCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>



						<div class="col-md-12 NatureofContractAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 5px;" >
												<span style="font-weight: bold;">Nature of Contract </span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_natureofcontract" type="hidden" >
												<input  name="fieldname" value="natureofcontract" type="hidden" >
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="NatureofContractCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn btn-default"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					<div class="tab-pane fade" id="WorkingPlace"> 
						<div class="listWorkingPlace" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="WorkingPlaceAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="WorkingPlaceEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="WorkingPlaceDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-workingplace" value="">
									<thead>
										<tr>
											<th></th>
											<th>Working Place</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_workingplace as $workingplace)
										{ ?>
											<tr>
												<td><input class="chk-workingplace-template" data-input="<?=$workingplace->id?>" type="checkbox"></td>
												<td><?=$workingplace->workingplace?></td>
												<td><?=$workingplace->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 WorkingPlaceDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
								<input  name="tablename" value="job_workingplace" type="hidden" >
								<input type="hidden" id="workingplaceid" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
								<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="WorkingPlaceCancel()">No</a>
							</form>
						</div>

						
					<div class="WorkingPlaceEdit" style="display: none;">	
					<?php
					foreach ($job_workingplace as $workingplace)
					{ ?>
						<div id="WorkingPlaceEditview<?=$workingplace->id?>" class="WorkingPlaceEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 10px;" >
												<span style="font-weight: bold;">Working Place</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$workingplace->workingplace?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_workingplace" type="hidden" >
												<input  name="fieldname" value="workingplace" type="hidden" >
												<input type="hidden" value="<?=$workingplace->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="WorkingPlaceCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>
						
						
						
						<div class="col-md-12 WorkingPlaceAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 5px;" >
													<span style="font-weight: bold;">Working Place</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_workingplace" type="hidden" >
													<input  name="fieldname" value="workingplace" type="hidden" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="WorkingPlaceCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					<div class="tab-pane fade" id="RequiredExperiance"> 
						<div class="listRequiredExperiance" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="RequiredExperianceAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="RequiredExperianceEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="RequiredExperianceDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-requiredexperiance" value="">
									<thead>
										<tr>
											<th></th>
											<th>Required Experiance</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_requiredexperiance as $requiredexperiance)
										{ ?>
											<tr>
												<td><input class="chk-requiredexperiance-template" data-input="<?=$requiredexperiance->id?>" type="checkbox"></td>
												<td><?=$requiredexperiance->requiredexperiance?></td>
												<td><?=$requiredexperiance->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

						<div class="col-md-12 RequiredExperianceDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
							<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
								<input  name="tablename" value="job_requiredexperiance" type="hidden" >
								<input type="hidden" id="requiredexperianceid" name="id" value="">
								<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
								<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
								<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
								<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="RequiredExperianceCancel()">No</a>
							</form>
						</div>

						
					<div class="RequiredExperianceEdit" style="display: none;">	
						<?php
						foreach ($job_requiredexperiance as $requiredexperiance)
						{ ?>
						<div id="RequiredExperianceEditview<?=$requiredexperiance->id?>" class="RequiredExperianceEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 5px;" >
												<span style="font-weight: bold;">Required Experiance</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$requiredexperiance->requiredexperiance?>" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_requiredexperiance" type="hidden" >
													<input  name="fieldname" value="requiredexperiance" type="hidden" >
												<input type="hidden" value="<?=$requiredexperiance->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="RequiredExperianceCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>
						


						<div class="col-md-12 RequiredExperianceAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
								<form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 5px;" >
													<span style="font-weight: bold;">Required Experiance</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_requiredexperiance" type="hidden" >
													<input  name="fieldname" value="requiredexperiance" type="hidden" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="RequiredExperianceCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					
					<div class="tab-pane fade" id="RequiredDiploma"> 
						<div class="listRequiredDiploma" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="RequiredDiplomaAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="RequiredDiplomaEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="RequiredDiplomaDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-requireddiploma" value="">
									<thead>
										<tr>
											<th></th>
											<th>Required Diploma</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_requireddiploma as $requireddiploma)
										{ ?>
											<tr>
												<td><input class="chk-requireddiploma-template" data-input="<?=$requireddiploma->id?>" type="checkbox"></td>
												<td><?=$requireddiploma->requireddiploma?></td>
												<td><?=$requireddiploma->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

					
					<div class="col-md-12 RequiredDiplomaDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
						<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
							<input  name="tablename" value="job_requireddiploma" type="hidden" >
							<input type="hidden" id="requireddiplomaid" name="id" value="">
							<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
							<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
							<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
							<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="RequiredDiplomaCancel()">No</a>
						</form>
					</div>

						
					<div class="RequiredDiplomaEdit" style="display: none;">	
						<?php
						foreach ($job_requireddiploma as $requireddiploma)
						{ ?>
						<div id="RequiredDiplomaEditview<?=$requireddiploma->id?>" class="RequiredDiplomaEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 5px;" >
												<span style="font-weight: bold;">Required Diploma</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$requireddiploma->requireddiploma?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_requireddiploma" type="hidden" >
												<input  name="fieldname" value="requireddiploma" type="hidden" >
												<input type="hidden" value="<?=$requireddiploma->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="RequiredDiplomaCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>
						

						<div class="col-md-12 RequiredDiplomaAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 5px;" >
													<span style="font-weight: bold;">Required Diploma</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_requireddiploma" type="hidden" >
													<input  name="fieldname" value="requireddiploma" type="hidden" >
												</div>
											</div>
										</div>
									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="RequiredDiplomaCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					<div class="tab-pane fade" id="RequiredDocument"> 
						<div class="listRequiredDocument" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="RequiredDocumentAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="RequiredDocumentEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="RequiredDocumentDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-requireddocument" value="">
									<thead>
										<tr>
											<th></th>
											<th>Required Document</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($job_requireddocument as $requireddocument)
										{ ?>
											<tr>
												<td><input class="chk-requireddocument-template" data-input="<?=$requireddocument->id?>" type="checkbox"></td>
												<td><?=$requireddocument->requireddocument?></td>
												<td><?=$requireddocument->create_date?></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
			

					<div class="col-md-12 RequiredDocumentDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
						<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
							<input  name="tablename" value="job_requireddocument" type="hidden" >
							<input type="hidden" id="requireddocumentid" name="id" value="">
							<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
							<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
							<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
							<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="RequiredDocumentCancel()">No</a>
						</form>
					</div>

						
					<div class="RequiredDocumentEdit" style="display: none;">	
						<?php
						foreach ($job_requireddocument as $requireddocument)
						{ ?>
						<div id="RequiredDocumentEditview<?=$requireddocument->id?>" class="RequiredDocumentEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 5px;" >
												<span style="font-weight: bold;">Required Document</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$requireddocument->requireddocument?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_requireddocument" type="hidden" >
												<input  name="fieldname" value="requireddocument" type="hidden" >
												<input type="hidden" value="<?=$requireddocument->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="RequiredDocumentCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>


						<div class="col-md-12 RequiredDocumentAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
							<form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 5px;" >
												<span style="font-weight: bold;">Required Document</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_requireddocument" type="hidden" >
												<input  name="fieldname" value="requireddocument" type="hidden" >
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="RequiredDocumentCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					
					<div class="tab-pane fade" id="JobCategory"> 
						<div class="listJobCategory" >
								<div class="filter-group">
								  <div class="col-md-8" style="padding-left: 0px;">
									  <form  method="get" action="" style="padding-top: 0px;background: none;" >
											<span style="float: left;padding: 3px;padding-top: 10px">Search keyword</span>
												<input type="text" name="searchword"  class="form-control" style="width: 20%;float:left; "  value="<?=!empty($this->input->get('searchword'))?$this->input->get('searchword'):''?>" />
											<span style="float: left;padding: 3px;padding-top: 10px">From</span>
												<input type="text" name="from_period" class="datepicker" style="width: 13%;float:left;height: 34px; "  value="<?=!empty($this->input->get('from_period'))?$this->input->get('from_period'):''?>" /> 
											<span style="float: left;padding: 3px;padding-top: 10px">To</span>
												<input type="text" name="to_period" class="datepicker" style="width: 13%;float:left;height: 34px; " value="<?=!empty($this->input->get('to_period'))?$this->input->get('to_period'):''?>"/>
											<input class="btn" type="submit"  value="Search" style="float:left;width: 8%;" />
											<a class="btn" style="float: left" href="<?=base_url()?>admin/quotes.php"> Reset </a>
										</form>
									</div>

									<div class="col-md-4">
										<div class="page-action">
											<a class="btn" onclick="JobCategoryAdd()"><span class="add-icon"> Add</span></a>&nbsp;
											<a class="btn" onclick="JobCategoryEdit()"><span class="edit-icon"> Edit</span></a>&nbsp;
											<a class="btn" onclick="JobCategoryDelete()"><span class="delete-icon">Delete</a>&nbsp;
										</div>
									</div>
								</div>
								<table class="table table-bordered data-table dataTable">
									<input type="hidden" class="clicked-jobcategory" value="">
									<thead>
										<tr>
											<th></th>
											<th>Job Category</th>
											<th>Created Date</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($job_jobcategory as $jobcategory)
										{ ?>
											<tr>
												<td><input class="chk-jobcategory-template" data-input="<?=$jobcategory->id?>" type="checkbox"></td>
												<td><?=$jobcategory->jobcategory?></td>
												<td><?=$jobcategory->create_date?></td>
											</tr>
									<?php }
										?>
									</tbody>
								</table>
							</div>
			

					<div class="col-md-12 JobCategoryDelete" style="border:1px solid #ccc;padding: 0px; display: none;">
						<form method="post" class="DeleteAccountRecord" action="" style="padding: 30px;">
							<input  name="tablename" value="job_jobcategory" type="hidden" >
							<input type="hidden" id="jobcategoryid" name="id" value="">
							<div style="display: inline-block;float:left;margin-right: 10px;"> Are you sure you want to delete selected?</div>
							<img class="displayimageloader" style="float: left; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
							<input class="btn" type="submit" id="search_by" value="Yes" style="float:left;width: 50px;margin-top: -11px;margin-right: 10px;" />
							<a class="btn" style="margin-top: -11px;cursor: pointer;" onclick="JobCategoryCancel()">No</a>
						</form>
					</div>

						
					<div class="JobCategoryEdit" style="display: none;">	
						<?php
							foreach ($job_jobcategory as $jobcategory)
						{  ?>
						<div id="JobCategoryEditview<?=$jobcategory->id?>" class="JobCategoryEditEdit" style="display: none;">
							<form  class="SaveEditForm" method="post" style="width: 100%;background-image: none;" enctype="multipart/form-data">
								
								<div class="row" style="margin-top: 10px;">
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-4" style="margin-top: 5px;" >
												<span style="font-weight: bold;">Job Category</span>
											</div>
											<div class="col-md-8" style="padding: 0px;">
												<input required="" class="form-control" value="<?=$jobcategory->jobcategory?>" name="fieldvalue" type="text" >
												<input  name="tablename" value="job_jobcategory" type="hidden" >
													<input  name="fieldname" value="jobcategory" type="hidden" >
												<input type="hidden" value="<?=$jobcategory->id?>" name="id">
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;cursor: pointer;"  onclick="JobCategoryCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>
						</div>
					<?php
					}
					?>
					</div>



						<div class="col-md-12 JobCategoryAdd" style="border:1px solid #ccc;padding-left:3px;margin-bottom: 10px;display: none; ">
						   <form action="" class="ConfigServiceForm" method="post" style="width: 100%;background-image: none;">

									<div class="row" style="margin-top: 10px;">
										
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-4" style="margin-top: 5px;" >
													<span style="font-weight: bold;">Job Category</span>
												</div>
												<div class="col-md-8" style="padding: 0px;">
													<input required="" class="form-control" name="fieldvalue" type="text" >
													<input  name="tablename" value="job_jobcategory" type="hidden" >
													<input  name="fieldname" value="jobcategory" type="hidden" >
												</div>

											</div>
										</div>
										
							

									</div>


								<div class="row" style="margin-bottom: 10px;margin-top: 20px;">
									<div class="col-md-3">
										<a class="btn" style="float: right;" href="#" onclick="JobCategoryCancel()"><span class="delete-icon" >Cancel</span></a>
										<button style="padding: 3px 13px;margin-right: 10px;float:right;" type="submit" class="btn"><span class="save-icon"></span> Save</button>
										<img class="displayimageloader" style="float: right; margin-right: 10px;display: none;" src="<?php echo base_url() . 'assets/css/loading.gif' ?>" />
									</div>
								</div>

							</form>

						</div>
                    </div>
					
					
                </div>


<script src="<?=base_url()?>assets/css/tinymce/js/tinymce/tinymce.min.js"></script>
 
<script>
	
	
$('document').ready(function(){
		
	$('.multiselect').multiselect({
		columns: 1,
		placeholder: 'Select',
		search: true,
		selectAll: true
	});
	
	$(".UpdateMainJob").on('submit',(function(e) {
			e.preventDefault();
			$('.displayimageloader').show();
		formData.append('<?php echo $this->security->get_csrf_token_name();?>','<?php echo $this->security->get_csrf_hash();?>');	
			$.ajax({
				url:"<?=base_url();?>Rectruitement_config/UpdateSaveJob",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					$('.displayimageloader').hide();
			location.reload();
				},
		   });
		}));
	
	
	
	$("#JobFormSave").on('submit',(function(e) {
			e.preventDefault();
			$('.displayimageloader').show();
				var formData =new FormData(this);
			formData.append('<?php echo $this->security->get_csrf_token_name();?>','<?php echo $this->security->get_csrf_hash();?>');
			$.ajax({
					url:"<?=base_url();?>Rectruitement_config/SaveJob",
				type: "POST",
				data:  formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					$('.displayimageloader').hide();
					location.reload();
					
				},
		   });
		}));
	
	});	

	
	$('body').delegate('.getJobStatutDynamic','change',function(){
		var id = $(this).attr('id');
		var  value = $(this).find("option:selected").text();
		var CurrentDate = $('#CurrentDate').val();
		var CurrentTime = $('#CurrentTime').val();
		if(value == "Published")
		{
			$('#PublishedDate'+id).val(CurrentDate);
			$('#PublishedTime'+id).val(CurrentTime);
//			$('#ToDate'+id).prop('disabled', true);
//			$('#ToTime'+id).prop('disabled', true);
			$('#ToDate'+id).val('');
			$('#ToTime'+id).val('');
		}
		else
		{
			
			$('#PublishedDate'+id).val("");
			$('#PublishedTime'+id).val("");
//			$('#ToDate'+id).prop('disabled', false);
//			$('#ToTime'+id).prop('disabled', false);
		}
	});
	
	
	$('body').delegate('.getJobStatut','change',function(){
		var  value = $(".getJobStatut option:selected").text();
		var CurrentDate = $('#CurrentDate').val();
		var CurrentTime = $('#CurrentTime').val();
		if(value == "Published")
		{
			$('#PublishedDate').val(CurrentDate);
			$('#PublishedTime').val(CurrentTime);
//			$('#ToDate').prop('disabled', true);
//			$('#ToTime').prop('disabled', true);
			$('#ToDate').val('');
			$('#ToTime').val('');
		}
		else
		{
			
			$('#PublishedDate').val("");
			$('#PublishedTime').val("");
//			$('#ToDate').prop('disabled', false);
//			$('#ToTime').prop('disabled', false);
		}
	});
	

	
	$('.DeleteAccountRecord').submit(function(e){
			e.preventDefault();
			var formData = new FormData();
			var contact = $(this).serializeArray();
			$.each(contact, function (key, input) {
				formData.append(input.name, input.value);
			});
			
			$('.displayimageloader').show();
		formData.append('<?php echo $this->security->get_csrf_token_name();?>','<?php echo $this->security->get_csrf_hash();?>');
			$.ajax({
					type:'POST',
					url:"<?=base_url();?>Rectruitement_config/ConfigDelete",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'JSON',
					success:function(data){
						$('.displayimageloader').hide();
						location.reload();
					}
			});
	  });
	  
	  

	$('.ConfigServiceForm').submit(function(e){
			e.preventDefault();
			var formData = new FormData();
			var contact = $(this).serializeArray();
			$.each(contact, function (key, input) {
				formData.append(input.name, input.value);
			});
		
	formData.append('<?php echo $this->security->get_csrf_token_name();?>','<?php echo $this->security->get_csrf_hash();?>');
			$('.displayimageloader').show();
		formData.append('<?php echo $this->security->get_csrf_token_name();?>','<?php echo $this->security->get_csrf_hash();?>');
			$.ajax({
					type:'POST',
					url:"<?=base_url();?>Rectruitement_config/ConfigPost",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'JSON',
					success:function(data){
						$('.displayimageloader').hide();
						location.reload();
					}
			});
	  });

		
	$('.SaveEditForm').submit(function(e){
			e.preventDefault();
			var formData = new FormData();
			var contact = $(this).serializeArray();
			$.each(contact, function (key, input) {
				formData.append(input.name, input.value);
			});
			
			$('.displayimageloader').show();
		formData.append('<?php echo $this->security->get_csrf_token_name();?>','<?php echo $this->security->get_csrf_hash();?>');
			$.ajax({
					type:'POST',
					url:"<?=base_url();?>Rectruitement_config/ConfigUpdate",
						data: formData,
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'JSON',
					success:function(data){
						$('.displayimageloader').hide();
						location.reload();
					}
			});
	  });



  tinymce.init({ 
        selector:'.texteditor_term',
        plugins:'link code image textcolor',
        toolbar: [
        "undo redo | styleselect | bold italic | link image",
        "alignleft aligncenter alignright Justify | forecolor backcolor",
        "fullscreen"
    ]
  });
  
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
  	
	$( ".datepicker" ).datepicker({
			dateFormat: "dd-mm-yy",
			regional: "fr"
	});
</script>
<script>
    $(document).ready(function(){
	$('.timepicker1').timepicki({
		show_meridian:false,
		min_hour_value:0,
		max_hour_value:23,
		overflow_minutes:true,
		increase_direction:'up',
		
	});
		
		

		
        $("#from_period").wl_Date({ dateFormat: 'dd/mm/yy' });
        $("#to_period").wl_Date({ dateFormat: 'dd/mm/yy' });

        $.fn.stickyTabs = function( options ) {
            var context = this

            var settings = $.extend({
                getHashCallback: function(hash, btn) { return hash }
            }, options );

            // Show the tab corresponding with the hash in the URL, or the first tab.
            var showTabFromHash = function() {
              var hash = window.location.hash;
              var selector = hash ? 'a[href="' + hash + '"]' : 'li.active > a';
              $(selector, context).tab('show');
            }

            // We use pushState if it's available so the page won't jump, otherwise a shim.
            var changeHash = function(hash) {
              if (history && history.pushState) {
                history.pushState(null, null, '#' + hash);
              } else {
                scrollV = document.body.scrollTop;
                scrollH = document.body.scrollLeft;
                window.location.hash = hash;
                document.body.scrollTop = scrollV;
                document.body.scrollLeft = scrollH;
              }
            }

            // Set the correct tab when the page loads
            showTabFromHash(context)

            // Set the correct tab when a user uses their back/forward button
            $(window).on('hashchange', showTabFromHash);

            // Change the URL when tabs are clicked
            $('a', context).on('click', function(e) {
              var hash = this.href.split('#')[1];
              var adjustedhash = settings.getHashCallback(hash, this);
              changeHash(adjustedhash);
            });

            return this;
        };

        $('.nav-tabs').stickyTabs();

    });

</script>
