@extends('layouts.admin')
@section('content')
@php echo"<pre>"; print_r($currency->symbol); die;@endphp
<div class="row">
	<div class="card col-md-9">
		<div class="card-header">
			{{ trans('global.create') }} {{ trans('global.product.title_singular') }}
		</div>

		<div class="card-body">
			<form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">{{ trans('global.product.fields.name') }}*</label>
					<input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}">
					@if($errors->has('name'))
						<em class="invalid-feedback">
							{{ $errors->first('name') }}
						</em>
					@endif
					<p class="helper-block">
						{{ trans('global.product.fields.name_helper') }}
					</p>
				</div>
				<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					<label for="description">{{ trans('global.product.fields.description') }}</label>
					<textarea id="description" name="description" class="form-control summernote">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
					@if($errors->has('description'))
						<em class="invalid-feedback">
							{{ $errors->first('description') }}
						</em>
					@endif
					<p class="helper-block">
						{{ trans('global.product.fields.description_helper') }}
					</p>
				</div>
				<div class="col-xs-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                      <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<p></p>
						<textarea id="description0" name="description" class="form-control summernote"></textarea>
					</div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<p></p>
						<textarea id="description1" name="description" class="form-control summernote"></textarea>
					</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						<p></p>
						<textarea id="description2" name="description" class="form-control summernote"></textarea>
					</div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
						<p></p>
						<textarea id="description3" name="description" class="form-control summernote"></textarea>
					</div>
                  </div>
                
                </div>
				<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
					<label for="price">{{ trans('global.product.fields.price') }}</label>
					<input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" step="0.01">
					@if($errors->has('price'))
						<em class="invalid-feedback">
							{{ $errors->first('price') }}
						</em>
					@endif
					<p class="helper-block">
						{{ trans('global.product.fields.price_helper') }}
					</p>
				</div>
				<div>
					<input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
				</div>
			</form>
		</div>
	</div>
	<div class="card col-md-3">
	</div>
</div>
@endsection