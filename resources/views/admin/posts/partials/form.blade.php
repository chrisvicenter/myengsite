{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('name', 'Name of post') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Friendly URL') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
    {{ Form::label('filex', 'File') }}
    {{ Form::file('filex') }}
</div>
<div class="form-group">
	{{ Form::label('groups', 'Groups') }}
	<div>
	@foreach($groups as $group)
		<label>
			{{ Form::checkbox('groups[]', $group->id) }} {{ $group->name }}
		</label>
	@endforeach
	</div>
</div>
<div class="form-group">
	{{ Form::label('unit_id', 'Units') }}
	{{ Form::select('unit_id', $units, null, ['class' => 'form-control']) }}
</div> 
<div class="form-group">
    {{ Form::label('excerpt', 'Abstract') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Description') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'State: ') }}
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Published
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Draft
	</label>
</div>
<div class="form-group">
    {{ Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });

	    CKEDITOR.config.height = 400;
		CKEDITOR.config.width  = 'auto';

		CKEDITOR.replace('body');
	});
</script>
@endsection