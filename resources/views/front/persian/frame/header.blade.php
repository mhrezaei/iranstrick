<!DOCTYPE html>
@if(Setting::getLocale() == 'fa')
    <html dir="rtl" lang="fa" class="fa">
@else
    <html lang="en">
@endif
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('page_title')</title>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/fonts.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    @if(Setting::getLocale() == 'fa')
        {!! Html::style('assets/css/rtl.css') !!}
    @endif
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    {!! Html::script ('assets/js/jquery-2.1.1.min.js') !!}
    {!! Html::script ('assets/js/bootstrap.min.js') !!}
    {!! Html::script ('assets/js/owl.carousel.min.js') !!}
    <script src="https://use.fontawesome.com/42e9d0c0f0.js"></script>
    <script language="javascript">
        function base_url($ext) {
            if(!$ext) $ext = "" ;
            var $result = '{{ URL::to('/') }}' + $ext ;
            return $result  ;
        }
    </script>
</head>

<body>

@include('front.persian.frame.header_top_menu')