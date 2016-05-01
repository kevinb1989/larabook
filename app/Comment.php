<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['status_id', 'user_id', 'body'];

    public function owner(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public static function leave($body, $statusId){
    	return new static([
    		'body' => $body,
    		'status_id' => $statusId
    	]);
    }
}
