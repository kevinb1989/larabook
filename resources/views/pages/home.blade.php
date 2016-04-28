@extends('layouts.default')

@section('content')
	<div class="jumbotron">
        <h1>Larabook</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
        @if(Auth::guest())
          {{link_to_route('register_path', 'Sign Up', null, ['class'=>'btn btn-lg btn-primary'])}}
         @endif
        </p>
      </div>
@stop