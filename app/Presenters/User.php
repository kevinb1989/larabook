<?php

namespace App\Presenters;

class User extends Presenter{

	public function gravatar($size = 40){
		$email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s={$size}";
	}

	public function followerCount(){
		$count = $this->entity->followers()->count();
		$plural = str_plural('Follower', $count);

		return "{$count} {$plural}";
	}

	public function statusCount(){
		$count = $this->entity->statuses()->count();
		$plural = str_plural('Status', $count);

		return "{$count} {$plural}";
	}

}