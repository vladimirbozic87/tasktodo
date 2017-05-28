<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConnection extends Model
{
  protected $table = 'user_connection';

  protected $fillable = [
      'created_by',
      'user_id',
      'company_id',
      'project_id',
  ];

}
