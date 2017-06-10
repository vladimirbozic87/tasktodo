<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Task;
use App\Status;
use Illuminate\Http\Request;

class TaskController extends Controller
{

  public function getTask(){

     $user = Auth::user()->ifHaveUsers->first();

     $data = User::find($user->user_id);

     $status = Status::all();

     return view('task.index')->with('user', $data)->with('status', $status);
  }

  public function postTask(Request $request){

     $this->validate($request, [
        'task_name' => 'required|unique:tasks|max:255|min:6',
        'task_description' => 'required|min:6',
        'status' => 'required',
        'fileToUpload.*' => 'mimes:pdf,xls,doc,docx,pptx,pps,jpeg,bmp,png',
        'date' => 'sometimes|nullable|date',
     ]);

     $path = array();

    if($request->file('fileToUpload')){

      foreach ($request->file('fileToUpload') as $file) {

         $name = $file->getClientOriginalName();

         $file->move(base_path() . '/public/uploads/',$name);

         $path[] = '/public/uploads/'.$name;
      }
    }

    $pathJson = json_encode($path);

    if($request->has('date')){
         $date = date("Y-m-d", strtotime($request->input('date')));
    } else {
         $date = NULL;
    }

    $user = Auth::user()->ifHaveUsers->first();

    Task::create([
        'created_by' => Auth::user()->id,
        'user_id' => $user->user_id,
        'company_id' => Auth::user()->getCompany->id,
        'project_id' => Auth::user()->getProjectSession->first()->id,
        'task_name' => $request->input('task_name'),
        'task_description' => $request->input('task_description'),
        'progress' => 0,
        'status' => $request->input('status'),
        'task_file_url' => $pathJson,
        'task_end' => $date,
    ]);

    return redirect()->route('task.taskline', ['username' => Auth::user()->username]);

  }

  public function getTaskLine($username){

      $user = User::where('username', $username)->first();

      if($user){

          if($user->role_id == 1){

            $tasks = Task::where('created_by', $user->id)->paginate(12);

          } else {

            $tasks = Task::where('user_id', $user->id)->paginate(12);
          }

          return view('task.taskline')->with('tasks', $tasks);

      } else {

         return redirect()->route('home');
      }

  }

}
