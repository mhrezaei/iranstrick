@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ $product->title }}
@endsection

@section('content')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title">{{ $product->say('category')->title }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">{{ trans('front.home_page') }}</a>
                        </li>
                        <li class="active">{{ $product->title }}</li>
                    </ol>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    {!! Html::script ('assets/js/owl.carousel.min.js') !!}

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <article class="article">
                    <div class="title-bar">
                        <h3 class="title">{{ $product->title }}</h3>
                    </div>
                    <div class="content">
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="owl-carousel main-header-slider">--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="uploads/header-slide-1.jpg">--}}
                                        {{--<div class="slide-text center">--}}
                                            {{--<h3 class="underlined slide-title">Great Title for this slider</h3>--}}
                                            {{--<h4 class="slide-subtitle">here will be some subtitle</h4>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="uploads/header-slide-2.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="uploads/header-slide-3.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="uploads/header-slide-1.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="uploads/header-slide-2.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="uploads/header-slide-3.jpg">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<ul class="list-unstyled">--}}
                                    {{--<li>Dolor exercitation officia id anim do esse nisi proident quis occaecat ipsum.</li>--}}
                                    {{--<li>Dolor exercitation officia id anim do esse nisi proident quis occaecat ipsum.</li>--}}
                                    {{--<li>Dolor exercitation officia id anim do esse nisi proident quis occaecat ipsum.</li>--}}
                                    {{--<li>Dolor exercitation officia id anim do esse nisi proident quis occaecat ipsum.</li>--}}
                                    {{--<li>Dolor exercitation officia id anim do esse nisi proident quis occaecat ipsum.</li>--}}
                                {{--</ul>--}}
                                {{--<p>--}}
                                    {{--Some other text about product.Cillum eu deserunt sunt quis proident cillum in sit elit mollit exercitation aute eiusmod. Amet ea sint minim incididunt veniam culpa exercitation id dolore. Commodo ex ipsum sit cupidatat nisi. Labore amet consectetur enim duis sit ex magna.--}}
                                {{--</p>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a href="" class="btn btn-lg btn-success">Download</a>--}}
                                    {{--<a href="" class="btn btn-default btn-lg">Show video</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <img src="{{ $product->say('featured_image') }}" alt="{{ $product->title }}" class="pull-right">
                        {!! $product->text !!}
                    </div>
                </article></div>

        </div>
    </div>
@endsection