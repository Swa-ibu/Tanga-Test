@extends('layouts.website.index')
@section('title', 'Register')


@section('content')

@include('layouts.website.includes.auth-navbar')

			<!-- ============================ Signup Wrap ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
							<form method="POST" action="{{ route('register') }}">
                                @csrf
								<div class="crs_log_wrap">
									{{-- <div class="crs_log__thumb">
										<img src="assets/img/banner-2.jpg" class="img-fluid" alt="" />
									</div> --}}
									<div class="crs_log__caption">
										{{-- <div class="rcs_log_123">
											<div class="rcs_ico"><i class="fas fa-user"></i></div>
										</div> --}}

										<div class="rcs_log_124">
											<div class="Lpo09"><h4>Register an Account</h4></div>
											<div class="form-group row mb-0">
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label for="name" class="form-label"> Name</label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Email Address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="form-group row">
												<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="password-confirmation">Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
											</div>
											<div class="form-group">
												<button type="submit" class="btn full-width btn-md theme-bg text-white">Register</button>
											</div>
										</div>
									</div>
									<div class="crs_log__footer d-flex justify-content-between">
										<div class="fhg_45"><p class="musrt">Already have account? <a href="{{ route('login') }}" class="theme-cl">Login</a></p></div>
										{{-- <div class="fhg_45"><p class="musrt"><a href="{{ route('password.request') }}" class="text-danger">Forgot Password?</a></p></div> --}}
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Signup Wrap ================================== -->


@endsection
