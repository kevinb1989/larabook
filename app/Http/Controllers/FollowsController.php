<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\UserRepository;
use Auth;
use Flash;

class FollowsController extends Controller
{
	protected $userRepo;

	public function __construct(UserRepository $userRepo){
		$this->userRepo = $userRepo;
	}

    public function store(Request $request){
    	//id of the user to follow
    	//id of the authenticated user
    	$user = $this->userRepo->findById(Auth::id());
    	$this->userRepo->follow($request->input('userIdToFollow'), $user);

    	Flash::success('You are now following this user.');

    	return redirect()->back();
    }

    public function destroy($idOfUserToUnfollow){
        $this->userRepo->unfollow($idOfUserToUnfollow, Auth::user());

        Flash::success('You have now unfollowed this user.');
        return redirect()->back();

    }
}
