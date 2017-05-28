<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

  public function getTask(){

     $user = Auth::user()->ifHaveUsers->first();

     $data = User::find($user->user_id);

     return view('task.index')->with('user', $data);
  }

  public function postTask(Request $request){

     $this->validate($request, [
        'task_name' => 'required|unique:tasks|max:255|min:6',
        'task_description' => 'required|min:6',
        'fileToUpload.*' => 'mimes:pdf,xls,doc,docx,pptx,pps,jpeg,bmp,png',
        'date' => 'sometimes|nullable|date',
     ]);

    if($request->file('fileToUpload')){

      foreach ($request->file('fileToUpload') as $file) {

         $name = $file->getClientOriginalName();

         $file->move(base_path() . '/public/uploads/',$name);
      }
    }

    /*
    Company::create([
        'user_id' => Auth::user()->id,
        'company_name' => $request->input('company_name'),
        'company_info' => $request->input('company_info'),
    ]);

    return redirect()->route('company.project');
    */
  }

}
