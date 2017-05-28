<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = 'project';

  protected $fillable = [
      'user_id',
      'company_id',
      'project_name',
      'project_info',
      'project_session',
  ];
}
