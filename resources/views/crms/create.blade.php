@extends('layouts.main')
@section('title', '新規登録画面')
@section('content')
    <h1>新規登録画面</h1>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <form action="/crm" method="post"> --}}
    <form action="{{ route('crms.store') }}" method="post">
        @csrf
        {{-- 名前 --}}
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        {{-- メールアドレス --}}
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        {{-- 郵便番号 --}}
        <div>
            <label for="postcode">郵便番号</label>
            <input type="text" id="postcode" name="postcode" value="{{ old( 'postcode' ,$zipcode) }}">
        </div>

        {{-- 住所 --}}
        <div>
            <label for="address">住所</label>
            <textarea name="address" class="address" id="address">{{ old('address', $address) }}</textarea>
        </div>

        {{-- 電話番号 --}}
        <div>
            <label for="phone">電話番号</label>
            <input type="phone" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        {{-- <a href="/crm/show">登録</a>  --}}
        <input type="submit" value="登録">

    </form>
    {{-- <a href=""></a><input type="submit" value="登録"></p> --}}
    <button><a href="/crms/search">郵便番号検索に戻る</a></button>
@endsection
