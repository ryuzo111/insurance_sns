@extends('layouts.app')

@section('content')
<h1>コメントする</h1>

<form action="{{route('post.commentPost')}}" method="post">
{{csrf_field()}}

<p>どんな悩み？自由に入力してください</p>
<input type="text" name="comment" required>

<input type="submit" value="コメントする">
</form>
@endsection
