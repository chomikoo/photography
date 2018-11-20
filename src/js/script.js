(function ($) {
	'use strict'
	console.log('Hello from script.js ');

	const headerH = $('.header').outerHeight();

	// Document events

	$(document).on('keyup', e => {
		if ( e.key === 'Escape' ) {
			closeModal();
		}
	})


	// Preloader 
	$('html').addClass('js');
	$(window).on('load', () => {
		$("#preloader").fadeOut();
	});

	$('.hamburger').on('click', () => {
		$(this).toggleClass('active');
		$('#main-menu').toggleClass('open');
		$('main').toggleClass('blur');
		$('body').addClass('no-scroll');
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

	$(window).on('scroll', () => {
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
	const setCompareWrapperWidth = () => {
		const imgWidth = $('.compare__img').width();
		console.log('imgWidth ', imgWidth);
		$('.compare').css('width', imgWidth);
	}

	if ($('.compare').length) {
		setCompareWrapperWidth();
		$('.compare__container').twentytwenty({
			before_label: 'Przed', 
			after_label: 'Po', 
		});


	}

	// Open Modal

	const openModal = () => {
		// console.log('Open');
		$('.modal--ajax').addClass('open');

		if( $('.modal--ajax .compare__container').length ) {
			$('.modal--ajax .compare__container').twentytwenty({
				before_label: 'Przed', 
				after_label: 'Po', 
			});
			setCompareWrapperWidth();
		}
	}

	const closeModal = () => {
		// console.log('Close');
		$('body').removeClass('no-scroll');
		$('.main').removeClass('blur');
		$('.modal--ajax').removeClass('open');
		$('#ajax-container').html('');
	}

	$('.modal--ajax .btn--close').on('click', closeModal);

	// Ajax - Post loading into modal
	
	$.ajaxSetup({cache: false});
	const loadPostAjax = function(e) {
		e.preventDefault();
		console.log('AJAX', e);
		const $this = $(this);
		const modalContainer = $('#ajax-container');
		const post_link = $this.attr('href');

		console.log(post_link);

		modalContainer.load(post_link + ' #main', openModal);
		$('.main').addClass('blur');
		$('body').addClass('no-scroll');

		return false;
	}

	$(document).on('click', '.modal-link', loadPostAjax);



})(jQuery)