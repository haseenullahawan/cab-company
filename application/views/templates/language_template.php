<style>
    input[type=submit], button[type=submit]{
    color: #333;
    cursor: pointer;
    height: 34px;
    font-size: 16px;
    padding: 1px 28px 3px;
    border-radius: 5px;
    text-transform: none;
    font-family: inherit;
    font-weight: 500;
    }
    .body-border{
      min-height: 500px;
    }
    
</style>
<?php $this->load->view('admin/common/header'); ?>
<?php $this->load->view('admin/common/navigation'); ?>
<?php  $this->load->view($content); ?>
<?php $this->load->view('admin/common/footer'); ?>

<script type="text/javascript">
  function add_row(){
    $('.tran_form').append('<div class="form-inline"><div class="form-group"><input type="text" class="form-control" name="hook[]" onkeyup = "updateKey(this)" onfocusout="getgoogle(this)" placeholder="Enter Hook" style="width: 300px;" name="email">&nbsp;&nbsp;</div><div class="form-group"><input type="text" class="form-control" name="trans[]" placeholder="Enter Translation" style="width: 350px;" name="pwd">&nbsp;&nbsp;</div><div class="checkbox"><button type="button" onclick="add_row()" class="btn btn-info add_form">+</button>&nbsp;&nbsp;<button type="button" onClick="this.parentElement.parentElement.remove();" class="btn btn-danger remove_form">-</button></div></div>');
  }
  function updateKey(e)
    {
        var key=e.value;
        key=key.replace(/ /g,"_");
        key=key.toLowerCase();
        e.value = key;
    }
 function getgoogle(e){
     var sentence = e.value;
     $.ajax({
            url: "https://www.googleapis.com/language/translate/v2?key=AIzaSyB-ktxnSZFDZnKjjPz6tbk_iDMN2FxkXmo&q="+sentence+"&source=en&target=<?= $short_code; ?>",
            dataType: 'json',
            success: function(res){
                var translated = "";
                $.each(res.data.translations, function(index, val) {
                    translated = val.translatedText;
                });
                e.parentElement.nextElementSibling.firstElementChild.value = translated;
            }
        });
 }
    
</script>