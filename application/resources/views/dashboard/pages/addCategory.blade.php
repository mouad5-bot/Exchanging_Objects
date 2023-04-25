  {{-- ========================================== modal - create category =========================================--}}
    
  <div class="modal fade" id="addCategory">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('category.store') }}" method="POST" id="form" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title">Add category</h5>
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
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
					<button type="submit" name="save"   class="btn btn-primary" id="save-btn">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
