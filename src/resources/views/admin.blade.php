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

@section('content')
@livewire('admin-modal')
@endsection