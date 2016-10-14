{{--@include('forms.sep')--}}

@include('forms.group-start' , [
    'label' => isset($label)? $label : trans("validation.attributes.$name"),
])

	<div class="row">
		<div class="col-md-3">
			<button id="{{ "btn-$name" }}" type="button" data-input="{{ $input_id = "txt-$name" }}" data-callback="downstreamPhotoSelected('#{{ $input_id }}')" class="btn btn-default btn-sm">
				{{ trans('forms.button.browse_image') }}
			</button>
		</div>
		<div class="col-md-9">
			<input id="{{ $input_id }}" type="text" name="{{ $name }}" value="{{ $value or ''  }}" readonly class="form-control ltr clickable text-grey italic" onclick="downstreamPhotoPreview('#{{ $input_id }}')">
			<i class="fa fa-times text-grey clickable" style="position: relative;top:-25px;left:-10px" onclick="$('#{{$input_id}}').val('')"></i>
		</div>
	</div>


	<script>
		$('#{{ "btn-".$name }}').filemanager('image');
	</script>

@include('forms.group-end')
