<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileEditRequest;


class ProfileController extends Controller
{
				public function showEditForm() {
								$profile = User::where('id', Auth::id())->first();
								$prefs = config('prefs');
								return view('top.profile_edit', compact('profile', 'prefs'));

				}

				public function	profile() {

								$profile = User::where('id', Auth::id())->first();
								return view('top.profile', compact('profile'));

				}
				public function edit(ProfileEditRequest $request) {

								$profile = User::where('id', Auth::id())->first();
								if (!empty($profile)) {
												$profile = User::find($profile['id']);
								} else { 
												$profile = new User();
								}


								if ($request->hasFile('image')) {
																DB::transaction(function() use($request, $profile) {
																								if (!empty($profile['image'])) {
																								Storage::delete('public/' . $profile['image']);
																								}

																								$file_extension = str_replace('image/', '', $request->file('image')->getMimeType());
																								$image_pass = uniqid() . '.' . $file_extension;
																								$request->file('image')->storeAs('public', $image_pass);
																								$profile->image = $image_pass;
																								});
								}

								$profile['name'] = $request->input('name');
								$profile['sex'] = $request->input('sex');
								$profile['age'] = $request->input('age');
								$profile['recruiter'] = $request->input('recruiter');
								$profile['insurance_company'] = $request->input('insurance_company');
								$profile['family_structure'] = $request->input('family_structure');
								$profile['home'] = $request->input('home');
								$profile['pref'] = $request->input('pref');
								$profile->save();
								return redirect()->route('post.index');



				}

				public function detail($user_id) {
								$profile = User::where('id', $user_id)->first();
								return view('top.profile', compact('profile'));
				}
}
