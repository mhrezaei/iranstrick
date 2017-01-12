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
{{--                @include('front.persian.home.downloads')--}}
            </div>
            @include('front.persian.home.highlights')
        </div>
        @include('front.persian.home.links')
    </div>
    </div>
@endsection