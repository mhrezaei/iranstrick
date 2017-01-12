@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ trans('front.expo') }}
@endsection

@section('content')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title">{{ trans('front.expo') }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">{{ trans('front.home_page') }}</a>
                        </li>
                        <li class="active">{{ trans('front.expo') }}</li>
                    </ol>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mobile-reverse">
            <div class="col-md-4">
                @include('front.persian.home.news')
            </div>
            <div class="col-md-8">
                @foreach($expo as $ex)
                <article class="article">
                    <div class="title-bar">
                        <a href="{{ $ex->say('link') }}"><h4 class="title">{{ $ex->title }}</h4></a>
                        <h6 class="show-more">{{ $ex->say('published_at') }}</h6>
                    </div>
                    <div class="content">
                        <a href="{{ $ex->say('link') }}">
                            <img src="{{ $ex->say('featured_image') }}" alt="{{ $ex->say('title') }}" class="block">
                        </a>
                        {{ $ex->say('abstract') }}
                    </div>
                </article>
                    <div style="clear: both;"></div>
                @endforeach
                <div class="row" style="text-align: center; margin: 0 auto;">
                    {!! $expo->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection