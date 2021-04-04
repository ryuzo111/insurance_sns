<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

				public function index() {
								$all_chats = Chat::where('send_user_id' , Auth::id())->orWhere('recive_user_id' , Auth::id())->get();
								if (!empty($all_chats)) {

								}
								dd($all_chats);
				}

				public function chat(Request $request) {

								$user = $request->input('user_id');
								$send_chat = Chat::where('send_user_id', Auth::id())->where('recive_user_id', $user)->get();
								$recive_chat = Chat::where('send_user_id', $user)->where('recive_user_id', Auth::id())->orderBy('created_at', 'asc')->get();

								$all_messages = $send_chat->merge($recive_chat);
								$all_messages->sortByDesc('created_at');

								return view('chat.chat', compact('all_messages'));
				}

				public function chatSend(Request $request) {

				}
}
