@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="heading-utilities">
        <div class="heading">
            <h2>商品一覧</h2>
        </div>
        <form class="form" action="/products/register" method="get">
            @csrf
            <div class="addition__button">
                <button class="addition__button-submit" type="submit">+ 商品を追加</button>
            </div>
        </form>
        </div>
        <div class="main">
            <div class="sidebar">
                <form class="form" action="/products/search" method="get">
                    @csrf
                    <div class="search-form__item">
                        <input class="search-form__item-input" type="text" name="keyword" placeholder="商品名で検索" value="">
                    </div>
                    <div class="search-form__button">
                        <button class="search-form__button-submit" type="submit">検索</button>
                    </div>
                </form>
                <div class="sort">
                    <h3 class="sort--title">
                        価格順で表示
                    </h3>
                    <select class="sort__item-select" name="sort">
                        <option value="">価格で並べ替え</option>
                        <option value="price_asc">高い順に表示</option>
                        <option value="price_desc">低い順に表示</option>
                    </select>
                </div>
            </div>
            <div class="img__link">
                @foreach($products as $product)
                <ul>
                    <li>
                        <a href="{{ route('products', $product->id) }}">
                            <img src="{{ $product->image }}" alt="">
                            <div class="link">
                                <span class="link__title">{{ $product->name }}</span>
                                <span class="link__price">¥{{ $product->price }}</span>
                            </div>
                        </a>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </form>
    {{ $links->links() }}
</div>
@endsection