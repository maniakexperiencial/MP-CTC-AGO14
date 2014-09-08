<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'type','code','active'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    //relaciones
    public function details()
    {
        return $this->hasOne('UserDetail');
    }

    public function cuentos()
    {
        return $this->hasMany('Cuento');
    }


    public function historias()
    {
        return $this->hasMany('Historia');
    }

    public function preselects()
    {
        return $this->hasMany('Preselect');
    }


    public function videos()
    {
        return $this->hasMany('Video');
    }
    //fin relaciones

}







