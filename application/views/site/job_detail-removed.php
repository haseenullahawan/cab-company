<style>
    .jobimg img{
            border: 4px solid #b38e8e;
    border-radius: 15px;
    }
    .mybbtt{
            display: inline-block !important;
    position: relative;
    right: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 50px !important;
    bottom: 0 !important;
    top: 0 !important;
    transform: rotate(0deg) !important;
    }
    .myjob_detail h1{
        
    }
    .Ap_btn{
            width: 300px;
    margin: 21px auto;
    }
</style>

<div class="container">
   
        <div class="row">
        <div class="myjob_detail">
        <div class="row ">
            <div class="col-md-12">
                
                <div class="col-md-12" style="background: linear-gradient(to bottom, #fbfbfb 0%, #ececec 39%, #ececec 39%, #c1c1c1 100%) !important; padding-right: 30px;
    padding-left: 30px;" >
                     <div class="breadcrumb">
        <div class="row">
            <aside class="nav-links">
                <ul>
                    <li> <a href="<?=base_url()?>"><i class="fa fa-home"></i> Accueil  </a> </li>
                    <li class="active"><a href="javascript:void(0)">&nbsp; Job Detail </a></li>
                </ul>
            </aside>
        </div>
    </div>
             <?php $job=$job_detail->row(); 
             //echo "<pre>"; print_r($job); echo "</pre>"; 
             ?>
            <div class="col-md-3">
                <div class="jobimg">
                    <img src="<?=base_url('uploads/job/'.$job->picture)?>" class="img-responsive">
                </div>
            </div>
            <div class="col-md-4">
                <ul class="" style="    list-style: none;">
                     <li class=""><span class="pull-left">Job Title</span> <span class="pull-right"><?=$job->job_title?></span> <div class="clearfix"></div></li>
   <li class=""><span class="pull-left">Living Place</span> <span class="pull-right"><?=$job->job?></span> <div class="clearfix"></div></li>
 <li class=""><span class="pull-left">Working Place</span> <span class="pull-right"><?=$job->workingplace?></span> <div class="clearfix"></div></li>
  <li class=""><span class="pull-left">Type of Contract</span> <span class="pull-right"><?=$job->typeofcontract?></span> <div class="clearfix"></div></li>
<!--  <li class=""><span class="pull-left">Statut</span> <span class="pull-right"><?=$job->statut?></span> <div class="clearfix"></div></li>
--> 
  <li class=""><span class="pull-left">Hours Per Month</span> <span class="pull-right"><?=$job->hourspermonth?></span> <div class="clearfix"></div></li>

 
</ul>
            </div>
            <div class="col-md-4" >
                 
                <ul class="" style="    list-style: none;">
  <li class=""><span class="pull-left">Required Experiance</span> <span class="pull-right"><?=$job->requiredexperiance?></span> <div class="clearfix"></div></li>
  <li class=""><span class="pull-left">Published Date</span> <span class="pull-right"><?=$job->published_date,' '.$job->published_time?></span> <div class="clearfix"></div></li>
  <li class=""><span class="pull-left">To date Time</span> <span class="pull-right"><?=$job->to_date,' '.$job->to_time?></span> <div class="clearfix"></div></li>
  <li class=""><span class="pull-left">Job Category</span> <span class="pull-right"><?=$job->jobcategory?></span> <div class="clearfix"></div></li>
  <li class=""><span class="pull-left">Nature of Contract</span> <span class="pull-right"><?=$job->natureofcontract?></span> <div class="clearfix"></div></li>

</ul>
            </div>
            <div class="col-md-12">
                <p>
                   <?=$job->description ?> 
                </p> 
                <div class="Ap_btn">
                    <button class="btn-successs contact-opener-3 mybbtt"> Apply Now</button>
                </div>
                </div>
          
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </div>
        </div>
</div>