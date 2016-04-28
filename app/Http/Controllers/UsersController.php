<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

use App\Http\Requests;

class UsersController extends Controller
{
	protected $usersRepo;

    public function __construct(UserRepository $usersRepo){
    	$this->usersRepo = $usersRepo;
    	parent::__construct();
    }

    public function index(){
    	$users = $this->usersRepo->getPaginated();

    	return view('users.index', compact('users'));
    }

    public function show($email){
    	$user = $this->usersRepo->findByEmail($email);
    	return view('users.profile', compact('user'));
    }
}
