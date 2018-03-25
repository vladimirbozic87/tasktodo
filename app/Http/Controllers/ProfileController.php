<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username){

       $user = User::where('username', $username)->first();

       if(!$user){
            return redirect()->route('home');
       }

       return view('profile.index')
              ->with('user', $user);
   }
}
