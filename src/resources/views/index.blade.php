@extends('layouts.app')


@section('title')
Contact Form
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
@endsection


@section('subtitle')
Contact
@endsection


@section('content')
<form class="form" action="/confirm" method="POST">
    @csrf
    <div class="form__group">
        <div class="label">
            <label for="name">お名前 <span class="mark">※</span></label>
        </div>
        <div class="name">
                <input class="last-name" name="last_name" type="text" placeholder="例: 山田" value="{{ old('last_name') }}"/>
                <input class="first-name" name="first_name" type="text" placeholder="例: 太郎" value="{{ old('first_name') }}"/>
        </div>
    </div>
    <div class="form__error">
    @error('first__name')
    {{ $message }}
    @enderror
    @error('last__name')
    {{ $message }}
    @enderror
    </div>
    <div class="form__group">
        <div class="label">
            <label for="gender">性別 <span class="mark">※</span></label>
        </div>
        <div class="gender">
            <div class="gender-male">
                <label for="male">
                    <input class="male" name="gender" type="radio" value="1" checked required>
                    男性
                </label>
            </div>
            <div class="gender-female">
                <label for="male">
                    <input class="female" name="gender" type="radio" value="2" required>
                    女性
                </label>
            </div>
            <div class="gender-other">
                <label for="other">
                    <input class="other" name="gender" type="radio" value="3" required>
                    その他
                </label>
            </div>
        </div>
    </div>
    <div class="form__error">
    @error('gender')
    {{ $message }}
    @enderror
    </div>
    <div class="form__group">
    <div class="label">
        <label for="email">メールアドレス <span class="mark">※</span></label>
    </div>
        <input class="email" name="email" type="text" placeholder="例: test@example.com" value="{{ old('email') }}"/>
    </div>
    <div class="form__error">
    @error('email')
    {{ $message }}
    @enderror
    </div>
    <div class="form__group">
    <div class="label">
        <label for="phone">電話番号 <span class="mark">※</span></label>
    </div>
        <div class="phone">
            <input class="phone-1" name="tel1" type="text" placeholder="080" value="{{ old('tel1') }}"/>
            <span class="phone__mark">-</span>
            <input class="phone-2" name="tel2" type="text" placeholder="1234" value="{{ old('tel2') }}"/>
            <span class="phone__mark">-</span>
            <input class="phone-3" name="tel3" type="text" placeholder="5678" value="{{ old('tel3') }}"/>
        </div>
    </div>
    <div class="form__error">
    @error('tel1')
    {{ $message }}
    @enderror
    @error('tel2')
    {{ $message }}
    @enderror
    @error('tel3')
    {{ $message }}
    @enderror
    </div>
    <div class="form__group">
    <div class="label">
        <label for="address">住所 <span class="mark">※</span></label>
    </div>
        <input class="address" name="address" type="text" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
    </div>
    <div class="form__error">
    @error('address')
    {{ $message }}
    @enderror
    </div>
    <div class="form__group">
    <div class="label">
        <label for="building">建物名</label>
    </div>
        <input class="building" name="building" type="text" placeholder="例: 千駄ヶ谷マンション101">
    </div>
    <div class="form__error">
    </div>
    <div class="form__group">
    <div class="label">
        <label for="inquiry-type">お問い合わせの種類 <span class="mark">※</span></label>
    </div>
        <select class="inquiry-type" name="category_id">
            <option value="" disabled selected>選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form__error">
    </div>
    <div class="form__group">
        <div class="label">
            <label for="inquiry-details">お問い合わせ内容 <span class="mark">※</span></label>
        </div>
        <textarea class="inquiry-details" name="detail" placeholder="お問い合わせの内容をご記載ください" value="{{ old('detail') }}"></textarea>
    </div>
    <div class="form__error">
    @error('detail')
    {{ $message }}
    @enderror
    </div>
    <div class="button">
        <button class="button__submit" type="submit">確認画面</button>
    </div>
</form>
@endsection