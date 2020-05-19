<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="shortcut icon" href="/storage/uploads/logo.png" type="image/x-icon">
    <title>@yield('title')</title>


</head>
<body>
    @if(Request::is('/'))
        <div class="wrapper" id="fon" style="background-image: url({{asset('images/landing_foto.png')}});">
        @include('inc.header', array('opacity'=>'0,0,0,.65'))
    @else
        <div class="wrapper">
        @include('inc.header', array('opacity'=>'0.0.0'))
    @endif
        <div class="content">
            @if(session()->has('success'))
                <p>{{ session()->get('success') }}</p>
            @endif
            <div>@yield('content')</div>
        </div>
        @include('inc.footer')

    </div>

</body>
</html>
