@extends('front.persian.frame.frame')


@section('page_title')
    {{ Setting::get(Setting::getLocale() . '_site_title') }} - {{ $page->title }}
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
                        <h3 class="title">{{ $page->title }}</h3>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-7">
                                <p>{!! $page->text !!}</p>
                                {{--<div id="map"></div>--}}
                            </div>
                            <div class="col-md-5">
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control required" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control required" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control required" id="message" placeholder="Message" rows="6"></textarea>
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Send your message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection