/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#menu-main-menu').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#menu-main-menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-tick-down"></span></span></div>');

	  $('#menu-main-menu .accordion-toggle').click(function() {
		$(this).parent().find('> ul').slideToggle(400);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon-tick-down').toggleClass('toggle-rotate');
	  });

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	$(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.css('display', 'block');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				subMenu.css('display', 'none');
			});
		});
	});

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-search-icon').addClass('icon-close-x');
						$('#menu-main-menu li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

    // tab-through functionality
    $(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.addClass('show');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				subMenu.removeClass('show');
			});
			$(this).find('.sub-menu').on('mouseout', function() {
				subMenu.addClass('remove');
			});
		});
	});

	// removes dropdown if user clicks it open and then clicks elsewhere on the page
	$(document).ready(function() { 
		var width = $(document).outerWidth();
		if( width > 1024 ) {
			$(document).on('click', function(e) {
				if( !$(e.target).closest('#header-top_menu').length ) {
					if( $('.sub-menu').hasClass('show') ) {
						$('.sub-menu.show').removeAttr('style');
						$('.sub-menu').removeClass('show');
					}
				}
			})
		}
	})

	$(document).ready(function() { 
		$('.view-all-btn').on('click', function(){
			$(this).toggleClass('active');
			$(this).next('.list').slideToggle(300, "linear");
			$(this).next('.list').find('li').toggleClass('active');
			$(this).closest('.child-pa-wrapper').toggleClass('active');
			
			if( $(this).hasClass('active') ) {
				$(this).text('Close');
			} else {
				$(this).text('View All Pages');
			}
		})
	})

});