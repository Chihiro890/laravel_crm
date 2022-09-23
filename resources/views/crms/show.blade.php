@extends('layouts.main')

@section('title', '顧客詳細画面')

@section('content')

    <h1>顧客詳細画面</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        <tr>
            <td>{{ $crm->id }}</td>
            <td>{{ $crm->name }}</td>
            <td>{{ $crm->email }}</td>
            <td>{{ $crm->postcode }}</td>
            <td>{{ $crm->address }}</td>
            <td>{{ $crm->phone }}</td>
        </tr>
    </table>

    <button onclick="location.href='/crms/{{ $crm->id }}/edit'">編集画面</button>
    <form action="/crms/{{ $crm->id }}" method="post">
        @csrf
        @method('DELETE')
        {{-- <input type="submit" value="削除する"> --}}
        <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
    </form>
    <button onclick="location.href='/crms'">一覧に戻る</button>
    {{-- <table border="2"> --}}

    {{-- <form>
        <div>
            <label for="name">顧客ID:</label>
            <input type="string" name="name" id="name" value="{{ old('id', $crm->id) }}" readonly>
        </div>
        <div>
            <label for="description">名前</label>
            <textarea name="description" id="description" cols="30" rows="10" readonly>{{ old('description', $crm->description) }}</textarea>
        </div>
        <div>
            <label for="address">メールアドレス</label>
            <input type="text" name="address" id="address" value="{{ old('address', $crm->address) }}" readonly>
        </div>
    </form>
    <div id="map" style="height:50vh;"></div>

    <a href="{{ route('crms.edit') }}">編集画面</a>
    <form action="{{ route('crms.destroy', $crm) }}" method="post" name="form1" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
    {{-- <a href="{{ route('crms.destroy', $crm) }}">削除する</a> --}}
    {{-- <a href="{{ route('crms.edit', $crm) }}">一覧へ戻る</a> --}}
    {{-- </form> --}}
@endsection
