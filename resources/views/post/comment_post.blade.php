@extends('layouts.app')

@section('content')
<h1>コメントする</h1>
<div class="comment-post-container">
<form action="{{route('post.postComment')}}" method="post">
{{csrf_field()}}

<input class="chat-form" type="text" name="comment" required>
<input type="hidden" name="post_id" value="{{$post_id}}">

<input class="chat-btn" type="submit" value="コメントする">
</form>
</div>
@endsection
