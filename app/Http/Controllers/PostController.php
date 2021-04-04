<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\Post;
use DB;
use App\Comment;

class PostController extends Controller
{
				public function index() {
								//$posts = Post::all();
								$profile = Profile::where('user_id', Auth::id())->first();
								$posts = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'profiles.image', 'profiles.name', 'posts.user_id')->where('posts.deleted_at', null)->leftjoin('profiles', 'posts.user_id', '=', 'profiles.user_id')->get();
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
				public function delete(Request $request) {
								
								Post::findOrFail($request->input('post_id'))->delete();
								session()->flash('flash_message', '投稿を削除しました。');
								return redirect()->route('post.index');

				}

				public function postComment(Request $request) {

								$rule = [
									'comment' => ['required', 'max:140'],
									'post_id' => ['required', 'exists:posts,id'],
									];

								$this->validate($request, $rule);
							
								$comment = new Comment();
								$comment->user_id = Auth::id();
								$comment->post_id = $request->input('post_id');
								$comment->comment = $request->input('comment');
								$comment->save();

								return redirect()->route('post.index');

				}

				public function commentForm(Request $request) {

								$post_id = $request->input('post_id');
								return view('post.comment_post', compact('post_id'));

				}

				public function detail(Request $request) {
								$post = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'profiles.image', 'profiles.name', 'posts.user_id')->where('posts.id', $request->input('post_id'))->join('profiles', 'posts.user_id', '=', 'profiles.user_id')->first();
								$comments = DB::table('comments')->select('comments.id', 'comments.comment', 'comments.user_id', 'comments.created_at', 'comments.good', 'profiles.name', 'profiles.image')->where('comments.post_id', $request->input('post_id'))->join('profiles', 'comments.user_id', '=', 'profiles.user_id')->get();
								return view('post.detail', compact('post', 'comments'));
				}
				
				public function commentDelete(Request $request) {
								Comment::findOrFail($request->input('comment_id'))->delete();
								session()->flash('flash_message', 'コメントを削除しました。');
								return back();
				}

				public function commentGood(Request $request) {
		
								$comment = Comment::findOrFail($request->input('comment_id'));
								$comment->good = 1;
								$comment->save();
								session()->flash('flash_message', 'コメントにいいねを押しました');
								return back();
				}


}
