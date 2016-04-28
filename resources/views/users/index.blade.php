@extends('layouts.default')

@section('content')
	<h1>All Users</h1>

		@foreach ($users as $user) 
			<div class="col-md-3 user-block">	
				@include('users.partials.avatar', ['size' => 30])
				<h4 class="user-block-username">
					{{link_to_route('profile_path', $user->name, $user->email)}}
					<!--{{$user->name}}-->
				</h4>
			</div>
		@endforeach
	
	{!!$users->render()!!}
@stop