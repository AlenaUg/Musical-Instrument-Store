@extends('layouts.base')

@section('main')
<p class="dobr">Добро пожаловать, {{ Auth::user()->name }}!</p>
<link href="/styles/bb.css" rel="stylesheet" type="text/css">
<div class="category-wrap">
            <a href="{{ route('index') }}"><h3>Категории</h3></a>
            <ul>
            @if(isset($categorys))
            @foreach ($categorys as $categories)
                <li><a href="{{ route('tovarBycategory', $categories->id) }}">{{ $categories ['title'] }}</a></li>
            @endforeach
            @endif
           </ul>
</div>
<div class="product-grid">
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