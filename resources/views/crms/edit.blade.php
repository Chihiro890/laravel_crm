@extends('layouts.main')
@section('title', '編集画面')
@section('content')
    <h1>編集画面</h1>

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

    <!-- 更新先はcrmsのidにしないと増える php artisan rote:listで確認① -->
    <form action="/crms/{{ $crm->id }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ $crm->name }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" value="{{ $crm->email }}">
        </div>
        <div>
            <label for="post_code">郵便番号</label>
            <input type="text" name="postcode" id="postcode" value="{{ $crm->postcode }}">
        </div>
        <div>
            <label for="address">住所</label>
            <input type="text" name="address" id="address" value="{{ $crm->address }}">
        </div>
        <div>
            <label for="phone">電話番号</label>
            <input type="text" name="phone" id="phone" value="{{ $crm->phone }}">
        </div>

        <input type="submit" value="更新">
    </form>
    <button onclick="location.href='/crms'">戻る</button>

@endsection
