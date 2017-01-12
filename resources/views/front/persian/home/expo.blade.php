@if(sizeof($expo))
<div class="widget">
    <div class="title-bar">
        <h3>{{ trans('front.expo') }}</h3>
        <a href="{{ url('/' . Setting::getLocale() . '/expo') }}" class="show-more">{{ trans('front.see_all') }}</a>
    </div>
    <div class="content">
        <ul>
            @foreach($expo as $ex)
                <li><a href="{{ $ex->say('link') }}">{{ $ex->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endif