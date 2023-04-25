@extends('layouts.app')

@section('title')
  Edit Category
@endsection

@section('content')
{{-- ========================================== modal - Update =========================================-- --}}    

{{-- {{dd($product);}}  --}}

@if(session('error'))
	@section('script')
	<script>
		const notyf = new Notyf({
				duration: 5000,
				position: {
				x: 'right',
				y: 'top',
				}
			}) 
		notyf.error('{{ session('error')}}');
	</script>
	<div id="error-session"></div>
	@endsection
@endif

<div class="card w-50 m-auto">
	<div class="card-header">
		<div class="modal-header">
			<h5 class="modal-title">Edit Category</h5>
		</div>
	</div>
	<div class="card-body m-0 p-0">
	  <div class=" mb-0">
		<div class="p-4">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ route('products.update', $product )}}" method="POST" id="form" enctype="multipart/form-data">
					  @csrf
					  @method('PUT')
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
					    </div>
						<div class="modal-footer">
							<a href="{{route('users/profile', $product->id)}}" type="button" class="btn btn-light me-2">Cancel</a>
							<button type="submit" name="update" onclick="updateProduct()"  class="btn btn-warning" id="update-btn">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	  </div>
	</div>
  </div>

@endsection
 