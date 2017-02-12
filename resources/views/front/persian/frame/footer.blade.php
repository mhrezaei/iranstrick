
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {{ Setting::get('fa_site_title') }}<br>
                {{ Setting::get('fa_address') }}<br>
                {{ Setting::get('fa_tel') }}
            </div>
            <div class="col-md-8">
                <ul class="list-inline text-end">
                    <li><a href="{{ url('/fa/about') }}">{{ trans('front.about') }}</a></li>
                    {{--<li><a href="">Products</a></li>--}}
                    {{--<li><a href="">Services</a></li>--}}
                    <li><a href="{{ url('/fa/news') }}">{{ trans('front.news') }}</a></li>
                    <li><a href="{{ url('/fa/contact') }}">{{ trans('front.contact_us') }}</a></li>
                    <li class="languages">
                        <a href="{{ url('/en') }}">English</a>
                        <a href="{{ url('/fa') }}" class="active">فارسی</a>
                    </li>
                    <p class="text-end">
                        <a>حقوق این سایت برای
                            {{ Setting::get('fa_site_title') }}
                            محفوظ است.
                        </a><br>
                        <a href="http://yasnateam.com" target="_blank">طراحی و اجرا گروه یسنا
                        </a>
                    </p>
                </ul>

            </div>
        </div>
    </div>
</footer>

{!! Html::script ('assets/js/main.js') !!}
@include('front.persian.frame.scripts')

</body>
</html>
