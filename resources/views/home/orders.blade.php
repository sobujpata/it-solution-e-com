@extends('layouts.app')
@section('title', 'Order Products Page')
@section('content')
        <!--product to carts-->
        @include('components.order.order-list')
        @include('components.order.invoice-product')
@endsection