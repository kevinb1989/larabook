@extends('layouts.default')

@section('title', 'Registration')

@section('content')
	<h1>Registration</h1>
	<div class="row">
		<div class="col-md-6">
			{!!Form::open(['route' => 'register_path'])!!}
				<div class="form-group">
					{!!Form::label('name', 'Name:')!!}
					{!!Form::text('name', null, ['class' => 'form-control'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('email', 'Email:')!!}
					{!!Form::text('email', null, ['class' => 'form-control'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('password', 'Password:')!!}
					{!!Form::password('password', ['class' => 'form-control'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('password_confirmation', 'Password Confirmation:')!!}
					{!!Form::password('password_confirmation', ['class' => 'form-control'])!!}
				</div>

				<div class="form-group">
					{!!Form::submit('Sign Up', ['class' => 'btn btn-lg btn-primary'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>


	@include('layouts.partials.errors')
@stop