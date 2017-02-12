<script>
    $(document).ready(function () {
        $(".main-header-slider").owlCarousel({
            autoplay: true,
            autoplaySpeed: 1000,
            items: 1,
            autoplayHoverPause: true,
            dots: false,
            goToFirstSpeed: 2000,
            loop: true,
            nav: true,
            responsive:{
                0:{
                    stagePadding: 0,
                },
                600:{
                    stagePadding: 100,
                },
                800:{
                    stagePadding: 150,
                },
                1200:{
                    stagePadding: 200,
                },
                1400:{
                    stagePadding: 300,
                }
            },
            onInitialized: function(){
                this.$element.find('.owl-nav').outerWidth($(this._items[this._current]).outerWidth())
            },
            onResized: function(){
                this.$element.find('.owl-nav').outerWidth($(this._items[this._current]).outerWidth())
            }
        });

        $(".highlights-slider").owlCarousel({
            items: 1,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            loop: true,
            autoplay: true,
            autoplaySpeed: 1000,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            animateOut: 'fadeOut',
        });
        $(".highlights-slider-text").owlCarousel({
            autoplayHoverPause: true,
            items: 1,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            loop: true,
            autoplay: true,
            animateOut: 'fadeOut',
        });
        var sliderTimeout;
        $(".highlights-slider, .highlights-slider-text").hover(function(){
            $(".highlights-slider, .highlights-slider-text").trigger('stop.owl.autoplay');
            clearTimeout(sliderTimeout);
        },function(){
            sliderTimeout = setTimeout(function(){$(".highlights-slider, .highlights-slider-text").trigger('play.owl.autoplay');}, 1000);
        });
        $(".highlights-slider").on('changed.owl.carousel', function(event) {
            $(".highlights-slider-text").trigger('to.owl.carousel', event.page.index)
        });
        $(".highlights-slider-text").on('changed.owl.carousel', function(event) {
            $(".highlights-slider").trigger('to.owl.carousel', event.page.index)
        });

        $(".links-slider").owlCarousel({
            autoplay: true,
            loop: true,
            dots: false,
            items: 6,
            margin: 30,
            mouseDrag: false,
            nav: true,
            autoplayTimeout: 2500,
            responsive:{
                0:{
                    items: 4
                },
                800:{
                    items: 6
                },
                1200:{
                    items: 7
                },
                1600:{
                    items: 8
                }
            }
        });

        $(".expo-slider").owlCarousel({
            animateOut: 'fadeOut',
            autoplay: true,
            loop: true,
            dots: false,
            nav: true,
            items: 1,
            mouseDrag: false,
        });
    });
</script>