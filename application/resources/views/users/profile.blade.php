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
          <div class="d-flex justify-content-between mt-5">
              <div class='h3'>
                  <u>List of My Products :</u> 
              </div>
              <div class="">
                <button class="addProductButton btn-rounded  rounded-pill"><a href="#modal" data-bs-toggle="modal" type="button"  class="btn-rounded px-4 rounded-pill">Add Product</a></button>
              </div>
          </div>
          <hr class="w-25%" />        
          <div class="table-responsive">
            <table class="table">
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
                  @foreach($products as $product)                   
                    <form action="{{ route("products.edit", $product->id)}}" method="GET" id="form" enctype="multipart/form-data">  
                      <tr id="{{ $product->id }}">
                        <th scope="row"> {{ $product->id }}</th>
                        <td> <img src="{{ asset("$product->image") }}" alt="{{ $product->category }}" style=width:3rem; > </td>
                        <td> {{ $product->name }}</td>
                        <td> {{ $product->categories->name }} </td>
                        <td> {{ $product->locations->name }} </td>
                        <td> {{ $product->status->name }}</td>
                        <td>
                          <button type="submit" onclick="getdataProduct()"
                          data-bs-target="#modal-edit-product" data-bs-toggle="modal"
                          class="btn btn-outline-info">Edit</button>
                          
            
                          <button type="submit" onclick="deleteProduct()"  class="btn btn-outline-danger">Delete</button>
                        </td>
                      </tr>
                    </form>
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
          </>
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
                          <label class="form-label">name</label>
                          <input  type="text" class="@error('name') error-border @enderror form-control" name="name" id="name"/>                            
                          @error('name')
                              <div class="error">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div> 
                      <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea class="@error('description') error-border @enderror form-control" name="description" id="description"></textarea>
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
                          <select class="@error('status') error-border @enderror form-control" name="status_id" id="status">
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
                              <option value=1>Book</option>
                              <option value=2>Electronics</option>
                              <option value=3>Clothing</option>
                              <option value=4>Accessories</option>
                              <option value=5>Games</option>
                              <option value=6>Sports</option>
                              <option value=7>Music</option>
                              <option value=8>Art</option>
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
                              <option value=1>Youssoufia</option>
                              <option value=2>Safi</option>
                              <option value=3>Marrakech</option>
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

@endsection 
