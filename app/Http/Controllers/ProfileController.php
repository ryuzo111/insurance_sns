<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class ProfileController extends Controller
{
				public function showEditForm() {
								$profile = Profile::where('user_id', Auth::id())->first();
								$prefs = config('prefs');
								return view('top.profile_edit', compact('profile', 'prefs'));

				}

				public function	profile() {

								$profile = Profile::where('user_id', Auth::id())->first();
								return view('top.profile', compact('profile'));
				}
				public function edit(Request $request) {

								$profile = Profile::where('user_id', Auth::id())->first();
								if (!empty($profile)) {
												$profile = Profile::find($profile['id']);
								} else { 
												$profile = new Profile();
								}


								if ($request->hasFile('image')) {
												$validation_rule = [
																'image' => ['image', 'mimes:jpeg,png', 'max:2048'],
												];
																$this->validate($request, $validation_rule);
																DB::transaction(function() use($request, $profile) {
																								if (!empty($profile['image'])) {
																								Storage::delete('public/' . $item['image_pass']);
																								}

																								$file_extension = str_replace('image/', '', $request->file('image')->getMimeType());
																								$image_pass = uniqid() . '.' . $file_extension;
																								$request->file('image')->storeAs('public', $image_pass);
																								$profile->image = $image_pass;
																								});
								}
								$profile['user_id'] = Auth::id();

								$profile['name'] = $request->input('name');
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
								$profile = Profile::where('user_id', $user_id)->first();
								return view('top.profile', compact('profile'));
				}
}
