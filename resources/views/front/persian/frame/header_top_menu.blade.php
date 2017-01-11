<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed btn btn-default" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span>Menu  </span><i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ url('/' . Setting::get(Setting::getLocale() . '_site_logo')) }}" alt="IRANSTRICK" width="230">
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            @if(Setting::getLocale() == 'fa')
                @include('front.persian.frame.top_menu')
            @else
                @include('front.english.frame.top_menu')
            @endif
        </div>
    </div>
</nav>