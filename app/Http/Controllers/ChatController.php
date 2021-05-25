<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Http\Requests\ChatRequest;

class ChatController extends Controller
{
    public function index()
    {
        $send = DB::table('chats')->select('users.name', 'users.image', 'users.id')->distinct()->where('chats.send_user_id', Auth::id())->leftjoin('users', 'chats.recive_user_id', '=', 'users.id')->get();
        $recive = DB::table('chats')->select('users.name', 'users.image', 'users.id')->distinct()->Where('recive_user_id', Auth::id())->leftjoin('users', 'chats.send_user_id', '=', 'users.id')->get();

        $chat_users = $send->merge($recive);
        $chat_users = $chat_users->unique();
        $auth_id = Auth::id();
                            
                        
        $chat_users = $chat_users->whereNotIn('id', Auth::id());

    
        return view('chat.index', compact('chat_users'));
    }

    public function chat(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::findOrFail($user_id);
        $send_chat = Chat::where('send_user_id', Auth::id())->where('recive_user_id', $user_id)->get();
        $recive_chat = Chat::where('send_user_id', $user_id)->where('recive_user_id', Auth::id())->orderBy('created_at', 'asc')->get();

        if ($send_chat === Auth::id() && $recive_chat === Auth::id()) {
            session()->flash('flash_message', '自分にチャットをすることはできないです');
            return view('chat.index', compact('chat_users'));
        }

        $all_messages = $send_chat->merge($recive_chat)->toArray();
        $all = [];
        foreach ($all_messages as $message) {
            $all[] = $message['created_at'];
        }


        array_multisort($all, SORT_ASC, $all_messages);

        return view('chat.chat', compact('all_messages', 'user'));
    }

    public function chatSend(ChatRequest $request)
    {
        $chat_user = User::findOrFail($request->input('user_id'));

        $chat = new Chat();
        $chat->send_user_id = Auth::id();
        $chat->recive_user_id = $request->input('user_id');
        $chat->message = $request->input('chat');
        $chat->save();

        return back();
    }
}
