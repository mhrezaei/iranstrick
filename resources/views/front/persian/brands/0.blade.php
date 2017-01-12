@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ $brand->tile }}
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
            {{ $brand->abstract }}
        </div>
        <div class="title-bar">
            <h3>Products</h3>
        </div>
        <div class="thumbs-grid row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <a href="">
                        <img src="http://lorempicsum.com/up/500/500/4" alt="" class="media-object">
                        <span class="media-title">Product Title</span>
                    </a>
                    <p>Velit occaecat quis elit nisi.Commodo culpa consequat sit reprehenderit pariatur ad dolor eu non.</p>
                </div>
            </div>
        </div>
    </div>
@endsection