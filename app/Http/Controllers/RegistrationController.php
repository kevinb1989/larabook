<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\User;
use App\Repositories\UserRepository;
use Auth;

class RegistrationController extends Controller
{
	protected $repo;

	public function __construct(UserRepository $repo){

		$this->repo = $repo;
        parent::__construct();

	}


    public function create(){
    	return view('registration.create');
    }

    public function store(RegistrationRequest $request){
    	extract($request->only(['name', 'email', 'password']));

    	$user = User::register($name, $email, $password);
    	$this->repo->save($user);

    	Auth::login($user);

    	return redirect('/');
    }
}
