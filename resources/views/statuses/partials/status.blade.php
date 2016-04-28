<article class="media status-media">
	<div class="pull-left">
		<img class="media-object" src="{{$status->user->gravatarLink()}}" alt="{{$status->user->name}}">
			</div>
				<div class="media-body">
					<h4 class="media-heading">{{$status->user->name}}</h4>
					<p>{{$status->present()->created_at()}}</p>
						{{$status->body}}
	</div>
</article>