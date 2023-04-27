@extends('layouts.app')

@section('title')
	Confirm the exchange
@endsection

@section('content')

	<div class="container bg-color-red">		          
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card">
					<div class="row">
						<div class="mt-3 mb-3 col-sm-4 product_image_border">
							<img class="card-img-top product-image" src="{{ asset("$product->image") }}" alt="product">
						</div>
						<div class="card-body col-sm-4 mt-4">
							<h5 class="card-title"> <i> Name of product :</i><b>  {{ Illuminate\Support\Str::upper($product->name)	 }} </b></h5>
							<h5 class="card-text " title="{{$product->description}}"> Description :  {{ \Illuminate\Support\Str::limit($product->description, $limit = 60, $end = '...') }}</h5>
							<br>
							<h5>
								<span><i class="bi bi-geo-alt"></i> Location</span> : {{ $product->locations->name }}
								<br> <br>
								<span><i class="bi bi-tags"></i>    Category</span> : {{ $product->categories->name }}
								<br> <br>
								<span><i class="bi bi-circle-fill"></i> Status</span>   : {{ $product->status->name }}
							</h5>
							{{-- <div class="d-flex justify-content-center ">
							<a href="{{ route('exchange', [$product->id]) }}" class="btn btn-light object scale text-black border border-dark me-3"> <span><i class="bi bi-arrow-down-up me-1"></i></span> Exchange now</a>
							<a href="{{ route('chatify', [$product->user_id]) }}" class="btn btn-dark object scale text-white"> <span> <i class="bi bi-messenger"></i> </span> Send message </a>
							</div> --}}
						</div>
					</div>
					<div class="card-footer	">
						<form method="POST" action="{{ route('confermExchanging', [$product->id]) }}">
							@csrf
							{{-- <input type="hidden" name="" value="{{ $products->id }}"> --}}
							<div class="row justify-content-center">
								<div class="col-8">
									<h3 class="text-primary">Select one of your product to exchange:</h3>
								</div>
								<div class="col-8">
									<select name="exchange_product_id" class="form-select" id="exchange_product_id">
										@foreach($products as $product)
											<option value="{{ $product->id }}">{{ $product->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-4 mt-4">
									<button type="button" class="btn btn-primary btn-lg"> Exchange Now </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection