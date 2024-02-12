@extends('layouts.website.index')
@section('title', 'LOGIN')

@section('content')

@include('layouts.website.includes.auth-navbar')

			<!-- ============================ Login Wrap ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
							<form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="crs_log_wrap">
									{{-- <div class="crs_log__thumb">
										<img src="{{ asset('frontend/assets/img/banner-2.jpg') }}" class="img-fluid" alt="" />
									</div> --}}
									<div class="crs_log__caption">
										{{-- <div class="rcs_log_123">
											<div class="rcs_ico"><i class="fas fa-lock"></i></div>
										</div> --}}

										<div class="rcs_log_124">
											<div class="Lpo09"><h4>Login Your Account</h4></div>
											<div class="form-group">
												<label for="email" class="form-label">Email Address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>

											<div class="form-group">
												<label for="password" class="form-label">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
                                            <div class="form-check">
                                                <input class="checkbox-custom" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="checkbox-custom-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
											<div class="form-group">
												<button type="submit" class="btn full-width btn-md theme-bg text-white">Login</button>
											</div>
										</div>
									</div>
									<div class="crs_log__footer d-flex justify-content-between">
										<div class="fhg_45"><p class="musrt">Don't have account? <a href="{{ route('register') }}" class="theme-cl">SignUp</a></p></div>
										<div class="fhg_45"><p class="musrt"><a href="{{ route('password.request') }}" class="theme-cl">Forgot Password?</a></p></div>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Login Wrap ================================== -->


@endsection
