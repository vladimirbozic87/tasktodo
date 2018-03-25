<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'location',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName(){

        if($this->first_name && $this->last_name){
           return "{$this->first_name} {$this->last_name}";
        }

        if($this->first_name){
            return $this->first_name;
        }

        return null;
    }

    public function getNameOrUsername(){

        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername(){

        return $this->first_name ?: $this->username;
    }

    public function getCompany(){

      return $this->hasOne('App\Company');
    }

    public function getProject(){

      return $this->hasMany('App\Project');
    }

    public function getProjectSession(){

       return $this->hasMany('App\Project')->where('project_session', '1');
    }

    public function ifHaveUsers(){

       return $this->hasMany('App\UserConnection', 'created_by');
    }

    public function ifHaveTask(){

      return $this->hasMany('App\Task', 'created_by');
    }

    public function getRole(){

      return $this->hasOne('App\Role', 'id', 'role_id')->first()->role_name;
    }

}
