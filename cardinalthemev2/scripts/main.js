/************************************************************************/
/**************************** GLOBAL SCRIPTS ****************************/
/************************************************************************/

// VARIABLES
var body = $("body");
var win = $(window);
var mobileNavIcon = $("#hamburgerButton");
var mobileNav = $(".nav--main__drawer");
var navHeight = $(".nav--main").height();
var mainSections = $(".main--sections");

var textToClick = $(".section--search-hero .text");
var dropdown = $(".section--search-hero .dropdown");
var faqQuestion = $(".section--faq .question");
var tabContent = $(".tab-content");
var customFilterBtn = $(".custom-filter-button");
var slickArrow = $('.tabs .slick-slider .slick-arrow');
var tabContent = $(".tabcontent");

$(document).ready(function () {
  
  mainSections.css({ marginTop: navHeight });

  mobileNavIcon.click(function () {
    mobileNavToggle();
  });

  textToClick.click(function () {
    console.log('i clicked');
    dropdownToggle();
  });

  faqQuestion.click(function () {
    $(this).parent().siblings().removeClass("expanded");
    $(this).parent().siblings().find("#button").removeClass("expanded");
    $(this).parent().siblings().find(".answer").slideUp();
    $(this).toggleClass("expanded");
    $(this).parent().find("#button").toggleClass("expanded");
    $(this).parent().find(".answer").slideToggle();
  });

  customFilterBtn.click(function () {
    $(this).siblings().removeClass("active");
    $(this).addClass("active");
  });

  win.on("resize", function () {
    if (win.width() >= 768) {
      mobileNavReset();
    }
  });

  $(".slider-on-mobile").slick({
    arrows: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
      breakpoint: 1023,
      settings: "unslick",
      }
    ]
  });

  $(".slider").slick({
    arrows: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".slider--logo").slick({
    arrows: false,
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 1500,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          arrows: false,
          dots: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 1500,
          slidesToShow: 5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1280,
        settings: {
          arrows: false,
          dots: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 1500,
          slidesToShow: 4,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          arrows: false,
          dots: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 1500,
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          dots: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 1500,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".slider__synced-content").slick({
    arrows: false,
    dots: true,
    asNavFor: '.slider__synced-nav',
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    draggable: false,
  });
  
  $(".slider__synced-nav").slick({
    arrows: false,
    dots: false,
    asNavFor: '.slider__synced-content',
    slidesToShow: 4,
    draggable: false,
    focusOnSelect: true,
    variableWidth: true,
    fade: false,
    responsive: [
      {
      breakpoint: 1023,
      settings: {
        arrows: true,
        dots: false,
        asNavFor: '.slider__synced-content',
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: false,
        fade: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><img src='/wp-content/themes/cardinalthemev2/assets/arrow-1.png' alt='Previous Arrow' /></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><img src='/wp-content/themes/cardinalthemev2/assets/arrow-2.png' alt='Next Arrow' /></button>",
        
      }
    }
    ]
  });

  $(".slider__synced-content-2").slick({
    arrows: false,
    dots: true,
    asNavFor: '.slider__synced-nav-2',
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    draggable: false,
  });
  
  $(".slider__synced-nav-2").slick({
    arrows: false,
    dots: false,
    asNavFor: '.slider__synced-content-2',
    slidesToShow: 2,
    draggable: false,
    focusOnSelect: true,
    variableWidth: true,
    fade: false,
    responsive: [
      {
      breakpoint: 1023,
      settings: {
        arrows: true,
        dots: false,
        asNavFor: '.slider__synced-content-2',
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: false,
        fade: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><img src='/wp-content/themes/cardinalthemev2/assets/arrow-1.png' alt='Previous Arrow' /></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><img src='/wp-content/themes/cardinalthemev2/assets/arrow-2.png' alt='Next Arrow' /></button>",
        
      }
    }
    ]
  });

  $(".slider--video").slick({
    arrows: false,
    dots: true,
    infinite: true,
    centerMode: true,
    centerPadding: '60px',
    focusOnSelect: true,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".slider--vertical").slick({
    arrows: false,
    dots: true,
    vertical: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    verticalSwiping: true,
    autoplay: true,
    autoplaySpeed: 2000, 
  });

  $(".slider--custom-dots").slick({
    arrows: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    customPaging: function(slider, i) {
      var slideNumber = i + 1;
      return '<span class="number">0' + slideNumber + '</span>';
    },
  });

  
});

$(document).ready(function () {
  $(function ($) {
    "use strict";

    var counterUp = window.counterUp["default"]; 

    var $counters = $(".section .number");

    $counters.each(function (ignore, counter) {
      var waypoint = new Waypoint({
        element: $(this),
        handler: function () {
          counterUp(counter, {
            duration: 1000,
            delay: 16,
          });
          this.destroy();
        },
        offset: "bottom-in-view",
      });
    });
  });
});

$(document).ready(function() {
  $('.slider--video').click(function () {
    $('.slider--video .video').removeClass('play');
    $('.slider--video .slick-active').addClass('play'); 
  });
});
function mobileNavToggle() {
  mobileNavIcon.toggleClass("is-open");
  mobileNav.toggleClass("is-open");
}

function mobileNavReset() {
  mobileNavIcon.removeClass("is-open");
  mobileNav.removeClass("is-open");
}

function dropdownToggle() {
  dropdown.toggleClass("is-open");
}

function openATab(evt, tabName) {
  const windowWidth = window.innerWidth;
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


$(document).ready(function() {
  if (tabContent.length > 0){
    document.getElementById("tabLink0").click();
    tabContent.first().trigger( "click" );
  }
});




