<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Mail\Verification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function contactUs(){
        return view('contactUs');
    }
    public function contacted(Request $request){
        Mail::to('ashababr439@gmail.com')->send(new TestMail($request));
    }
    public function verification($id){
             $user=User::find($id);
             Mail::to($user->email)->send(new Verification($user));

    }
    public function verified($id){
        $user = User::find($id);
        $user->email_verified_at = time();
        $user->update();
        return to_route('verified.redirect');
    }
    public function check($id){
        // return view('home.index');
// return 'created';
        $user = User::find($id);
        return view('auth.verify-email')->with(compact('user'));
    }
}
