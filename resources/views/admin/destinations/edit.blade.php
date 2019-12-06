@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.destination.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.destinations.update", [$destination->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.destination.fields.name') }}*</label>
                <input type="text" id="name" name="title" class="form-control" value="{{ old('title', isset($destination) ? $destination->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.destination.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.destination.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control summernote">{{ old('description', isset($destination) ? $destination->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.destination.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="image">{{ trans('global.destination.fields.image') }}</label>
                <div class="img-preview" style="width:300px; height:300px;">
                    <img id="ImdID" class="img-thumbnail" src="{{ url('/storage/images/'.$destination->thumbnails) }}" alt="Image" />
                </div>
                <input type="file" id="image" name="image" class="form-control" onchange="readURL(this);">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </em>
                @endif
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch">
                <input type="hidden" class="custom-control-input" id="" name="is_active" value="0">    
                <input type="checkbox" class="custom-control-input" id="switch1" name="is_active" value="1">
                <label class="custom-control-label" for="switch1">Toggle me</label>
                </div>
            </div>   
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#ImdID').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

</script>
@endsection