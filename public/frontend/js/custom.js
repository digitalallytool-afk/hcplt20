$(document).ready(function () {
    
    // h-accordion__panel 
    var panel = $('.acc-li');
        panel.click( function(){
        // console.log('click');
        panel.removeClass('is-open');

        $(this).addClass('is-open');
    });
    
  
	
$(".navbar-nav li a, .service-thumb a").click(function () {
    $('.navbar-nav li a, service-thumb a').removeClass("active");
    $(this).addClass("active");
    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
        var $target = $(this.hash);
        $target = ($target.length && $target) || $("[name=" + this.hash.slice(1) + "]");
        if ($target.length) {
            var targetOffset = $target.offset().top -70;
            $("html,body").animate({ scrollTop: targetOffset }, 1000);
            return false;
        }
    }
});    
    
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(3000).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  //$('body').delay(350).css({'overflow':'hidden'});
  
  
});  
	


 
  $(window).on('load', function() {
     setTimeout(function(){
        $('#myModal').modal('show');


     }, 2000);
    });    
  

    
$(".hamburger-menu").click(function(){
    $('.canvas-menu').toggleClass('slidtop');
     
});

$("#clse").click(function(){
 $('.hamburger-menu').toggleClass('close');  
    
});



 $(window).width() > 991 && $(window).scroll(function() {
        var e = $(".navbar-expand-lg");
        $(window).scrollTop() >= 50 ? e.addClass("fixed") : e.removeClass("fixed")
    }),
    
  
 
 $('span.navbar-toggler-icon').click(function() {
        $(this).toggleClass('cross');
    });


	$('#nav li a').click(function(){
       $('#nav').removeClass('show');
    })  
    

$('.product-nav ul a').click(function(){
    $('.product-nav ul li a').addClass("active");
    //$(this).addClass("active");
  });
  




    
 /*$('.navbar-nav a, .service-thumb a').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname) {
          var $target = $(this.hash);
          $target = $target.length && $target
          || $('[name=' + this.hash.slice(1) +']');
          if ($target.length) {
            var targetOffset = $target.offset().top -70;
            $('html,body')
            .animate({scrollTop: targetOffset}, 1000);
           return false;
          }
        }
      });*/
 


$('.hero-slider').slick({
  infinite: true,
  dots:true,
  slidesToShow:1,
  slidesToScroll: 1,
  autoplay:true,
  easing: 'easeOutElastic',
  speed:1500,
  arrows: false,


});

$('.registration-slider').slick({
  infinite: true,
  dots:false,
  slidesToShow:1,
  slidesToScroll: 1,
  autoplay:true,
  easing: 'easeOutElastic',
  speed:1500,
    prevArrow: '<span class="product-showcase-carousel-controls product-showcase-carousel-controls--left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
  nextArrow: '<span class="product-showcase-carousel-controls product-showcase-carousel-controls--right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
 responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        speed: 300,              // ðŸ‘ˆ fast
        easing: 'linear',        // ðŸ‘ˆ smooth
        swipeToSlide: true,
        touchThreshold: 7,
        waitForAnimate: false,
        draggable: true,
           rows:1, 
      }
    },
    {
      breakpoint: 560,
      settings: {
           
        slidesToShow: 1,
        speed: 300,              // ðŸ‘ˆ fast
        easing: 'linear',        // ðŸ‘ˆ smooth
        swipeToSlide: true,
        touchThreshold: 7,
        waitForAnimate: false,
        draggable: true
        
      }
    }
    ]


});



$('.team-slider').slick({
  infinite: true,
  dots:false,
   rows: 2,  
  slidesToShow:4,
  slidesToScroll: 1,
  autoplay:true,
  easing: 'easeOutElastic',
  speed:2000,
   prevArrow: '<span class="product-showcase-carousel-controls product-showcase-carousel-controls--left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
  nextArrow: '<span class="product-showcase-carousel-controls product-showcase-carousel-controls--right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
 responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        speed: 300,              // ðŸ‘ˆ fast
        easing: 'linear',        // ðŸ‘ˆ smooth
        swipeToSlide: true,
        touchThreshold: 7,
        waitForAnimate: false,
        draggable: true,
           rows:1, 
      }
    },
    {
      breakpoint: 560,
      settings: {
           rows:1,  
        slidesToShow: 1,
        speed: 300,              // ðŸ‘ˆ fast
        easing: 'linear',        // ðŸ‘ˆ smooth
        swipeToSlide: true,
        touchThreshold: 7,
        waitForAnimate: false,
        draggable: true
        
      }
    }
    ]

});


  
 
  $(window).on('load', function() {
     setTimeout(function(){
        $('#hcplModal').modal('show');


     }, 2000);
    });    
  




 

    
wow = new WOW({
    boxClass: "wow", // default
    animateClass: "animated", // default
    offset: 0, // default
    mobile: true, // default
    live: true, // default
});
wow.init();


});


  $(window).on('load', function() {
     setTimeout(function(){
        $('#myModal3').modal('show');


     }, 2000);
    });    
  



