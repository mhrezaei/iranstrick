@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ trans('front.about') }}
@endsection

@section('content')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title">{{ $page->title }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">{{ trans('front.home_page') }}</a>
                        </li>
                        <li class="active">{{ $page->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <script src="js/owl.carousel.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <article class="article">
                    <div class="title-bar">
                        <h3 class="title">{{ Setting::get(Setting::getLocale() . '_site_title') }}</h3>
                    </div>
                    <div class="content">
                        <img src="{{ $page->say('featured_image') }}" alt="Image for a good title" class="pull-right">
                        {!! $page->text !!}
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection