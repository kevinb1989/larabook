<?php
namespace App\Repositories;

use App\Comment;
use App\Status;
use App\User;
use Auth;

class StatusesRepository{

	/**
	 * Save a new status to database
	 * 
	 * @param  App\Status $status the status to be saved in database
	 * @param  integer $user_id the id of the user who posted this status
	 * @return App\Status
	 */
	public function save($status, $user_id){
	return User::findOrFail($user_id)->statuses()->save($status);
	}

	/**
	 * get a collection of all statuses from the current logined user
	 * 
	 * @return  Illuminate\Database\Eloquent\Collection
	 */
	public function getAll(){
		return Auth::user()->statuses()->get();
	}

	/**
	 * get a collection of all statuses from the input user
	 *
	 * @param App\User $user
	 * @return  Illuminate\Database\Eloquent\Collection
	 */
	public function getStatusesForUser(User $user){
		return $user->statuses()->latest()->get();
	}

	/**
	 * Get all the statuses from the user and the friends that they follow
	 * 
	 * @param  App\User $user
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function getFeedForUser(User $user){
		$userIds = $user->follows()->lists('followed_id')->toArray();
		$userIds[] = $user->id;

		return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
	}

	/**
	 * Save a comment to the database
	 * 
	 * @param  integer $userId the user who created the comment
	 * @param  integer $statusId
	 * @param  string $body the content of the comment
	 * @return App\Comment
	 */
	public function leaveComment($userId, $statusId, $body){
		$comment = Comment::leave($body, $statusId);

		User::findOrFail($userId)->comments()->save($comment);

		return $comment;
	}

}