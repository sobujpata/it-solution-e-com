@extends('layouts.app')
@section('title', 'Cart Product list Page')
@section('content')
        <!--product to carts-->
        @include('components.carts.carts-list')
@endsection