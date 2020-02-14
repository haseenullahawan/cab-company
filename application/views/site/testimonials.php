</header>
<div class="container-fluid body-bg">
    <div class="container body-border"><!--padding-p-0-->
        <div class="breadcrumb">
            <div class="row">
                <aside class="nav-links">
                    <ul>
                        <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page'); ?>  </a> </li>
                        <li class="active"><a href="javascript:void(0)">&nbsp;<?php if (isset($sub_heading)) echo $sub_heading; ?> </a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <div class="row">
            <?php if (count($testimonials) > 0) { ?>
                <div class="col-md-12">
                    <div class="left-side-cont">
                        <article class="content scroll">
                            <?php foreach ($testimonials as $row): ?>
                                <div class="testy-item">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-1"><img src="<?php echo base_url(); ?>/uploads/testimonials_images/<?php
                                                if ($row->user_photo != "")
                                                    echo $row->user_photo;
                                                else
                                                    echo "dummy.jpg";
                                                ?>" class="img-responsive testy-page-img" alt="<?php echo $row->user_name; ?>" title="<?php echo $row->user_name; ?>">
                                            </div>
                                            <div class="col-md-9">
                                                <!-- <h2 class="test">Slide 1</h2> -->
                                                                            <!--<strong><p><?php echo $row->title; ?></p></strong>-->
                                                <p class="testy-pg-content"> <?php echo $row->content; ?> </p>
                                                <!--<div class="test-name">" "</div>-->
                                            </div>
                                            <div class="col-md-2"><p class="testy-author"><?php echo $row->user_name; ?></p></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </article>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-12">
                    <div class="left-side-cont">
                        <p align="center" style="margin:140px 0px">Coming Soon...</p>
                    </div>
                </div>
            <?php } ?>
            <!--<div class="col-md-3">
            <?php //    $this->load->view('site/common/reasons_to_book');  ?>
            </div>-->
        </div>
    </div>
</div>