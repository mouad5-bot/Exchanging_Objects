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
          <form action="{{route('users/profile/update', Auth::user()->id ) }}" method="POST">
            @csrf

            
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
                      <a href="#" class="btn btn-primary">Reserve Now</a>
                  </div>
              </div>
          </div>
          {{-- @endforeach --}}
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
                        value="{{ $user->name }}"
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
                        value="{{ $user->email }}"
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