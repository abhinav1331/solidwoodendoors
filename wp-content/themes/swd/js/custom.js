/********************************Stickey Header*****************************/
        jQuery(window).load(function () {
            jQuery("nav.navbar").sticky({
                topSpacing: 0
            });
        });
/********************************Stickey Header*****************************/
/*********************************Search Icon********************************/
		jQuery(".search-icon").click(function () {
            jQuery(".search-icon").addClass("active");
            jQuery(".search-field").addClass("active");
        });
        jQuery(".search-close-btn").click(function () {
            jQuery(".search-icon").removeClass("active");
            jQuery(".search-field").removeClass("active");
        });
/*********************************Search Icon********************************/
/*******************************Text Button********************************/
		jQuery(".home-text-btn").click(function () {
            jQuery(".home-text").toggleClass("active");
        });
/*******************************Text Button********************************/
/********************************Scroll Name********************************/
		if (navigator.userAgent.match(/Trident\/7\./)) { // if IE
            jQuery('body').on("mousewheel", function () {
                // remove default behavior
                event.preventDefault();

                //scroll without smoothing
                var wheelDelta = event.wheelDelta;
                var currentScrollPosition = window.pageYOffset;
                window.scrollTo(0, currentScrollPosition - wheelDelta);
            });
        }
/********************************Scroll Name********************************/
/********************************Wow Js***********************************/
		var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 140,
            mobile: true,
            live: true,
            callback: function (box) {},
            scrollContainer: null
        });
        wow.init();
/********************************Wow Js***********************************/
/**********************************Portfolio Slider******************************/
		jQuery(window).load(function () {

            jQuery('.portfolio-slider').each(function () {
                var th = jQuery(this);
                th.sldr({
                    focalClass: 'focalPoint',
                    offset: th.width() / 2,
                    sldrWidth: 'responsive',
                    nextSlide: th.nextAll('.sldr-nav.next:first'),
                    previousSlide: th.nextAll('.sldr-nav.prev:first'),
                    selectors: th.nextAll('.selectors:first').find('li'),
                    toggle: th.nextAll('.captions:first').find('div'),
                    sldrInit: sliderInit,
                    sldrStart: slideStart,
                    sldrComplete: slideComplete,
                    sldrLoaded: sliderLoaded,
                    sldrAuto: true,
                    sldrTime: 8000,
                    hasChange: true
                });
            });

        });

        function sliderInit(args) {}

        function slideLoaded(args) {}

        function sliderLoaded(args) {}

        function slideStart(args) {}

        function slideComplete(args) {}
/**********************************Portfolio Slider******************************/