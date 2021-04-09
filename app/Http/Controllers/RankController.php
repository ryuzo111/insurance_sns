<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Profile;
use DB;

class RankController extends Controller
{
				public function rank() {
								$comment_users_rank = DB::table('comments')->select(DB::raw('count(*) as commentkensu, comments.user_id'), DB::raw('count(*) as commentgood, comments.good'), 'comments.user_id', 'comments.good', 'users.name', 'users.image', 'users.age', 'users.sex', 'users.recruiter', 'users.insurance_company', 'users.free_comment')->groupBy('comments.user_id')->orderBy('commentgood', 'asc')->join('users', 'comments.user_id', '=', 'users.id')->get();

//dd($comments);
return view('post.rank', compact('comment_users_rank'));

				}
}
