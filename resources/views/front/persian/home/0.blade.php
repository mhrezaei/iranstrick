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
                @include('front.persian.home.downloads')
            </div>
            <div class="col-md-8">
                <div class="title-bar">
                    <h3>Highlights</h3>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-sm-5 col-xs-12">
                            <div class="owl-carousel highlights-slider">
                                <div class="item">
                                    <img src="{{ url('/assets/images/header-slide-1.jpg') }}" width="140" height="140">
                                </div>
                                <div class="item">
                                    <img src="{{ url('/assets/images/header-slide-2.jpg') }}" width="140" height="140">
                                </div>
                                <div class="item">
                                    <img src="{{ url('/assets/images/header-slide-3.jpg') }}" width="140" height="140">
                                </div>
                                <div class="item">
                                    <img src="{{ url('/assets/images/header-slide-1.jpg') }}" width="140" height="140">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 col-xs-12">
                            <h4 class="highlight-title">Title for this item</h4>
                            <h5 class="highilight-subtitle">Subtitle for this item</h5>
                            <p class="highlight-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute </p>
                            <a href="" class="highlight-readmore">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="links">
                    <div class="title-bar text-center">
                        <h3>Links</h3>
                    </div>
                    <div class="content">
                        <div class="owl-carousel links-slider">
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-1.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-2.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-3.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-4.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-1.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-2.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-3.png') }}" height="75" style="width:auto">
                            </div>
                            <div class="item">
                                <img src="{{ url('/assets/images/link-img-4.png') }}" height="75" style="width:auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection