@extends('layouts.app')

@section('content')
<h1>コメントする</h1>

<form action="{{route('post.postComment')}}" method="post">
{{csrf_field()}}

<input type="text" name="comment" required>
<input type="hidden" name="post_id" value="{{$post_id}}">

<input type="submit" value="コメントする">
</form>
@endsection
