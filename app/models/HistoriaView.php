<?php

class HistoriaView extends \Eloquent {
	protected $fillable = ['ip'];

    protected $table = "historias_views";

    public function historia()
    {
        return $this->belongsTo('Historia');
    }
}