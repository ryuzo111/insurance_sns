@extends('layouts.app')

@section('content')
<h1>プローフィールページ</h1>
@if (!empty($profile['image']))
<img style="height:100px; width:100px; border-radius:50%" src="{{asset('/storage/' . $profile->image)}}">
@endif

<p>{{$profile['name'] ?? null}}</p>

<p>{{$profile['age'] ?? null}}</p>

@if (!empty($profile['sex']))
@if ($profile['sex'] === 1)
<p>男</p>
@else 
<p>女</p>
@endif
@endif

@if (!empty($profile['recruiter']))
@if ($profile['recruiter'] === 1)
<p>保険(共済)の募集人資格有り</p>
@if (!empty($profile['insurance_company']))
<p>所属組織:{{$profile['insurance_company']}}</p>
@endif
@else
<p>募集人資格なし</p>
@endif
@endif

@if (!empty($profile['family_structure']))
<p>家族構成 : {{$profile['family_structure']}}</p>
@endif

<p>現在住んでいる家</p>
@if (!empty($profile['home']))
@if ($profile['home'] === 1)
<p>一軒家(持ち家)</p>
@elseif ($profile['home'] === 2)
<p>一軒家(賃貸)</p>
@elseif ($profile['home'] === 3)
<p>マンション(持ち家)</p>
@elseif ($profile['home'] === 4)
<p>マンション(賃貸)</p>
@elseif ($profile['home'] === 5)
<p>アパート(持ち家)</p>
@elseif ($profile['home'] === 6)
<p>アパート(賃貸)</p>
@elseif ($profile['home'] === 7)
<p>その他</p>
@else
<p>未登録</p>
@endif
@endif

<p>現在住んでいる都道府県</p>
@if (!empty($profile['pref']))
<p>{{$profile['pref']}}</p>
@else
<p>未登録</p>
@endif

@if (!empty($profile['user_id']))
<a href="{{route('chat.chat', ['user_id' => $profile['user_id']])}}">
チャットする
</a>
@endif

@if ($profile['id'] === Auth::id())
<a href="{{route('profile.showEditForm')}}">プロフィールを編集する</a>
@endif

@endsection
