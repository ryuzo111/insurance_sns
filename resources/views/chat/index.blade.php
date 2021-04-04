@extends('layouts.app')

@section('content')
<h1>保険の悩み一覧</h1>

@if (!empty($chat_users))
@foreach ($chat_users as $chat_user)
@if ($chat_user->recive_user_id === Auth::id())
<p>{{$chat_user->send_user_id}}</p>
@else
<p>{{$chat_user->recive_user_id}}</p>
@endif
@endforeach
@endif

@endsection
