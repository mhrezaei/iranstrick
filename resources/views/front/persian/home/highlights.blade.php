@if(sizeof($news))
<div class="col-md-8">
    <div class="title-bar">
        <h3>{{ trans('front.highlights') }}</h3>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-xs-12">
                <div class="owl-carousel highlights-slider">
                    @foreach($news as $new)
                        <div class="item">
                            <img src="{{ $new->say('featured_image') }}" width="140" height="240" alt="1">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-7 col-xs-12">
                <div class="owl-carousel highlights-slider-text">
                    @foreach($news as $new)
                    <div class="item">
                        <h4 class="highlight-title">{{ $new->title }}</h4>
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