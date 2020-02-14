   <style>



        .close span {



            text-indent: 0;



            display: inline;
            color: red;



        }







        .btn-circle {



            border-radius: 50%;



            margin-right: 5px;



        }







        .btn-circle.btn-sm {



            padding: 2px 6px;



            margin-top: 5px;



            outline: none;



        }







        #noteDIv .row {



            margin-bottom: 10px;



        }







        #attachDiv input[type='file'] {



            margin-top: 5px;



            outline: none;



        }







        .dataTables_wrapper .dataTables_filter input {



            margin-right: 2px;



            margin-left: 0 !important;



            max-width: 86px !important;



            width: 100% !important;



            float: right;



        }







        .toolbar {



            float: right;



            margin-right: 4px;



        }







        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {



            background: #fefefe;



        }







        .table-filter {



        }







        .table-filter input, .table-filter select {



            max-width: 6.6%;



            float: left;



            width: 100%;



            height: 32px !important;



            padding: 2px !important;



            margin-right: 2px !important;



            font-size: 12px;



        }







        .table-filter select {



            max-width: 80px;



        }







        .table-filter .dpo {



            max-width: 98px;



        }







        .attach-label {



            padding-top: 10px;



            width: 18%;



            float: left;



            text-align: center;



        }







        .attach-div {



            padding-top: 5px;



            display: inline-block;



            width: 82%;



            float: right;



            text-align: right;



        }







        .attach-file {



            overflow: hidden;



            width: 75%;



            float: left



        }







        .attach-buttons {



            width: 25%;



            float: right



        }







        .normal-addon {



            border: 0;



            background: #f5f5f5 !important;



        }



        



        .navbar-badge {



            position: absolute !important;



            right: 4px !important;



            top: -2px !important;



            background: #ff0000 !important;



        }



        



        .btn-group>.btn {



            height:40px !important;



            line-height:30px !important;



        }



        .modal.left .modal-dialog,

    .modal.right .modal-dialog {

        position: fixed;

        margin: auto;

        width: 320px;

        height: 100%;

        -webkit-transform: translate3d(0%, 0, 0);

        -ms-transform: translate3d(0%, 0, 0);

        -o-transform: translate3d(0%, 0, 0);

        transform: translate3d(0%, 0, 0);

        color: #000;

    }



    .modal.left .modal-content,

    .modal.right .modal-content {

        height: 100%;

        overflow-y: auto;

    }

    

    .modal.left .modal-body,

    .modal.right .modal-body {

        padding: 15px 15px 80px;

    }
.modal-body{
    background: #f1f1f1;
}


/*Left*/

    .modal.left.fade .modal-dialog{

        z-index: 9999;

        left: -320px;

        -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;

           -moz-transition: opacity 0.3s linear, left 0.3s ease-out;

             -o-transition: opacity 0.3s linear, left 0.3s ease-out;

                transition: opacity 0.3s linear, left 0.3s ease-out;

    }

    

    .modal.left.fade.in .modal-dialog{

        left: 0;

    }

        

/*Right*/

    .modal.right.fade .modal-dialog {

        right: -320px;

        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;

           -moz-transition: opacity 0.3s linear, right 0.3s ease-out;

             -o-transition: opacity 0.3s linear, right 0.3s ease-out;

                transition: opacity 0.3s linear, right 0.3s ease-out;

    }

    

    .modal.right.fade.in .modal-dialog {

        right: 0;

    }



/* ----- MODAL STYLE ----- */

    .modal-content {

        border-radius: 0;

        border: none;

    }



    .modal-header {

        border-bottom-color: #e1e0e0;

        background-color: #f1f1f1;

    }



/* ----- v CAN BE DELETED v ----- */





.demo {

    padding-top: 60px;

    padding-bottom: 110px;

}



.btn-demo {

    margin: 15px;

    padding: 10px 15px;

    border-radius: 0;

    font-size: 16px;

    background-color: #FFFFFF;

}



.modal-backdrop {

    position: fixed;

    top: 0;

    right: 0;

    bottom: 0;

    left: 0;

    z-index: 1040;

    background-color: transparent !important;

    opacity: inherit !important;

}

[data-title] {
  position: relative;
}

[data-title]:hover::before {
    content: attr(data-title);
    display: block;
    white-space: pre-wrap;
    position: absolute;
    bottom: -80px;
    padding: 3px 6px;
    z-index: 9999;
    border-radius: 2px;
    background: #000;
    color: #fff;
    font-size: 12px;
    font-family: sans-serif;
    left: 0px;
    width: 200px;
    overflow-wrap: break-word;
}
[data-title]:hover::after {
    content: '';
    display: block;
    white-space: pre-wrap;
    position: absolute;
    bottom: -1px;
    left: 10px;
    display: inline-block;
    color: #fff;
    border: 8px solid transparent;
    border-bottom: 8px solid #000;
}

<style type="text/css">

            .card{

                background-color: #fff;

            }

            .card-body3{

                padding: 15px;

            }

            .height-div3{

                height: 100%;

                overflow-y: auto;

            }

            .height-div3::-webkit-scrollbar{

                background-color: #e7e7e7;

                width: 5px;

            }

            .height-div3::-webkit-scrollbar-thumb{

                background-color: lightgrey;

                width: 5px;

            }

         

            .user-image-div .circle-rounded{

                border-radius: 100%;

                width: 50px;
                border: 1px solid #dadada;
                padding: 1px;

            }

            .filter-div select{
                border: solid 1px #bfbfbf;
                background: linear-gradient(to bottom, #fff 0, #e0e0e0 100%);
                /*margin-bottom: 0px;*/

            }
            .quickreply_selectdd{
                border: solid 1px #bfbfbf;
                background: linear-gradient(to bottom, #fff 0, #e0e0e0 100%);
                display: inline-block;
                width: 150px !important;
                /*margin-bottom: 0px;*/

            }

            .users-chat-div{

                clear: both;

                border-bottom: 1.5px solid lightgrey;

                padding: 10px;

                position: relative;

                cursor: pointer;
                padding-left: 5px;
                background: linear-gradient(to bottom, #fbfbfb 0%, #ececec 39%, #ececec 39%, #c1c1c1 100%);
            }

            .users-chat-div2{

                clear: both;

                border-bottom: 1.5px dashed lightgrey;

                padding-bottom: 8px;

                position: relative;

            }

            .users-chat-div:hover{

                background-color: #d3d3d34d;

            }

            .user-image-div,.usercontent-div{

                display: inline-block;

                clear: both;

            }

            .user-image-div{

                float: left;

            }

            .usercontent-div{

                padding-left: 10px;

            }

            .usercontent-div p{

                margin: 0px;

            }

            .chat-badge{

                position: absolute;

                top: 28px;

                right: 5px;

                background-color: red;

            }

            .chat-badge-time{

                position: absolute;

                top: 2px;

                right: 10px;

                color: grey;

            }

            .real-chat-badge{

                position: absolute;

                top: 0px;

                right: 10px;

                color: grey;

            }

            .fa-circle2{

                position: absolute;

                bottom: 11px;

                left: 45px;

                border: 2px solid #fff;

                border-radius: 100%;

            }

            .status_active{

                color: green;

            }

            .usercontent-div p:nth-child(2) {

                color: grey;

            }

            .fa-check{

                color: lightgrey;

            }

            .reply-div-ul{

                margin: 0px !important;

                margin-left: 0px !important;

                padding-left: 0px !important;

                list-style-type: none;

            }

            .reply-div-ul li{

                float: left;

                padding-right: 15px;

                cursor: pointer;

            }

            .replybtn{

                color: silver !important;

                padding: 6px 10px !important;

                height: inherit !important;

            }

            textarea {

                overflow: auto;

                resize: none;

            }

            .detail-content p{

                margin-bottom: 5px;

            }

            .chat-main{

    position: fixed;

    width: 300px;

    bottom: 0;

    left: 350px;
        background-color: #f5f5f5;

}

.chat-header{

    background: linear-gradient(to bottom, rgb(222, 215, 215) 0%,rgba(255,255,255,1) 49%,rgb(224, 222, 222) 100%) !important;

    padding-top: 1px;

    padding-bottom: 1px;

}

.username i{

    font-size: 9px;

}

.username h6{

    display: inline-block;

    font-size: 12px;

    font-weight: 600;

}
#userchatname{
    color: #000;
}
.options {
    color: #000;
}

.options i{

    font-size: 14px;

    font-weight: normal;

    opacity: 0.7;

}

.options .live-video{

    font-size: 6px;

}

.chats{

    height: 260px;

    overflow-x: scroll;

    overflow-x: hidden;

}

.chats ul li{

    list-style: none;

    clear: both;

    font-size: 13px;

}

.chats .send-msg{

    float: right;

}

.receive-msg img{

    border-radius: 100%;

    height: 40px;

    width: 40px;
    border: 1px solid #dadada;
    padding: 1px;

}

.receive-msg-img{

    display: inline;

}

.receive-msg .receive-msg-desc{

    /*display: inline-block;*/

}

.receive-msg .receive-msg-desc p{

    background: lightgrey;

    display: inline-block;

}

.message-box input{

    border: none;

    font-size: 13px;

        background-color: #f5f5f5;

}

.message-box input:focus{

    outline: none;

}

.tools i{

    color: #a1a1a1;

    cursor: pointer;

    font-size: 20px;

    margin-right: 6px;

}

.rounded-top {

    border-top-left-radius: .25rem!important;

    border-top-right-radius: .25rem!important;

}

.text-white {

    color: #fff!important;

}

.border {

    border: 1px solid #dee2e6!important;

}

.rounded {

    border-radius: .25rem!important;

}

.pr-2, .px-2 {

    padding-right: .5rem!important;

}

.pl-2, .px-2 {

    padding-left: .5rem!important;

}

.mb-1, .my-1 {

    margin-bottom: .25rem!important;

}

.message-box input:focus{

    box-shadow: none !important;

}

input:hover, input:focus, textarea:hover, textarea:focus{

    box-shadow: none !important;

}

.switch {

  position: relative;

  display: inline-block;

  width: 50px;

  height: 20px;

  left: -7px;

}



.switch input { 

  opacity: 0;

  width: 0;

  height: 0;

}



.slider {

  position: absolute;

  cursor: pointer;

  top: 0;

  left: 0;

  right: 0;

  bottom: 0;

  background-color: #ccc;

  -webkit-transition: .4s;

  transition: .4s;

}



.slider:before {

    position: absolute;

    content: "";

    height: 16px;

    width: 16px;

    left: 4px;

    bottom: 2px;

    background-color: white;

    -webkit-transition: .4s;

    transition: .4s;

}



input:checked + .slider {

  background-color: ;

}



input:focus + .slider {

  box-shadow: 0 0 1px #3e9d38;

}



input:checked + .slider:before {

  -webkit-transform: translateX(26px);

  -ms-transform: translateX(26px);

  transform: translateX(26px);

   background-color: #3e9d38;

}



/* Rounded sliders */

.slider.round {

  border-radius: 34px;

}



.slider.round:before {

  border-radius: 50%;

}

.popover-content {

    padding: 5px 5px;

}

.quickchatreply{

    padding: 0px;

    margin: 0px;

}

.quickchatreply li{

    list-style-type: none;

    padding: 5px;

    border-radius: 5px;

    cursor: pointer;

}

.quickchatreply li:hover{

    background-color: #e5e5e5;

}



#chatsbox ul li a{

    color: ;

}

.receive-msg-desc img{
    border-radius: 0px;
    width: 150px;
    height: 150px;
}
.image_name{
    display: block !important;
    background-color: transparent !important;
}
.bgcolor{
    background-color: lightgrey;
    border-radius: 5px;
    padding: 5px;
}
.dateandtime_class{
    display: block;
    font-size: 10px;
    text-align: left;
    line-height: 1;
}
.border-line{
    border: 1px solid #dee2e6;
    position: relative;
    left: -8px;
    width: 298px;
    margin-top: 9px;
    margin-bottom: 5px;
}


        </style>

    <div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content" style="overflow: inherit;">



                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <!-- <h4 class="modal-title" id="myModalLabel"> Chating </h4> -->

                    <?



                        $CI2 =& get_instance();

                        $CI2->load->model('my_model');

                        $language2 = $CI->my_model->get_table_row_query2("SELECT * FROM vbs_header_settings");

                        // print_r($language2['chat_status']);

                    ?>

                    <div class="filter-div card-body text-center">

                        <label class="switch" style="margin-bottom: -6px;">

                          <input type="checkbox" id="chatboxswitch" value="active" <?php if($language2['chat_status']=="active"){echo "checked";}else{} ?>>

                          <span class="slider round"></span>

                        </label>

                        <select class="form-control" style="display: inline-block; width: inherit !important;">

                            <option value=""> Category </option>

                            <option value="">a</option>

                            <option value="">b</option>

                            <option value="">c</option>

                            <option value="">d</option>

                        </select>

                        <select class="form-control" style="display: inline-block; width: inherit !important;">

                            <option value=""> Status </option>

                            <option value="">a</option>

                            <option value="">b</option>

                            <option value="">c</option>

                            <option value="">d</option>

                        </select> 

                       </div>

                </div>



                <div class="modal-body height-div3" style="padding-left: 0px; padding-right: 0px; padding-bottom: 0px;">

                    <!-- <p class="text-center">Loading...</p> -->

                    <div class=""> 

                    <audio id="pop" style="visibility: hidden;height: 0px;width: 0px;">

                      <source src="<?php echo base_url(); ?>assets/chat_audio_sound.mp3" type="audio/mpeg">

                    </audio>                      

                       <div class="height-div33">

                                            

                     </div>

                    </div>

                </div>



            </div><!-- modal-content -->

        </div><!-- modal-dialog -->

    </div><!-- modal -->



    <div class="row pt-3">

        <div class="chat-main" style="opacity: 0; z-index: -1; background-color: #f5f5f5;">

            <div class="col-md-12 chat-header rounded-top bg-primary text-white">

                <div class="row">

                    <div class="col-md-9 hidechatbx hide-chat-box2 username pl-2" id="minimizechatbox" onclick="updateclosespecificchatbox2_off()">

                        <i class="fa fa-circle text-success" aria-hidden="false" style="position: relative; top: 0px; left: 0px;"></i>

                        <h6 class="m-0" id="userchatname"></h6>

                    </div>

                    <div class="col-md-3 options text-right pr-2">

                        <b class="hide-chat-box2" style="font-size: 32px;position: relative;top: 2px;cursor: context-menu;"> - </b>

                        <i class="fa fa-times closechatbox" aria-hidden="false"></i>

                      </div>

                </div>

            </div>

            <div class="chat-content">

                <div class="col-md-12 chats border" id="chatsbox">

                    

                </div>

                <div class="col-md-12 message-box border pl-2 pr-2 border-top-0" onclick="removeextrafunctionality()">

                    <?php echo form_open_multipart('insertadminchathistory', ['id' => 'adminreplymsgform', 'class' => 'form']); ?>

                    <!-- <form action="" id="adminreplymsgform" enctype="multipart/form-data" method="post"> -->

                    <div id="attachfile_div" class="text-center" style="float: right;width: 70px; display: none;">

                        <div id="otherfieattacmentdiv"></div>

                        <img src="" id="changeattachfileimage" style="width: 100%;border: 1px solid #ddd; border-radius: 4px; padding: 3px;">

                        <div class="text-center" id="attachfilename" style="line-height: 1;"></div>

                    </div>

                    <input type="text" name="messagetext" id="input-left-position" class="pl-0 pr-0 w-100" placeholder="Type a message..." autocomplete="off"  required="required"/>
                    <br><div class="border-line"></div>
                    <input type="hidden" name="userid" id="input_userid">

                    <div class="tools" style="clear: both;">

                        <!-- <i class="fa fa-meh-o" aria-hidden="true"></i> -->

                        <input type="file" name="chatfile" id="chatfile" style="visibility: hidden;height: 0px;width: 0px;" onchange="addattachfileto_div()">

                        <i class="fa fa-paperclip" aria-hidden="true" onclick="addchatfile()"></i>
                        <i class="fa fa-smile-o" aria-hidden="true" onclick="openemojis()"></i>
                       <!--  <a href="javascript:void(0)" title="" data-toggle="popover" data-html="true" data-placement="top" data-content="<ul class='quickchatreply'><li onclick='quickchatreplyfnc(1)'>Sure, let`s get started</li><li onclick='quickchatreplyfnc(2)'>Interesting, but I need info</li><li onclick='quickchatreplyfnc(3)'>I`m not able to do this</li></ul>"> Quick reply </a> -->
                       <select class="form-control quickreply_selectdd" onchange="quickchatreplyfnc()" id="quickchatreply_val">
                        <option value="">Quick Reply</option>
                        <option value="Sure, let`s get started">Sure, let`s get started</option>
                        <option value="Interesting, but I need info">Interesting, but I need info</option>
                        <option value="I`m not able to do this">I`m not able to do this</option>
                       </select>

                        <button type="submit" name="submit" class="btn btn-default"  style="float: right; padding: 5px; height: inherit !important; margin-bottom: 5px;color: #000; background-color: #e0e0e0; border-color:#ccc !important;">Send</button>

                    </div>

                <!-- </form> -->

                <?=form_close();?>

                </div>

            </div>

        </div>

    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript">

    $(document).ready(function(){

    getnewmessagesdata();

    var soundstatus;

    function getnewmessagesdata(){

        var status = 'active';

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/getallnewmessages',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {
                    // alert(result);return;

                    // var obj = JSON.parse(result);

                    // if(obj.sound_status==1 && obj.ischat_open==0)
                    // if(obj.sound_status==1)

                    // {

                    //     $('audio#pop')[0].play();

                        // clearTimeout(soundstatus);

                        // updatechatsound_status();
                        getchatsound_status();

                    // }

                    // alert(obj.sound_status+" HTML="+obj.chat_html_data);return;

                   // console.log(1);

                    $('.height-div33').html(result);

                    setTimeout(getnewmessagesdata,5000);

                }

            });

    }

    function getchatsound_status()
    {
        var status = 'active';

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/checksoundstatusdata',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)
                {
                    var obj = JSON.parse(result);
                    if(obj.sound_status==1)
                    {

                        $('audio#pop')[0].play();
                        clearTimeout(soundstatus);
                        updatechatsound_status();
                    }
                }
            });
    }

    function updatechatsound_status()

    {

        var status = "active";

        soundstatus = setTimeout(function(){

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/changechatsound_status',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    // $('audio#pop')[0].pause();

                    console.log(result);

                }

            });

    },800);

    }



    $('[data-toggle="popover"]').popover();
    $('.emojiPicker').find('.recent').remove();
    $('[data-tab="people"]').addClass('active');

});

    $('.hide-chat-box').click(function(){

        $('.chat-content').slideDown();

        $('.chat-main').css({'opacity':1,'z-index':9999});

        $('.hidechatbx').addClass('hide-chat-box');

    });

    $('.hide-chat-box2').click(function(){

        $('.chat-content').slideToggle();

        $('.chat-main').css('opacity',1);

        $('.hidechatbx').addClass('hide-chat-box2');



    });



    $('.height-div33').click(function(){

        $('.chat-content').slideDown();

        $('.chat-main').css('opacity',1);

        $('.hidechatbx').addClass('hide-chat-box2');

    });

    $('.people').click(function(){
        alert(123);
    });



    



    $('#chatboxswitch').click(function(){

        if($(this).prop("checked")){

            // alert();return;

            var status = 'active';

            $.ajax({

                url:'<?php echo base_url(); ?>Messages/changechatboxstatus',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    console.log("Chat active");

                }

            });

        }

        else

        {

            var status = 'inactive';

            $.ajax({

                url:'<?php echo base_url(); ?>Messages/changechatboxstatus',

                method:'get',

                data:'status='+status,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    console.log("Chat Inactive");

                }

            });

        }

    });

    



    function removeextrafunctionality()

    {

        $('.close').click();

    }



    function quickchatreplyfnc()

    {

        // if(val==1)

        // {

        //     $('#input-left-position').val('Sure, let`s get started');

        // }

        // if(val==2)

        // {

        //     $('#input-left-position').val('Interesting, but I need info');

        // }

        // if(val==3)

        // {

        //     $('#input-left-position').val('I`m not able to do this');

        // }
        var quick_reply_val = $('#quickchatreply_val').val();
        $('#input-left-position').val(quick_reply_val);
        $('.popover').hide();
        // $('#adminreplymsgform').submit();

    }



    function addattachfileto_div()

    {

        $('#attachfile_div').css({'display':'block'});

        var attachfilename_val = $('#chatfile').val();

        var extension = attachfilename_val.split('.').pop();

        // alert(extension);return;

        if(extension=="png" || extension=="PNG" || extension=="jpg" || extension=="jpeg" || extension=="gif")

        {

            var oFReader = new FileReader();

            oFReader.readAsDataURL(document.getElementById("chatfile").files[0]); 

            oFReader.onload = function (oFREvent){

            document.getElementById("changeattachfileimage").src = oFREvent.target.result;

         }            

        }

        else

        {

            $('#changeattachfileimage').attr('src','<?php echo base_url(); ?>assets/chat_files/file_upload_image.png');       

        }

        var attachfilename_vall = attachfilename_val.substring(attachfilename_val.lastIndexOf("\\") + 1, attachfilename_val.length);

        $('#attachfilename').text(attachfilename_vall);

        $('#input-left-position').attr("required",false);

    }







    var specificuserSettimeout;

    function getspecificuserchathistory(userid,user_name)

    {

        clearTimeout(specificuserSettimeout);        

        var status = 'active';

        $.ajax({

                url:'<?php echo base_url(); ?>Messages/getallspecificusermessages',

                method:'get',

                data:'userid='+userid,

                cache:false,

                contentType:false,

                processData:false,

                success:function(result)

                {

                    $('#userchatname').text(user_name);

                    $('#input_userid').val(userid);

                    $('.chat-main').css({'z-index':9999,'opacity':1});

                    $('#chatsbox').html(result);



                    var elem = document.getElementById('chatsbox');

                    elem.scrollTop = elem.scrollHeight;

                    specificuserSettimeout = setTimeout(getspecificuserchathistory.bind(null,userid,user_name),3000);

                }

            });        

    }



    // function adminreply()

    // {

    //    var message_text = $('#input-left-position').val();

    //    var userid = $('#input_userid').val();

    //    var attachfile = $('#chatfile').val();

    //    $.ajax({

    //         url:'<?php echo base_url(); ?>Messages/insertadminreply',

    //         method:'get',

    //         data:'userid='+userid+'&input-left-position='+message_text+'&attachfile='+attachfile,

    //         cache:false,

    //         contentType:false,

    //         processData:false,

    //         success:function(result)

    //         {

    //             $('#input-left-position').val('');

    //             $('#chat_ul').append(result);

    //             $('.popover').hide();

    //             var elem = document.getElementById('chatsbox');

    //             elem.scrollTop = elem.scrollHeight;

    //         }

    //     });  

    // }

    $('#adminreplymsgform').on('submit',function(e){

        e.preventDefault();    

        var formData = new FormData(this);

       $.ajax({

            url:'<?php echo base_url(); ?>insertadminchathistory',

            method:'POST',

            data:formData,

            cache:false,

            contentType:false,

            processData:false,

            success:function(result)

            {

                // alert(result);

                $('#attachfile_div').css({'display':'none'});

                $('#input-left-position').val('');

                $('#chatfile').val('');

                $('#input-left-position').attr("required",true);

                $('#chat_ul').append(result);

                $('.popover').hide();

                var elem = document.getElementById('chatsbox');

                elem.scrollTop = elem.scrollHeight;

            }

        });  

    });



   $('.closechatbox').on('click',function(){

        $('.chat-main').css({'opacity':0,'z-index':-1});

        clearTimeout(specificuserSettimeout);

        $.ajax({

            url:'<?php echo base_url(); ?>Messages/change_is_chat_open_status_to_off',

            method:'get',

            data:'status=1',

            cache:false,

            success:function(result)

            {

                console.log('Sound off');

            }

        });

    });

   getpendingmessagecount();
   function getpendingmessagecount()
   {
        $.ajax({

            url:'<?php echo base_url(); ?>Messages/getallpendingmessages',

            method:'get',

            data:'status=1',

            cache:false,

            success:function(result)

            {
                if(result==0)
                {
                    $('#header_pending_msg_count').css('display','none');
                }
                else
                {
                    $('#header_pending_msg_count').css('display','block');
                    $('#header_pending_msg_count').html(result);
                }
                setTimeout(getpendingmessagecount,3000);
                

            }

        });
   }

   updateclosespecificchatbox();
   function updateclosespecificchatbox()
   {
        $.ajax({
            url:'<?php echo base_url(); ?>Messages/change_is_chat_open_status_to_off',
            method:'get',
            data:'status=1',
            cache:false,
            success:function(result)
            {
                console.log('specific chat closed');
            }
        });
   }

   function updateclosespecificchatbox2()
   {
        // alert(1);
        $('#minimizechatbox').attr("onclick","updateclosespecificchatbox2_off()");
        $.ajax({
            url:'<?php echo base_url(); ?>Messages/change_is_chat_open_status_to_on',
            method:'get',
            data:'status=1',
            cache:false,
            success:function(result)
            {
                console.log('specific chat on');
            }
        });
   }

   function updateclosespecificchatbox2_off()
   {
        // alert(1);
        $('#minimizechatbox').attr("onclick","updateclosespecificchatbox2()");
        $.ajax({
            url:'<?php echo base_url(); ?>Messages/change_is_chat_open_status_to_off',
            method:'get',
            data:'status=1',
            cache:false,
            success:function(result)
            {
                console.log('specific chat off');
            }
        });
   }

   function addchatfile()

   {

    $('#chatfile').click();

   }

   function openemojis()
   {
        $('.emojiPickerIcon').click();
   }



    // window.setInterval(function() {

      var elem = document.getElementById('chatsbox');

      elem.scrollTop = elem.scrollHeight;

    // }, 2000);

    </script>
    <style type="text/css">
        .emojiPickerIcon{
            visibility: hidden;
            height: 0px !important;
            width: 0px !important;
        }
        .emojiPicker {
    display: none;
    position: fixed;
    bottom: 44px;
    top: inherit !important;
    outline: none;
    border: none;
    box-shadow: 0 0 7px #555;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    font-family: Helvetica, Arial, sans-serif;
    width: 280px;
    height: 280px !important;
}

.emojiPicker .sections{
    height: 200px !important;
    overflow-y: auto !important;
}
.emojiPicker section h1{
    font-size: 14px !important;
    font-weight: 600;
    margin: 0px !important;
}
/*.emojiPicker .recent{
    display: none !important;
}*/
[data-tab="recent"]{
    display: none !important;
}

    </style>

