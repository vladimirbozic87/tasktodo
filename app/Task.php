<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $table = 'tasks';

  protected $fillable = [
      'created_by',
      'user_id',
      'company_id',
      'project_id',
      'task_name',
      'task_description',
      'progress',
      'status',
      'task_file_url',
      'task_end',
  ];
}
