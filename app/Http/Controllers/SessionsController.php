<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use Flash;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $formData = $request->only(['email', 'password']);

        if(Auth::attempt($formData)){
            Flash::message('Welcome back!');
            return redirect('statuses');
        }

        Flash::message('We were unable to sign you in. Please check your credentials and try again.');

        return redirect('/login');
    }

    public function destroy(){
        Auth::logout();

        Flash::message('You have logged out!');

        return redirect('/');
    }
}
