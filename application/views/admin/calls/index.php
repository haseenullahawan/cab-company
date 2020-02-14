<?php $locale_info = localeconv(); ?>
<style>
    @media only screen and (min-width: 1400px){
        .table-filter input, .table-filter select{
            max-width: 9% !important;
        }
        .table-filter select{
            max-width: 95px !important;
        }
        .table-filter .dpo {
            max-width: 90px !important;
        }
    }
</style>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <div class="row">
            <div class="col-md-12">
                <?php
                $flashAlert =  $this->session->flashdata('alert');
                if(isset($flashAlert['message']) && !empty($flashAlert['message'])){?>
                    <br>
                    <div style="padding: 5px 12px" class="alert <?=$flashAlert['class']?>">
                        <strong><?=$flashAlert['type']?></strong> <?=$flashAlert['message']?>
                        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="module">
                    <div class="module-head">
                        <!--<h3> <?php if(isset($title)) echo $title;?></h3>-->
                    </div>
                    <?php $this->load->model('calls_model'); ?>
                    <div class="module-body table-responsive">
                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                            <tr>
                                <th class="no-sort text-center">#</th>
                                <th class="column-id"><?php echo $this->lang->line('id');?></th>
                                <th class="column-date"><?php echo $this->lang->line('date');?></th>
                                <th class="column-time"><?php echo $this->lang->line('time');?></th>
                                <th class="column-civility"><?php echo $this->lang->line('civility');?></th>
                                <th class="column-first_name" ><?php echo $this->lang->line('first_name');?></th>
                                <th class="column-last_name"><?php echo $this->lang->line('last_name');?></th>
                                <th class="column-subject"><?php echo $this->lang->line('subject');?></th>
                                <th class="column-email"><?php echo $this->lang->line('email');?></th>
                                <th class="column-phone"><?php echo $this->lang->line('phone');?></th>
                                <th class="column-subject"><?php echo $this->lang->line('subject');?></th>
                                <th class="column-status"><?php echo $this->lang->line('status');?></th>
                                <th class="column-since"><?php echo $this->lang->line('since');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($data) && !empty($data)):?>
                                <?php $days = (int) $popups->request_closing_days_1; ?>
                                <?php foreach($data as $key => $item):?>
                                    <?php 
                                        $now = time();
                                        $your_date = strtotime($item->last_action);
                                        $datediff = $now - $your_date;
                                        $diff = round($datediff / (60 * 60 * 24));
                                        if($days != 0){
                                            if($diff >= $days){
                                                if($item->status != "Closed"){
                                                    $this->calls_model->update(array('status'=>'Closed'), $item->id);
                                                }
                                            }
                                        }
                                        
                                        $now1 = time();
                                        $your_date1 = strtotime($item->reminder_update_date);
                                        $datediff1 = $now1 - $your_date1;
                                        $diff1 = round($datediff1 / (60 * 60 * 24));
                                        if(!empty($reminder)){
                                            if($reminder->reminder_days != ""){
                                                $reminder_days = explode(',', $reminder->reminder_days);
                                                if($item->reminder_update_date != ""){
                                                    $reminder_day = $reminder_days[$item->reminder_count];
                                                    if($diff1 == $reminder_day){
                                                        if($item->reminder_email_sent == 1){
                                                            $this->request_model->update(array('reminder_email_sent'=>0), $item->id);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        if(!empty($reminder)){
                                            if($item->status == "Replied"){
                                                if($reminder->reminder_days != ""){
                                                    $reminder_days = explode(',', $reminder->reminder_days);
                                                    $days_count = count($reminder_days);
                                                    if($item->reminder_update_date != ""){
                                                        $reminder_day = $reminder_days[$item->reminder_count];
                                                        if($diff1 == $reminder_day){
                                                            $count = $item->reminder_count + 1;
                                                            if($count <= $days_count){
                                                                if($item->reminder_email_sent == 0){
                                                                    $this->request_model->update(array('reminder_update_count'=>$count, 'reminder_email_sent'=>1), $item->id);
                                                                    $message .= $reminder->message;
                                                                    $subject = $reminder->subject;
                                                                    $subject = str_replace("{quote_request_subject}","Demande de Devis Handi-Express.fr",$subject);	
                                                                    $message = str_replace("Reply : {last_quote_request_user_reply}","",$message);	
                                                                    $message = str_replace("{quote_request_sender_email}",$item->email,$message);
                                                                    $message = str_replace("{quote_request_date}",from_unix_date($item->created_at),$message);
                                                                    $message = str_replace("{quote_request_time}",from_unix_time($item->created_at),$message);
                                                                    $message = str_replace("{quote_request_civility}",$item->civility,$message);
                                                                    $message = str_replace("{quote_request_first_name}",$item->first_name,$message);
                                                                    $message = str_replace("{quote_request_last_name}",$item->last_name,$message);
                                                                    $message = str_replace("{quote_request_company_name}",$item->company,$message);
                                                                    $message = str_replace("Subject : {quote_request_subject}","",$message);
                                                                    $message = str_replace("{quote_request_message}",$item->message,$message);
                                                                    if($item->status == "New"){
                                                                        $message .= '<div class="row section-company-info" style=" background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);margin: 10px 0px;max-height: 600px;border: 2px solid #a4a8ab;padding:10px;">
                                                                        <div class="col-md-5">
                                                                            <div class="text_company">';
                                                                        if(isset($company_data['name']) && !empty($company_data['name'])){
                                                                            $message .= '<p><span>'.$company_data["name"].'</span></p>';
                                                                        }
                                                                        if(isset($company_data['email']) && !empty($company_data['email'])){
                                                                            $message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Email:</span><span>'.$company_data['email'].'</span></p>';
                                                                        }
                                                                        if(isset($company_data['phone']) && !empty($company_data['phone'])){
                                                                            $message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Phone:</span><span>'.$company_data['phone'].'</span></p>';
                                                                        }
                                                                        if(isset($company_data['fax']) && !empty($company_data['fax'])){
                                                                            $message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Fax:</span><span>'.$company_data['fax'].'</span></p>';
                                                                        }
                                                                        if(isset($company_data['website']) && !empty($company_data['website'])){
                                                                            $message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Website:</span><span>'.$company_data['website'].'</span></p>';
                                                                        }
                                                                        if(isset($company_data['city']) && !empty($company_data['city'])){
                                                                            $message .= '<p><span style="font-weight: 600;font-size: 16px;width: 60px;display: inline-block;">Address:</span><span>'.$company_data['city'].' '.$company_data['country'].'</span></p>';
                                                                        }
                                                                        $message .= '<p class="social_icons">';
                                                                            if(isset($company_data['facebook_link']) && !empty($company_data['facebook_link'])){
                                                                                $message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['facebook_link'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
                                                                            }
                                                                            if(isset($company_data['youtube_link']) && !empty($company_data['youtube_link'])){
                                                                                $message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['youtube_link'].'" target="_blank"><i class="fa fa-youtube"></i></a>';
                                                                            }
                                                                            if(isset($company_data['instagram_link']) && !empty($company_data['instagram_link'])){
                                                                                $message .= '<a style="font-size: 12px;display: inline-block;height: 25px;width: 25px;background: #fff;border-radius: 50%;text-align: center;line-height: 25px;margin-right: 15px;" href="'.$company_data['instagram_link'].'" target="_blank"><i class="fa fa-instagram"></i></a>';
                                                                            }
                                                                        $message .= '</p>
                                                                        </div>
                                                                            </div>
                                                                            <div class="col-md-7" style="margin-top: 15px;">
                                                                                <div class="profile_image">';
                                                                        $message .= '<a href="" class="company_image"><img style="width: 100%;max-width: 300px;max-height: 370px;"';
                                                                        if(isset($company_data['logo']) && !empty($company_data['logo'])){
                                                                            $message .= 'src="'.base_url('uploads/company').'/'.$company_data['logo'].'"';
                                                                        }
                                                                        $message .= 'alt=""></a>';
                                                                        $message .= '</div>
                                                                            </div>
                                                                        </div>';
                                                                    }
                                                                    $check = sendReply($item,$subject,$message,"",$MAIL,array($item->status));
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    <tr <?php if($item->unread == 1){ ?> class="unread" <?php }?>>
                                        <td>
                                            <input type="checkbox" data-id="<?=$item->id;?>" class="checkbox singleSelect">
                                        </td>
                                        <td>
                                            <a href="<?=site_url("admin/calls/".$item->id."/edit")?>">
                                                <?=create_timestamp_uid($item->created_at,$item->id);?>
                                            </a>
                                        </td>
                                        <td><?=from_unix_date($item->created_at)?></td>
                                        <td><?=from_unix_time($item->created_at)?></td>
                                        <td><?=$item->civility;?></td>
                                        <td><?=$item->first_name;?></td>
                                        <td><?=$item->last_name;?></td>
                                        <td><?=$item->company;?></td>
                                        <td><?=$item->email;?></td>
                                        <td><?=$item->telephone;?></td>
                                        <td><?=$item->subject;?></td>
                                        <td><?=$item->status?></td>
                                        <td style="white-space: nowrap"><?=timeDiff($item->last_action);?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>

<div id="table-filter" class="hide">
    <input type="text" placeholder="Name" data-name="name" class="form-control">
    <select class="form-control" data-name="subject">
        <option value="">All Subject</option>
        <?php foreach(config_model::$call_subjects as $key => $subject):?>
            <option <?=set_value('subject',$this->input->post('subject')) == $subject ? "selected" : ""?> value="<?=$subject?>"><?=$subject?></option>
        <?php endforeach;?>
    </select>
    <input type="text" placeholder="Email" data-name="email" class="form-control">
    <input type="text" placeholder="Phone" data-name="phone" class="form-control">
    <select class="form-control" data-name="status">
        <option value="">All Status</option>
        <?php foreach(config_model::$status as $key => $status):?>
            <option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
        <?php endforeach;?>
    </select>
    <input type="text" placeholder="From" data-name="date_from" class="dpo">
    <input type="text" placeholder="To" data-name="date_to" class="dpo">
</div>