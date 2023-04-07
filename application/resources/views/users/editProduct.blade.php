@extends('layouts.app')

@section('title')
  Edit Product
@endsection

@section('content')
{{-- ========================================== modal - Update =========================================-- --}}    
@php
// echo"<pre>";
//   echo($product);
// echo"</pre>";
//   die;    
@endphp




<div class="card w-75 m-auto">
	<div class="card-header">
		<div class="modal-header">
			<h5 class="modal-title">Edit Product</h5>
		</div>
	</div>
	<div class="card-body m-0 p-0">
	  <div class=" mb-0">
		<div class="p-4">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ route('products.update', $product )}}" method="POST" id="form" enctype="multipart/form-data">
					  @csrf
					  <div class="modal-body">
						  <div class="mb-3">
							  <label class="form-label">name</label>
							  <input  type="text" class="@error('name') error-border @enderror form-control" name="name" id="name" value="{{ $product->name}}" />                            
							  @error('name')
								  <div class="error">
									  {{ $message }}
								  </div>
							  @enderror
						  </div> 
						  <div class="mb-3">
							  <label class="form-label">Description</label>
							  <textarea class="@error('description') error-border @enderror form-control" name="description" id="description">{{$product->description}}</textarea>
							  @error('description')
								  <div class="error">
									  {{ $message }}
								  </div>
							  @enderror
						  </div>      
						  <div class="mb-3">
							  <label class="form-label">image</label> 
							  <input type="file" class="@error('image') error-border @enderror form-control" id="inputGroupFile04" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							  @error('image')
								  <div class="error">
									  {{ $message }}
								  </div>
							  @enderror
						  </div>
						  <div class="mb-3">
							  <label class="form-label">Status</label>
							  <select class="@error('status') error-border @enderror form-control" name="status_id" id="status" value="{{ $product->status->name }}">
								  <option value="1">In progress</option>
								  <option value="2">Accepted</option>
								  <option value="3">Refused</option>
							  </select>
							  @error('status')
								  <div class="error">
									  {{ $message }}
								  </div>
							  @enderror
						  </div>
						  <div class="mb-3">
							  <label class="form-label">Category</label>
							  <select class="@error('category') error-border @enderror form-control" name="category_id" id="category">
								@foreach($categories as $category)
								  <option value={{$category->id}}>{{$category->name}}</option>
								@endforeach
							  </select>
							  @error('category')
								  <div class="error">
									  {{ $message }}
								  </div>
							  @enderror
						  </div>
						  <div class="mb-3">
							  <label class="form-label">Your Location</label>
							  <select class="@error('location') error-border @enderror form-control" name="location_id" id="location">
									<option value={{$product->locations->id}}>{{ $product->locations->name }}</option>
									@foreach($locations as $location)
										<option value={{$location->id}}>{{ $location->name }}</option>
									@endforeach
							  </select>
							  @error('location')
								  <div class="error">
									  {{ $message }}
								  </div>
							  @enderror
						 </div>
					  
					    </div>
					  <div class="modal-footer">
						<a href="{{route('users/profile', $product->id)}}" type="button" class="btn btn-light me-2">Cancel</a>
						<button type="submit" name="update"   class="btn btn-warning" id="update-btn">Update</button>
					  </div>
					</form>
				</div>
			</div>
		</div>
	  </div>
	</div>
  </div>

@endsection
 