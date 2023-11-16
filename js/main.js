
(function ($) {
    "use strict";

    /*[CARREGAR PÁGINA]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="cp-spinner cp-meter"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });

    /*[DE VOLTA AO TOPO]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });

    /*[MOSTRAR/ESCONDER SIDEBAR]
    ===========================================================*/
    $('body').append('<div class="overlay-sidebar trans-0-4"></div>');
    var ovlSideBar = $('.overlay-sidebar');
    var btnShowSidebar = $('.btn-show-sidebar');
    var btnHideSidebar = $('.btn-hide-sidebar');
    var sidebar = $('.sidebar');

    $(btnShowSidebar).on('click', function(){
        $(sidebar).addClass('show-sidebar');
        $(ovlSideBar).addClass('show-overlay-sidebar');
    });

    $(btnHideSidebar).on('click', function(){
        $(sidebar).removeClass('show-sidebar');
        $(ovlSideBar).removeClass('show-overlay-sidebar');
    });

    $(ovlSideBar).on('click', function(){
        $(sidebar).removeClass('show-sidebar');
        $(ovlSideBar).removeClass('show-overlay-sidebar');
    });

    /*[ESCONDER POPUP]
    ===========================================================*/
    var btnHidePopup = $('.btn-hide-popup');
    var ovlPopup = $('.overlay');
    var popup = $('.section-overlay');

    $(btnHidePopup).on('click', function(){
        $(popup).css('display','none');
    });

    $(ovlPopup).on('click', function(){
        $(popup).css('display','none');
    });

    /*[PAUSAR/RODAR VÍDEO]
	===========================================================*/
    var my_video = document.querySelector(".my_video");
    var isPlaying = false;
    
    $(my_video).on("click", function () {
        if (isPlaying) {
            my_video.pause()
        } else {
            my_video.play();
        }
    });

    $(my_video).on("playing", function() {
        isPlaying = true;
    });

    $(my_video).on("pause", function() {
        isPlaying = false;
    });

    var my_audio = $('.my_audio');

    $(my_audio).on("click", function(e){
        my_video.muted = !my_video.muted;
    });

    /*[HEADER FIXA]
    ===========================================================*/
    var header = $('header');
    var logo = $(header).find('.logo img');
    var linkLogo1 = $(logo).attr('src');
    var linkLogo2 = $(logo).data('logofixed');


    $(window).on('scroll',function(){
        if($(this).scrollTop() > 5 && $(this).width() > 992) {
            $(logo).attr('src',linkLogo2);
            $(header).addClass('header-fixed');
        }
        else {
            $(header).removeClass('header-fixed');
            $(logo).attr('src',linkLogo1);
        }
        
    });

    /*[DIRECIONAR PARA PÁGINA]
    ===========================================================*/
    $(document).ready(function() {
        $('.btn-url-direct').on('click', function() {
            var url = $(this).data('url');
            window.location.href = url;
        });
    })
})(jQuery);