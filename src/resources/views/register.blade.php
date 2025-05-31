@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="heading">
        <h2>商品登録</h2>
    </div>
    <form class="form" action="/products/register" method="post" enctype="multipart/form-data">
        @csrf
    <!-- enctype="multipart/form-data"でファイルをアップロード -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品名</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <input class="form__input--text" type="text" name="name" placeholder="商品名を入力">
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
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <input class="form__input--number" type="number" name="price" placeholder="値段を入力">
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
                <span class="form__label--item">商品画像</span>
                <span class="form__label--required">必須</span>
            </div>
            <img src="{{ asset(session('image')) }}" alt="">
            <div class="form__group-content">
                <div class="form__item">
                    <input class="form__input--image" type="file" name="image">
                </div>
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">季節</span>
                <span class="form__label--required">必須</span>
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
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <textarea class="form__input--textarea" type="textarea" name="description" placeholder="商品の説明を入力"></textarea>
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
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection