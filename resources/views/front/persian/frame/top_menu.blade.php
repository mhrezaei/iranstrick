<ul class="nav navbar-nav navbar-right">
    <li><a href="#">About</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Products <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#">A category</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Another category <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">A brand</a></li>
                    <li><a href="#">Another brand</a></li>
                    <li><a href="#">Yet another brand</a></li>
                    <li><a href="#">One more</a></li>
                </ul>
            </li>
            <li><a href="#">Yet another category</a></li>
            <li><a href="#">One more</a></li>
        </ul>
    </li>
    <li><a href="/services">Services</a></li>
    <li><a href="/services">News & Events</a></li>
    <li><a href="/services">Contact</a></li>
    <li class="languages">
        <a href="{{ url('/en') }}">English</a>
        <a href="{{ url('/fa') }}" class="active">فارسی</a>
    </li>
</ul>