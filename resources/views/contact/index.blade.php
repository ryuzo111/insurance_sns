@extends('layouts.app_admin')

@section('content')
<h1>お問い合わせ一覧</h1>
@if (!empty($contacts))
@foreach ($contacts as $contact)
<div class="contact-main">
<p>{{$contact->created_at}}</p>
<p>メールアドレス</p>
<p>{{$contact->email}}</p>
<p>問い合わせ内容</p>
<p>{{$contact->content}}</p>
@if ($contact->status === 0)
<p>未回答です</p>
<a href="{{route('contact.change', ['id' => $contact->id])}}">回答済みに変更する</a>
@else
<p>回答済みです</p>
@endif
</div>
@endforeach
@endif

@endsection
