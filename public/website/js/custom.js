$(document).ready(function(){
    /*loader*/
    $("#loading").fadeOut();
    /*loader end*/

    /*Owl*/
    $('.owl-carousel-1').owlCarousel({
        responsiveClass: true,
        rtlClass: 'owl-ltr',
        responsive: {
            0: {
                items: 3,
                margin: 5,
            },
            1024: {
                items: 5,
                margin:15,
            },
        }
    });
    $('.owl-carousel-2').owlCarousel({
        responsiveClass: true,
        responsive: {
            0:{
                items: 1,
                margin: 10,
                nav: true,
                navText: ['<img src="'+assetUrl+'/img/ico-arrow-left.svg">', '<img src="'+assetUrl+'/img/ico-arrow-right.svg">'],
            },
            1024:{
                items: 4,
                margin: 30,
            }
        }
    });
    $('.owl-carouse3').owlCarousel({
        center: true,
        margin:40,
        loop: true,
        nav: true,
        navText: ['<img src="'+assetUrl+'/img/ico-arrow-left.svg">', '<img src="'+assetUrl+'/img/ico-arrow-right.svg">'],
        responsiveClass: true,
        responsive: {
            0:{
                items: 1,
                margin:0,
            },
            770:{
                items: 2,
            }
        }
    });
    $('.owl-carousel4').owlCarousel({
        nav: true,
        navText: ['<img src="'+assetUrl+'/img/arrow-prev-g.svg">', '<img src="'+assetUrl+'/img/arrow-next-g.svg">'],
        responsiveClass: true,
        items: 1,
        rewind: true,
    });
    $('.owl-carouse3').on('changed.owl.carousel', function(event) {
        setTimeout(function () {
            let currentCar = $('.owl-carouse3').find('.active.center');
            let currentIndex = currentCar.find('.item').attr('data-id');
            $('.carosule-caption').removeClass('active');
            $('.caption'+currentIndex).addClass('active');
        }, 400)
    });

    /*Owl End*/
    /*website*/
    $('.cart').on('mouseover', function () {
        $('.mini-cart').removeClass('active');
        $(this).find('.mini-cart').addClass('active');
    });

    $('.collapse-custom').on('click', function (event) {
        event.preventDefault();
        $(this).closest('.collapse-parent').find('.collapse-manu').slideToggle();
        $(this).closest('.collapse-parent').find('h5').toggleClass('open');
        $(this).closest('.collapse-parent').find('.head').toggleClass('open');
        $(this).closest('.collapse-parent').find('.menu-trigger').toggleClass('open');
        $('#filters-close').toggle();
        $(this).find('.togglePlus').toggle();
    });
    $('#input-check').on('change', function () {
       $('.if-true').slideToggle();
    });
    $('#input-billing').on('change', function () {
       $('.if-billing-true').slideToggle();
    });
    $("input[name='payment_type']").on('change', function () {
        $('.payment-info').slideUp();
        $(this).closest('.collapse-parent').find('.payment-info').slideDown();
    });
    let wScreen = window.screen;
    $('.collapse-custom-footer').on('click', function (event) {
        event.preventDefault();
        if (wScreen.availWidth < 768){
            $(this).closest('.collapse-parent-footer').find('.collapse-manu-footer').slideToggle();
            $(this).closest('.collapse-parent-footer').find('h5').toggleClass('open');
        }
    });

    $('.collapse-custom-inner').on('click', function (event) {
        event.preventDefault();
        $(this).closest('.collapse-parent-inner').find('.collapse-manu-inner').slideToggle();
        $(this).closest('.collapse-parent-inner').find('span').toggleClass('open');
    });
    $('.thmb-img').on('click', function (event) {
        event.preventDefault();
        $('.thmb-img').removeClass('active');
        $(this).addClass('active');
        let currentIndex = $(this).attr('data-id');
        let showImg =  $('.p-img');
        showImg.removeClass('active');
        $('.img'+currentIndex).addClass('active');
    });

    $('#filters-close').on('click', function () {
        $(this).closest('.collapse-parent').find('.wrapper').slideToggle();
        $('#filters-close').toggle()
    });

    $('#close-newsletter').on('click', function () {
        $(this).closest('#newsletter').removeClass('in');
    });

    function backBtnShow() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            $('#back-top').addClass('in');
        }
        else {
            $('#back-top').removeClass('in');
        }
    }
    function headerScrolled() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $('#main-header').addClass('scrolled');
            $('#page-content').addClass('scrolled');
            $('#page-banner').addClass('scrolled');
            $('.filters').addClass('scrolled');
            $('#artisan-content').addClass('scrolled');
        }
        else {
            $('#main-header').removeClass('scrolled');
            $('#page-content').removeClass('scrolled');
            $('#page-banner').removeClass('scrolled');
            $('.filters').removeClass('scrolled');
            $('#artisan-content').removeClass('scrolled');
        }
    }
    $('#back-top').click(function() {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    window.onscroll = function() {
        backBtnShow();
        headerScrolled();
    };
    $(window).on('mouseup', function (e) {
        var clicked = $(e.target);
        var clickTarget = clicked.find('.mini-cart');
        if (clickTarget.length === 0) {
            $('.mini-cart').removeClass('active');
        }
    });
    /*website end*/
    /*plugin*/

    /*masonry*/
    var masonry = $(".masonry");
    masonry.imagesLoaded(function () {
        masonry.masonry({
            itemSelector: '.item',
        });
    });
    /*masonry end*/

    /*data-fancy*/
    $('.vdo').fancybox({
       thumb:{
           autoStart: false,
       },
        'width':wScreen.availWidth - 100,
        'height':wScreen.availHeight - 100,
        'autoSize' : false,
        buttons: [
            "zoom",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
    });

    /*map*/
    function initMap() {
            // The location of Uluru
            var uluru = {lat: 23.806925, lng: 90.368698};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 16, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
    }
    initMap();
    /*map end*/

    /*data-fancy end*/

    /*plugin end*/
});
