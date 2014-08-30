<?php

class Image extends \Eloquent {
	protected $fillable = ['path'];


    public function cuento()
    {
        return $this->belongsTo('Cuento');
    }


}