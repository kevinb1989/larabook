<a href="{{route('profile_path', $user->email)}}">
	<img class="media-object img-circle avatar" src="{{$user->present()->gravatar($size)}}" alt="{{$user->name}}"/>
</a>
	