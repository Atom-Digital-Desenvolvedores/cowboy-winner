$(document).ready(function() {

	$(".wq-banner").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
		smartSpeed: 1000,
	});

	$(".wq-depoimentos-carousel").owlCarousel({
		loop:true,
		nav: false,
		margin:90,
		navText:false,
		responsiveClass:true,
		smartSpeed:550,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsiveClass:true,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
		responsive:{
			0:{
				items:1
			},
			500:{
				items:1
			},
			740:{
				items:2
			},
			1000:{
				items:2
			}
		}
	});
	$(".wq-carousel_parceiros").owlCarousel({
		loop: true,
		nav: false,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		margin: 50,
		smartSpeed: 550,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive:{
			0:{
				margin: 20,
				items:2
			},
			500:{
				margin: 20,
				items:3
			},
			740:{
				margin: 30,
				items:4
			},
			1000:{
				items:5
			}
		}
	});
	$(".wq-carousel_sobre").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		smartSpeed: 1000,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
	});
	$(".wq-carousel_clientes").owlCarousel({
		loop: true,
		nav: false,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		margin: 20,
		smartSpeed: 550,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive:{
			0:{
				items:2
			},
			500:{
				items:3
			},
			740:{
				items:4
			},
			1000:{
				items:5
			}
		}
	});
	$(".wq-produto_interna-carousel").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		smartSpeed: 1000,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
	});
});
