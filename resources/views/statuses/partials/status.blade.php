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

@if($signedIn)
	{!!Form::open(['route' => 'comment_path', 'class' => 'comments__create-form'])!!}
		{!!Form::hidden('status_id', $status->id)!!}
		<div class="form-group">
			{!!Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1])!!}
		</div>
	{!!Form::close()!!}
@endif

@unless($status->comments->isEmpty())
	<div class="comments">
		@foreach ($status->comments as $comment)
			@include('statuses.partials.comment')
		@endforeach
	</div>
@endunless