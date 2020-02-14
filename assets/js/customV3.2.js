var loader='<b class="text-muted"><i class="loader"></i> Processing . . .</b>';





 function notification(msg,timer)

  {

    $("#notification").html(msg)

    $("#notification").removeClass('d-none');

  setTimeout(function(){ $("#notification").addClass('d-none'); }, timer);

  }

  



   function notification1(msg,timer,reload)

  {

    $('#notification').html(msg);

    $("#notification").removeClass('d-none');

      setTimeout(function(){ $("#notification").html('').addClass('d-none');

        if(reload){ location.reload();}

       }, timer);

  }

  



   function notification2(msg,timer,reloadsec)

  {

    $('#notification').html(msg);

    $("#notification").removeClass('d-none');

      setTimeout(function(){ $("#notification").html('').addClass('d-none');

        if(reloadsec){

          for(i=0;i<=reloadsec.length-1;i++){

          $(reloadsec[i]).load(location.href+" "+reloadsec[i]+">*","");

          }//FOR

        }

       }, timer);

  }

  

  

   





   ///////////////////////







var form_index; var form; var sec; var hit_form; var n_show; var d_reset;



$(document).on('click',".n-form button[type='submit']",function(){

if(form=$(this).attr('data-target')) {form = $("form[data-target="+form+"]");}  

else form_index = $(this).parent('form').index();

sec_type = $(this).closest('form').attr('data-form');

if(form) hit_form = form; else hit_form = $(".n-form:eq("+form_index+")");

n_show = hit_form.attr('data-ns');

d_reset = hit_form.attr('data-reset');

if(sec_type=='modal') sec=hit_form.find(".notification"); else sec=$("#notification");

});





  $(document).on('submit',".n-form",function(e){

 e.preventDefault();

 $(".validation").remove();

 if(n_show!='false') sec.html(loader).removeClass('d-none');

  $.ajax({

    type: "POST",

    dataType:'JSON',

    data:  new FormData(this),

    contentType: false,

    cache: false,

    processData:false,

    url: $(this).attr('action'), success: function(result){

      FormNotification(result[0],result[1],result[2],result[3],result[4],result[5],result[6],result[7],sec_type);

    }});



});



 function FormNotification(msg,timer,status,redirect,refresh,v_error,m_close,grcap_reset,sec_type)

  {
    if(!timer) timer=3000;

     if(form) hit_form = form; else hit_form = $(".n-form:eq("+form_index+")");

     sec.html(msg); if(n_show!='false') sec.removeClass('d-none');



        if(status)

        {  if(d_reset) hit_form.find(d_reset).val('')

          if(redirect){
             setTimeout(function(){
              if(redirect=='current') window.location.href=''; else location.replace(redirect);
            }, timer);
           }

          if(refresh){

            setTimeout(function(){

                sec.addClass('d-none');  

                if(m_close) $(function () { $('.modal.show').modal('toggle'); });

                 $(refresh).load(location.href+" "+refresh+">*","");

             }, timer);





            }

        }

        else if(v_error){
      if(grcap_reset)grecaptcha.reset();

          sec.removeClass('d-none');

          var v_error = JSON.parse(v_error);

          for (var key in v_error) { var value = v_error[key];



                key=key.replace("[]", "");

                hit_form.find("[name="+key+"]").closest('.fe').

                before("<small class='text-danger strong validation'>"+value+"</small>");



        }

        

        }//if V_error

        else sec.removeClass('d-none'); // If just error

        setTimeout(function(){sec.addClass('d-none'); }, timer);









  }







var eye = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pointer pass-toggle" data-icon="eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';

var eye_off = '<svg  width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pointer pass-toggle" data-icon="eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';

var check ='<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';



$(document).on('click','.pass-toggle',function(){

  pass=$(this).closest('.password');

  if($(this).attr('data-icon')=='eye'){

    $(this).replaceWith(eye_off);

    pass.find('span').html(pass.attr('data-pass'));

  }

  else{

    $(this).replaceWith(eye);

    pass.find('span').html(pass.attr('data-ast'));

  }

});





  function Copy(element) {

  var $temp = $("<input>");

  $("body").append($temp);

  $temp.val($(element).text()).select();

  document.execCommand("copy");

  $temp.remove();

  notification1(check+" Successfully Copied",1000,false);

  }



$(document).on('mouseenter',".toggler", function () {

$(this).closest('.sortable').css("border", "1px dashed #ccc");});

$(document).on('mouseleave',".toggler", function () {

$(this).closest('.sortable').css("border", "none");});



 



$(document).on('click','.update-modal',function(){

   element = $(this).attr("data-target");

   input_len = $(element+" input").length;

   select_len = $(element+" select").length;

   for(i=0;i<=input_len-1;i++)

   { input = $(element+" input:eq("+i+")"); input.val($(this).attr('data-'+input.attr('name'))); }



 $(element+' option').prop('selected', function() { return this.defaultSelected; });

  for(i=0;i<=select_len-1;i++)

   { select = $(element+" select:eq("+i+")");

     value = $(this).attr('data-'+select.attr('name'));

     //alert(value);

     select.find("option[value='"+value+"']").attr('selected','selected');

   }         

});

        

  

  $("#phone-verification").on('submit',(function(e){

   e.preventDefault();

   var phoneNumber = document.getElementById("phone").value;

   var state = document.getElementById("user").value;

    url='https://www.accountkit.com/v1.1/basic/dialog/sms_login/?app_id=730667430721981&redirect=http%3A%2F%2Fpn.codingpk.com%2FUserAccount%2FCallbackUrl&state='+state+'&fbAppEventsEnabled=true&country_code=%2B92&phone_number='+phoneNumber;

    window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

   

  

}));







  $(document).on('click','.toggler',function(){
              var target=$(this).attr('data-target');
              $('[data-toggle='+target+']').toggleClass('d-none');
              var symbol=$(this).find('b').html();
              if(symbol=='▸') $(this).find('b').html('▾');
              else $(this).find('b').html('▸');
              });

  $(document).on('input','.no-space',function(){ $(this).val($(this).val().replace(/\s/g, ''));});

  $(document).on('input','[data-paste]',function(){ $($(this).attr('data-paste')).html($(this).val());});





//https://www.accountkit.com/v1.1/basic/dialog/sms_login/?app_id=730667430721981&redirect=http%3A%2F%2Fpn.codingpk.com%2FUserAccount%2FCallbackUrl&state=admin&fbAppEventsEnabled=true&country_code=%2B92&phone_number=03448877235

//https://www.accountkit.com/v1.1/dialog/sms_login/?app_id=730667430721981&country_code=%2B1&display=popup&enable_sms=true&fb_app_events_enabled=true&locale=en_US&logging_ref=f18ead5ec62dd34&origin=http%3A%2F%2Flocalhost&redirect=http%3A%2F%2Flocalhost%2Foshop%2FUserAccount%2FCallbackUrl&sdk=web&state=admin&test_sms_with_infobip=false



var delete_modal = '<div class="modal" id="delete-modal" role="dialog" aria-modal="true"><button class="d-none" id="delete-tbtn" data-toggle="modal" data-target="#delete-modal"></button><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 id="modal-title" class="modal-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete Confirmation.</h4><button type="button" class="close delete-close" data-dismiss="modal">×</button></div><div class="modal-body" >Are you sure you want to delete this record ?</div><div class="modal-footer"><button data-trash-link="" data-dismiss="modal" class="btn btn-primary">I confirm to delete</button></div></div></div></div>';



$(document).on('click','.trash',function(){  

  if(!$('#delete-modal').length)

  {

    $("body").append(delete_modal);

  }

$("[data-trash-link]").attr('data-trash-link',$(this).attr('data-trash'));

$('#delete-modal').modal('show');

});



$(document).on('click','[data-trash-link]',function(){

     $.ajax({

    type: 'POST',

    dataType: 'JSON',

    url: $(this).attr('data-trash-link'), success: function(result){

      notification1(result[0],result[1],result[2]);

      }});

  });