@extends('layouts.website.index')
@section('title', 'About Us')

@section('content')


    @include('layouts.website.includes.navbar')


			<!-- ============================ Page Title Start================================== -->
			<section class="page-title gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">

							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Who We Are?</h1>
								<nav class="transparent">
									<ol class="breadcrumb p-0">
										<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
										<li class="breadcrumb-item active theme-cl" aria-current="page">About Us</li>
									</ol>
								</nav>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ About Detail ================================== -->
			<section>
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="lmp_caption">
								<span class="theme-cl">About Us</span>
								<h2 class="mb-3">What We Do & Our Aim</h2>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique</p>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">Full lifetime access</h6>
									</div>
								</div>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">20+ downloadable resources</h6>
									</div>
								</div>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">Certificate of completion</h6>
									</div>
								</div>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">Free Trial 7 Days</h6>
									</div>
								</div>
								<div class="text-left mt-4"><a href="#" class="btn btn-md text-light theme-bg">Enrolled Today</a></div>
							</div>
						</div>

						<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
							<div class="lmp_thumb">
								<img src="{{ asset('frontend/assets/img/lmp-2.png') }}" class="img-fluid" alt="" />
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ About Detail ================================== -->

			<!-- ============================ partner Start ================================== -->
			<section class="gray">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Trusted By <span class="theme-cl">10,000</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-1.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-2.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-3.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-4.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-5.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-6.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-7.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-8.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

						<!-- Single Item -->
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="crs_partn">
								<div class="p-3">
									<img src="{{ asset('frontend/assets/img/lg-9.png') }}" class="img-fluid" alt="" />
								</div>
							</div>
						</div>

					</div>

				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ partner End ================================== -->

			<!-- ============================ Students Reviews ================================== -->
			<section>
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Our Students <span class="theme-cl">Reviews</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-sm-12">

							<div class="reviews-slide space">

								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none border">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/user-1.jpg') }}" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Susan D. Murphy</h5>
													<div class="_ovr_posts"><span>CEO, Leader</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/c-1.png') }}" class="img-fluid" alt="">
												</div>
											</div>
										</div>

										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>

								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none border">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/user-2.jpg') }}" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Maxine E. Gagliardi</h5>
													<div class="_ovr_posts"><span>Apple CEO</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.5</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/c-2.png') }}" class="img-fluid" alt="">
												</div>
											</div>
										</div>

										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>

								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none border">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/user-3.jpg') }}" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Roy M. Cardona</h5>
													<div class="_ovr_posts"><span>Google Founder</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/c-3.png') }}" class="img-fluid" alt="">
												</div>
											</div>
										</div>

										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>

								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none border">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/user-4.jpg') }}" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Dorothy K. Shipton</h5>
													<div class="_ovr_posts"><span>Linkedin Leader</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/c-4.png') }}" class="img-fluid" alt="">
												</div>
											</div>
										</div>

										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>

								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none border">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/user-5.jpg') }}" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Robert P. McKissack</h5>
													<div class="_ovr_posts"><span>CEO, Leader</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="{{ asset('frontend/assets/img/c-5.png') }}" class="img-fluid" alt="">
												</div>
											</div>
										</div>

										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>

				</div>
			</section>
			<!-- ============================ Students Reviews End ================================== -->




@endsection

