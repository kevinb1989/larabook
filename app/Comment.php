<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Represent all the fields that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['status_id', 'user_id', 'body'];

    
    /**
     * Represent the one-to-one relationship between App\Comment and App\User 
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Create an App\Comment object
     * 
     * @param  string $body the content of the comment
     * @param  integer $statusId the id of a status
     * @return App\Comment
     */
    public static function leave($body, $statusId){
    	return new static([
    		'body' => $body,
    		'status_id' => $statusId
    	]);
    }
}
