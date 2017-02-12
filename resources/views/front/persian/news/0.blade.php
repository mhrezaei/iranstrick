@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ trans('front.news') }}
@endsection

@section('content')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title">{{ trans('front.news') }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">{{ trans('front.home_page') }}</a>
                        </li>
                        <li class="active">{{ trans('front.news') }}</li>
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
                @foreach($news as $new)
                <article class="article">
                    <div class="title-bar">
                        <a href="{{ $new->say('link') }}"> <h4 class="title">{{ $new->title }}</h4></a>
                        <span class="show-more">{{ $new->say('published_at') }}</span>
                    </div>
                    <div class="content">
                        <a href="{{ $new->say('link') }}"><img src="{{ $new->say('featured_image') }}" alt="{{ $new->title }}" class="block"></a>
                        {{ $new->say('abstract') }}
                    </div>
                </article>
                    <div style="clear: both;"></div>
                @endforeach
                <div class="row" style="text-align: center; margin: 0 auto;">
                    {!! $news->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection