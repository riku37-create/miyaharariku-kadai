@extends('layouts.app')


@section('title')
Admin
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('subtitle')
Admin
@endsection


@section('search')
<form class="sub" action="/admin" method="get">
@csrf
    <input  class="sub__search"type="text" name="search" placeholder="名前やメールアドレスを入力してください" value="{{ request('search') }}">
    <select class="sub__gender" name="gender">
        <option value="" disabled selected>性別</option>
        <option value="all">全て</option>
        <option value="male">男性</option>
        <option value="female">女性</option>
        <option value="other">その他</option>
    </select>
    <select class="sub__category" name="category_id">
        <option value="" disabled selected>お問い合わせの種類</option>
        @foreach($categories as $category)
        <option value="{{ $category['id']}}">{{ $category->content }}</option>
        @endforeach
    </select>
    <input class="date" type="date" name="date" value="{{ request('date') }}">
    <button class="sub__submit" type="submit">検索</button>
    <div class="sub__reset">
        <a class="reset" href="/admin">リセット</a>
    </div>
</form>
@endsection


@section('content')
    <div class="buttons">
        <div class="export-btn">
            <button class="export" type="button">エクスポート</button>
        </div>
        <div class="paginate">
            {{ $contacts->links('') }}
        </div>
    </div>
    <div class="contacts">
        <table class="contacts__table">
            <tr class="table-heading">
                <th class="column">お名前</th>
                <th class="column">性別</th>
                <th class="column">メールアドレス</th>
                <th class="column" colspan="2">お問い合わせ種類</th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="table__inner">
                <td class="name">
                    {{ $contact['last_name'] }}
                    <span class="space"></span>
                    <span class="first">{{ $contact['first_name'] }}</span>
                </td>
                <td class="gender">
                    <input type="hidden" value="{{ $contact['gender'] }}" />
                    <?php
                    if ($contact['gender'] == '1') {
                        echo '男性';
                    } elseif ($contact['gender'] == '2') {
                        echo '女性';
                    } else {
                        echo 'その他';
                    }
                    ?>
                </td>
                <td class="address">
                    {{ $contact['email']}}
                </td>
                <td class="category">
                    {{ $contact->category->content }}
                </td>
                <td class="detail-button">
                    <button class="detail" type="button" wire:click="openModal({{ $contact->id }})">
                        詳細
                    </button>
                <td>
            </tr>
            @endforeach
        </table>
    </div>

    @if(isset($showModal) && $showModal)
    <div class="modal__wrapper">
        <button class="modal-close" wire:click="closeModal()" >×</button>
        <table class="modal__content">
            <tr class="modal-inner">
                <th class="modal-ttl">お名前</th>
                <td class="modal-data">
                    {{ $contact['last_name'] }}
                    <span class="space"></span>
                    <span class="firstName">{{ $contact['first_name'] }}</span>
                </td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl">性別</th>
                <td class="modal-data">
                    <input type="hidden" value="{{ $contact['gender'] }}" />
                        <?php
                        if ($contact['gender'] == '1') {
                            echo '男性';
                        } elseif ($contact['gender'] == '2') {
                            echo '女性';
                        } else {
                            echo 'その他';
                        }
                        ?>
                </td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl">メールアドレス</th>
                <td class="modal-data">{{ $contact['email'] }}</td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl">電話番号</th>
                <td class="modal-data">{{ $contact['tell'] }}</td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl">住所</th>
                <td class="modal-data">{{ $contact['address'] }}</td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl">建物名</th>
                <td class="modal-data">{{ $contact['building'] }}</td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl">お問い合わせの種類</th>
                <td class="modal-data">{{ $contact->category->content}}</td>
            </tr>
            <tr class="modal-inner">
                <th class="modal-ttl--last">お問い合わせ内容</th>
                <td class="modal-data--last">
                    {{ $contact['detail']}}
                </td>
            </tr>
        </table>
    </div>
    @endif
@endsection