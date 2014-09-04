<?php

class Historia extends \Eloquent {

	protected $fillable = ['title','name','category','state','text'];

    public function user()
    {
        return $this->belongsTo('User');
    }


    public function preselects()
    {
        return $this->morphMany('Preselect', 'document');
    }


}