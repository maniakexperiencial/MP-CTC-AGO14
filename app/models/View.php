<?php

class View extends \Eloquent {
	protected $fillable = [];

    public function cuento()
    {
        return $this->belongsTo('Cuento');
    }
}