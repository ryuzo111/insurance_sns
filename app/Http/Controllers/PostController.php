<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\Post;
use DB;

class PostController extends Controller
{
				public function index() {
								//$posts = Post::all();
								$profile = Profile::where('user_id', Auth::id())->first();
								$posts = DB::table('posts')->join('profiles', 'posts.user_id', '=', 'profiles.user_id')->get();
								return view('top.index', compact('posts', 'profile'));

				}

				public function showPostForm() {
								return view('post.post');
				}

				public function post(Request $request) {
								
								$post = new Post();
								$post['user_id'] = Auth::id();
								$post['title'] = $request->input('title');
								$post['trouble'] = $request->input('trouble');
								if ($request->has('life')){
												$post['life'] = 1;
								}
								if ($request->has('medical')){
												$post['medical'] = 1;
								}
								if ($request->has('saving')){
												$post['saving'] = 1;
								}
								if ($request->has('cancer')){
												$post['cancer'] = 1;
								}
								if ($request->has('pension')){
												$post['pension'] = 1;
								}
								if ($request->has('all_life')){
												$post['all_life'] = 1;
								}
								if ($request->has('other')){
												$post['other'] = 1;
								}

								$post['insurance_value'] = $request->input('insurance_value');
								$post['contents'] = $request->input('contents');
								$post->save();

								return redirect()->route('post.index');
				}

}
