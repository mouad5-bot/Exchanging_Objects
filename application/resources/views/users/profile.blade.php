@extends('layouts.app')

@section('title')
  Profile
@endsection

@section('content')

<div class="alert alert-success m-4 text-center" role="alert">
  <h3 > Welcome in you Profile {{ Auth::user()->name }} ! </h3> 
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-3">
        <div class="card-body">
          <h2>
            Edit Profile
          </h2>
          <hr class="w-25%" />
          <br />
          <form action="{{route('users/profile/update', Auth::user()->id ) }}" method="POST">
            {{-- {{ csrf_field() }} --}}
            @csrf
            {{-- {{ method_field('patch') }} --}}

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
</div>

@endsection