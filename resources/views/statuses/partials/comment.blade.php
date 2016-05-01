<article class="comments__comment media status-media">
	<div class="pull-left">
		@include('users.partials.avatar', ['user'=>$comment->owner, 'class' => 'status-media-object', 'size' => 30])
	</div>

	<div class="media-body">
		<h4 class="media-heading">{{$comment->owner->name}}</h4>
		{{$comment->body}}
	</div>
</article>