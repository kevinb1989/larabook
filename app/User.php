<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserRegistered;
use App\Presenters\PresentableInterface;
use App\Presenters\PresentableTrait;

class User extends Authenticatable implements PresentableInterface{
    use PresentableTrait, FollowableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    protected $presenter = 'App\Presenters\User';

    public function setPasswordAttribute($password){
        $this->attributes['password'] = \Hash::make($password);

    }

    public function statuses(){
        return $this->hasMany('App\Status')->latest();
    }

    public static function register($name, $email, $password){
        $user = new static(compact('name', 'email', 'password'));

        //event(new UserRegistered($user));

        \Flash::success('Glad to have you as a new Larabook member!');

        return $user;
    }

    public function gravatarLink(){
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s=40";
    }

    public function is($user){
        if(is_null($user)) return false;
        return $this->email == $user->email;
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    
}
