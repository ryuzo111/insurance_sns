<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'content',
        'status',
        'email',
    ];

   

    public function addContactContent($request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->email = $user->email;
        } else {
            $this->email = $request->input('email');
        }
                                
        $this->content = $request->input('content');
        $this->save();
    }

    public function updateStatus()
    {
        $this->status = 1;
        $this->save();
    }
}
