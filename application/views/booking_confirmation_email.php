<?php $locale_info = localeconv(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>  
        <base href="https://handi-express.limovtc.fr/" />
        <title>Réservation en ligne</title> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="robots" content="index,follow" >
        <style type="text/css">
        /* Fonts and Content */
        * { -webkit-box-sizing: border-box;
               -moz-box-sizing: border-box;
                    box-sizing: border-box;
        }
        body {margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
        body, #body_style {
            min-height:1000px; 
            color:#272727; 
            font-family: "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", "Luxi Sans", sans-serif;
            font-size:12px;} 
        td {font-family: "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", "Luxi Sans", sans-serif; font-size:12px; }

            .ExternalClass {width:100%;}
            .yshortcuts {color: #F00;}
            p {margin:0; padding:0; margin-bottom:10px;} /*optional*/
            a, a:link, a:visited {/*color:-$Teinte2_color1-*/} /*optional*/   
            ul {margin:0; padding:0; padding-bottom:10px; margin-bottom:10px;}
            li {margin:0; padding:0; margin-left:25px;}

        @media only screen and (max-width: 480px) { 
            table[class=w600], td[class=w600], img[class=w600] { width:300px !important; }
            table[class=w560], td[class=w560], img[class=w560] { width:280px !important; }
            table[class=w480], td[class=w480], img[class=w480] { width:280px !important; }
            table[class=w420], td[class=w420], img[class=w420] { width:210px !important; }
            table[class=w279], td[class=w279], img[class=w279] { width:280px !important; }
            table[class=w140], td[class=w140], img[class=w140] { width:70px !important; }
            table[class=w186], td[class=w186], img[class=w186] { width:280px !important; }
            table[class=w182], td[class=w182], img[class=w182] { width:280px !important; }
            table[class=w130], td[class=w130], img[class=w130] { width:200px !important; }
            table[class=w80], td[class=w80], img[class=w80] { width:280px !important; }
            table[class=w66], td[class=w66], img[class=w66] { width:80px !important; }
            table[class=w93], td[class=w93], img[class=w93] { width:140px !important; }
            table[class=w20], td[class=w20], img[class=w20] { width:10px !important; }  
            img{ height:auto;}
        } 

        </style>
        <meta name="viewport" content="width=device-width" />
</head>
   <body style="margin:0px; padding:0px; -webkit-text-size-adjust:none; min-height:1000px; color:#000000; font-family:'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', 'Luxi Sans', sans-serif; font-size:12px" alink="#" link="#" text="#000000" bgcolor="#ededed"> 
	<span id="body_style" style="display:block; padding-top:15px;background:#ededed;"> 
        <center>                      
        
        <table cellpadding="0" cellspacing="0" class="w600" width="600" border="0" bgcolor="#ffffff" style="border-left-width:1px; border-top-width:1px; border-right-width:1px; border-left-style:solid; border-top-style:solid; border-right-style:solid; border-color:#dcdcdc; background:#ffffff; border-collapse:collapse;">
            <tbody>                            
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" height="15"></td>
                    <td class="w20" width="20"></td>
                </tr>
                <!-- ENTETE -->
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" align="center" valign="top"><a href="http://navetteo.fr" target="_blank"><img src="http://navetteo.fr/assets/system_design/images/email-logo.png" border="0" alt="" width="200" height="150"></a></td> <!--alt="NOM DU CLIENT"-->
                    <td class="w20" width="20"></td>
                </tr>
                <!-- Border -->
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" height="15" style="border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#dcdcdc; border-collapse:collapse;"></td>
                    <td class="w20" width="20"></td>
                </tr>
                <!-- Séparation -->
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" height="15"></td>
                    <td class="w20" width="20"></td>
                </tr>
            </tbody>
        </table>
        <table cellpadding="0" cellspacing="0" class="w600" width="600" border="0" bgcolor="#ffffff" style="border-left-width:1px; border-left-style:solid; border-right-width:1px; border-right-style:solid; border-color:#dcdcdc; background:#ffffff; border-collapse:collapse;">
            <tbody>
                <!-- contenu -->
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" style="font-family:'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', 'Luxi Sans', sans-serif; font-size:12px; color:#272727; text-align:left;" align="left">
                        <p><?php echo $this->lang->line('hello');?>,</p>
                        <p><?php echo $this->lang->line('booking_email_label'); ?><?php echo $journey_details['booking_ref'];?></p>
<p><!-- Template de mail pour l'email automatique ref n°5  -->
<table width="560" class="w560" style="color: #000000; font-size: 12px; width: 560px;" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
    <tbody>
        <tr>
            <td width="560" class="w560" style="color: #ffffff; font-size: 12px; padding: 4px; border-width: 1px; border-style: solid; border-color: #ffffff;" bgcolor="#ED2939" width="560"><strong></strong></td>
        </tr>
        <tr>
            <td  align="left" valign="top" width="560" class="w560">
                <table width="186" class="w186" style="border: 1px solid #ffffff;" border="0" cellspacing="0" cellpadding="0" align="left" bgcolor="#f6f6f6">
                    <tbody>
                        <tr style="height:40px;">
                            <td  style="font-size: 14px; color: #ffffff; text-transform: uppercase;" colspan="2" align="center" valign="middle" bgcolor="#1274ac" width="186" class="w186" height="24"><span style="mso-table-lspace: 0; mso-table-rspace: 0;"><strong><?php echo $this->lang->line('pick_up_location');?></strong></span></td>
                        </tr>
                        <tr>
                            <td  style="padding: 4px;" colspan="2" valign="top" width="186" class="w186" height="70"> <?php echo $journey_details['pick_up'];?> </td>
                        </tr>
                        <tr>
                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 10px;" align="center" valign="middle" bgcolor="#343434" width="130" class="w130" height="20">Date</td>
                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 10px;" align="center" valign="middle" bgcolor="#343434" width="66" class="w66" height="20">Heure</td>
                        </tr>
                        <tr>
                            <td  style="color: #ffffff; font-size: 16px;" align="center" valign="middle" bgcolor="#343434" width="130" class="w130" height="40"><?php echo $journey_details['pick_date'];?></td>
                            <td  style="color: #ffffff; font-size: 16px;" align="center" valign="middle" bgcolor="#343434" width="66" class="w66" height="40"><?php echo $journey_details['pick_time'];?></td>
                        </tr>
                    </tbody>
                </table>
                <table width="186" class="w186" style="border: 1px solid #ffffff;" border="0" cellspacing="0" cellpadding="0" align="left" bgcolor="#f6f6f6">
                    <tbody>
                        <tr style="height:40px;">
                            <td  style="font-size: 14px; color: #ffffff; text-transform: uppercase;" colspan="2" align="center" valign="middle" bgcolor="#1274ac" width="186" class="w186" height="24"><span style="mso-table-lspace: 0; mso-table-rspace: 0;"><strong><?php echo $this->lang->line('drop_of_location');?></strong></span></td>
                        </tr>
                        <tr>
                            <td  style="padding: 4px;" colspan="2" valign="top" width="186" class="w186" height="70"><?php echo $journey_details['drop_of'];?> </td>
                        </tr>
                        <tr>
                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 10px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="20">Distance</td>
                            <td  style="color: #f6f6f6; text-transform: uppercase; font-size: 10px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="20"><?php echo $this->lang->line('amount');?></td>
                        </tr>
                        <tr>
                            <td  style="color: #ffffff; font-size: 16px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="40"><?php echo $journey_details['total_distance'];?></td>
                            <td  style="color: #ffffff; font-size: 16px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="40"><?php echo $journey_details['total_cost'] . " " . $this->lang->line($locale_info['currency_symbol']);?></td>
                        </tr>
                    </tbody>
                </table>
                <table width="187" class="w182" style="border: 1px solid #ffffff;" border="0" cellspacing="0" cellpadding="0" align="left" bgcolor="#f6f6f6">
                    <tbody>
                        <tr style="height:40px;">
                            <td colspan="2" style="font-size: 14px; color: #ffffff; text-transform: uppercase;" align="center" valign="middle" bgcolor="#1274ac" width="182" class="w182" height="24"><span style="mso-table-lspace: 0; mso-table-rspace: 0;"><strong><?php echo $this->lang->line('passenger');?></strong></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 4px;" valign="top" width="182" class="w182" height="70"><p style="margin:0px 0px 5px;"><?php echo $this->lang->line('name') ?>: <?php echo $user['username'];?></p><p style="margin:0px 0px 5px;"><?php echo $this->lang->line('email'); ?>: <?php echo $user['email'];?></p><p style="margin:0px 0px 5px;"><?php echo $this->lang->line('phone'); ?>: <?php echo $user['phone'];?></p> </td>
                        </tr>
                        <tr>
                            <td style="color: #f6f6f6; text-transform: uppercase; font-size: 10px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="20"><?php echo $this->lang->line('vehicles');?></td>
                            <td style="color: #f6f6f6; text-transform: uppercase; font-size: 10px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="20"><?php echo $this->lang->line('status');?></td>
                        </tr>
                        <tr>
                            <td style="color: #ffffff; font-size: 16px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="40"><?php echo $journey_details['car_name'] . ",<br/>" . $journey_details['car_model'];?></td>
                            <td style="color: #ffffff; font-size: 16px;" align="center" valign="middle" bgcolor="#343434" width="93" class="w93" height="40"><?php echo $this->lang->line('status_pending');?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div><img src='http://navetteo.fr/assets/system_design/images/wheelchair-gray.png' style="line-height:45px;margin-right:5px;top:5px;position:relative;" /><?php echo $this->lang->line('wheelchair') ?> :  <?php echo $journey_details['wheelchair']; ?> </div>
                <div><img src='http://navetteo.fr/assets/system_design/images/members.png' style="line-height:45px;margin-right:5px;top:5px;position:relative;" /> <?php echo $this->lang->line('passenger_capacity') ?> : <?php echo $journey_details['passengers_capacity']; ?> </div>
                <div><img src='http://navetteo.fr/assets/system_design/images/lauage.png' style="line-height:45px;margin-right:5px;top:5px;position:relative;" /> <?php echo $this->lang->line('large_luggage_capacity') ?> : <?php echo $journey_details['large_luggage_capacity'] ?> </div>
                <div><img src="http://navetteo.fr/assets/system_design/images/bags.png" style="line-height:45px;margin-right:5px;top:5px;position:relative;" /> <?php echo $this->lang->line('small_luggage_capacity') ?> :  <?php echo $journey_details['small_luggage_capacity'] ?> </div>
            </td>
        </tr>
        <tr>
            <td  style="color: #000000; font-size: 12px; padding: 4px; border-width: 1px; border-style: solid; border-color: #ffffff;" bgcolor="#f6f6f6" width="560"></td>
        </tr>
    </tbody>
</table></p>
<p>
	<p>Bien cordialement.</p>
	<p style="margin-bottom: 5px;">Navetteo</p>
</p>
<!--footer.tpl-->
                    </td>
                    <td class="w20" width="20"></td>
                </tr>
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" height="15"></td>
                    <td class="w20" width="20"></td>
                </tr>
            </tbody>
        </table>
        <table cellpadding="0" cellspacing="0" class="w600" width="600" border="0" bgcolor="#ffffff" style="border-left-width:1px; border-bottom-width:1px; border-right-width:1px; border-left-style:solid; border-bottom-style:solid; border-right-style:solid; border-color:#dcdcdc; background:#ffffff; border-collapse:collapse;">
            <tr>
                <td><p style="padding:5px;"><?php echo $this->lang->line('booking_email_note'); ?></p></td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" class="w600" width="600" border="0" bgcolor="#ffffff" style="border-left-width:1px; border-bottom-width:1px; border-right-width:1px; border-left-style:solid; border-bottom-style:solid; border-right-style:solid; border-color:#dcdcdc; background:#ffffff; border-collapse:collapse;">
            <tbody>
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" height="15" style="border-top-width:1px; border-top-style:solid; border-top-color:#dcdcdc;"></td>
                    <td class="w20" width="20"></td>
                </tr>
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" align="left" style="font-size:10px; color:#000;">NAVETTEO SAS, 10 Rue de Penthièvre, 75008 Paris. SIRET : 81257428300014 TVA intra : FR 50 812574283<br ><b>Email :</b> contact@navetteo.fr <?php if ($this->lang->lang() == 'fr') { ?><b>Tel :</b> <?php } else { ?> <b>Phone :</b><?php } ?> 01 85 09 02 32  <b>Fax :</b> 01 85 09 02 33  </td>
                    <td class="w20" width="20"></td>
                </tr>
                <tr>
                    <td class="w20" width="20"></td>
                    <td class="w560" width="560" height="15"></td>
                    <td class="w20" width="20"></td>
                </tr>
            </tbody>
        </table>
        </center>
    </span>

    </body>
</html>