@extends('layouts.app')

@section('content')
<h1>保険の悩み一覧</h1>

@if (!empty($chat_users))
@foreach ($chat_users as $chat_user)
<a href="{{route('chat.chat', ['user_id' => $chat_user->id])}}">
<img style="height:100px; width:100px; border-radius:50%" src="{{asset('/storage/' . $chat_user->image)}}">
<p>{{$chat_user->name}}</p>
</a>
@endforeach
@endif

@endsection
