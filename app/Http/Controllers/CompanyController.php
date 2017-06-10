<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\Project;
use App\UserConnection;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompany(){

        if(Auth::user()->ifHaveTask != '[]'){

         return redirect()->route('task.taskline', ['username' => Auth::user()->username]);
        }

        if(Auth::user()->ifHaveUsers != '[]'){

           return redirect()->route('task.index');
        }

        if(Auth::user()->getProject != '[]'){

            return redirect()->route('users.index');
        }

        if(Auth::user()->getCompany){

            return redirect()->route('company.project');
        }

           if(Auth::user()->role_id != 1){

              if(UserConnection::where('user_id', Auth::user()->id)->first()){

                    return redirect()->route('task.taskline', ['username' => Auth::user()->username]);
              }

               return redirect()->route('auth.block')->with('warning', 'This account is not confirmed. Please contact your Project Manager.');
           }

        return view('company.index');
    }

    public function postCompany(Request $request){

      $this->validate($request, [
         'company_name' => 'required|unique:company|max:255|min:6',
         'company_info' => 'required|min:6',
      ]);

      Company::create([
          'user_id' => Auth::user()->id,
          'company_name' => $request->input('company_name'),
          'company_info' => $request->input('company_info'),
      ]);

      return redirect()->route('company.project');
    }

    public function getProject(){

       return view('company.project');
    }

    public function postProject(Request $request){

      $this->validate($request, [
         'project_name' => 'required|unique:project|max:255|min:6',
         'project_info' => 'required|min:6',
      ]);

      $project = new Project;

      $project->user_id = Auth::user()->id;
      $project->company_id = Auth::user()->getCompany->id;
      $project->project_name = $request->input('project_name');
      $project->project_info = $request->input('project_info');
      $project->project_session = 1;

      $project->save();

      Project::where('id', '!=', $project->id)
              ->where('user_id', Auth::user()->id)
              ->update(['project_session' => 0]);

      return redirect()->route('users.index'); 
    }

}
