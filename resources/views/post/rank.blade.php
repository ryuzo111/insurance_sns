@extends('layouts.app')

@section('content')
<h1>参考になったコメントランキング</h1>
@if (session('flash_message'))
<div class="flash_message" style="color:red">{{ session('flash_message') }}</div>
@endif

@if (!empty($comment_users_rank))
@foreach ($comment_users_rank as $user)
<div class="rank-container" border="1" style="text-align:center; ">
@if ($loop->first)
<i style="font-size:60px;color:gold;" class="fas fa-crown"></i>
@endif
<a href="{{route('profile.detail', ['user_id' => $user->user_id])}}">
<img style="height:100px; width:100px; border-radius:50%" src="{{asset('/storage/' . $user->image)}}">
<p>{{$user->name}}</p>
</a>

<p>{{$user->age}}</p>
<p>{{$user->sex}}</p>
@if ($user->recruiter === 1)
<p>保険(共済)の募集人です</p>
@if (!empty($user->insurance_company))
<p>{{$user->insurance_company}}</p>
@endif
@endif

@if (!empty($user->free_comment))
<p>{{$user->free_comment}}</p>
@endif
<p style="font-weight:bold; font-size:20px">{{$user->commentkensu}}つのコメントの内{{$user->commentgood}}つのコメントいいねをいただけました</p>

</div>


@endforeach
@endif

@endsection
