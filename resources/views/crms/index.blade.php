@extends('layouts.main')
@section('title', '顧客一覧')
@section('content')
    <h1>顧客一覧</h1>
    <table border="2">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>

        @foreach ($crms as $crm)
            <tr>
                <td><a href="{{ route('crms.show', $crm->id) }}">{{ $crm->id }}</a></td>
                <td>{{ $crm->name }}</td>
                <td>{{ $crm->email }}</td>
                <td>{{ $crm->postcode }}</td>
                <td>{{ $crm->address }}</td>
                <td>{{ $crm->phone }}</td>
            </tr>
        @endforeach
    </table>
    <button type="button" onclick="location.href='/crms/search'">新規作成</button>
@endsection
