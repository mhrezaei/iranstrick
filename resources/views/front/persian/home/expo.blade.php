@if(sizeof($expo))
<div class="widget">
    <div class="title-bar">
        <h3>{{ trans('front.expo') }}</h3>
        <a href="{{ url('/' . Setting::getLocale() . '/expo') }}" class="show-more">{{ trans('front.see_all') }}</a>
    </div>
    <div class="content">
        <div class="owl-carousel expo-slider">
            @foreach($expo as $ex)
            <div class="item">
                <div class="image">
                    <img src="{{ $ex->say('featured_image') }}">
                </div>
                <div class="text">
                    <a href="{{ $ex->say('link') }}">
                        <h5>{{ $ex->title }}</h5>
                        {{--<span class="date">24 - 27 Jan 2016</span>--}}
                    </a>
{{--                    <p>{{ $ex->say('abstract') }}</p>--}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif