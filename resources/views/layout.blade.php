<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title>Mobitech App</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
    @yield('content')
</div>
    <script src="js/vendor.js"></script>
    @stack('scripts')
</body>
</html>