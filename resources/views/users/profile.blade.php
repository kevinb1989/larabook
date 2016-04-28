@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="media">
				<div class="pull-left">
					@include('users.partials.avatar', ['size' => 50])
				</div>
				<div class="media-body">
					<div class="media-heading">
						<h3>{{$user->name}}</h3>
					</div>
					<ul class="list-inline text-muted">
						<li>{{$user->present()->statusCount()}}</li>
						<li>{{$user->present()->followerCount()}}</li>
					</ul>
					
					@foreach($user->followers as $follower)
						@include('users.partials.avatar', ['size' => 30, 'user' => $follower])
					@endforeach
				</div>
			</div>
			
			
		</div>
		<div class="col-md-6">
			@unless($user->is($current_user))
						@include('users.partials.follow-form')
					@endif
			@if($user->is($current_user))
				@include('statuses.partials.publish-status-form')
			@endif
			@if($user->statuses()->count())
				@foreach($user->statuses as $status)
					@include('statuses.partials.status')
				@endforeach
			@else
				<p>This user hasn't yet posted any status.</p>
			@endif
			
		</div>
	</div>
@stop