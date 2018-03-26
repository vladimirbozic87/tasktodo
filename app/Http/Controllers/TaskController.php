<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Task;
use App\Status;
use App\UserConnection;
use App\Comment;
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

         $path[] = '/uploads/'.$name;
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

      $status = Status::all();

      $user = User::where('username', $username)->first();

      if($user){

          $userConn = UserConnection::where('created_by', $user->id)->get();

          if($user->role_id == 1){

            $tasks = Task::where('created_by', $user->id)->paginate(12);

          } else {

            $tasks = Task::where('user_id', $user->id)->paginate(12);
          }

          return view('task.taskline')->with('tasks', $tasks)->with('status', $status)->with('userConn', $userConn)->with('username', $username);

      } else {

         return redirect()->route('home');
      }

  }

  public function getSearch(Request $request){

      $status = Status::all();

      $user = User::where('username', Auth::user()->username)->first();

      if($user){

          $userConn = UserConnection::where('created_by', $user->id)->get();

          $userSearch = User::where('username', $request->input('user'))->first();
          $statusSearch = Status::where('status_name', $request->input('status'))->first();

          $dataSearch = array();

          if($userSearch){
              $dataSearch[] = ['user_id', '=', $userSearch->id];
          }

          if($statusSearch){
              $dataSearch[] = ['status', '=', $statusSearch->id];
          }

          $textSearch = $request->input('search');

          if($request->input('orderBy') == "oldest"){
              $orderBySearch = "ASC";
          } else if($request->input('orderBy') == "latest"){
              $orderBySearch = "DESC";
          } else {
              $orderBySearch = "ASC";
          }

          if($user->role_id == 1){

              //$tasks = Task::where('created_by', $user->id)->where($dataSearch)->where('task_name', 'like', "%$textSearch%")->orderBy('id', $orderBySearch)->paginate(12);
              $tasks = Task::where('created_by', $user->id)->where($dataSearch)->where('task_name', 'ilike', "%$textSearch%")->orderBy('id', $orderBySearch)->paginate(12);

          } else {

              //$tasks = Task::where('user_id', $user->id)->where($dataSearch)->where('task_name', 'like', "%$textSearch%")->orderBy('id', $orderBySearch)->paginate(12);
              $tasks = Task::where('user_id', $user->id)->where($dataSearch)->where('task_name', 'ilike', "%$textSearch%")->orderBy('id', $orderBySearch)->paginate(12);
          }

          return view('task.taskline')->with('tasks', $tasks)->with('status', $status)->with('userConn', $userConn)
                                      ->with('userSearch', $request->input('user'))
                                      ->with('statusSearch', $request->input('status'))
                                      ->with('textSearch', $request->input('search'))
                                      ->with('orderBySearch', $request->input('orderBy'))
                                      ->with('username', $user->username);

      } else {

         return redirect()->route('home');
      }

  }

  public function task($username, $task_name){

    $status = Status::all();

    if(Auth::user()->username == $username){

      if(Auth::user()->role_id == 1){

          $task = Task::where('created_by', Auth::user()->id)->where('task_name', $task_name)->first();

          if($task){

             return view('task.task')->with('task', $task)->with('status', $status)->with('username', $username);
          }

      } else {

        $task = Task::where('user_id', Auth::user()->id)->where('task_name', $task_name)->first();

        if($task){

           return view('task.task')->with('task', $task)->with('status', $status)->with('username', $username);
        }
      }
    }

    return redirect()->route('home');

  }

  public function updateTask(Request $request, $username, $task_name){

    if(Auth::user()->username == $username){

      if(Auth::user()->role_id == 1){

          $task = Task::where('created_by', Auth::user()->id)->where('task_name', $task_name)->first();

          if(!$task){
             return redirect()->route('home');
          }

      } else {

          $task = Task::where('user_id', Auth::user()->id)->where('task_name', $task_name)->first();

          if(!$task){
             return redirect()->route('home');
          }
      }

      $this->validate($request, [
         'task_description' => 'required|min:6',
         'status' => 'required',
         'date' => 'sometimes|nullable|date',
      ]);

      if($request->has('date')){
           $date = date("Y-m-d", strtotime($request->input('date')));
      } else {
           $date = NULL;
      }

      $task->progress = $request->input('task_range');
      $task->task_description = $request->input('task_description');
      $task->status = $request->input('status');
      $task->task_end = $date;

      $task->save();

      return redirect()->route('task.task', ['username' => $username, 'task_name' => $task_name])->with('info', 'The task has been successfully updated');
    }

    return redirect()->route('home');

  }


  public function postComent(Request $request){

     $comment = new Comment;

     $comment->task_id = $request->input('taskID');
     $comment->user_id = Auth::user()->id;
     $comment->parent_id = '0';
     $comment->body = $request->input('body');

     $comment->save();

     $commentTime = $comment->created_at->diffForHumans();

    return view('comments.comment')->with('user', Auth::user())
                                   ->with('body', $request->input('body'))
                                   ->with('coloring', $request->input('coloring'))
                                   ->with('commentTime', $commentTime);

  }


}
