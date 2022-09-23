@extends('layouts.main')
@section('title', '郵便番号検索画面')
@section('content')
    {{-- <h1>郵便番号検索画面</h1>

    <form action="/crms/{{ $crm -> $id }}" method="get">
        @csrf
        {{-- @method('GET') --}}
    {{-- <div class="form-item">
            <label for="name">名前</label>
            <input type="strings" name="name" id="name" value="{{ old('name', $crm ?? ''->name) }}">
        </div>

        <input type="submit" value="更新">
    </form> --}}

    {{-- <a href="{{ route('crms.index') }}">一覧へ戻る</a> --}}
    {{-- <a href="/crms">一覧へ戻る</a> --}}


    <h1>郵便番号検索画面</h1>
    <form action="{{ route('crms.create') }}" method="GET">
        @csrf
        <label for="postcode">郵便番号検索</label>
        {{-- <input type="text" name="postcode" id="postcode" placeholder="検索したい郵便番号"> --}}
        <input type="text" name="postcode" id="postcode" placeholder="検索したい郵便番号" value="{{ old('postcode') }}">
        <input type="submit" value="検索">
    </form>
    <button onclick="location.href='{{ route('crms.index') }}'">一覧に戻る</button>
@endsection
 {{-- <input type="color" name="" id="">
    <input type="date" name="" id=""> --}}
