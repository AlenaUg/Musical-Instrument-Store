@extends('layouts.base')
@section('title', 'Товар')

@section('main')
<link href="/styles/bb.css" rel="stylesheet" type="text/css">
<div class="tovar-grid" style = "margin-top:9%; height: 630%;">
@if(isset($bb))
<img src="{{ $bb['image'] }}" alt="{{ $bb->title }}" class="tovar-image">
        <div id="{{ $bb->id }}" class="tovar">
            <t>{{ $bb->title }}</t>
            <br><op>{{ strip_tags($bb->text) }}</op></br>
            <br><cen>Цена: {{ $bb->price }} ₽</cen></br>
            <form action="{{ route('addToCart') }}" method="GET">
            @csrf
                <input type="hidden" name="id" value="{{ $bb->id }}">
                <button type="submit" class="add-to-cart-btn">В корзину</button>
            </form>
        </div>
@endif
</div>
@endsection
