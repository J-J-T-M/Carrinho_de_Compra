@extends('layouts.layouts')

@section('title', 'Carrinho de compra')

@section('content')
    @if ($message = Session::get('success'))
    <div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Parabéns</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          {{$message}}
        </div>
      </div>
    @endif
    <h3>Seu carrinho possui {{ $items->count() }} produtos</h3>
    <div class="row">
        <table class="table table-striped">
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
                        <td>R$ {{ number_format($item->price, '2', ',', '.') }}</td>
                        <td>
                            <div class="input-group">
                                <input type="number" style="width: 1vw;" class="form-control text-center" name="quantity"
                                    value="{{ $item->quantity }}">
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning"><i class="fa-solid fa-rotate-right"></i></button>
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="container">
            <div class="row justify-content-center ">
                <small><button class="btn btn-primary">Continuar comprando <i class="fa-solid fa-arrow-left"></i></button>
                    <button class="btn btn-primary">Limpar carrinho <i class="fa-solid fa-x"></i></button>
                    <button class="btn btn-success">Finalizar compra <i class="fa-solid fa-check"></i></button></small>
            </div>
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
