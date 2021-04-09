@extends('layouts.app')

@section('content')
<h1>チャット</h1>

				<div id="room">
@foreach($all_messages as $key => $message)
{{--   送信したメッセージ  --}}
@if($message['send_user_id'] == Auth::id())
				<div class="send" style="text-align: right">
				<p>{{$message['message']}}</p>
				</div>

				@endif

{{--   受信したメッセージ  --}}
@if($message['recive_user_id'] == Auth::id())
				<div class="recieve" style="text-align: left">
				<p>{{$message['message']}}</p>
				</div>
				@endif
				@endforeach
				</div>

				<form enctype="multipart/form-data" action="{{route('chat.send')}}" method="POST" class="form-horizontal">
{{ csrf_field() }}
<div class="form-group">
<div class="col-sm-6">
<input type="text" name="chat" class="form-control" >
<input type="hidden" name="user_id" value="{{$user_id}}">
</div>
</div>
<button type="submit" class="btn btn-primary" id="submit">投稿</button>
</form> 

@endsection
