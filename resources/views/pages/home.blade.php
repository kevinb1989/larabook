@extends('layouts.default')

@section('content')
	<div class="jumbotron">
        <h1>Larabook</h1>
        <p>Larabook is a social networking site for Laravel developers which is very similar to facebook.</p>
        <p>New features will be constantly updated for this site.</p>
        <p>
        @if(Auth::guest())
          {{link_to_route('register_path', 'Sign Up', null, ['class'=>'btn btn-lg btn-primary'])}}
         @endif
        </p>
      </div>
@stop