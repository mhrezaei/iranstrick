@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }}
@endsection

@section('content')
    @include('front.persian.home.slider')
    <div class="container">
        <div class="row mobile-reverse">
            <div class="col-md-4">
                @include('front.persian.home.expo')
                {{--<div class="widget">--}}
                    {{--<div class="title-bar">--}}
                        {{--<h3>Downloads</h3>--}}
                    {{--</div>--}}
                    {{--<div class="content">--}}
                        {{--<ul>--}}
                            {{--<li><a href="">A beauty title comes here</a></li>--}}
                            {{--<li><a href="">Another title comes here soon</a></li>--}}
                            {{--<li><a href="">One more title</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            @include('front.persian.home.highlights')
        </div>
        @include('front.persian.home.links')
    </div>
@endsection