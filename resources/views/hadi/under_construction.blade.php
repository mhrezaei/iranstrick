<html>
<head>
    <title>{{ Setting::get(Setting::getLocale() . '_site_title') }}</title>
    <style>
        html {
            background: url({{ url('/' . Setting::get('suspend_site_image')) }}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <body>

</body>
</head>
</html>