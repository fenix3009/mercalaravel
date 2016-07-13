@extends('layouts.app')

@section('content')

@if (Auth::guest())
<div class="container"style="color: floralwhite">
    <div class="jumbotron bg-Green text-center">
        <h1 >Mercado2</h1> 
        <p>Por favor, inicia sesión para gozar de los beneficios que te ofrecen esta app</p> 
    </div>
</div>
@else
<div class="anim-in-out anim-fade" ui-view data-anim-speed="650"></div>
@endif


@endsection
