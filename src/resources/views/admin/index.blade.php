@extends('layouts.app')

@section('header_nav')
<nav class="header-nav">
    <a href="{{ route('logout') }}">logout</a>
</nav>
@endsection

@section('content')
<div class="admin__content">
    <h1>管理画面</h1>
    <p>ログイン成功！ここが管理画面のトップです。</p>
</div>
@endsection