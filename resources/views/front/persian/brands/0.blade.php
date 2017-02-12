@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ $brand->title }}
@endsection

@section('content')
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title">{{ $brand->title }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">{{ trans('front.home_page') }}</a>
                        </li>
                        <li class="active">{{ $brand->title }}</li>
                    </ol>
                    <img src="{{ url('/' . $brand->image) }}" alt="{{ $brand->title }}">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title-bar">
            <h3>{{ trans('front.about') }} {{ $brand->tile }}</h3>
        </div>
        <div class="about-brand">
            {!! $brand->abstract !!}
        </div>

        @if(sizeof($products))
        <div class="title-bar">
            <h3>{{ trans('front.products') }}</h3>
        </div>
        <div class="thumbs-grid row">
            @foreach($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="{{ $product->say('product_link') }}">
                        <img src="{{ $product->say('featured_image') }}" alt="{{ $product->title }}" class="media-object">
                        <span class="media-title">{{ $product->title }}</span>
                    </a>
                    <p>{{ $product->say('abstract') }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection