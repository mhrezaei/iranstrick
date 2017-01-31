
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {{ Setting::get('en_site_title') }}<br>
                {{ Setting::get('en_address') }}<br>
                {{ Setting::get('en_tel') }}
            </div>
            <div class="col-md-8">
                <ul class="list-inline text-end">
                    <li><a href="{{ url('/en/about') }}">{{ trans('front.about') }}</a></li>
                    {{--<li><a href="">Products</a></li>--}}
                    {{--<li><a href="">Services</a></li>--}}
                    <li><a href="{{ url('/en/news') }}">{{ trans('front.news') }}</a></li>
                    <li><a href="{{ url('/en/contact') }}">{{ trans('front.contact_us') }}</a></li>
                    <li class="languages">
                        <a href="{{ url('/en') }}" class="active">English</a>
                        <a href="{{ url('/fa') }}">فارسی</a>
                    </li>
                    <p>
                        <a>{{ Setting::get('en_site_title') }} All rights reserved 2016</a><br>
                        <a href="http://yasnateam.com" target="_blank">Prepared by Yasna Team</a>
                    </p>
                </ul>

            </div>
        </div>
    </div>
</footer>

{!! Html::script ('assets/js/main.js') !!}
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
            autoplayHoverPause: true,
            nav: true,
        });
        $(".highlights-slider-text").owlCarousel({
            autoplayHoverPause: true,
            items: 1,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            loop: true,
            autoplay: true,
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
            autoWidth: true,
            items: 5,
            margin: 30,
            mouseDrag: false,
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

</body>
</html>
