@extends('layouts.app')

@section('title')
	Confirm the exchange
@endsection

@section('content')

	<div class="container bg-color-red">
		<h1> !</h1>
		<div class="row">          
			<div class="col-sm-4 mt-2">
				<div class="card">
					<div class="mt-3 product_image_border">
						<img class="card-img-top product-image" src="{{ asset("$product->image") }}" alt="book">
					</div>
					<div class="card-body">
						<h5 class="card-title"> <b> {{ $product->name }} </b></h5>
						<p class="card-text text-secondary" title="{{$product->description}}">{{ \Illuminate\Support\Str::limit($product->description, $limit = 40, $end = '...') }}</p>
						{{-- <hr>
						<div class="d-flex justify-content-center ">
						  <a href="{{ route('exchange', [$product->id]) }}" class="btn btn-light object scale text-black border border-dark me-3"> <span><i class="bi bi-arrow-down-up me-1"></i></span> Exchange now</a>
						  <a href="{{ route('chatify', [$product->user_id]) }}" class="btn btn-dark object scale text-white"> <span> <i class="bi bi-messenger"></i> </span> Send message </a>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
		<form method="POST" action="{{ route('confermExchanging', [$product->id]) }}">
			@csrf
			{{-- <input type="hidden" name="" value="{{ $products->id }}"> --}}
			<label for="exchange_product_id">Select a product to exchange:</label>
			<select name="exchange_product_id" id="exchange_product_id">
				@foreach($products as $exchangeProduct)
					<option value="{{ $exchangeProduct->id }}">{{ $exchangeProduct->name }}</option>
				@endforeach
			</select>
			<button type="submit">Exchange Now</button>
		</form>

	</div>
@endsection