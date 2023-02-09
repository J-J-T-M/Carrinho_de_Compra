@extends('layouts.layouts')

@section('title', $product->name)

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-5">
            <img src="{{ $product->url_image }}" class="img-fluid" alt="...">
        </div>
        <div class="col-sm-12 col-md-6">
            <h1 class="mb-5">{{ $product->name }}</h1>
            <h3>R$ {{ number_format($product->price, '2', ',', '.') }}</h3>
            <p class="">{{ $product->description }}</p>
            <p>Postado por: {{ $product->user->firstName }}</p>

            <form action="{{ route('addCart') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="url_img" value="{{ $product->url_image }}">
                <div class="input-group">
                    <input type="number" class="form-control" name="quantity" value="1" min="1">
                    <button class="btn btn-warning btn-large"><i class="fa-solid fa-cart-shopping"></i> Comprar </button>
                </div>
            </form>
            

        </div>
        <div class="col-sm-6 col-md-1">
            <h5>Categoria</h5>
            <a href="{{ route('categories.show', $product->category) }}"
                class="btn btn-primary mt-3">{{ $product->category->name }}</a>
        </div>
    </div>

@endsection
