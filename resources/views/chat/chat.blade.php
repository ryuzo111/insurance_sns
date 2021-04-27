@extends('layouts.app')

@section('content')
<h1>チャット</h1>

				<div class="chat-room" id="room">
@foreach($all_messages as $key => $message)
{{--   送信したメッセージ  --}}
@if($message['send_user_id'] == Auth::id())
				<div class="chat-send" style="text-align: right">
				<p class="chat-send-p">{{$message['message']}}</p>
				</div>

				@endif

{{--   受信したメッセージ  --}}
@if($message['recive_user_id'] == Auth::id())
<div class="chat-recive-user">
<div class="chat-send-user">
<img style="height:40px; width:40px; border-radius:50%" src="{{asset('/storage/' . $user->image)}}">
<p style="font-size:10px">{{$user->name}}</p>
</div>
				<div class="chat-recieve" style="text-align: left">
				<p>{{$message['message']}}</p>
				</div>
				</div>
				@endif
				@endforeach
				</div>

				<form enctype="multipart/form-data" action="{{route('chat.send')}}" method="POST" class="form-horizontal">
{{ csrf_field() }}
<div class="chat-form">
<div class="chat-col-sm-6">
<input type="text" name="chat" class="form-control" required >
<input type="hidden" name="user_id" value="{{$user->id}}">
</div>
<button type="submit" class="chat-btn" id="submit"><i class="fas fa-share"></i></button>
</div>
</form> 

@endsection
