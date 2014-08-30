<?php

class UserDetail extends \Eloquent
{
    protected $fillable = ['name', 'lastname', 'phone', 'mobile', 'institution', 'address','rol'];

    //relaciones
    public function user()
    {
        return $this->belongsTo('User');
    }
    //fin relaciones
}

