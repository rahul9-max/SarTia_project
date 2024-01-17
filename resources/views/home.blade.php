@extends('layout')

@section('content')
    <h1>Welcome to the Home Page</h1>
    <a href="{{ route('addProduct') }}" class="btn btn-primary">Add a Product</a>
    <a href="{{ route('shop.index') }}" class="btn btn-primary">View Products</a>
@endsection