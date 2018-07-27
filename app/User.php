<?php

namespace App;

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
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /* functions */
    public function role(){
        return $this->belongsTo('App\Role');
    }
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    
    public function isAdmin(){
        if ($this->role->id == 1){
            return TRUE;
        }
        return FALSE;
    }
    public function posts(){
        
        return $this->hasMany('App\Post');
        
    }
     public function post($id){
        
        return $this->hasMany('App\Post')->whereId($id);
        
    }
}
