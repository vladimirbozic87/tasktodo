<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\Project;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompany(){

        if(Auth::user()->ifHaveUsers != '[]'){

           return redirect()->route('task.index');
        }

        if(Auth::user()->getProject != '[]'){

            return redirect()->route('users.index');
        }

        if(Auth::user()->getCompany){

            return redirect()->route('company.project');
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

      Project::create([
          'user_id' => Auth::user()->id,
          'company_id' => Auth::user()->getCompany->id,
          'project_name' => $request->input('project_name'),
          'project_info' => $request->input('project_info'),
      ]);

      return redirect()->route('users.index');
    }

}
