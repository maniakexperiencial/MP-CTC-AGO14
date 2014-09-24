<?php

class HistoriaLike extends \Eloquent {
	protected $fillable = ['ip'];

    protected $table = "historias_likes";

    public function historia()
    {
        return $this->belongsTo('Historia');
    }
}