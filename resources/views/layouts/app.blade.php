<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mercalaravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <!-- Styles -->
        <link href="{{asset('plugs/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugs/angular-toastr/dist/angular-toastr.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugs/angular-ui-router-anim-in-out/css/anim-in-out.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugs/angular-bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/style.css')}}" rel="stylesheet"> 
        <!-- Scripts -->
        <script src="{{asset('plugs/angular/angular.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-animate/angular-animate.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-base64-upload/dist/angular-base64-upload.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-touch/angular-touch.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-bootstrap/ui-bootstrap-tpls.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-ui-router/release/angular-ui-router.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-checklist-model/checklist-model.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-toastr/dist/angular-toastr.tpls.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-ui-router-anim-in-out/anim-in-out.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugs/angular-bootstrap-colorpicker/js/bootstrap-colorpicker-module.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    </head>
    <body id="app-layout" ng-app="App">

        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" ng-click="navCollapsed = !navCollapsed" ng-init="navCollapsed = true" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/')}}">
                    <img src="{{asset('images/logo.png')}}">
                </a>
            </div>
            <div class="collapse navbar-collapse" uib-collapse="navCollapsed">
                <ul class="nav navbar-nav">
                    @if (!Auth::guest())
                    <li>
                        <a ui-sref="home">Home</a>
                    </li>                    
                    @if (Auth::user()->rol == 'user')
                    <li> 
                        <a ui-sref="vistaProductos">Lista de productos</a>
                    </li>
                    <li> 
                        <a ui-sref="addProductos">Agregar productos</a>
                    </li>
                    @endif
                    @if (Auth::user()->rol == 'admin')
                    <li> 
                        <a ui-sref="addCategoria">Agregar categoria</a>
                    </li>
                    <li> 
                        <a ui-sref="vistaUsers">Vista usuarios</a>
                    </li>
                    @endif
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ url('/login')}}">Login</a></li>
                    @else
                    <li uib-dropdown="" is-open="status.isopen = false">
                        <a uib-dropdown-toggle="" href="#" ng-disabled="disabled">Hola {{ Auth::user()->name }}, ¿Que deseas hacer?
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" uib-dropdown-menu="" role="menu" aria-labelledby="single-button">
                            <li role="menuitem">
                            <li><a href="{{ url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </li>
                </ul>
                </li>
                @endif
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
