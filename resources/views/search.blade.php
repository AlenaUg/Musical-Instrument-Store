@extends('layouts.base')

@section('main')
<link href="/styles/bb.css" rel="stylesheet" type="text/css">
<div class="product-grid" style="margin-top:9%;">
@if(isset($bb))
    @foreach($bb as $bbt)
        <div id="{{ $bbt->id }}" class="product">
            <a href="{{ route('product', $bbt->id) }}" class="product-link">
                <img src="{{ $bbt['image'] }}" alt="{{ $bbt->title }}" class="product-image">
                {{ $bbt->title }}
            </a>
            <cen>Цена: {{ $bbt->price }} ₽</cen>
            <form action="{{ route('addToCart') }}" method="GET">
            @csrf
                <input type="hidden" name="id" value="{{ $bbt->id }}">
                <button type="submit" class="add-to-cart-btn">В корзину</button>
            </form>
        </div>
    @endforeach
@endif
</div>
@endsection
