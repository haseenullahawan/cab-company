</header>
    <div class="container-fluid body-bg">
        <div class="container body-border"><!--padding-p-0 -->
            <div class="breadcrumb">
                <div class="row">
                   <aside class="nav-links">
                      <ul>
                         <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page');?>  </a> </li>
                         <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                      </ul>
                   </aside>
                </div>
            </div>
            
            <h3><strong>Notre grille tarifaire 2018</strong></h3> 
      <p> Nos Tarifs sont Clairs et Nets (aucun Frais suplémentaire,aucune adhésion,ou frais de dossier,Un budget maitrisé (vous connaissez à l'avance le prix des préstations commandées). </p> 
      <p> Nos Tarifs sont mis à jour le 1er janvier de chaque année et ils sont à titre d'information, vous pouvez avoir un devis personnalisé Gratuitement à tout moment par Tel: 01 48 13 09 34 ou en ligne via votre espace client. (Tous nos prix sont exprimés en TTC, avant et après réduction d'impôt). </p> 
      <h2>Transport de personnes à mobilité réduite (TPMR) ) :</h2> 
            
            <div class="col-md-12 prices-page">
                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/system_design/images/payment/cash-payment.png" alt="Cash Payment" title="Cash Payment"/></div>   
                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/system_design/images/payment/cheque-payment.png" alt="Cheque Payment" title="Cheque Payment"/></div>   
                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/system_design/images/payment/cc-payment.png" alt="Credit Card Payment" title="Credit Card Payment"/></div> 
                <!--<ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#recurrent">Reccurrent</a></li>
                    <li><a data-toggle="tab" href="#onetime">One Time</a></li>
                </ul>
                <div class="tab-content">-->
                    <div id="recurrent" class="tab-pane fade in active">&nbsp;
                        <div class="table-responsive" style="margin-top:-15px;">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="price-header">
                                    <tr>
                                        <th><?php echo $this->lang->line('our_packages');?></th>
                                        <!--<th><?php // echo $this->lang->line('car');?></th>-->
                                        <th class="day-price"><?php echo $this->lang->line('package_price');?><br/>(<?php echo $this->lang->line('start_from');?>)</th>
                                        <!--<th class="day-price"><?php // echo $this->lang->line('Day');?></th>-->
                                        <th class="min-fee"><?php echo $this->lang->line('minimum_fee');?><br/>(<?php echo $this->lang->line('start_from');?>)</th>
                                        <th class="night"><?php echo $this->lang->line('Night');?><br/>(<?php echo $this->lang->line('start_from');?>)</th>
                                        <th class="not-wday"><?php echo $this->lang->line('not_working_day');?><br/>(<?php echo $this->lang->line('start_from');?>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   if(count($records) > 0) : ?>
                                    <?php   $sno = 1; 
                                            foreach ($records as $r) { 
                                                $package_price = $r->charge_distance;
                                                $night_price = ($r->charge_distance/100)*25 + $r->charge_distance;
                                                $not_working_day_price = $r->charge_distance + 39;
                                    ?>
                                    <tr>
                                        <td class="srv-name"><?php echo $r->name;?></td>
                                        <!--<td><?php echo $this->lang->line('vehicle') . ":". $r->vehicle_name . "<br/>" . "Model: " . $r->model ?></td>-->
                                        <td class="day-col"><?php echo $package_price;?> <i class="fa fa-euro"></i></td>
                                        <!--<td class="day-col"><?php echo $package_price; ?> <i class="fa fa-euro"></i></td>-->
                                        <td class="fee-col"><?php echo $r->min_cost; ?> <i class="fa fa-euro"></i></td>
                                        <td class="night-col"><?php echo $night_price; ?> <i class="fa fa-euro"></i></td>
                                        <td class="not-wday-col"><?php echo $not_working_day_price; ?> <i class="fa fa-euro"></i></td>
                                    </tr>
                                    <?php } ?>
                                    <?php   endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                    
                    <div class="tarfs-content"> 
        <p><span>N.B :</span> le prix des péages et du parking sont à la charge du client, ou il peut être rajouté en supplément au prix du trajet à la demande du client.</p> 
        <p><span>N.B :</span> tout PMR supplémentaire sera facturé au prix d'une prise en charge supplémentaire</p> 
        <p><span>N.B :</span> à la demande du client un siége bébé peut être installé dans le véhicule et sera facturé à 5 euros TTC/siége bébé.</p> 
        <p><span>N.B : </span>tout animal de companie (en dehors de chien guide pour aveugle) est facturé à 10 euros TTC/animal de companie.</p> 
        <p><span>N.B :</span> au delà d'un bagage par passager, tout bagage supplémentaire est facturé à 5 euros TTC/bagage.</p> 
        <p><span>N.B :</span> le montant minimum facturé par trajet est de 49 euros TTC.</p> 
        <p><span>N.B :</span> tout attente au delà des 10 premiéres minutes sera facturé au prix de 33,80 euros/heure soit 0,56 euros/min et de 27,80 euros/heure pour les clients réguliers soit 0,56 euros/min.</p> 
        <p><span>N.B :</span> Nos Tarifs sont calculés en fonction du type de transport sollicité,la technicité des intervenants, les plages horaires.N'hésitez pas à demander un devis personnalisé en Ligne ou par Téléphone (c'est Gratuit et ça ne vous engage à rien).</p> 
        <p><span>N.B :</span> Nos Tarifs sont Dégressifs selon le volume de trajets commandé.n'hésitez pas à nous consulter pour un devis personnalisé</p> 
        <p><span>N.B :</span> Conformément aux dispositions de la loi en vigueur, une majoration des prix est appliquée: elle est de 20% pour les trajets de nuit, et un supplément de 20 euros pour les trajets du dimanche et des jours fériés, et de 100% pour les trajets du 1er mai.</p> 
        <p><span>N.B :</span> tous nos véhicules sont aménagés pour personne à mobilité réduite,et accessibles pour les personnes en fauteuil roulant.</p> 
        <br> 
        <p><span>N.B :</span> Tous nos chauffeurs sont qualifiés,experimentés, et détenteurs de l'AFPS (attestation de formation premiers secours).rigoureusement séléctionnés pour leurs compétences ainsi que pour leurs qualités et valeurs humaines.</p> 
        <p><span>N.B : </span>Nos prix sont un gage de qualité,parceque vous avez le droit d'être éxigeant.tous nos intervenants sont payés correctement,Handi Express a adopté une charte de qualité car notre objectif est toujours mieux vous servir,n'attendez plus,confiez-vous au professionnel du transport de personnes à mobilité réduite.</p> 
        <p><span>N.B : </span>le montant de la prise en charge : c'est le montant du service d'accompagnement et installation et descente du véhicule d'un PMR.</p> 
        <p><span>N.B :</span> *le montant d'approche : c'est le montant du trajet entre la position du véhicule disponible et le lieu de prise en charge du client.</p> 
        <p><span>N.B :</span> *Nous acceptons les paiements par : chéque, Espéce et carte bancaire au bord du véhicule(faudra le préciser lors de votre réservation).paiement comptant sauf pour nos clients abonnés  
      </div> 
                    
                    
                    
                </div>
            </div>
        </div>
