

( function ( $ ) {
	class SlickCarousel {
		constructor() {
			this.initiateCarousel();
		}

		initiateCarousel() {
			$( '.posts' ).slick( {
				autoplay: true,
				autoplaySpeed: 1000,
				slidesToShow: 1,
				dots: true,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
						},
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
				],
				
			} );
		}
	}

	new SlickCarousel();
} )( jQuery );