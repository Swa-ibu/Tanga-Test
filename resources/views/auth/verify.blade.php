@extends('layouts.website.index')
@section('title', 'Confirm Password')


@section('content')

@include('layouts.website.includes.auth-navbar')


			<!-- ============================ Login Wrap ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
								<div class="crs_log_wrap">
									<div class="crs_log__thumb">
										<img src="{{ asset('frontend/assets/img/banner-2.jpg') }}" class="img-fluid" alt="" />
									</div>
									<div class="crs_log__caption">
										<div class="rcs_log_123">
											<div class="rcs_ico"><i class="fas fa-lock"></i></div>
										</div>

                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

										<div class="rcs_log_124">

                                            <p class="lh-lg">
                                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                                {{ __('If you did not receive the email') }},
                                            </p>
                                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                @csrf
                                                <button type="submit" class="btn float-end btn-link p-0 m-0 align-baseline theme-cl">{{ __('click here to request another') }}</button>.
                                            </form>

										</div>
									</div>
									<div class="crs_log__footer d-flex justify-content-between">
										{{-- <div class="fhg_45"><p class="musrt">Don't have account? <a href="{{ route('register') }}" class="theme-cl">Register here</a></p></div> --}}
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Login Wrap ================================== -->


@endsection
