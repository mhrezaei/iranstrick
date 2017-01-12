@if(sizeof($news))
<div class="widget">
    <div class="title-bar">
        <h3>{{ trans('front.news') }}</h3>
        <a href="{{ url('/' . Setting::getLocale() . '/news') }}" class="show-more">{{ trans('front.see_all') }}</a>
    </div>
    <div class="content">
        <ul>
            @foreach($news as $new)
                <li><a href="{{ $new->say('link') }}">{{ $new->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endif