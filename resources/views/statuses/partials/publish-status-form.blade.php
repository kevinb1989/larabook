@include('layouts.partials.errors')
			<div class="status-post">
				{!!Form::open(['url'=>'statuses'])!!}
					{{csrf_field()}}
					<div class="form-group">
						{!!Form::textarea('status', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "What's on you mind?"])!!}
					</div>
					<div class="form-group status-post-submit">
						{!!Form::submit('Post Status', ['class' => 'btn btn-default btn-xs'])!!}
					</div>
				{!!Form::close()!!}
			</div>