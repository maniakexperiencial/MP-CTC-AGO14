<?php

class Like extends \Eloquent {
	protected $fillable = [];

    public function cuento()
    {
        return $this->belongsTo('Cuento');
    }
}