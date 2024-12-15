@extends('layouts.app')


@section('title')
Confirm
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection


@section('subtitle')
Confirm
@endsection


@section('content')
<form class="form" action="/thanks" method="post">
    @csrf
    <table class="table">
        <tr class="table__row">
            <th class="table__header">お名前</th>
            <td class="table__text">
                {{ $contacts['last_name']}}
                <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}"/>
                <span> </span>
                {{ $contacts['first_name']}}
                <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}"/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">性別</th>
            <td class="table__text">
                <?php
                    if ($contacts['gender'] == '1') {
                        echo '男性';
                    } elseif ($contacts['gender'] == '2') {
                        echo '女性';
                    } else {
                        echo 'その他';
                    }
                    ?>
                <input type="hidden" name="gender" value="{{ $contacts['gender'] }}" readonly/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">メールアドレス</th>
            <td class="table__text">
                {{ $contacts['email']}}
                <input type="hidden" name="email" value="{{ $contacts['email'] }}" readonly/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">電話番号</th>
            <td class="table__text">
                    {{ $fullPhone }}
                <input type="hidden" name="tel" value="{{ $fullPhone }}" readonly/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">住所</th>
            <td class="table__text">
                {{ $contacts['address'] }}
                <input type="hidden" name="address" value="{{ $contacts['address'] }}" readonly/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">建物名</th>
            <td class="table__text">
                {{ $contacts['building']}}
                <input type="hidden" name="building" value="{{ $contacts['building'] }}" readonly/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">お問い合わせの種類
            </th>
            <td class="table__text">
                {{ $categoryContent }}
                <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}" readonly/>
            </td>
        </tr>
    </table>
    <table class="table">
        <tr class="table__row">
            <th class="table__header">お問い合わせ内容</th>
            <td class="table__text">
                {{ $contacts['detail']}}
                <input type="hidden" name="detail" value="{{ $contacts['detail'] }}" readonly/>
            </td>
        </tr>
    </table>
    <div class="submit">
        <button class="submit__button" type="submit">送信</button>
        <a class="submit__correction" href="/">修正</a>
    </div>
</form>


@endsection