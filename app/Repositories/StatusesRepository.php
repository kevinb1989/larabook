<?php
namespace App\Repositories;

use App\Status;
use App\User;
use Auth;

class StatusesRepository{

	public function save($status, $user_id){
	return User::findOrFail($user_id)->statuses()->save($status);
	}

	public function getAll(){
		return Auth::user()->statuses()->get();
	}

	public function getStatusesForUser(User $user){
		return $user->statuses()->latest()->get();
	}

	public function getFeedForUser(User $user){
		$userIds = $user->follows()->lists('followed_id')->toArray();
		$userIds[] = $user->id;

		return Status::whereIn('user_id', $userIds)->latest()->get();
	}

}