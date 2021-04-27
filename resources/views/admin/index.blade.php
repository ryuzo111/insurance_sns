@extends('layouts.app_admin')

@section('content')
<h1>ユーザー一覧</h1>
@if (!empty($users))
@foreach ($users as $user)
<div class="contact-main">
<p>{{$user->id}}</p>
<p>{{$user->name}}</p>
<p>{{$user->email}}</p>
</div>
@endforeach
@endif

@endsection
