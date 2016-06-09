jQuery(function ($) {

    //#main-slider
    $(function () {
        $('#main-slider.carousel').carousel({
            interval: 8000
        });
    });

    $('.centered').each(function (e) {
        $(this).css('margin-top', ($('#main-slider').height() - $(this).height()) / 2);
    });

    $(window).resize(function () {
        $('.centered').each(function (e) {
            $(this).css('margin-top', ($('#main-slider').height() - $(this).height()) / 2);
        });
    });

    //contact form
    var form = $('.contact-form');
    form.submit(function () {
        $this = $(this);
        $.post($(this).attr('action'), function (data) {
            $this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
        }, 'json');
        return false;
    });

    //goto top
    $('.gototop').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 500);
    });

    $(document).ready(function () {
        $(".gotoabout").click(function () {
            event.preventDefault();
            $("html, body").animate({scrollTop: $("#about").offset().top}, 2000);
        });
        $(".gotoservices").click(function () {
            event.preventDefault();
            $("html, body").animate({scrollTop: $("#services").offset().top}, 2000);
        });
        $(".gotocontact").click(function () {
            event.preventDefault();
            $("html, body").animate({scrollTop: $("#contact").offset().top}, 2000);
        });
        $(".gotoblog").click(function () {
            event.preventDefault();
            $("html, body").animate({scrollTop: $("#blog").offset().top}, 2000);
        });
    })

    //Pretty Photo
    $("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false
    });
});