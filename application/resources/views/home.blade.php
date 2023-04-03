@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="text-center m-5">
        <h2>welcom in Home page</h2>
    </div>

      <br> --}}
      <form action="" method="get" class="form-inline">
        <div class="row">  
            <div class="col-md-4">
                <label for="">Filter by categories</label>
                <div class="form-group">
                    <select class="form-control" name="category">
                        <option value="">All Categories</option>
                        <option value="1">Category 1</option>
                        <option value="2">Category 2</option>
                        <option value="3">Category 3</option>
                    </select>
                </div>
            </div>            
            <div class="col-md-4">
                <label for="">Filter by cities</label>
                <div class="form-group">
                    <select class="form-control" name="city">
                        <option value="">All Cities</option>
                        <option value="1">City 1</option>
                        <option value="2">City 2</option>
                        <option value="3">City 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">  
                <label for="">Search for</label>    
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Search" aria-describedby="search-bar">
                    <button class="btn btn-outline-secondary" type="button" id="search-bar"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
      </form>
      
      
      
      <hr>
      
      
    <div>
        <h1>All Products</h1>
        <hr style="width:25%">
        <div class="row">
          
            {{-- @foreach($plats as $plat) --}}
            
            <div class="col-sm-4">
                <div class="card">
                    <div class="img-top">
                        {{-- <img class="card-img-top" src="{{ asset("$plat->image") }}" alt="food"> --}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Test</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium reprehenderit quam quod explicabo! Possimus facilis vero quo, nostrum soluta officiis minus tempore optio ut dolorem, autem ex error. Necessitatibus, veritatis.</p>
                        <a href="#" class="btn btn-primary">Exchange now</a>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
