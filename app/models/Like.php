<?php

class Like extends \Eloquent {
	protected $fillable = ['ip'];

    public function cuento()
    {
        return $this->belongsTo('Cuento');
    }
}