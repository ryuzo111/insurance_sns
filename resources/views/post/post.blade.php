@extends('layouts.app')

@section('content')
<h1>保険の悩み投稿ページ</h1>

<form action="{{route('post.post')}}" method="post">

{{csrf_field()}}
<div class="post-container1">
<p class="post-p">悩みのタイトル</p>
@if ($errors->has('title'))
{{$errors->first('title')}}
@endif
<input class="post-title" type="text" name="title" placeholder="タイトルを入力してください" required>
</div>

<div class="post-container2">
@if ($errors->has('trouble'))
{{$errors->first('trouble')}}
@endif
<p class="post-p">どんなタイプの悩み
</p>
<input type="radio" name="trouble" value=1>保険加入についての悩み
<input type="radio" name="trouble" value=2>現在加入している保険の悩み
<input type="radio" name="trouble" value=3>健康告知についての悩み
<input type="radio" name="trouble" value=4>その他の悩み
</div>


<div class="post-container2">
<p class="post-p">もし保険を探しているなら、どんな保険を探している?※探している人のみ</p>
<input type="checkbox" name="life" value=1>生命保険
<input type="checkbox" name="midical" value=1>医療保険
<input type="checkbox" name="saving" value=1>貯蓄タイプの保険
<input type="checkbox" name="cancer" value=1>がん保険
<input type="checkbox" name="pension" value=1>年金保険
<input type="checkbox" name="all_life" value=1>終身保険
<input type="checkbox" name="other" value=1>その他の保険
</div>


<div class="post-container3">
@if ($errors->has('insurance_value'))
{{$errors->first('insurance_value')}}
@endif
<p class="post-p">誰が何の保険にどのくらい加入したいのか？※答えられる人のみ※複数回答可</p>
<input class="post-text" type="textarea" name="insurance_value" placeholder="旦那の生命保険を500万円備えたい">
</div>

<div class="post-container3">
@if ($errors->has('contents'))
{{$errors->first('contents')}}
@endif
<p class="post-p">どんな悩み？自由に入力してください</p>
<input class="post-text" type="textarea" name="contents" placeholder="子供が生まれました。保険に入るべきなのか？また、入ったほうが良いならどんな保険に入ると良いのか？教えて下さい" required>
</div>

<div class="post-container3">
<input class="post-submit-button" type="submit" value="悩みを共有してアドバイスをもらう">
</div>
@endsection
