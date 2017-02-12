<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ url('/en/about') }}">{{ trans('front.about') }}</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ trans('front.products') }} <span class="caret"></span></a>
        <ul class="dropdown-menu">
            @if(sizeof(\App\Providers\ServicesMenuServiceProvider::get()))
                @foreach(\App\Providers\ServicesMenuServiceProvider::get() as $menu)
                    <li class="dropdown">
                        <a href="{{ url('/en/brands/' . $menu->get_branch()->slug . '/' . $menu->slug) }}" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ $menu->title }}
                            <span class="caret"></span></a>
                        @if(sizeof($menu->get_children()))
                            <ul class="dropdown-menu">
                                @foreach($menu->get_children() as $child)
                                    <li><a href="{{ url('/en/products/' . $menu->get_branch()->slug . '/' . $menu->slug . '/' . $child->slug) }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ trans('front.our_services') }} <span class="caret"></span></a>
        <ul class="dropdown-menu">
            @if(sizeof(\App\Providers\ServicesMenuServiceProvider::services()))
                @foreach(\App\Providers\ServicesMenuServiceProvider::services() as $menu)
                    <li>
                        <a href="{{ $menu->say('link') }}">{{ $menu->title }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </li>

    <li><a href="{{ url('/en/news') }}">{{ trans('front.news') }}</a></li>
    <li><a href="{{ url('/en/contact') }}">{{ trans('front.contact_us') }}</a></li>
    <li class="languages">
        <a href="{{ url('/en') }}" class="active">English</a>
        <a href="#">فارسی</a>
        {{--<a href="{{ url('/fa') }}">فارسی</a>--}}
    </li>
</ul>