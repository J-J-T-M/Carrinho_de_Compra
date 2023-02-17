@extends('layouts.layouts')

@section('title', 'Home')

@section('content')

        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <img src="{{ $product->url_image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit( $product->name, 25) }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 40) }}</p>
                            @can('seeProduct', $product)
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary" style="border-radius: 60vh"><i class="fa-solid fa-eye"></i></a>
                            @endcan
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
        <div class="d-flex">
            {{ $products->links() }}
        </div>

@endsection
