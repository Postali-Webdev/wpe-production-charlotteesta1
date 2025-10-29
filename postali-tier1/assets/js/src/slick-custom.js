
jQuery( function ( $ ) {
    "use strict";

 /**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
    "use strict";

    $('#awards-slider').slick({
        dots: true,
        appendDots:'.slider-dots',
        infinite: true,
        fade: false,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows:false,
        swipeToSlide: true,
        cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                slidesToShow: 2
                }
            },
            {
                breakpoint: 601,
                settings: {
                slidesToShow: 1
                }
            }
        ]
    });

    $('#results-slider').slick({
		dots: true,
		infinite: true,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        appendDots: $('.slider-dots-result')
	});

    $('#attorney-slider').slick({
		dots: false,
		infinite: true,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
	});

    $('#generic-slider').slick({
		dots: true,
		infinite: true,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        appendDots: $('.slider-dots-generic')
	});

    $('#testimonial-slider').slick({
		dots: true,
		infinite: true,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        appendDots: $('.slider-dots-testimonial')
	});


    $('.slider-next-button-slick').click(function(){
        $('#results-slider').slick("slickNext");
    });
    $('.slider-prev-button-slick').click(function(){
        $('#results-slider').slick("slickPrev");
    });

    $('.slider-next-button-slick-testimonial').click(function(){
        $('#testimonial-slider').slick("slickNext");
    });
    $('.slider-prev-button-slick-testimonial').click(function(){
        $('#testimonial-slider').slick("slickPrev");
    });

    $('.slider-next-button-slick-generic').click(function(){
        $('#generic-slider').slick("slickNext");
    });
    $('.slider-prev-button-slick-generic').click(function(){
        $('#generic-slider').slick("slickPrev");
    });

    $('.slider-next-button-slick-attorney').click(function(){
        $('#attorney-slider').slick("slickNext");
    });
    $('.slider-prev-button-slick-attorney').click(function(){
        $('#attorney-slider').slick("slickPrev");
    });

	$('.awards-block').slick({
	dots: false,
	infinite: true,
	autoplay: true,
	autoplaySpeed: 3000,
	speed: 1300,
	slidesToShow: 5,
	slidesToScroll: 1,
	prevArrow: false,
	nextArrow: false,
	swipeToSlide: true,
	cssEase: 'ease-in-out',
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 6,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 820,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 375,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
	]
});
  
});

});
