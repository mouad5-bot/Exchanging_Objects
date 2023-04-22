
@extends('layouts.app')


@section('title')
  Dashboard
@endsection

@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="card m-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-3">
                    <div class='h3'>
                        <u>List of My Products :</u> 
                    </div>
                    <div class="">
                        <button class="addProductButton btn-rounded  rounded-pill"><a href="#modal" data-bs-toggle="modal" type="button"  class="btn-rounded px-4 rounded-pill"><i class="bi bi-plus"></i>Add Product</a></button>
                    </div>
                </div>
                <hr class="mb-3" />        
                <div class="table-responsive">
                <table class="table mt-5 mb-3" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">Name </th>
                    <th scope="col">Category</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($products as $product)                    --}}
                        
                        @csrf
                        {{-- <tr id="{{ $product->id }}"> --}}
                            {{-- <th scope="row"> {{ $product->id }}</th>
                            <td> <img src="{{ asset("$product->image") }}" alt="{{ $product->category }}" style=width:2rem; > </td>
                            <td> {{ $product->name }}</td>
                            <td> {{ $product->categories->name }} </td>
                            <td> {{ $product->locations->name }} </td>
                            <td> {{ $product->status->name }}</td> --}}
                            <td class="d-flex justify-content-center">
                                <div class="me-3">
                                {{-- <form action="{{ route("products.edit", $product->id)}}" method="GET">   --}}
                                    @csrf 
                                    <button type="submit" onclick="getdataProduct()"
                                    class="btn btn-outline-warning border border-light"> <i class="bi bi-pencil"></i> Edit</button>     
                                </form>
                                </div>
                                <div class="me-3">
                                {{-- <form action="{{ route("products.destroy", $product->id)}}" method="POST" id="form">   --}}
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" onclick="deleteProduct()"  class="btn btn-outline-danger border border-light"> <i class="bi bi-trash"></i> Delete</button>
                                </form>
                                </div>
                                <div>
                                <button class="btn btn-outline-info border border-light"> <i class="bi bi-eye"></i> Show</button>
                                </div>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>