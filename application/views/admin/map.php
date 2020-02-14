<style type="text/css">
    .trackFlight #map{width:100%;height:500px;margin:auto;}
    .trackFlight #panel{width:345px;float:left;margin-bottom:10px;}
    #container #destinationForm{margin:0px 0px 20px 0px;background:#EEEEEE;padding:10px 20px;border:solid 1px #C0C0C0;}
    #container #destinationForm input[type=text]{border:solid 1px #C0C0C0;}
    .adp-distance, .adp-summary{font-weight: bolder;padding: 5px;}
    .adp-distance{text-align: center;}
    .adp-summary {background: #FFEE06;text-align:left;font-size: 15px;}
  </style>
<div class="col-md-12 padding white right-p">
   <div class="content trackFlight">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-12 padding-p-r">
         <div class="row">
             <div id="destinationForm">
                <form action="" method="get" name="direction" id="direction">
                    <div class="col-md-4">
                       <label>Point de départ :</label>
                       <input type="text" name="origin" id="origin" class="location">
                        <label>Destination :</label>
                        <input type="text" name="destination" id="destination" class="location">
                        <input type="button" value="Calculer l'itinéraire" onclick="javascript:calculate()">
                        <div id="panel"></div>
                    </div>
                    <div class="col-md-8">
                        <div id="map" style="margin-bottom: 10px;border-radius:6px;border:solid 1px #aaa;">
                            <p>Veuillez patienter pendant le chargement de la carte...</p>
                        </div>
                    </div>
                </form>
            </div>
            
            
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
</div>
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>-->

  