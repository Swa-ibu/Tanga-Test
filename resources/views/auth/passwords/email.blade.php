@extends('layouts.website.index')
@section('title', 'Forgot Password')

@section('content')

@include('layouts.website.includes.auth-navbar')

			<!-- ============================ Login Wrap ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
							<form method="POST" action="{{ route('password.email') }}">
                                @csrf

								<div class="crs_log_wrap">
									{{-- <div class="crs_log__thumb">
										<img src="assets/img/banner-2.jpg" class="img-fluid" alt="" />
									</div> --}}
									<div class="crs_log__caption">
										{{-- <div class="rcs_log_123">
											<div class="rcs_ico"><i class="fas fa-lock"></i></div>
										</div> --}}

										<div class="rcs_log_124">
											<div class="Lpo09"><h4>Reset Password</h4></div>
											<div class="form-group">
												<label for="email">Enter Email</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="form-group">
												<button type="submit" class="btn full-width btn-md theme-bg text-white">{{ __('Send Password Reset Link') }}</button>
											</div>
										</div>
									</div>
									<div class="crs_log__footer d-flex justify-content-between">
										<div class="fhg_45"><p class="musrt">Don't have account? <a href="{{ route('register') }}" class="theme-cl">Register here</a></p></div>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Login Wrap ================================== -->


@endsection

