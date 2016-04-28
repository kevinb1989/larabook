<?php
namespace App;

trait FollowableTrait{
	
	public function follows(){
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();
    }

    public function isFollowedBy(User $otherUser){
        $idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id')->toArray();

        return in_array($this->id, $idsWhoOtherUserFollows);

    }
}