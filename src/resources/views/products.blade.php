@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="form__group">
        <div class="form__item-img">
            <img src="{{ $product->image }}" alt="">
            <input class="form__input--image" type="file" name="image" value="">
            <input type="hidden" name="id" value="{{ $product['id'] }}">
        </div>
        <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">商品名</span>
        </div>
        <div class="form__group-content">
            <div class="form__item">
                <input class="form__input--text" type="text" name="name" value="{{ $product->name }}">
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">値段</span>
        </div>
        <div class="form__group-content">
            <div class="form__item">
                <input class="form__input--text" type="number" name="price" value="{{ $product->price }}">
            </div>
            <div class="form__error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">季節</span>
        </div>
        <div class="form__group-content">
            <div class="form__item">
                <input class="form__input--radio" type="radio" name="season" value="春" />春
                <input class="form__input--radio" type="radio" name="season" value="夏" />夏
                <input class="form__input--radio" type="radio" name="season" value="秋" />秋
                <input class="form__input--radio" type="radio" name="season" value="冬" />冬
            </div>
            <div class="form__error">
                @error('season')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">商品説明</span>
        </div>
        <div class="form__group-content">
            <div class="form__item">
                <input class="form__input--textarea" type="textarea" name="description" value="{{ $product->description }}">
            </div>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="button">
        <div class="return__button">
            <button class="return__button-submit" type="button" onClick="history.back()">戻る</button>
        </div>
        <form class="form" action="/products/{productId}/update" method="post">
            @method('PATCH')
            @csrf
            <div class="update__button">
                <button class="update__button-submit" type="submit">変更を保存</button>
            </div>
        </form>
        <form class="form" action="/products/{productId}/delete" method="post">
            @method('DELETE')
            @csrf
            <div class="delete__button">
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <button class="delete__button-submit" type="submit"></button>
            </div>
        </form>
    </div>
</div>
@endsection