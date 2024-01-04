<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Auth; 
use Str;
use Mail;
use App\Http\Requests\ResetPassword;
use App\Mail\ForgotPasswordMail;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $req){
        return view('auth.login');
        // $password = Hash::make('123456');
        // dd($password);
    }

    public function forgot_password(Request $req){
        return view('auth.forgot_password');
    }

    public function forgot_password_post(Request $req){
        // dd($req->all());

        $count = User::where('email', '=', $req->email)->count();
        if($count > 0){
            $user = User::where('email', '=', $req->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Your password has been reset and is sent via registered email.');
        }else{
            return redirect()->back()->withInput()->with('error', 'Email not found in the system.');
        }
    }

    public function create_account(Request $req){
        return view('auth.register');
    }

    public function login_post(Request $req){        
        if(Auth::attempt(['email'=> $req->email, 'password'=> $req->password], true)){
            if(Auth::User()->role == '1'){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect()->back()->with('error', 'Please enter the correct credentials');
            }
        }else{
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function getReset($token){
        // dd($token);

        // if(Auth::check()){
        //     return redirect('admin/dashboard');
        // }

        $user = User::where('remember_token', '=', $token);
        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;
        return view('auth.reset_password', $data);
    }

    public function postReset($token, ResetPassword $req){

        $user = User::where('remember_token', '=', $token);
        if($user->count() == 0){
            abort(403);
        }

        $user = $user->first();
        $user->password = Hash::make($req->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Password has been reset.');
    }


    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }
}

