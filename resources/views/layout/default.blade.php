<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <title> @yield('title')</title>
</head>
<body>
<div class="container-fluid" style="background:#8c8c8c">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-3">
                @include('include.header')
            </div>
        </div>
    </div>
</div>
<div class="container ">
   <div class="row mt-3">
        @yield('content')
   </div>
</div>
<footer class="row d-flex justify-content-center mt-5">
    @include('include.footer')
</footer>
</body>
</html>