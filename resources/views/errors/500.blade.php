@extends('layouts.website.index')
@section('title', 'Error')

@section('content')
@include('layouts.website.includes.auth-navbar')



			<!-- ============================ User Dashboard ================================== -->
			<section class="error-wrap">
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-lg-6 col-md-10">
							<div class="text-center">

								<img src="{{ asset('frontend/assets/img/500.svg') }}" class="img-fluid" alt="">
								<p>Sorry, <span class="lead">It's not you, its me!!!</span></p>
                                <p>Found out more <a class="theme-cl" href="{{ route('welcome') }}">here</a></p>
								<a class="btn theme-bg text-white btn-md" href="{{ route('welcome') }}">Back To Home</a>

							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->


@endsection
