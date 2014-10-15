<?php

class CuentoRead extends \Eloquent {
	protected $fillable = ['cuento_id'];

    protected $table = "cuentos_read";

    public function user()
    {
        return $this->belongsTo('User');
    }
}