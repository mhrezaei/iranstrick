
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
@include('front.persian.frame.scripts')

</body>
</html>
