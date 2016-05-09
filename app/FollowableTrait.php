<?php
namespace App;

trait FollowableTrait{
	
    /**
     * represent the people that the user follows
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function follows(){
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    /**
     * represent the people that follow this user
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers(){
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();
    }

    /**
     * Check if this user is followed by an input user
     * 
     * @param  App\User $user a specific user
     * @return boolean
     */
    public function isFollowedBy(User $otherUser){
        $idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id')->toArray();

        return in_array($this->id, $idsWhoOtherUserFollows);

    }
}