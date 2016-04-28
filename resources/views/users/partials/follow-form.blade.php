@if($signedIn)
	@if($user->isFollowedBy($current_user))
		{!!Form::open(['method'=>'DELETE', 'route' => ['unfollows_path', $user->id]])!!}	
			{!!Form::hidden('userIdToFollow', $user->id)!!}
			<button type="submit" class="btn btn-danger">Unfollow {{$user->name}}</button>
		{!!Form::close()!!}
	@else
		{!!Form::open(['route' => 'follows_path'])!!}	
			{!!Form::hidden('userIdToFollow', $user->id)!!}
			<button type="submit" class="btn btn-primary">Follow {{$user->name}}</button>
		{!!Form::close()!!}
	@endif
@endif