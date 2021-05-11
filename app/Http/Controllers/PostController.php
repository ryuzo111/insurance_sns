<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\Post;
use DB;
use App\Comment;
use App\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostDetailRequest;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function top()
    {
        return view('top.top');
    }
    public function index()
    {
        $posts = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'users.image', 'users.name', 'posts.user_id')->where('posts.deleted_at', null)->leftjoin('users', 'posts.user_id', '=', 'users.id')->orderBy('posts.created_at', 'desc')->paginate(6);
        return view('top.index', compact('posts'));
    }

    public function showPostForm()
    {
        return view('post.post');
    }

    public function post(PostRequest $request)
    {
        $post = new Post();
        $post['user_id'] = Auth::id();
        $post['title'] = $request->input('title');
        $post['trouble'] = $request->input('trouble');
        if ($request->has('life')) {
            $post['life'] = 1;
        }
        if ($request->has('midical')) {
            $post['midical'] = 1;
        }
        if ($request->has('saving')) {
            $post['saving'] = 1;
        }
        if ($request->has('cancer')) {
            $post['cancer'] = 1;
        }
        if ($request->has('pension')) {
            $post['pension'] = 1;
        }
        if ($request->has('all_life')) {
            $post['all_life'] = 1;
        }
        if ($request->has('other')) {
            $post['other'] = 1;
        }

        $post['insurance_value'] = $request->input('insurance_value');
        $post['contents'] = $request->input('contents');
        $post->save();

        return redirect()->route('post.index');
    }
    public function delete(Request $request)
    {
        $post = Post::findOrFail($request->input('post_id'));
        if ($post->user_id === Auth::id()) {
            Post::findOrFail($request->input('post_id'))->delete();
            session()->flash('flash_message', '投稿を削除しました。');
        } else {
            session()->flash('flash_message', '不正ログインです。');
        }
        return redirect()->route('post.index');
    }

    public function postComment(Request $request)
    {
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

    public function commentForm(Request $request)
    {
        $post_id = $request->input('post_id');
        return view('post.comment_post', compact('post_id'));
    }

    public function detail(PostDetailRequest $request)
    {
        $post = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'users.image', 'users.name', 'posts.user_id')->where('posts.id', $request->input('post_id'))->join('users', 'posts.user_id', '=', 'users.id')->first();
        $comments = DB::table('comments')->select('comments.id', 'comments.comment', 'comments.user_id', 'comments.created_at', 'comments.good', 'users.name', 'users.image')->where('comments.post_id', $request->input('post_id'))->join('users', 'comments.user_id', '=', 'users.id')->get();
        // dd($comments);
        
        return view('post.detail', compact('post', 'comments'));
    }

    public function commentDelete(Request $request)
    {
        Comment::findOrFail($request->input('comment_id'))->delete();
        session()->flash('flash_message', 'コメントを削除しました。');
        return back();
    }

    public function commentGood(Request $request)
    {
        $comment = Comment::findOrFail($request->input('comment_id'));
        $comment->good = 1;
        $comment->save();
        session()->flash('flash_message', 'コメントにいいねを押しました');
        return back();
    }

    public function search(Request $request)
    {
        $post_name = $request->input('post_name');

        $posts = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'users.image', 'users.name', 'posts.user_id')->where('title', 'like', '%' . $request->input('post_name') . '%')->where('posts.deleted_at', null)->leftjoin('users', 'posts.user_id', '=', 'users.id')->orderBy('posts.created_at', 'desc')->paginate(6);

        if (empty($posts)) {
            $posts = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'users.image', 'users.name', 'posts.user_id')->where('posts.deleted_at', null)->leftjoin('users', 'posts.user_id', '=', 'users.id')->orderBy('posts.created_at', 'desc')->paginate(6);
        }
        return view('top.index', compact('posts', 'post_name'));
    }
}
