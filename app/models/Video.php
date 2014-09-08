<?php

class Video extends \Eloquent {
	protected $fillable = ['title','name','category','age','state','code'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}