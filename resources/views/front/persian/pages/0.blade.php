@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ $page->title }}
@endsection

@section('content')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title">{{ trans('front.' . $page->branch) }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">{{ trans('front.home_page') }}</a>
                        </li>
                        <li class="active">{{ $page->title }}</li>
                    </ol>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mobile-reverse">
            <div class="col-md-4">
                @include('front.persian.home.expo')
            </div>
            <div class="col-md-8">
                <article class="article">
                    <div class="title-bar">
                        <h4 class="title">{{ $page->title }}</h4>
                        <h6 class="show-more">{{ $page->say('published_at') }}</h6>
                    </div>
                    <div class="content">
                        <div class="owl-carousel main-header-slider">
                            <div class="item">
                                <img src="uploads/header-slide-1.jpg">
                                <div class="slide-text center">
                                    <h3 class="underlined slide-title">Great Title for this slider</h3>
                                    <h4 class="slide-subtitle">here will be some subtitle</h4>
                                </div>
                            </div>
                            <div class="item">
                                <img src="uploads/header-slide-2.jpg">
                            </div>
                            <div class="item">
                                <img src="uploads/header-slide-3.jpg">
                            </div>
                            <div class="item">
                                <img src="uploads/header-slide-1.jpg">
                            </div>
                            <div class="item">
                                <img src="uploads/header-slide-2.jpg">
                            </div>
                            <div class="item">
                                <img src="uploads/header-slide-3.jpg">
                            </div>
                        </div>
                        <img src="{{ $page->say('featured_image') }}" alt="Image for a good title" class="block">
                        {!! $page->text !!}
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection