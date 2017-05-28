<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignin(){

    	return view('auth.signin');
    }

    public function postSignin(Request $request){

        $this->validate($request, [
           'email' => 'required',
           'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if(!Auth::attempt(['email' => $email, 'password' => $password])){
           return redirect()->back()->with('danger', 'Could not sign you in with those details.');
        } else {

           if(Auth::user()->ifHaveUsers != '[]'){

             return redirect()->route('task.index')->with('info', 'You are now signed in.');
           }

           if(Auth::user()->getProject != '[]'){

             return redirect()->route('users.index')->with('info', 'You are now signed in.');
           }

           if(Auth::user()->getCompany){

             return redirect()->route('company.project')->with('info', 'You are now signed in.');
           }

           return redirect()->route('company.index')->with('info', 'You are now signed in.');
        }

    }

    public function getSignup(){

      $roles = Role::all();

    	return view('auth.signup')->with('roles', $roles);
    }

    public function postSignup(Request $request){

        $this->validate($request, [
           'email' => 'required|unique:users|email|max:255',
           'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'username' => 'required|unique:users|alpha_dash|max:20',
           'password' => 'required|min:6',
           'confirm_password' => 'required|min:6|same:password',
           'role' => 'required',
        ]);

        User::create([
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role'),
        ]);

        return redirect()
        ->route('home')
        ->with('info', 'Your account has been created and you can now sing in.');
    }

    public function getSignout(){

       Auth::logout();

       return redirect()->route('home');
    }

}
