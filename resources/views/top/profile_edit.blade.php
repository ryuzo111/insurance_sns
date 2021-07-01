@extends('layouts.app')

@section('content')
<h1>プロフィール編集ページ</h1>

<div class="profile-edit-container">

<form action="{{route('profile.edit')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

<div class="profile-edit-section-container">
    <p>プロフィール写真</p>
    @if ($errors->has('image'))
    {{$errors->first('image')}}
    @endif
    <input type="file" name="image">
</div>


<div class="profile-edit-section-container">

@if ($errors->has('name'))
{{$errors->first('name')}}
@endif
<input type="text" name="name" placeholder="名前を入力してください(匿名をおすすめしています。)" value="{{$profile['name'] ?? null}}">
</div>

<div class="profile-edit-section-container">
<p>年齢を入力してください</p>
@if ($errors->has('age'))
{{$errors->first('age')}}
@endif
<input type="number" name="age" value="{{$profile['age'] ?? null}}">
</div>

<div class="profile-edit-section-container">
<p>性別</br>
@if ($errors->has('sex'))
{{$errors->first('sex')}}
@endif

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
</div>

<div class="profile-edit-section-container">
<p>保険(共済)の募集人ですか？
@if ($errors->has('recruiter'))
{{$errors->first('recruiter')}}
@endif

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
</div>

<div class="profile-edit-section-container">
<br>保険(共済)の募集人の方のみお答えください</br>
所属している組織名を教えて下さい</p>
@if ($errors->has('insurance_company'))
{{$errors->first('insurance_company')}}
@endif
<input type="text" name="insurance_company" value="{{$profile['insurance_company'] ?? null}}">
</div>

<div class="profile-edit-section-container">
<p>家族構成</p>
@if ($errors->has('family_structure'))
{{$errors->first('family_structure')}}
@endif
<input type="text" name="family_structure" value="{{$profile['family_structure'] ?? null}}">
</div>

<div class="profile-edit-section-container">
<p>現在お住まいの家
@if ($errors->has('home'))
{{$errors->first('home')}}
@endif

<input type="radio" name="home" value=1>一軒家(持ち家)
<input type="radio" name="home" value=2>一軒家(賃貸)
<input type="radio" name="home" value=3>マンション(持ち家)
<input type="radio" name="home" value=4>マンション(賃貸)
<input type="radio" name="home" value=5>アパート(持ち家)
<input type="radio" name="home" value=6>アパート(賃貸)
<input type="radio" name="home" value=7>その他
</p>
</div>

<div class="profile-edit-section-container">
@if ($errors->has('pref'))
{{$errors->first('pref')}}
@endif
<select name="pref">
<option value="" selected>都道府県</option>
@foreach ($prefs as $pref)
<option value="{{$pref}}">{{$pref}}</option>
@endforeach
</select>
</div>

<div class="profile-edit-section-container">
<p>現在加入している保険(任意)</p>
@if ($errors->has('have_insurance'))
{{$errors->first('have_insurance')}}
@endif
<textarea cols="50" rows="5" type="text" name="have_insurance">
{{$profile['have_insurance'] ?? null}}
</textarea>
</div>

<div class="profile-edit-section-container">
<p>自由記入欄(任意)</p>
@if ($errors->has('free_comment'))
{{$errors->first('free_comment')}}
@endif
<textarea cols="50" rows="5" type="text" name="free_comment">
{{$profile['free_comment'] ?? null}}
</textarea>
</div>

<input type="submit" value="編集する">
</form>


</div>

@endsection
