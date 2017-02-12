@if(sizeof($news))
<div class="col-md-8">
    <div class="title-bar">
        <h3>{{ trans('front.highlights') }}</h3>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-xs-12">
                <div class="owl-carousel highlights-slider slider-theme-2 owl-hide-dots">
                    @foreach($news as $new)
                    <div class="item">
                        <div class="image">
                            <img src="{{ $new->say('featured_image') }}" width="295" height="197">
                        </div>
                        <div class="text">
                            <a href="{{ $new->say('link') }}">
                                <h5>{{ $new->title }}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-7 col-xs-12">
                <div class="owl-carousel highlights-slider-text owl-hide-controls">
                    @foreach($news as $new)
                    <div class="item">
                        {{--<h5 class="highilight-subtitle">Subtitle for this item</h5>--}}
                        <p class="highlight-content">{{ $new->say('abstract') }}</p>
                        <a href="{{ $new->say('link') }}" class="highlight-readmore">{{ trans('front.more') }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif