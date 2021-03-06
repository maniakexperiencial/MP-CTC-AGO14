<?php

class Historia extends \Eloquent {

	protected $fillable = ['title','name','category','state','text','place'];

    public function user()
    {
        return $this->belongsTo('User');
    }




    public function preselects()
    {
        return $this->morphMany('Preselect', 'document');
    }


    public function likes()
    {
        return $this->hasMany('HistoriaLike');
    }
    public function views()
    {
        return $this->hasMany('HistoriaView');
    }



}