(function ($) {
	'use strict'

	const headerH = $('.header').outerHeight();

	console.log('Hello from script.js ');

	// Preloader 
	$('html').addClass('js');
	$(window).on('load', function () {
		// console.log('preloader');
		$("#preloader").fadeOut();
	});

	$('.hamburger').on('click', function () {
		$(this).toggleClass('active');
		$('#main-menu').toggleClass('open');
		$('main').toggleClass('blur');
	});

	//Slick.js carousel init
	$('.carousel__list').slick({
		autoplay: true,
		infinite: true,
		speed: 300,
		fade: true,
		cssEase: 'ease-in',
		nextArrow: '<button class="carousel__btn carousel__btn--prev btn">&lsaquo;</button>',
		prevArrow: '<button class="carousel__btn carousel__btn--next btn">&rsaquo;</button>'
	});


	// Scroll Animations 

	$(window).on('scroll', function() {
		if($(window).scrollTop() > headerH ) {
			$('.hide-text').addClass('active');
		} else {
			$('.hide-text').removeClass('active');
		}
	});

	// LazyLoad init
	const myLazyLoad = new LazyLoad({
		elements_selector: ".lazy",
		threshold: 50,
		// callback_enter: (el)=>{console.log('view', el)}
	});


	// Instafeeed
	// Init instafeed.js
	var instaFeed = new Instafeed({
		get: 'user',
		userId: '1394009005',
		clientId: '3ee3dcd44bdb4ebd8d86b678912ae41f',
		target: 'instagram',
		accessToken: '1394009005.3ee3dcd.b19c16774879468182aa8d20bebc82da',
		resolution: 'standard_resolution',
		sortBy: 'most-recent',
		limit: 1,
		template: '<a href="{{link}}" class="box__img" target="_blank">' +
			'<img alt="{{user.full_name}}" src="{{image}}"></a>' +
			'<div class="box__content"><h2 class="box__title">#insta</h2><p class="box__caption">{{capion}}</p></div>'
	});

	if ($('#instagram').length) {
		instaFeed.run();
	}



	// Floating labels in contact page 

	const addFloating = e => {
		const contactInput = $(e.target).closest('.contact__input');
		contactInput.addClass('contact__input--focus');
	}

	const removeFloating = e => {
		const inputVal = e.target.value;
		// console.log(input);
		if (inputVal == '') {
			const contactInput = $(e.target).closest('.contact__input');
			contactInput.removeClass('contact__input--focus');
		}
	}

	if ($('.contact__input').length > 0) {
		$('input, textarea').on('focus', addFloating);
		$('input, textarea').on('blur', removeFloating);
	}


	// Compare photos before & after retouch

	if ($('.compare').length) {
		$('.compare__container').twentytwenty();
	}



})(jQuery)