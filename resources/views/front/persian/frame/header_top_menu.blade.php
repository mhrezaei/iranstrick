<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed btn btn-default" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span>Menu  </span><i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ url('/') }}/assets/images/logo-en.png" alt="IRANSTRICK" width="230">
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
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
                    <a href="/en" class="active">English</a>
                    <a href="/fa">فارسی</a>
                </li>
            </ul>
        </div>
    </div>
</nav>