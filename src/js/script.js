(function ($) {
	'use strict'

	console.log('Hello from script.js ');

	$('.hamburger').on('click', function () {
		$(this).toggleClass('active');
		$('#main-menu').toggleClass('open');
		$('main').toggleClass('blur');
	});

	//Slick.js carousel init
	$('.carousel__list').slick({
		autoplay: false,
		infinite: true,
		speed: 300,
		fade: true,
		cssEase: 'ease-in',
		nextArrow: '<button class="carousel__btn carousel__btn--prev btn">&lsaquo;</button>',
		prevArrow: '<button class="carousel__btn carousel__btn--next btn">&rsaquo;</button>'

		// setting-name: setting-value
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

	instaFeed.run();




})(jQuery)