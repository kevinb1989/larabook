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

    /**
     * set up the presenter to display information regarding this user, such as an avatar
     * @var string
     */
    protected $presenter = 'App\Presenters\User';

    /**
     * generate an encrypted string for the password and save it to database
     * @param string $password
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = \Hash::make($password);

    }

    /**
     * Retrieve the latest statuses associated with this user
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function statuses(){
        return $this->hasMany('App\Status')->latest();
    }

    /**
     * create a new App\User object
     * @param  string $name
     * @param  string $email
     * @param  string $password
     * @return App\User
     */
    public static function register($name, $email, $password){
        $user = new static(compact('name', 'email', 'password'));

        \Flash::success('Glad to have you as a new Larabook member!');

        return $user;
    }

    /**
     * Show the gravatar from http://gravatar.com
     * 
     * @return string
     */
    public function gravatarLink(){
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s=40";
    }

    /**
     * Check if a user is this user
     * 
     * @param  App\User $user
     * @return boolean
     */
    public function is($user){
        if(is_null($user)) return false;
        return $this->email == $user->email;
    }

    /**
     * Represent the one-to-many relationship between App\User and App\Comment
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    
}
