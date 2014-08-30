<?php

class Preselect extends \Eloquent {
	protected $fillable = ['document_id','type','eval1','eval2','eval3','average','status'];

    public function user()
    {
        return $this->belongsTo('User');
    }

}