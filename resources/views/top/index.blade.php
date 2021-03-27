@extends('layouts.app')

@section('content')
<h1>保険の悩み一覧</h1>
@if (session('flash_message'))
<div class="flash_message" style="color:red">{{ session('flash_message') }}</div>
@endif


<form action="#" method="post">
{{csrf_field()}}
<input type="text" >
<input type="submit" value="検索する">
</form>

@if (!empty($posts))
@foreach ($posts as $post)
<table border="1" style="text-align:center; border-collapse:collapse;">
<a href="{{route('profile.detail', ['user_id' => $post->user_id])}}">
<img style="height:100px; width:100px; border-radius:50%" src="{{asset('/storage/' . $post->image)}}">
<p>{{$post->name}}</p>
</a>

<p>{{$post->created_at}}</p>
<p style="font-weight:bold; font-size:20px">{{$post->title}}</p>

<tr>
<th>悩み</th>
<th>探している保険の種類</th>
<th>加入している保険の詳細</th>
<th>その他詳細</th>
</tr>
<tr>
<td>
@if (!empty($post->trouble))
@switch ($post->trouble)
@case (1)
<p>保険加入についての悩み</p>
@break
@case (2)
<p>現在加入している保険の悩み</p>
@break
@case (3)
<p>健康告知についての悩み</p>
@break
@case (4)
<p> その他の悩み</p>
@break
@endswitch
@endif
</td>

<td>
@if (!empty($post->life))
<p>生命保険</p>
@elseif (!empty($post->midical))
<p>医療保険</p>
@elseif (!empty($post->saving))
<p>貯蓄タイプの保険</p>
@elseif (!empty($post->cancer))
<p>がん保険</p>
@elseif (!empty($post->pension))
<p>年金保険</p>
@elseif (!empty($post->all_life))
<p>終身保険</p>
@else
<p>その他の保険</p>
@endif
</td>

<td>
@if (!empty($post->insurance_value))
<p>{{$post->insurance_value}}</p>
@endif
</td>

<td>
<p>{{$post->contents}}</p>
</td>
</tr>
@if (Auth::id() === $post->user_id)
<a href="{{route('post.delete', ['post_id' => $post->post_id])}}">投稿を削除する<i class="fa fa-trash"></i></a>
@endif
<a href="{{route('post.commentForm', ['post_id' => $post->post_id])}}">コメント(提案含む)を追加する<i class="far fa-comment"></i></a>
<a href="{{route('post.detail', ['post_id' => $post->post_id])}}">コメントを確認する</a>
</table>

@endforeach

@else 
<p>投稿はありません</p>
@endif

@guest
<p>ログインしたら投稿できるようになります。</p>
@else
<a href="{{route('post.showPostForm')}}">悩みを投稿する</a>
@endguest

@endsection
