@extends('layouts.app')

@section('content')
<h1>プロフィール編集ページ</h1>
<form action="{{route('profile.edit')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<p>プロフィール写真</p>
<input type="file" name="image">

<input type="text" name="name" placeholder="名前を入力してください(匿名をおすすめしています。)" value="{{$profile['name'] ?? null}}">
<input type="number" name="age" value="{{$proflie['age'] ?? null}}">

<p>性別
@if (!empty($profile['sex']))
@if ($profile['sex'] === 1)
<input type="radio" name="sex" value=1 checked>男
<input type="radio" name="sex" value=2>女
@else
<input type="radio" name="sex" value=1>男
<input type="radio" name="sex" value=2 checked>女
@endif
@else
<input type="radio" name="sex" value=1>男
<input type="radio" name="sex" value=2>女
@endif
</p>

<p>保険(共済)の募集人ですか？
@if (!empty($profile['recruiter']))
@if ($profile['recruiter'] === 1)
<input type="radio" name="recruiter" value=1 checked>はい
<input type="radio" name="recruiter" value=2>いいえ
@endif
@else
<input type="radio" name="recruiter" value=1>はい
<input type="radio" name="recruiter" value=2 checked>いいえ
@endif
</p>

<p>保険(共済)の募集人の方のみお答えください</p>
<p>所属している組織名を教えて下さい</p>
<input type="text" name="insurance_company" value="{{$profile['insurance_company'] ?? null}}">

<p>家族構成</p>
<input type="text" name="family_structure" value="{{$proflie['family_structures'] ?? null}}">

<p>現在お住まいの家
<input type="radio" name="home" value=1>一軒家(持ち家)
<input type="radio" name="home" value=2>一軒家(賃貸)
<input type="radio" name="home" value=3>マンション(持ち家)
<input type="radio" name="home" value=4>マンション(賃貸)
<input type="radio" name="home" value=5>アパート(持ち家)
<input type="radio" name="home" value=6>アパート(賃貸)
<input type="radio" name="home" value=7>その他
</p>

<select name="pref">
<option value="" selected>都道府県</option>
@foreach ($prefs as $pref)
<option value="{{$pref}}">{{$pref}}</option>
@endforeach
</select>


<input type="text" name="have_insurance" value="{{$proflie['have_insurance'] ?? null}}">

<p>自由記入欄</p>
<input type="text" name="free_comment" value="{{$profile['free_comment'] ?? null}}">
<input type="submit" value="編集する">
</form>




@endsection
