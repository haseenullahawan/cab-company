<style type="text/css">
    .map-page img{width:170% !important;margin-left:-10px;}
    .infotrafic img:last-child {display:none;}
    .infotrafic {padding-bottom: 10px;}
</style>
<div class="col-md-12 padding white right-p map-page">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
        <div class="col-md-12 padding-p-r">
         <div class="infotrafic">
             <!--<iframe src="http://widget.infotrafic.com/infotrafic/blog/infotrafic.html" frameborder="0" scrolling="no" width="100%" height="426" id="infoTraffic"></iframe>-->
             <!--<table border="0" cellspacing="3" cellpadding="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif; font-size:12px; line-height:1.2; font-weight:bold;"><tr><td><a href="http://www.infotrafic.com/affiliation.php" target="_blank">Trafic routier</a> > <a href="http://www.infotrafic.com/affiliation.php?region=FRANC" target="_blank">France</a> > <a href="http://www.infotrafic.com/affiliation.php?region=IDF" target="_blank">Ile de France</a></td></tr><tr><td><script type="text/javascript" src="http://www.infotrafic.com/js/affiliate.js.php?Affi=4d25d0b82c69a3cf84a0d2b73c7e7f5d"> </script></td></tr><tr><td>Contenu proposé par <a href="http://www.infotrafic.com/affiliation.php" target="_blank"> Infotrafic© </a> Cliquez <a href="http://www.infotrafic.com/affiliation.php" target="_blank">ici</a> pour plus d'informations</td></tr></table>-->
             <!--<table border="0" cellspacing="3" cellpadding="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif; font-size:12px; line-height:1.2; font-weight:bold;"><tr><td><a href="http://www.infotrafic.com/affiliation.php" target="_blank">Trafic routier</a> > <a href="http://www.infotrafic.com/affiliation.php?region=FRANC" target="_blank">France</a> > <a href="http://www.infotrafic.com/affiliation.php?region=IDF" target="_blank">Ile de France</a></td></tr><tr><td><script type="text/javascript" src="http://www.infotrafic.com/js/affiliate.js.php?Affi=eb22c9400c1d5bdfe396e6173909d832"> </script></td></tr></table>-->
             <table border="0" cellspacing="3" cellpadding="0" bgcolor="#F1F1F1" style="background:#f1f1f1;font-family:Arial,Helvetica,sans-serif; font-size:12px; line-height:1.2; font-weight:bold;"><tr><td><script type="text/javascript" src="http://www.infotrafic.com/js/affiliate.js.php?Affi=fed3c91e253acd0766d103ea882f69e0"> </script></td></table>
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
</div>

