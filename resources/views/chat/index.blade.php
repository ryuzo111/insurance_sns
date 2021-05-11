@extends('layouts.app')

@section('content')
<h1>チャット相手の選択</h1>
@if (session('flash_message'))
<div class="flash_message" style="color:red">{{ session('flash_message') }}</div>
@endif

@if (!empty($chat_users))
@foreach ($chat_users as $chat_user)
<div class="chat-index-user">
<a href="{{route('chat.chat', ['user_id' => $chat_user->id])}}">
<img style="height:100px; width:100px; border-radius:50%" src="{{asset('/storage/' . $chat_user->image)}}">
<p>{{$chat_user->name}}</p>
</a>
</div>
@endforeach
@endif

@endsection
