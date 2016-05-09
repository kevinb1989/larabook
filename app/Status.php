<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\PublishStatusEvent;
use App\Presenters\PresentableInterface;
use App\Presenters\PresentableTrait;
use Event;

class Status extends Model implements PresentableInterface
{
    use PresentableTrait;
    
    /**
     * All The fields that are mass assignable
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * Register the presenter to display customized information of statuses
     * @var string
     */
    protected $presenter = 'App\Presenters\Status';

    /**
     * Create a new status object
     * 
     * @param  string $body the content of a status
     * @return App\Status
     */
    public static function publish($body){

    	$status = new static();
    	$status->body = $body;
    	return $status;
    }

    /**
     * Represent the one-to-many relationship between App\User and App\Status
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
    	return $this->belongsTo('App\User');
    }

    /**
     * Represent the one-to-many relationship between App\Status and App\Comment
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
