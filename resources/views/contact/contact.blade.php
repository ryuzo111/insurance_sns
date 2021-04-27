@extends('layouts.app')

@section('content')
<h1>お問い合わせフォーム</h1>
<div class="contact-main">
<form enctype="multipart/form-data" action="{{route('contact.contact')}}" method="POST" >
{{ csrf_field() }}
@guest

<p>メールアドレス</p>
<input class="contact-mail" type="email" name="email" size-"200" required >
@endguest
<p>問い合わせ内容</p>
<textarea class="contact-content" cols="50" rows="5" typ="text" name="content">
</textarea>
<input class="contact-btn" type="submit" value="問い合わせる">
</form> 
</div>

@endsection
