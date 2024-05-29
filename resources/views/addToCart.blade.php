@extends('layouts.base')
@section('title', 'Корзина')

@section('main')
<link href="/styles/korzina.css" rel="stylesheet" type="text/css">
<div class="product-grid">
    <table class="table">
    @if(isset($messageSuccessOrder))
      <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:1%; width:40%; margin-left:20%;">
          <strong>{{ $messageSuccessOrder['message'] }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
        <tr>
            <th>ID</th>
            <th>Изображение</th>
            <th>Наименование товара</th>
            <th>Количество</th>
            <th>Цена за ед, руб.</th>
            <th>Действия</th>
        </tr>

        @foreach($cart as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><img src="{{$item->attributes->image}}" alt="{{$item->name}}" style="width: 40%;"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                <td>
                    <!-- Форма для кнопки Удалить -->
                    <form action="{{ route('removeCart') }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                            <i class="fas fa-trash"></i>
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        <tr>
            <td colspan="4" style="text-align:right">ИТОГО:</td>
            <td>{{$sum}}</td>
            @if(!$cart->isEmpty())
            <td>
                <!-- Форма для кнопки Оформить заказ -->
                <form method="post" action="{{ route('makeOrder') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Оформить заказ</button>
                </form>
            </td>
            @endif
        </tr>
    </table>
</div>
@endsection
