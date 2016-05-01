<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\StatusesRepository;

class CommentsController extends Controller
{
	protected $statusRepo;

	public function __construct(StatusesRepository $statusRepo){
		$this->statusRepo = $statusRepo;
	}


    public function store(Request $request){
    	//fetch the input
    	$input = array_add($request->all(), 'user_id', \Auth::id());

    	//execute the command
    	$comment = $this->statusRepo->leaveComment($input['user_id'], $input['status_id'], $input['body']);

        //go back
        return redirect()->back();
    }
}
