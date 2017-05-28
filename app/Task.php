<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $table = 'tasks';

  protected $fillable = [
      'user_id',
      'company_id',
      'project_id',
      'task_name',
      'task_description',
      'task_end',
  ];
}
