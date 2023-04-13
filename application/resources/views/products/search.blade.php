@extends('layouts.app')

@section('title')
  Search | product
@endsection

@section('content')


<div class="container">  
	<div class="row">  

<div class="container">	
    <div class="d-flex justify-content-between mt-3">
        <div class='h3 mt-4'>
            <u>Search results :</u> 
        </div>
		<div class="col-md-4">  
			<form action="{{ url('search') }}" method="GET" role="search">
					<label for="">Search for</label>    
					<div class="input-group mb-3">
						<input type="text" name="search" value="{{Request::get('search')}}" class="form-control" placeholder="Search ..." aria-label="Search" aria-describedby="search-bar">
						<button class="btn btn-outline-secondary" type="button" id="search-bar"><i class="bi bi-search"></i></button>
					</div>
				</div>
			</form>
		</div>
    </div>
    <hr>

        <div class="row">
			@foreach($searchProduct as $product)           
            <div class="col-sm-4 mt-2">
                <div class="card">
                    <div class="mt-3 product_image_border">
                        <img class="card-img-top product-image" src="{{ asset("$product->image") }}" alt="book">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> <b> {{ $product->name }} </b></h5>
                        {{-- <p class="card-text">{{$product->description}}</p> --}}
                        <p class="card-text text-secondary" title="{{$product->description}}">{{ \Illuminate\Support\Str::limit($product->description, $limit = 40, $end = '...') }}</p>
                        <hr>
                        <div class="d-flex justify-content-center ">
                          <a href="#" class="btn btn-light object scale text-black border border-dark me-3"> <span><i class="bi bi-arrow-down-up me-1"></i></span> Exchange now</a>
                          <a href="#" class="btn btn-dark object scale text-white"> <span> <i class="bi bi-messenger"></i> </span> Send message </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
</div>
@endsection
