</header>
<div class="container-fluid">
   <div class="container padding-p-0">
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
               <article class="content">
                  <ul class="nav nav-tabs cont-tabs" role="tablist">
                     <li role="presentation" class="active"> <a href="#one" role="tab" data-toggle="tab" aria-controls="one"><?php echo $title;?><i class="fa fa-arrow-circle-o-down"></i> </a></li>
                  </ul>
                  <div class="tab-content white">
                     <div role="tabpanel" class="tab-pane active" id="one">
                        <?php echo $description;?>
                     </div>
                  </div>
               </article>
            </div>
         </div>
         <div class="col-md-3">
            <?php $this->load->view('site/common/reasons_to_book'); ?>
         </div>
      </div>
   </div>
</div>
</div>