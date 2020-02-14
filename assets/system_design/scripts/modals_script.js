$(document).ready(function() {
    var _scroll = true,
        _timer = false,
        _floatbox = $("#contact_form"),
        _floatbox_opener = $(".contact-opener, .close-btn");
    // _floatbox_opener = $(".contact-opener, .closee-btn");
    if (!_floatbox.hasClass('visiable'))
        _floatbox.css({ right: "-302px" });
    else
        _floatbox.css({ right: "0px" });
    _floatbox_opener.click(function() {
        if (_floatbox.hasClass('visiable')) {
            _floatbox.animate({ "right": "-302px" }, { duration: 300 }).removeClass('visiable');
        } else {
            _floatbox.animate({ "right": "0px" }, { duration: 300 }).addClass('visiable');
        }
    });


    $(window).scroll(function() {
        if (_scroll) {
            _floatbox.animate({ "top": "190px" }, { duration: 300 });
            _scroll = false;
        }
        if (_timer !== false) { clearTimeout(_timer); }
        _timer = setTimeout(function() {
            _scroll = true;
            _floatbox.animate({ "top": "190px" }, { easing: "linear" }, { duration: 500 });
        }, 400);
    });

    $('#the-contact-form').submit(function(e) {
        e.preventDefault();
        var that = $(this);
        that.find(".alert, .error").remove();
        $.ajax({
            type: that.attr("method"),
            url: that.attr("action"),
            data: that.serialize(),
            dataType: "json",
            success: function(res) {
                if (res.status != false) {
                    that.prepend("<div class='alert alert-success' style = 'word-break: break-word !important;'>" + res.msg + "</div>");
                    that.trigger('reset')
                } else
                    that.prepend("<div class='alert alert-danger'>" + res.msg + "</div>");
            },
            error: function() {

            }
        });
        return false;
    });

    var _scroll2 = true,
        _timer2 = false,
        _floatbox2 = $("#contact_form_2"),
        _floatbox_opener2 = $(".contact-opener-2, .close-btn-2");
    // _floatbox_opener2 = $(".contact-opener-2, .closee-btn");

    var height = $("#contact_form_2").find("form").outerHeight(true);
    height += 25;
    console.log(height);
    if (!_floatbox2.hasClass('visiable'))
        _floatbox2.css({ 'top': "-" + height + "px" });
    else
        _floatbox2.css({ top: "0px" });

    _floatbox_opener2.click(function() {
        // height = $("#the-contact-form-2").find("form").outerHeight(true);
        // alert(height);
        // height += 25;
        // console.log(height);
        if (_floatbox2.hasClass('visiable')) {
            _floatbox2.animate({ "top": "-" + height + "px" }, { duration: 300 }).removeClass('visiable');
        } else {
            _floatbox2.animate({ "top": "0px" }, { duration: 300 }).addClass('visiable');
        }
    });

    /*    $(window).scroll(function(){
            if(_scroll2){
                _floatbox2.animate({"top": "37px"},{duration: 300});
                _scroll2 = false;
            }
            if(_timer2 !== false){ clearTimeout(_timer2); }
            _timer2 = setTimeout(function(){_scroll2 = true;
                _floatbox2.animate({"top": "37px"},{easing: "linear"}, {duration: 500});}, 400);
        });*/

    $('#the-contact-form-2').submit(function(e) {
        e.preventDefault();
        var that = $(this);
        that.find(".alert, .error").remove();
        that.prepend("<div class='alert alert-success'>Veuillez decrocher votre telephone... </div>");
        $.ajax({
            type: that.attr("method"),
            url: that.attr("action"),
            data: that.serialize(),
            async: false,
            dataType: "json",
            success: function(res) {
                that.find(".alert, .error").remove();
                if (res.status != false) {
                    that.prepend("<div class='alert alert-success' style = 'word-break: break-word !important;'>" + res.msg + "</div>");
                    that.trigger('reset')
                } else
                    that.prepend("<div class='alert alert-danger'>" + res.msg + "</div>");
            },
            error: function() {
                that.find(".alert, .error").remove();
                that.prepend("<div class='alert alert-danger'>Quelque chose ne va pas</div>")
            }
        });
        return false;
    });



    var _scroll3 = true,
        _timer3 = false,
        _floatbox3 = $("#jobs_form"),
        _floatbox_opener3 = $(".contact-opener-3, .close-btn-3");
    // _floatbox_opener3 = $(".contact-opener-3, .closee-btn");
    if (!_floatbox3.hasClass('visiable'))
        _floatbox3.css({ 'left': "-302px" });
    else
        _floatbox3.css({ 'left': "0px" });
    _floatbox_opener3.click(function() {
        console.log(_floatbox3.hasClass('visiable'));
        if (_floatbox3.hasClass('visiable')) {
            _floatbox3.animate({ "left": "-302px" }, { duration: 300 }).removeClass('visiable');
        } else {
            _floatbox3.animate({ "left": "0px" }, { duration: 300 }).addClass('visiable');
        }
    });


    $(window).scroll(function() {
        if (_scroll3) {
            _floatbox3.animate({ "top": "190px" }, { duration: 300 });
            _scroll3 = false;
        }
        if (_timer3 !== false) { clearTimeout(_timer3); }
        _timer3 = setTimeout(function() {
            _scroll3 = true;
            _floatbox3.animate({ "top": "190px" }, { easing: "linear" }, { duration: 500 });
        }, 400);
    });

    $('#the-job-form').submit(function(e) {
        e.preventDefault();
        var that = $(this);
        that.find(".alert, .error").remove();
        var formData = new FormData(that[0]);
        /*that.find("input,select,textarea").each(function (key, value) {
         if($(value).attr('type') != "file")
         formData.append($(value).attr('name'), $(value).val());
         else
         formData.append($(value).attr('name'), $(value)[0].files);
         });*/
        console.log(formData);
        $.ajax({
            type: that.attr("method"),
            url: that.attr("action"),
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.status != false) {
                    that.prepend("<div class='alert alert-success' style = 'word-break: break-word !important;'>" + res.msg + "</div>");
                    that.trigger('reset')
                } else
                    that.prepend("<div class='alert alert-danger'>" + res.msg + "</div>");
            },
            error: function() {

            }
        });
        return false;
    });
	
	var _scroll4 = true,
        _timer4 = false,
        _floatbox4 = $("#support_form"),
        _floatbox_opener4 = $(".contact-opener-4, .close-btn-4");
    // _floatbox_opener3 = $(".contact-opener-3, .closee-btn");
    if (!_floatbox4.hasClass('visiable'))
        _floatbox4.css({ 'bottom': "-503px" });
    else
        _floatbox4.css({ 'bottom': "0px" });
    _floatbox_opener4.click(function() {
        console.log(_floatbox4.hasClass('visiable'));
        if (_floatbox4.hasClass('visiable')) {
            _floatbox4.animate({ "bottom": "0px" }, { duration: 300 }).removeClass('visiable');
        } else {
            _floatbox4.animate({ "bottom": "-503px" }, { duration: 300 }).addClass('visiable');
        }
    });


    // var _scroll5 = true,
    //     _timer5 = false,
    //     _floatbox5 = $("#chatform"),
    //     _floatbox_opener5 = $(".contact-opener-5, .close-btn-5");
    // // _floatbox_opener3 = $(".contact-opener-3, .closee-btn");
    // if (!_floatbox5.hasClass('visiable'))
    //     _floatbox5.css({ 'top': "680px" });
    // else
    //     _floatbox5.css({ 'top': "0px" });
    // _floatbox_opener5.click(function() {
    //     console.log(_floatbox5.hasClass('visiable'));
    //     if (_floatbox5.hasClass('visiable')) {
    //         _floatbox5.animate({ "top": "360px" }, { duration: 300 }).removeClass('visiable');
    //     } else {
    //         _floatbox5.animate({ "top": "680px" }, { duration: 300 }).addClass('visiable');
    //     }
    // });


    // $(window).scroll(function() {
        // if (_scroll4) {
            // _floatbox4.animate({ "top": "190px" }, { duration: 300 });
            // _scroll4 = false;
        // }
        // if (_timer4 !== false) { clearTimeout(_timer4); }
        // _timer4 = setTimeout(function() {
            // _scroll4 = true;
            // _floatbox4.animate({ "top": "190px" }, { easing: "linear" }, { duration: 500 });
        // }, 400);
    // });

    $('#the-support-form').submit(function(e) {
        e.preventDefault();
        var that = $(this);
        that.find(".alert, .error").remove();
        var formData = new FormData(that[0]);
        /*that.find("input,select,textarea").each(function (key, value) {
         if($(value).attr('type') != "file")
         formData.append($(value).attr('name'), $(value).val());
         else
         formData.append($(value).attr('name'), $(value)[0].files);
         });*/
        console.log(formData);
        $.ajax({
            type: that.attr("method"),
            url: that.attr("action"),
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.status != false) {
                    that.prepend("<div class='alert alert-success' style = 'word-break: break-word !important;'>" + res.msg + "</div>");
                    that.trigger('reset')
                } else
                    that.prepend("<div class='alert alert-danger'>" + res.msg + "</div>");
            },
            error: function() {

            }
        });
        return false;
    });
});
/**
 * Created by lenovo on 09/10/2019.
 */