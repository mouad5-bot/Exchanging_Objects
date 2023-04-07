{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}


@extends('layouts.error')

@section('content')

<div class="container">
	<div class="row justify-content-center align-items-center" style="height: 100vh;">
		<div class="card w-50">
			<div class="">
				<div class="">
					<div class="error-box">
						<div class="m-4 text-center icon-404">
							<i class="bi bi-4-square"></i>
							<i class="bi bi-0-square"></i>
							<i class="bi bi-4-square"></i>
						</div>
						<div class="text-center mb-4">
							<h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Oops! Page not found!</h3>
							<p class="h4 font-weight-normal">The page you requested was not found.</p>
						</div>
						<div class="d-flex justify-content-center mt-3 mb-3">
							<a href="{{route('home')}}" class="btn btn-primary">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection