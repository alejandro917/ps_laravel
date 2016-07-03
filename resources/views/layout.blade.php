<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title>Mobitech App</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css" >
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Mobitech</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Escritorio <span class="sr-only">(current)</span></a></li>
                <li><a href="clientes">Clientes</a></li>
                <li><a href="facturas">Facturas</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Proyectos</a></li>
                <li><a href="">Equipo</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="usuarios">Usuarios</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="container" style="max-width:1100px; width:100%;">
                @yield('content')
            </div>

        </div>
    </div>
</div>




    @stack('scripts')
</body>
</html>