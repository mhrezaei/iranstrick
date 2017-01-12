
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {{ Setting::get(Setting::getLocale() . '_site_title') }}<br>
                {{ Setting::get(Setting::getLocale() . '_address') }}<br>
                {{ Setting::get(Setting::getLocale() . '_tel') }}
            </div>
            <div class="col-md-8">
                <ul class="list-inline text-end">
                    <li><a href="">About</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">News & Events</a></li>
                    <li><a href="">Contact</a></li>
                    <li class="languages">
                        @if(Setting::getLocale() == 'fa')
                            <a href="{{ url('/en') }}">English</a>
                            <a href="{{ url('/fa') }}" class="active">فارسی</a>
                        @else
                            <a href="{{ url('/en') }}" class="active">English</a>
                            <a href="{{ url('/fa') }}">فارسی</a>
                        @endif
                    </li>
                    <p></p>
                    <a>All rights reserved 2016</a>
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
            autoplay: true
        });
        $(".highlights-slider-text").owlCarousel({
            items: 1,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            loop: true,
            autoplay: true,
        });
        $(".highlights-slider").on('changed.owl.carousel', function(event) {
            $(".highlights-slider-text").trigger('to.owl.carousel', event.page.index)
        });
        $(".highlights-slider-text").on('changed.owl.carousel', function(event) {
            $(".highlights-slider").trigger('to.owl.carousel', event.page.index)
        });

        $(".links-slider").owlCarousel({
            autoplay: false,
            loop: true,
            dots: false,
            autoWidth: true,
            items: 5,
            margin: 30,
        });
    });
</script>

</body>
</html>
