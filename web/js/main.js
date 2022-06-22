(function($) {

  'use strict';

  var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
      if (!uniqueId) {
        uniqueId = "Don't call this twice without a uniqueId";
      }
      if (timers[uniqueId]) {
        clearTimeout (timers[uniqueId]);
      }
      timers[uniqueId] = setTimeout(callback, ms);
    };
  })();

  // Collapses
  function collapses(groupName) {
    var $myGroup = $(groupName);
    $myGroup.on('show.bs.collapse','.collapse', function() {
        $myGroup.find('.collapse.in').collapse('hide');
    });
  }

  // Fanycbox gallery
  function fancybox() {
    $('').fancybox({
      selector : '.videos .slick-slide:not(.slick-cloned)',
      loop: true,
      buttons : [
      "zoom",
      "fullScreen",
      "close",
      ],
    });
    $('').fancybox({
      selector : '.project-page .slick-slide:not(.slick-cloned)',
      loop: true,
      buttons : [
      "zoom",
      "fullScreen",
      "close",
      ],
    });
  };

  // Footer
  function footer() {
    if ($("#bottom").length) {
      var height = Math.round(document.getElementById('bottom').offsetHeight);
      $(".wrapper .content").css('padding-bottom', height);
      $("#bottom").css('margin-top', -height);
    }
  };

  // Footer auto on resize
  function footerAuto() {
    $(window).on('resize', function(){
      waitForFinalEvent(function(){
        footer();
      }, 100, "footer");
    });
  };

  // Mask
  function mask() {
    $('.phone-mask').mask('+7 (000) 000-00-00', {
        placeholder: "+7 (___) ___-__-__"
    });
  };

  //Modal fix
  function modalFix() {
    $(document).on('click', '.new-tab', function(){
      $('#' + $(this).closest('.modal').attr('id')).modal('hide');
      var dataHref = $(this).data('href');
      console.log(dataHref);
      function openModal(href) {
        console.log(href);
        $($('.new-tab').data('href')).modal('show');
      }
      setTimeout(openModal.bind(null, dataHref), 700);
    });
  };

  // Scrollbar
  function scrollbar() {
    if ($("#about-scrollbar").length) {
      var scrollbar = window.Scrollbar;
      scrollbar.init(document.querySelector('#about-scrollbar'), {
      });
    }
  };

  // Scroll to target
  function scrollToTarget() {
    $('.scroll-to-target').on('click', function() {
      var target = $(this).attr('href');
      $('html, body').animate({
        scrollTop: $(target).offset().top
      }, 1000);
      return false;
    });
  };

  // Scroll to top
  function scrollToTop() {
    if ($('#back-to-top').length) {
      var scrollTrigger = 100,
      backToTop = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > scrollTrigger) {
          $('#back-to-top').addClass('show');
        } else {
          $('#back-to-top').removeClass('show');
        }
      };
      backToTop();
      $(window).on('scroll', function () {
        backToTop();
      });
      $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 400);
      });
    }
  };

  // Actions slider
  function sliderActions() {
    $('.actions .a-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.a-controls .slick-switches .ss-dots', $(this).closest('.actions')),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          },
        ]
      });

      $('.a-controls .slick-switches .ss-switch.prev', $(this).closest(".actions")).click(function() {
        $('.slick-slider-alt', $(this).closest('.actions')).slick('slickPrev');
      });

      $('.a-controls .slick-switches .ss-switch.next', $(this).closest(".actions")).click(function() {
        $('.slick-slider-alt', $(this).closest('.actions')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 3 && window.innerWidth >= 992 || numItems > 2 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575) {
        $('.a-controls', $(this).closest('.actions')).css('display', '');
        $('.a-slider .slick-slider-alt', $(this).closest('.actions')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 3 && window.innerWidth >= 992 || numItems > 2 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
            $('.a-controls', currentSlider.closest('.actions')).css('display', '');
            $('.a-slider .slick-slider-alt', currentSlider.closest('.actions')).removeClass('slick-static');
          } else {
            $('.a-controls', currentSlider.closest('.actions')).css('display', 'none');
            $('.a-slider .slick-slider-alt', currentSlider.closest('.actions')).addClass('slick-static');
          };
        }, 100, "slider_actions");
      });
    });
  };

  // Employees slider
  function sliderEmployees() {
    $('.employees .e-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.e-controls .slick-switches .ss-dots', $(this).closest('.employees')),
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      });

      $('.e-controls .slick-switches .ss-switch.prev', $(this).closest(".employees")).click(function() {
        $('.slick-slider-alt', $(this).closest('.employees')).slick('slickPrev');
      });

      $('.e-controls .slick-switches .ss-switch.next', $(this).closest(".employees")).click(function() {
        $('.slick-slider-alt', $(this).closest('.employees')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 4 && window.innerWidth >= 1200 || numItems > 3 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 2 && (window.innerWidth <= 767 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575) {
        $('.e-controls', $(this).closest('.employees')).css('display', '');
        $('.e-slider .slick-slider-alt', $(this).closest('.employees')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 4 && window.innerWidth >= 1200 || numItems > 3 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 2 && (window.innerWidth <= 767 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
            $('.e-controls', currentSlider.closest('.employees')).css('display', '');
            $('.e-slider .slick-slider-alt', currentSlider.closest('.employees')).removeClass('slick-static');
          } else {
            $('.e-controls', currentSlider.closest('.employees')).css('display', 'none');
            $('.e-slider .slick-slider-alt', currentSlider.closest('.employees')).addClass('slick-static');
          };
        }, 100, "slider_employees");
      });
    });
  };

  // Goods slider
  function sliderGoods() {
    $('.goods .g-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.g-controls .slick-switches .ss-dots', $(this).closest('.goods')),
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      });

      $('.g-controls .slick-switches .ss-switch.prev', $(this).closest(".goods")).click(function() {
        $('.slick-slider-alt', $(this).closest('.goods')).slick('slickPrev');
      });

      $('.g-controls .slick-switches .ss-switch.next', $(this).closest(".goods")).click(function() {
        $('.slick-slider-alt', $(this).closest('.goods')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 4 && window.innerWidth >= 1200 || numItems > 3 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 2 && (window.innerWidth <= 767 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
        $('.g-controls', $(this).closest('.goods')).css('display', '');
        $('.g-slider .slick-slider-alt', $(this).closest('.goods')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 4 && window.innerWidth >= 1200 || numItems > 3 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 2 && (window.innerWidth <= 767 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
            $('.g-controls', currentSlider.closest('.goods')).css('display', '');
            $('.g-slider .slick-slider-alt', currentSlider.closest('.goods')).removeClass('slick-static');
          } else {
            $('.g-controls', currentSlider.closest('.goods')).css('display', 'none');
            $('.g-slider .slick-slider-alt', currentSlider.closest('.goods')).addClass('slick-static');
          };
        }, 100, "slider_goods");
      });
    });
  };

  // News slider
  function sliderNews() {
    $('.news .n-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.n-controls .slick-switches .ss-dots', $(this).closest('.news')),
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          },
        ]
      });

      $('.n-controls .slick-switches .ss-switch.prev', $(this).closest(".news")).click(function() {
        $('.slick-slider-alt', $(this).closest('.news')).slick('slickPrev');
      });

      $('.n-controls .slick-switches .ss-switch.next', $(this).closest(".news")).click(function() {
        $('.slick-slider-alt', $(this).closest('.news')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 3 && window.innerWidth >= 992 || numItems > 2 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575) {
        $('.n-controls', $(this).closest('.news')).css('display', '');
        $('.n-slider .slick-slider-alt', $(this).closest('.news')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 3 && window.innerWidth >= 992 || numItems > 2 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
            $('.n-controls', currentSlider.closest('.news')).css('display', '');
            $('.n-slider .slick-slider-alt', currentSlider.closest('.news')).removeClass('slick-static');
          } else {
            $('.n-controls', currentSlider.closest('.news')).css('display', 'none');
            $('.n-slider .slick-slider-alt', currentSlider.closest('.news')).addClass('slick-static');
          };
        }, 100, "slider_news");
      });
    });
  };

  //Main slider
  function sliderMain() {
    $('.main-slider .slick-slider').each(function() {
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.ms-controls .slick-switches .ss-dots', $(this).closest('.main-slider')),
      });

      $('.ms-controls .slick-switches .ss-switch.prev', $(this).closest(".main-slider")).click(function() {
        $('.slick-slider', $(this).closest('.main-slider')).slick('slickPrev');
      });

      $('.ms-controls .slick-switches .ss-switch.next', $(this).closest(".main-slider")).click(function() {
        $('.slick-slider', $(this).closest('.main-slider')).slick('slickNext');
      });

      var numItems =  $('.ms-slide', $(this)).length;
      if (numItems > 1) {
        $('.ms-controls', $(this).closest(".main-slider")).css('display', '');
      }
    })
  };

  // Partners slider
  function sliderPartners() {
    $('.partners .p-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.p-controls .slick-switches .ss-dots', $(this).closest('.partners')),
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
        ]
      });

      $('.p-controls .slick-switches .ss-switch.prev', $(this).closest(".partners")).click(function() {
        $('.slick-slider-alt', $(this).closest('.partners')).slick('slickPrev');
      });

      $('.p-controls .slick-switches .ss-switch.next', $(this).closest(".partners")).click(function() {
        $('.slick-slider-alt', $(this).closest('.partners')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 4 && window.innerWidth >= 992 || numItems > 3 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 2 && window.innerWidth <= 575) {
        $('.p-controls', $(this).closest('.partners')).css('display', '');
        $('.p-slider .slick-slider-alt', $(this).closest('.partners')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 4 && window.innerWidth >= 992 || numItems > 3 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 2 && window.innerWidth <= 575)  {
            $('.p-controls', currentSlider.closest('.partners')).css('display', '');
            $('.p-slider .slick-slider-alt', currentSlider.closest('.partners')).removeClass('slick-static');
          } else {
            $('.p-controls', currentSlider.closest('.partners')).css('display', 'none');
            $('.p-slider .slick-slider-alt', currentSlider.closest('.partners')).addClass('slick-static');
          };
        }, 100, "slider_partners");
      });
    });
  };

  // Projects slider
  function sliderProjects() {
    $('.projects .p-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        fade: true,
        cssEase: 'linear',
        dots: false,
        draggable: false,
        swipe: false,
      });
    });
    $('.projects .p-slider-preview .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 7,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        infinite: true,
        centerMode: true,
        centerPadding: 0,
        asNavFor: $(".p-slider .slick-slider-alt", $(this).closest('.projects')),
        appendDots: $('.p-controls .slick-switches .ss-dots', $(this).closest('.projects')),
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 5,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
            }
          },
        ]
      });

      $('.p-controls .slick-switches .ss-switch.prev', $(this).closest(".projects")).click(function() {
        $('.p-slider-preview .slick-slider-alt', $(this).closest('.projects')).slick('slickPrev');
      });

      $('.p-controls .slick-switches .ss-switch.next', $(this).closest(".projects")).click(function() {
        $('.p-slider-preview .slick-slider-alt', $(this).closest('.projects')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 7 && window.innerWidth >= 1200 || numItems > 5 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 3 && window.innerWidth <= 767)  {
        $('.p-controls', $(this).closest('.projects')).css('display', '');
        $('.p-slider-preview .slick-slider-alt', $(this).closest('.projects')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 7 && window.innerWidth >= 1200 || numItems > 5 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 3 && window.innerWidth <= 767)  {
            $('.p-controls', currentSlider.closest('.projects')).css('display', '');
            $('.p-slider-preview .slick-slider-alt', currentSlider.closest('.projects')).removeClass('slick-static');
          } else {
            $('.p-controls', currentSlider.closest('.projects')).css('display', 'none');
            $('.p-slider-preview .slick-slider-alt', currentSlider.closest('.projects')).addClass('slick-static');
          };
        }, 100, "slider_projects");
      });
    });
  };

  // Project page slider
  function sliderProjectPage() {
    $('.project-page .pp-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 7,
        slidesToScroll: 7,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        infinite: true,
        appendDots: $('.pp-controls .slick-switches .ss-dots', $(this).closest('.project-page')),
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 5,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
        ]
      });

      $('.pp-controls .slick-switches .ss-switch.prev', $(this).closest(".project-page")).click(function() {
        $('.pp-slider .slick-slider-alt', $(this).closest('.project-page')).slick('slickPrev');
      });

      $('.pp-controls .slick-switches .ss-switch.next', $(this).closest(".project-page")).click(function() {
        $('.pp-slider .slick-slider-alt', $(this).closest('.project-page')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 7 && window.innerWidth >= 1200 || numItems > 5 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 3 && window.innerWidth <= 767)  {
        $('.pp-controls', $(this).closest('.project-page')).css('display', '');
        $('.pp-slider .slick-slider-alt', $(this).closest('.project-page')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 7 && window.innerWidth >= 1200 || numItems > 5 && (window.innerWidth <= 1199 && window.innerWidth >= 768) || numItems > 3 && window.innerWidth <= 767)  {
            $('.pp-controls', currentSlider.closest('.project-page')).css('display', '');
            $('.pp-slider .slick-slider-alt', currentSlider.closest('.project-page')).removeClass('slick-static');
          } else {
            $('.pp-controls', currentSlider.closest('.project-page')).css('display', 'none');
            $('.pp-slider .slick-slider-alt', currentSlider.closest('.project-page')).addClass('slick-static');
          };
        }, 100, "slider_project_page");
      });
    });
  };

  // Reviews slider
  function sliderReviews() {
    $('.reviews .r-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.r-controls .slick-switches .ss-dots', $(this).closest('.reviews')),
      });

      $('.r-controls .slick-switches .ss-switch.prev', $(this).closest(".reviews")).click(function() {
        $('.slick-slider-alt', $(this).closest('.reviews')).slick('slickPrev');
      });

      $('.r-controls .slick-switches .ss-switch.next', $(this).closest(".reviews")).click(function() {
        $('.slick-slider-alt', $(this).closest('.reviews')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 1) {
        $('.r-controls', $(this).closest('.reviews')).css('display', '');
        $('.r-slider .slick-slider-alt', $(this).closest('.reviews')).removeClass('slick-static');
      }
    });
  };

  // Services slider
  function sliderServices() {
    $('.services .s-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.s-controls .slick-switches .ss-dots', $(this).closest('.services')),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          },
        ]
      });

      $('.s-controls .slick-switches .ss-switch.prev', $(this).closest(".services")).click(function() {
        $('.slick-slider-alt', $(this).closest('.services')).slick('slickPrev');
      });

      $('.s-controls .slick-switches .ss-switch.next', $(this).closest(".services")).click(function() {
        $('.slick-slider-alt', $(this).closest('.services')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 2 && window.innerWidth >= 768 || numItems > 1 && window.innerWidth <= 767)  {
        $('.s-controls', $(this).closest('.services')).css('display', '');
        $('.s-slider .slick-slider-alt', $(this).closest('.services')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 2 && window.innerWidth >= 768 || numItems > 1 && window.innerWidth <= 767)  {
            $('.s-controls', currentSlider.closest('.services')).css('display', '');
            $('.s-slider .slick-slider-alt', currentSlider.closest('.services')).removeClass('slick-static');
          } else {
            $('.s-controls', currentSlider.closest('.services')).css('display', 'none');
            $('.s-slider .slick-slider-alt', currentSlider.closest('.services')).addClass('slick-static');
          };
        }, 100, "slider_services");
      });
    });
  };

  // Videos slider
  function sliderVideos() {
    $('.videos .v-slider .slick-slider-alt').each(function() {
      $(this).slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: true,
        appendDots: $('.v-controls .slick-switches .ss-dots', $(this).closest('.videos')),
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      });

      $('.v-controls .slick-switches .ss-switch.prev', $(this).closest(".videos")).click(function() {
        $('.slick-slider-alt', $(this).closest('.videos')).slick('slickPrev');
      });

      $('.v-controls .slick-switches .ss-switch.next', $(this).closest(".videos")).click(function() {
        $('.slick-slider-alt', $(this).closest('.videos')).slick('slickNext');
      });

      var numItems = $('.ss-item', $(this)).length;
      if (numItems > 3 && window.innerWidth >= 992 || numItems > 2 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
        $('.v-controls', $(this).closest('.videos')).css('display', '');
        $('.v-slider .slick-slider-alt', $(this).closest('.videos')).removeClass('slick-static');
      }

      var currentSlider = $(this);

      $(window).on('resize', function(){
        waitForFinalEvent(function(){
          var numItems = $('.ss-item', currentSlider).length;
          if (numItems > 3 && window.innerWidth >= 992 || numItems > 2 && (window.innerWidth <= 991 && window.innerWidth >= 576) || numItems > 1 && window.innerWidth <= 575)  {
            $('.v-controls', currentSlider.closest('.videos')).css('display', '');
            $('.v-slider .slick-slider-alt', currentSlider.closest('.videos')).removeClass('slick-static');
          } else {
            $('.v-controls', currentSlider.closest('.videos')).css('display', 'none');
            $('.v-slider .slick-slider-alt', currentSlider.closest('.videos')).addClass('slick-static');
          };
        }, 100, "slider_videos");
      });
    });
  };

  // Table style
  function tableStyle() {
    if ($(".content").length) {
      $(".content").addClass('content-with-tables');
    }
  };

  // Tooltip and popover
  function tooltip() {
    $("[data-toggle='tooltip']").tooltip();
    $("[data-toggle='popover']").popover();
  };

  // Object fill polyfill
  function objectFill() {
    objectFitImages(null, {watchMQ: true});
  }

  $(document).ready(function() {
    collapses('#questions-collapse');
    fancybox();
    footer();
    footerAuto();
    mask();
    modalFix();
    scrollbar();
    scrollToTarget();
    scrollToTop();
    sliderActions();
    sliderEmployees();
    sliderGoods();
    sliderNews();
    sliderMain();
    sliderPartners();
    sliderProjects();
    sliderProjectPage();
    sliderReviews();
    sliderServices();
    sliderVideos();
    tableStyle();
    tooltip();
    objectFill();
  });

})(jQuery);
