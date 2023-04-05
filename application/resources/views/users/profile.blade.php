@extends('layouts.app')

@section('title')
  Profile
@endsection

@section('content')

<div class="profilTitle m-4 text-center">
  <h3 > Welcome in you Profile {{ Auth::user()->name }} ! </h3> 
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-3">
        <div class="card-body">
          <h2>
            My Products
          </h2>
          <hr class="w-25%" />        
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">image</th>
                  <th scope="col">Name </th>
                  <th scope="col">Category</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>              
                @foreach($products as $product)
                @php
                // echo($products);
                // die;    
                @endphp
                
                  <tr id="{{ $product->id }}">
                    <th scope="row"> {{ $product->id }}</th>
                    <td> <img src="{{ asset("$product->image") }}" alt="{{ $product->category }}" style=width:3rem; > </td>
                    <td> {{ $product->name }}</td>
                    <td> {{ $product->categories->name }} </td>
                    <td> {{ $product->status->name }}</td>
                    <td>
                      <button type="button" onclick="getdataArticl()"
                      data-bs-target="#modal-edit-post" data-bs-toggle="modal"
                      class="btn btn-outline-info">Edit</button>
                      
        
                      <a href="#"><button type="button" onclick="deleteArticl()"  class="btn btn-outline-danger">Delete</button></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-3">
        <div class="card-body">
          <h2>
            Edit Profile
          </h2>
          <hr class="w-25%" />
          <form action="{{route('users/profile/update', Auth::user()->id ) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                    <input type="hidden" name="id">
                    <label class="form-label">Your Name </label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        value="{{ Auth::user()->name }}"
                    />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-4 mr-2">
                    <label class="form-label" >Email </label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        value="{{ Auth::user()->email }}"
                    />
                </div>   
              </div>
              <div>
                <button
                  type="submit"
                  id="save"
                  name="save_Changes"
                  class="btn btn-primary"
                >
                Save Changes
                </button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-3">
        <div class="card-body">
          <h2>
            Edit Password
          </h2>
          <hr class="w-25%" />
          <form action="{{route('users/profile/update', Auth::user()->id ) }}" method="POST">
            {{-- {{ csrf_field() }} --}}
            @csrf
            {{-- {{ method_field('patch') }} --}}

            <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label" 
                        >password</label
                    >
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="password"
                    />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label" 
                        >Conferm password</label
                    >
                    <input
                        type="password"
                        class="form-control"
                        name="conferm_password"
                        id="conferm-password"
                    />
                </div>    
              </div>
              <div>
                <button
                  type="submit"
                  id="save"
                  name="save_Changes"
                  class="btn btn-primary"
                  onclick="update()"
                >
                Save Changes
                </button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-3">
        <div class="card-body">
          <h2>
            Delete Your Account
          </h2>
          <hr class="w-25%" />
          
          <form action="{{route('users/profile/update', Auth::user()->id ) }}" method="POST">
            @csrf
            <div>
                <i>Delete your account and all information related to your account such as your profile page, products published … Please be aware that all data will be permanently lost if you delete your account.</i>         
              </div>
                <button
                  type="submit"
                  id="save"
                  name="save_Changes"
                  class="btn btn-danger mt-3"
                  onclick="update()"
                >
                Delete Account
                </button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection