<?php $locale_info = localeconv(); ?>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <div class="main-hed">
            <a href="<?php echo site_url();?>/admin/dashboard"><?php echo $this->lang->line('home');?></a>
            <?php if(isset($title)) echo " >> ".$title;?>
        </div>
        <style type="text/css">
            .card{
                background-color: #fff;
            }
            .card-body{
                padding: 15px;
            }
            .height-div{
                height: 500px;
                overflow-y: auto;
            }
            .height-div::-webkit-scrollbar{
                background-color: lightgrey;
                width: 5px;
            }
            .height-div::-webkit-scrollbar-thumb{
                background-color: darkgrey;
                width: 5px;
            }
            .height-div2{
                height: 435px;
                overflow-y: auto;
            }
            .height-div2::-webkit-scrollbar{
                background-color: lightgrey;
                width: 5px;
            }
            .height-div2::-webkit-scrollbar-thumb{
                background-color: darkgrey;
                width: 5px;
            }
            .user-image-div .circle-rounded{
                border-radius: 100%;
                width: 50px;
            }
            .filter-div{
                /*margin-bottom: 0px;*/
            }
            .users-chat-div{
                clear: both;
                border-bottom: 1.5px dashed lightgrey;
                padding: 10px;
                position: relative;
                cursor: pointer;
            }
            .users-chat-div2{
                clear: both;
                border-bottom: 1.5px dashed lightgrey;
                padding-bottom: 8px;
                position: relative;
            }
            .users-chat-div:hover{
                background-color: lightgrey;
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
                top: 5px;
                right: 5px;
                background-color: red;
            }
            .real-chat-badge{
                position: absolute;
                top: 0px;
                right: 10px;
                color: grey;
            }
            .fa-circle{
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
        </style>
        <div class="col-md-12 padding-p-r">
            <div class="module" style="height: 450px;">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="module-head">
                    <!--<h3> <?php if(isset($title)) echo $title;?></h3>-->
                </div>
                <div class="module-body">
                  <div class="card">
                    <div class="row">
                        <div class="col-md-3" style="border-right: 1px solid silver; padding-right: 0px;">
                            <div class="">
                               <div class="filter-div card-body">
                                <select class="form-control" style="display: inline-block; width: inherit !important;">
                                    <option value="">Select Category</option>
                                    <option value="">a</option>
                                    <option value="">b</option>
                                    <option value="">c</option>
                                    <option value="">d</option>
                                </select>
                                <select class="form-control" style="display: inline-block; width: inherit !important;">
                                    <option value="">Select Status</option>
                                    <option value="">a</option>
                                    <option value="">b</option>
                                    <option value="">c</option>
                                    <option value="">d</option>
                                </select> 
                               </div>
                               <div class="height-div2">
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                       <i class="fa fa-circle status_active" aria-hidden="true"></i>
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                       <i class="fa fa-circle" aria-hidden="true"></i>
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                               <div class="users-chat-div">
                                   <div class="user-image-div">
                                       <img src="assets/default.jpg" class="circle-rounded">
                                   </div>
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="badge badge-danger chat-badge">0</span>
                                   </div>
                               </div>
                             </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                             <div class="card-body height-div" style="height: 400px;">
                                <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>

                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>

                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>
                               <div class="users-chat-div2">
                                   <div class="usercontent-div">
                                    <p><strong>Haseen awan</strong></p>
                                    <p>Hello world i am here catch me.</p>
                                    <span class="real-chat-badge">01-02-2020 <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                                   </div>
                               </div>                               
                            </div>
                            <div>
                                <div class="showusertypingdiv">
                                   <p><small style="color: lightgrey;">Typing...</small></p>
                                   <div class="type-reply-div">
                                    <form action="" method="post" enctype="multipart/form-data">
                                       <ul class="reply-div-ul">
                                           <li> <i class="fa fa-camera addfileicon" aria-hidden="true" onclick="addfile(this)" title="Add file"></i> <input type="file" name="attachfile" style="visibility: hidden;height: 0px;width: 0px;" id="attachfile_input"> </li>
                                           <li> <i class="fa fa-meh-o" aria-hidden="true"></i> </li>
                                           <li> <i class="fa fa-bolt" aria-hidden="true" title="Quick Replys"></i> </li>
                                           <li> <textarea class="form-control" style="display: inline-block;" placeholder="Enter message" cols="65" rows="1" required="required"></textarea> </li>
                                           <li style="padding-right: 0px;">  <button type="submit" class="btn btn-default replybtn"> Send </button> </li>
                                       </ul>
                                    </form>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="border-left: 1px solid silver;">
                             <div class="card-body height-div">
                                <div class="text-center">
                                    <img src="assets/default.jpg" class="" width="130px" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                                </div>
                                <div class="detail-content">
                                    <p>Category</p>
                                    <p>name</p>
                                    <p>email</p>
                                    <p>phone</p>
                                    <p>ip</p>
                                    <p>location</p>
                                    <p>connexion time</p>
                                    <p>page timblad</p>
                                    <p>page url</p>
                                    <p>page history url</p>
                                    <p>pending</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>

<script type="text/javascript">
    function addfile(val)
    {
        $('#attachfile_input').click();  
    }
    $('#attachfile_input').on('change',function(){
        var attachfiletext = $(this).val();
        $('.addfileicon').attr('title',attachfiletext); 
    });

</script>