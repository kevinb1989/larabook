<?php

namespace App\Repositories;
use App\User;

class UserRepository{

	public function save(User $user){

		return $user->save();

	}

	public function getPaginated($howMany = 20){
		return User::orderBy('name', 'asc')->simplePaginate($howMany);
	}

	public function findByEmail($email){
		return User::with('statuses')->whereEmail($email)->first();

	}

	public function findById($id){
		return User::findOrFail($id);
	}

	public function follow($userIdToFollow, User $user){
		return $user->follows()->attach($userIdToFollow);
	}

	public function unfollow($userIdToUnfollow, User $user){
		return $user->follows()->detach($userIdToUnfollow);
	}

}