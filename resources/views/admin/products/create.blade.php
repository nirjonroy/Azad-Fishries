@extends('admin.layout.app')
@section('admin_content')
<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			<h3 class="well"> Product Create</h3>
			<form class="form-horizontal" action="{{ route('admin.products.store')}}" method="post" enctype="multipart/form-data">
				@csrf
		  	<div class="row">
			  	<div class="col-xs-6">
				    <label class="control-label col-sm-2" >Name:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name')}}">
				      	@if($errors->has('name'))
						    <div class="error">{{ $errors->first('name') }}</div>
						@endif
				    </div>
			  	</div>
			  	<div class="col-xs-6">
			    	<label class="control-label col-sm-2" >Category:</label>
				    <div class="col-sm-10">
				      	<select class="form-control" name="category_id">
				      		<option value="" hidden>select a category</option>
				      		@foreach($categories as $category)
				      		<option value="{{ $category->id}}">{{ $category->name}}</option>
				      		@endforeach
				      	</select>

				      	@if($errors->has('category_id'))
						    <div class="error">{{ $errors->first('category_id') }}</div>
						@endif
				    </div>
			  	</div>
			  	
			</div><br>

			<div class="row">
			  	<div class="col-xs-6">
				    <label class="control-label col-sm-2" >Brand:</label>
				    <div class="col-sm-10">
				      	<select class="form-control" name="brand_id">
				      		<option value="" hidden>select a brand</option>
				      		@foreach($brands as $brand)
				      		<option value="{{ $brand->id}}">{{ $brand->name}}</option>
				      		@endforeach
				      	</select>
				      	@if($errors->has('brand_id'))
						    <div class="error">{{ $errors->first('brand_id') }}</div>
						@endif
				    </div>
			  	</div>
			  	<div class="col-xs-6">
			    	<label class="control-label col-sm-2" >Image:</label>
				    <div class="col-sm-10">
				      <input type="file" class="form-control" placeholder="Enter Name" name="image">
				      	@if($errors->has('image'))
						    <div class="error">{{ $errors->first('image') }}</div>
						@endif
				    </div>
			  	</div>
			  	
			</div><br>


			<div class="row">
			  	<div class="col-xs-6">
				    <label class="control-label col-sm-2" >Description:</label>
				    <div class="col-sm-10">
				      	<textarea class="form-control" name="description" placeholder="Enter Description" id="editor1" rows="10" cols="80">{{ old('description')}}</textarea>
				      	@if($errors->has('description'))
						    <div class="error">{{ $errors->first('description') }}</div>
						@endif
				    </div>
			  	</div>
			  	
			  	<div class="col-xs-6">
			    	<label class="control-label col-sm-2" > Quantity:</label>
				    <div class="col-sm-10">
				      	<input type="number" class="form-control" name="quantity" value="0" value="{{ old('quantity')}}">
				      	@if($errors->has('quantity'))
						    <div class="error">{{ $errors->first('quantity') }}</div>
						@endif
				    </div>
			  	</div>
			  	
			</div><br>


			<div class="row">
			  	
			  	<div class="col-xs-6">
			    	<label class="control-label col-sm-2" >Old Price:</label>
				    <div class="col-sm-10">
				      	<input type="number" class="form-control" value="0" name="old_price" value="{{ old('old_price')}}">
				      	@if($errors->has('old_price'))
						    <div class="error">{{ $errors->first('old_price') }}</div>
						@endif
				    </div>
			  	</div>

			  	<div class="col-xs-6">
			    	<label class="control-label col-sm-2" >New Price:</label>
				    <div class="col-sm-10">
				      	<input type="number" class="form-control" value="0" name="sell_price" value="{{ old('sell_price')}}">
				      	@if($errors->has('sell_price'))
						    <div class="error">{{ $errors->first('sell_price') }}</div>
						@endif
				    </div>
			  	</div>
			</div><br>
		  	<div class="row">
		  		<div class="col-xs-6">
				    <label class="control-label col-sm-2" >Tag:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" placeholder="Enter Tag" name="tag" value="{{ old('tag')}}">
				      	@if($errors->has('tag'))
						    <div class="error">{{ $errors->first('tag') }}</div>
						@endif
				    </div>
			  	</div>

		  		<div class="col-xs-6">
			    	<label class="control-label col-sm-2" >Multiple Image:</label>
				    <div class="col-sm-10">
				      	<input type="file" class="form-control" name="multi_images[]" multiple>
				    </div>
			  	</div>

		  	</div>

		  	<div class="row">
		  		<div class="col-xs-6">
				    <label class="control-label col-sm-2" >Vedio Url:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" placeholder="Enter Vedio Url" name="vedio_url" value="{{ old('vedio_url')}}">
				      	@if($errors->has('vedio_url'))
						    <div class="error">{{ $errors->first('vedio_url') }}</div>
						@endif
				    </div>
			  	</div>


		  		<div class="col-xs-6 text-center">
			    	 <button type="submit" class="btn btn-primary">Submit</button>
			  	</div>
		  	</div>
		</form>	
	</div>        
</div>
@endsection

@push('js')
<script src="https://pagecdn.io/lib/ckeditor/4.13.0/ckeditor.js" integrity="sha256-yoULaG5POtLMfQWKvJ1pCbUSX4eM29SBpDbjkZAK6qs=" crossorigin="anonymous"></script>

 <script>
    (function ($) {
	  $(document).ready(function () {
	    CKEDITOR.replace($('#editor1').get(0), {
	    });
	  });
	})(jQuery);
  </script>
@endpush