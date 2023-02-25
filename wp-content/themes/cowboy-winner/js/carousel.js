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
		loop: true,
		nav: false,
		margin: 70,
		smartSpeed: 750,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
		responsiveClass: true,
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
		smartSpeed: 750,
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
	$(".wq-carousel_estatisticas").owlCarousel({
		loop: true,
		nav: false,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		margin: 50,
		smartSpeed: 750,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive:{
			0:{
				items: 1
			},
			500:{
				margin: 20,
				items: 2
			},
			740:{
				margin: 30,
				items: 3
			},
			1000:{
				items: 3
			}
		}
	});

	$(".wq-carousel_sobre").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		smartSpeed: 750,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
	});

	$(".wq-carousel_clientes").owlCarousel({
		loop: true,
		nav: false,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		margin: 20,
		smartSpeed: 750,
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
		smartSpeed: 750,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
	});

	$('.wq-list-carousel').owlCarousel({
		margin:20,
		loop:false,
		autoWidth:true
	})
	$('.product-categories').owlCarousel({
		margin:20,
		loop:false,
		autoWidth:true
	})
});
