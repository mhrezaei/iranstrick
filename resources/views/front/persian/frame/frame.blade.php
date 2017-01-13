@include('front.persian.frame.header')
@yield('content')
@if(Setting::getLocale() == 'fa')
    @include('front.persian.frame.footer')
@else
    @include('front.english.frame.footer')
@endif