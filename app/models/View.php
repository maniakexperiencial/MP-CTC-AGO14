<?php

class View extends \Eloquent {
	protected $fillable = ['ip'];

    public function cuento()
    {
        return $this->belongsTo('Cuento');
    }
}