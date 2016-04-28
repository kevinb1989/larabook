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
    
    protected $fillable = ['body'];

    protected $presenter = 'App\Presenters\Status';

    public static function publish($body){

    	$status = new static();
    	$status->body = $body;
    	return $status;
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
