<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Mail;
use App\Mail\ContactAdmin;
use App\Mail\ContactUser;

class ContactController extends Controller
{
				public function contactForm() {
								return view('contact.contact');	
				}

				public function contact(Request $request) {
								$contact = new Contact();
								$admin = Admin::find(1);
								if (Auth::check()) {
												$user = Auth::user();
												$contact->email = $user->email;	
								} else {
												$contact->email = $request->input('email');
								}
								Mail::send(new ContactAdmin($admin->email, $request->input('content')));
								Mail::send(new ContactUser($contact->email, $request->input('content')));
								$contact->content = $request->input('content');
								$contact->save();
								session()->flash('flash_message', 'お問い合わせありがとうございます');
								return redirect()->route('post.index');
				}

				public function contactIndex() {
								$contacts = Contact::all();
								return view('contact.index', compact('contacts'));
				}

				public function contactChange(Request $request) {
								$contact = Contact::findOrFail($request->input('id'));
								$contact->status = 1;
								$contact->save();
								return redirect()->route('contact.index');
				}
}
