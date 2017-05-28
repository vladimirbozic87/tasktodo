<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'company';

  protected $fillable = [
      'user_id',
      'company_name',
      'company_info',
  ];
}
