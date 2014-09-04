<?php

class Cuento extends \Eloquent {
    //protected $table = 'cuentos';
	protected $fillable = ['title','name','category','age','state','text'];

    public function user()
    {
        return $this->belongsTo('User');
    }
    public function images()
    {
        return $this->hasMany('Image');
    }

    public function likes()
    {
        return $this->hasMany('Like');
    }
    public function views()
    {
        return $this->hasMany('CuentoView');
    }


    public function preselects()
    {
        return $this->morphMany('Preselect', 'document');
    }


}