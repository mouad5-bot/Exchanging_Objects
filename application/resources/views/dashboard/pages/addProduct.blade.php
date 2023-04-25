  {{-- ========================================== modal - create =========================================--}}
    
  <div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('products.store') }}" method="POST" id="form" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title">Add Product</h5>
					<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">name <span class="text-danger">*</span></label>
						<input  type="text" class="@error('name') error-border @enderror form-control" name="name" id="name"/>                            
						@error('name')
							<div class="error">
								{{ $message }}
							</div>
						@enderror
					</div> 
					<div class="mb-3">
						<label class="form-label">Description <span class="text-danger">*</span></label>
						<textarea class="@error('description') error-border @enderror form-control" name="description" id="description"></textarea>
						@error('description')
							<div class="error">
								{{ $message }}
							</div>
						@enderror
					</div>      
					<div class="mb-3">
						<label class="form-label">image <span class="text-danger">*</span></label> 
						<input type="file" class="@error('image') error-border @enderror form-control" id="inputGroupFile04" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
						@error('image')
							<div class="error">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="mb-3">
						<label class="form-label">Status <span class="text-danger">*</span></label>
						<select class="@error('status') error-border @enderror form-control" name="status_id" id="status">
						  <option value="1">select the status of this product</option>
						  @foreach($statuses as $status)
							  <option value={{$status->id}}>{{ $status->name }}</option>
						  @endforeach
						</select>
						@error('status')
							<div class="error">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="mb-3">
						<label class="form-label">Category <span class="text-danger">*</span></label>
						<select class="@error('category') error-border @enderror form-control" name="category_id" id="category">
							<option value="">choose the category</option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach 
						</select>
						@error('category')
							<div class="error">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="mb-3">
						<label class="form-label">Your Location <span class="text-danger">*</span></label>
						<select class="@error('location') error-border @enderror form-control" name="location_id" id="location">
						  <option value=""> What is your location ?</option>                            
						  @foreach($locations as $location)
							<option value="{{$location->id}}">{{ $location->name }}</option>
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
					<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
					<button type="submit" name="save"   class="btn btn-primary" id="save-btn">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
