<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                IRANSTRICK<br>
                Address text, address text<br>
                983242344398+:Tel
            </div>
            <div class="col-md-8">
                <ul class="list-inline text-end">
                    <li><a href="">About</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">News & Events</a></li>
                    <li><a href="">Contact</a></li>
                    <li class="languages">
                        <a href="/en" class="active">English</a>
                        <a href="/fa">فارسی</a>
                    </li>
                    <p></p>
                    <a>All rights reserved 2016</a>
                </ul>

            </div>
        </div>
    </div>
</footer>
</body>
<script src="js/main.js"></script>
</html>
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
            animateOut: 'fadeOut'
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