@extends('layouts.app_top')

<div class="top-container" style="background-image:url({{asset('/storage/' . 'top.jpg') }});">
<div class="top-left-container">
<a href="{{route('post.index')}}" class="top-logo">Destiny 保険</a>
</div>

<div class="top-main-container">
<h2 class="top-h2">後悔のない保険探しをしませんか？</h2>
<p>Destiny 保険とは、保険の悩みを共有する「保険の悩みSNS」です。保険に対しての不安を投稿していただくと、他のユーザーからコメントでアドバイスを受けることができます。このSNSをご使用していただくことにより、同じ悩みを持っている人や、保険のプロなど、客観的な意見を多く得ることができ
、後悔のない保険選びができます。</p>

<a class="top-login" href="{{route('login')}}">ログインする</a></br>
<a class="top-register" href="{{route('register')}}">新規会員登録</a>
</div>

</div>

