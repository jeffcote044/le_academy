@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('image')
<img src="{{asset('img/billboards/errors/404.svg')}}" alt="">
@endsection
@section('message', __('No podemos encontrar la página que busca. Puede consultar nuestro Centro de ayuda o volver a la página de inicio.'))
