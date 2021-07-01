<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;
    public function getAll()
    {
        $posts = DB::table('posts')->select('posts.id as post_id', 'posts.created_at', 'posts.title', 'posts.trouble', 'posts.life', 'posts.midical', 'posts.saving', 'posts.cancer', 'posts.pension', 'posts.all_life', 'posts.insurance_value', 'posts.contents', 'users.image', 'users.name', 'posts.user_id')->where('posts.deleted_at', null)->leftjoin('users', 'posts.user_id', '=', 'users.id')->orderBy('posts.created_at', 'desc')->paginate(6);
        return $posts;
    }

    public function store($request)
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
    }
}
