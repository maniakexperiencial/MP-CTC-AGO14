<?php

class CuentoView extends \Eloquent {
	protected $fillable = ['ip'];

    protected $table = "views";

    public function cuento()
    {
        return $this->belongsTo('Cuento');
    }
}