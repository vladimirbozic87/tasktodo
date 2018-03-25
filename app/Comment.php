<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comment';

  protected $fillable = [
      'task_id',
      'user_id',
      'parent_id',
      'body',
  ];

  public function user(){

    return $this->hasOne('App\User', 'id', 'user_id');
  }
}
