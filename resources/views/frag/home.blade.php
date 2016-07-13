<div class="container"style="color: floralwhite">
    <div class="jumbotron bg-Green text-center">
        <h1>Mercado2</h1> 
        @if(!Auth::guest())
        <p>Bienvenido <strong>{{Auth::user()->name}}</strong> a esta página de compra y venta hecha con laravel 5 y angular</p> 
        @endif
    </div>
</div>