@extends('layouts.layouts')

@section('title', 'Carrinho de compra')

@section('content')
    @if ($message = Session::get('success'))
        @include('components.toastSuccess')
    @endif
    @if ($message = Session::get('alert'))
        @include('components.toastAlert')
    @endif
    @if ($items->count() == 0)
        <div class="card text-center text-white" style="background-color: orange">
            <div class="card-body">
                <h2 class="card-title">Seu carrinho está vazio!</h2>
                <h5 class="card-text">Aproveite as nossas promoções!</h5>
            </div>
        </div>
    @else
        <h3>Seu carrinho possui {{ $items->count() }} produtos</h3>
        <div class="row bg-white">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <th><img src="{{ $item->attributes->image }}" width="70px" class="img-fluid rounded-circle"
                                    alt=""></th>
                            <td>{{ Str::limit($item->name, 40) }}</td>
                            <td>R$ {{ number_format(($item->quantity * $item->price), '2', ',', '.') }}</td>
                            {{-- form atualizar --}}
                            <form action="{{ route('updateCart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <td>
                                    <div class="input-group">
                                        <input type="number" style="width: 1vw;" class="form-control text-center"
                                            name="quantity" value="{{ $item->quantity }}" min="1">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-warning"><i class="fa-solid fa-rotate-right"></i></button>
                            </form>
                            {{-- form deletar --}}
                            <form action="{{ route('removeCart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                            </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
                <div class="card text-end bg-white mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Valor total: R$ {{ number_format(\Cart::getTotal(), '2', ',', '.') }}</h2>
                        <h5 class="card-text">Pague em até 12x sem juros!</h5>
                    </div>
                </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center " style="display: flex">
            <small>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Continuar comprando <i
                        class="fa-solid fa-arrow-left"></i></a>
                <a href="{{ route('clearCart') }}" class="btn btn-primary">Limpar carrinho <i
                        class="fa-solid fa-x"></i></a>
                <button class="btn btn-success">Finalizar compra <i class="fa-solid fa-check"></i></button>
            </small>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".toast").fadeOut("slow", function() {
                    $(this).toast('close');
                });
            }, 3000);
        });
    </script>
@endsection
