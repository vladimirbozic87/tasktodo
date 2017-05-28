<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\Project;
use App\User;
use App\Role;
use App\UserConnection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(){

       $roles = Role::where('id', '!=' , 1)->get();

       return view('users.index')->with('roles', $roles);
    }

    public function postUsers(Request $request){

        $this->validate($request, [
           'email' => 'required|unique:users|email|max:255',
           'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'username' => 'required|unique:users|alpha_dash|max:20',
           'password' => 'required|min:6',
           'confirm_password' => 'required|min:6|same:password',
           'role' => 'required',
        ]);

         $data = new User;

         $data->email = $request->input('email');
         $data->first_name = $request->input('first_name');
         $data->last_name = $request->input('last_name');
         $data->username = $request->input('username');
         $data->password = bcrypt($request->input('password'));
         $data->role_id = $request->input('role');

         $data->save();

         UserConnection::create([
            'created_by' => Auth::user()->id,
            'user_id' => $data->id,
            'company_id' => Auth::user()->getCompany->id,
            'project_id' => Auth::user()->getProjectSession->first()->id,
        ]);

        return redirect()->route('task.index');
    }

}
