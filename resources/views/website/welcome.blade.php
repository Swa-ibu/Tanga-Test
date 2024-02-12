@extends('layouts.website.index')
@section('title', 'HOME')


@section('content')

@include('layouts.website.includes.pushscripts')

            <!-- Start Navigation -->
                    <div class="header header-transparent change-logo">
                        <div class="container">
                            <nav id="navigation" class="navigation navigation-landscape">
                                <div class="nav-header">
                                    <a class="nav-brand static-logo" href="{{ route('welcome') }}"><img src="{{ asset('frontend/assets/img/logo-light.png') }}" class="logo" alt="{{ config('app.name') }}" /></a>
                                    <a class="nav-brand fixed-logo" href="{{ route('welcome') }}"><img src="{{ asset('frontend/assets/img/logo.png') }}" class="logo" alt="{{ config('app.name') }}" /></a>
                                    <div class="nav-toggle"></div>
                                    <div class="mobile_nav">
                                        <ul>
                                            <li>
                                                <a href="{{ route('register') }}" class="crs_yuo12 w-auto text-white theme-bg">
                                                    <span class="embos_45"><i class="fas fa-sign-in-alt mr-1"></i>Get Started</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="nav-menus-wrapper">
                                    <ul class="nav-menu">

                                        <li class="{{ Route::is('/')? 'active' : '' }}"><a href="{{ route('welcome') }}">Home</a></li>

                                        <li class="{{ Route::is('course')? 'active' : '' }}"><a href="{{ route('course') }}">Courses</a></li>

                                        <li><a href="#">Course Categories<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu">
                                                @forelse ($categories as $category)
                                                    <li><a href="{{ route('course-category', $category->slug) }}">{{ $category->name }}</a></li>
                                                @empty
                                                    <li><a href="#">No Course Category Found</a></li>
                                                @endforelse
                                            </ul>
                                        </li>

                                        <li class="{{ Route::is('about')? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>

                                        <li class="{{ Route::is('contact')? 'active' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>

                                    </ul>

                                    <ul class="nav-menu nav-menu-social align-to-right">

                                        <li>
                                            <a href="{{ route('login') }}" class="alio_green">
                                                <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                                            </a>
                                        </li>
                                        <li class="add-listing theme-bg">
                                            <a href="{{ route('register') }}" class="text-white">Get Started</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
            <!-- End Navigation -->

			<!-- ============================ Hero Banner  Start================================== -->
			<div class="hero_banner image-cover" style="background:#03b97c url({{ asset('frontend/assets/img/banner-3.jpg') }}) no-repeat;" data-overlay="5">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">
							<div class="simple-search-wrap text-left">
								<div class="hero_search-2">
									<div class="elsio_tag">LISTEN TO OUR NEW ANTHEM</div>
									<h1 class="banner_title mb-4">Find the most exciting online cources</h1>
									<p class="font-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
									<form action="{{ route('search') }}" method="get">
                                        @csrf
                                        <div class="input-group simple_search">
                                            <i class="fa fa-search ico"></i>
                                            <input type="text" name="name" class="form-control" placeholder="Search Your Cources">
                                            <div class="input-group-append">
                                                <button class="btn theme-bg" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->



			<!-- ================================ Tag Award ================================ -->
			<section class="p-0">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="crp_box fl_color ovr_top">
								<div class="row align-items-center">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141"><i class="fa fa-journal-whills"></i></div>
											<div class="dro_142">
												<h6>{{ $courses->count() }} + Cources</h6>
												<p>Duis aute irure dolor in voluptate velit esse cillum labore .</p>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 st-1"><i class="fa fa-business-time"></i></div>
											<div class="dro_142">
												<h6>Lifetime Access</h6>
												<p>Duis aute irure dolor in voluptate velit esse cillum labore .</p>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 st-3"><i class="fa fa-user-shield"></i></div>
											<div class="dro_142">
												<h6>{{ $noOfUsers + 100 }}+ Enrolled</h6>
												<p>Duis aute irure dolor in voluptate velit esse cillum labore .</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ================================ Tag Award ================================ -->


			<!-- ============================ Latest Cources Start ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>explore Featured <span class="theme-cl">Cources</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">

						@forelse ($courses as $course)
                            <!-- Single Course -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="crs_grid">
                                        <div class="crs_grid_thumb">
                                        <a href="{{ route('course-detail', $course->slug) }}" class="crs_detail_link">
                                                <img src="{{ Storage::disk('public')->url('course/' .$course->featured_image) }}" class="img-fluid rounded" alt="{{ $course->name }}" />
                                            </a>
                                            <div class="crs_video_ico">
                                                <i class="fa fa-play"></i>
                                            </div>
                                            <div class="crs_locked_ico">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="crs_grid_caption">
                                            <div class="crs_flex">
                                                <div class="crs_fl_first">
                                                    <div class="crs_cates cl_8"><span>{{ $course->categories->name }}</span></div>
                                                </div>
                                                <div class="crs_fl_last">
                                                    <div class="crs_inrolled"><strong>8,350</strong>Enrolled</div>
                                                </div>
                                            </div>
                                            <div class="crs_title"><h4><a href="{{ route('course-detail', $course->slug) }}" class="crs_title_link">{{ $course->name }}</a></h4></div>
                                            <div class="crs_info_detail">
                                                <ul>
                                                    <li><i class="fa fa-clock text-danger"></i><span>{{ $course->duration }} Months</span></li>
                                                    <li><i class="fa fa-video text-success"></i><span>{{ $course->units->count() }} Units</span></li>
                                                    <li><i class="fa fa-signal text-warning"></i><span>{{ $course->categories->name }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="crs_grid_foot">
                                            <div class="crs_flex">
                                                <div class="crs_fl_first">
                                                    <div class="crs_tutor">
                                                        <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="{{ asset('frontend/assets/img/user-6.jpg') }}" class="img-fluid circle" alt="" /></a></div><div class="crs_tutor_name"><a href="instructor-detail.html">Robert Fox</a></div>
                                                    </div>
                                                </div>
                                                <div class="crs_fl_last">
                                                    <div class="crs_price"><h2><span class="currency">Ksh. </span><span class="theme-cl">{{ number_format($course->pricing) }}</span></h2></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @empty
                        <!-- Single Course -->
                            <p class="lead">No course available yet</p>
                        @endforelse



					</div>

					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 mt-2">
							<div class="text-center"><a href="{{ route('course') }}" class="btn btn-md theme-bg-light theme-cl">Explore More Cources</a></div>
						</div>
					</div>

				</div>
			</section>
			<!-- ============================ Latest Cources End ================================== -->




			<!-- ============================ Featured Categories Start ================================== -->
			<section class="min gray">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Explore Featured <span class="theme-cl">Categories</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>


					<div class="row justify-content-center">

                        @forelse ($categories as $category)
                            <!-- Single Category -->
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <div class="crs_cate_wrap style_2">
                                    <a href="{{ route('course') }}" class="crs_cate_box">
                                        <div class="crs_cate_icon">{!! $category->icon !!}</div>
                                        <div class="crs_cate_caption"><span>{{ $category->name }}</span></div>
                                        <div class="crs_cate_count"><span>{{ $category->courses->count() }} Courses</span></div>
                                    </a>
                                </div>
                            </div>
                        @empty

                        @endforelse

					</div>

				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Featured Categories End ================================== -->

			<!-- ============================ Work Process Start ================================== -->
			<section>
				<div class="container">

					<div class="row align-items-center justify-content-between mb-5">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="lmp_caption">
								<h2 class="mb-3">We Have The Best Instructors Available in The City</h2>
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
								<div class="text-left mt-4"><a href="{{ route('register') }}" class="btn btn-md text-light theme-bg">Enrolled Today</a></div>
							</div>
						</div>

						<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
							<div class="lmp_thumb">
								<img src="{{ asset('frontend/assets/img/lmp-2.png') }}" class="img-fluid" alt="{{ config('app.name') }} Enroll Today" />
							</div>
						</div>
					</div>
				</div>
			</section>


            <section class="pt-0 gray">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="side_block extream_img">
								<div class="list_crs_img">
									<img src="{{ asset('frontend/assets/img/at-1.png') }}" class="img-fluid elsio cirl animate-fl-y" alt="" />
									<img src="{{ asset('frontend/assets/img/at-3.png') }}" class="img-fluid elsio arrow animate-fl-x" alt="" />
									<img src="{{ asset('frontend/assets/img/at-2.png') }}" class="img-fluid elsio moon animate-fl-x" alt="" />
								</div>
								<img src="{{ asset('frontend/assets/img/st-2.png') }}" class="img-fluid" alt="" />
							</div>
						</div>
						<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
							<div class="lmp_caption">
								<ol class="list-unstyled p-0">
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">1</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Create account</h4>
									  <p>
										Oluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">3</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Join Membership</h4>
									  <p>
										Error sit voluptatem actium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								   <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">3</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Start Learning</h4>
									  <p>
										Error sit voluptatem actium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">4</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Get Certificate</h4>
									  <p>
										Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								</ol>
							</div>
						</div>
					</div>

				</div>
			</section>
            <div class="clearfix"></div>
			<!-- ============================ Work Process End ================================== -->



			<!-- ============================ Students Reviews ================================== -->
			<section class="gray">
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
									<div class="_testimonial_wrios shadow_none">
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
									<div class="_testimonial_wrios shadow_none">
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
									<div class="_testimonial_wrios shadow_none">
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
									<div class="_testimonial_wrios shadow_none">
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
									<div class="_testimonial_wrios shadow_none">
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


			<!-- ============================ Subscribe Section Starts ================================== -->
			<section class="pt-0">
				<div class="container">
					<div class="row align-items-center justify-content-between mt-5">
						<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
							<div class="lmp_thumb">
								<img src="{{ asset('frontend/assets/img/news.png') }}" class="img-fluid" alt="" />
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="lmp_caption">
								<span class="theme-cl">Join over 25,000 Global Students</span>
								<h2 class="mb-3">Get Instant alert on your inbox</h2>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique</p>
								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus</p>
								<div class="foot-news-last mt-4">
									<form action="{{ route('subscribe') }}" method="post">
                                        @csrf
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control brd" placeholder="Email Address">
                                              <div class="input-group-append">
                                                  <button type="submit" class="input-group-text theme-bg b-0 text-light">Subscribe</button>
                                              </div>
                                          </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Subscribe Section Ends ================================== -->


@endsection
