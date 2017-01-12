@if(sizeof($agency))
<div class="row">
    <div class="col-xs-12">
        <div class="links">
            <div class="title-bar text-center">
                <h3>{{ trans('front.agency') }}</h3>
            </div>
            <div class="content">
                <div class="owl-carousel links-slider">
                    @foreach($agency as $agen)
                        <div class="item">
                            <img src="{{ url('/' . $agen->image) }}" title="{{ $agen->title }}" height="120" style="width:auto">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif