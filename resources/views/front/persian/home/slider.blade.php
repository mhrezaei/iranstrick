@if(sizeof($slider))
    <div class="container-fluid">
        <div class="row">
            <div class="owl-carousel main-header-slider skew-slides">
                @foreach($slider as $slide)
                    <div class="item">
                        <img src="{{ $slide->say('featured_image') }}">
                        @if(strlen($slide->title))
                            <div class="slide-text center">
                                <h3 class="bordered slide-title">{{ $slide->title }}</h3>
                                @if(strlen($slide->meta('title_two')))
                                    <h4 class="slide-subtitle">{{ $slide->meta('title_two') }}</h4>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif