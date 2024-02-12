@extends('layouts.website.index')
@section('title', 'Course Details')

@section('content')

@include('layouts.website.includes.navbar')

			<!-- ============================ Page Title Start================================== -->
			<div class="ed_detail_head">
				<div class="container">
					<div class="row align-items-center mb-5">
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="authi_125">
								<div class="authi_125_thumb">
									<img src="{{ Storage::disk('public')->url('course/'.$course->featured_image) }}" class="img-fluid rounded" alt="{{ $course->name }}" />
								</div>
								<a href="#" class="klio_45"><div class="lklo_45"><i class="fas fa-play"></i></div><h6>Preview</h6></a>
							</div>
						</div>

						<div class="col-lg-9 col-md-12 col-sm-12">
							<div class="dlkio_452">
								<div class="ed_detail_wrap">
									<div class="crs_cates cl_2"><span>{{ $course->categories->name }}</span></div>
									<div class="ed_header_caption">
										<h2 class="ed_title">{{ $course->name }}</h2>
										<ul>
											<li><i class="ti-calendar"></i>{{ $course->duration }} Months <span class="fs-6 fst-italic">({{ $course->duration * 4 }} Weeks)</span></li>
											<li><i class="ti-control-forward"></i>{{ $course->units->count() }} Units</li>
											<li><i class="ti-user"></i>500002 Student Enrolled</li>
										</ul>
									</div>
									<div class="ed_header_short">
										<p>{{ $course->short_desc }}</p>
									</div>

									<div class="ed_rate_info">
										{{-- <div class="star_info">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
										</div> --}}
										<div class="review_counter">
											<strong class="high">{{ $course->view_count }}</strong>10 Views
										</div>
									</div>

								</div>
								<div class="dlkio_last">
									<div class="ed_view_link">
										<a href="#" class="btn theme-bg enroll-btn">Enroll<i class="ti-angle-right"></i></a>
										<a href="{{ route('course-outline-pdf', $course->slug) }}" class="btn theme-border enroll-btn">Course Outline<i class="fa-solid fa-file-arrow-down fa-bounce"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->

			<!-- ================================ Tag Award ================================ -->
			<section class="p-0 gray">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="crp_box fl_color ovr_top">
								<div class="row align-items-center">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141"><i class="fa fa-calendar"></i></div>
											<div class="dro_142">
												<h6>Starts on {{ date('M d') }}</h6>
												<p>{{ date('M d, Y') }} - {{ date('M d, Y', strtotime('+6 months')) }}</p>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 st-1"><i class="fa fa-play"></i></div>
											<div class="dro_142">
												<h6>Units</h6>
												<p> {{ $course->units->count() }} Units</p>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<div class="dro_140">
											<div class="dro_141 st-3"><i class="fa fa-user-shield"></i></div>
											<div class="dro_142">
												<h6>Current Students</h6>
												<p>2000002k Students Enrolled</p>
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

			<!-- ============================ Course Detail ================================== -->
			<section class="gray">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-12 order-lg-first">

							<!-- All Info Show in Tab -->
							<div class="tab_box_info mt-4">
								<ul class="nav nav-pills mb-3 light" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Course Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="curriculum-tab" data-toggle="pill" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="instructors-tab" data-toggle="pill" href="#instructors" role="tab" aria-controls="instructors" aria-selected="false">Instructor</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
									</li>
								</ul>

								<div class="tab-content" id="pills-tabContent">

									<!-- Overview Detail -->
									<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
										<!-- Overview -->
										<div class="edu_wraper">
											<h4 class="edu_title">{{ $course->name }} Course Overview</h4>
											{!! $course->desc !!}
										</div>

										<div class="edu_wraper">
											<h4 class="edu_title">Units Covered in the Course</h4>
                                            <ul class="simple-list p-0">
												@forelse ($course->units as $unit)
                                                    <li>{{ $unit->name }}</li>
                                                @empty
                                                    <li>No Unit found</li>
                                                @endforelse
											</ul>
                                        </div>

										<!-- Overview -->
										{{-- <div class="edu_wraper">
											<h4 class="edu_title">What you'll learn</h4>
											<ul class="lists-3 row">
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
												<li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
											</ul>
										</div> --}}
									</div>

									<!-- Curriculum Detail -->
									<div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
										<div class="edu_wraper">
											<h4 class="edu_title">Course Circullum</h4>
											<!-- Overview -->
                                            @forelse ($course->units as $key=>$unit)
                                                    <div class="liop_wraps">
                                                        <div class="liop_wraps_01">
                                                            <h6>Unit {{ $key+1 }}: {{ $unit->name }}</h6>
                                                            <span>{{ $unit->topics->count() }} {{ Str::plural('Topic', $unit->topics->count()) }}</span>
                                                        </div>
                                                        <div class="liop_wraps_list">
                                                        @forelse ($unit->topics as $key=>$topic)
                                                                <!-- single List -->
                                                                <div class="liop_wraps_single">
                                                                    {{-- <div class="lki_813"><h6>LSN.</h6><span>{{ $topic->lessons->count() }}</span></div> --}}
                                                                    <div class="bhu_486">
                                                                        <h5>Topic {{ $key+1 }}: {{ $topic->name }}</h5>
                                                                        <ul class="simple-list p-0">
                                                                            @forelse ($topic->lessons as $lesson)
                                                                                <li>{{ $lesson->title }}</li>
                                                                            @empty
                                                                                <p class="lead">No Lesson found</p>
                                                                            @endforelse
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                        @empty
                                                                <p class="lead">No Topic found</p>
                                                        @endforelse
                                                        </div>
                                                    </div>
                                            @empty
                                                <p class="lead">No Unit found</p>
                                            @endforelse
										</div>
									</div>

									<!-- Instructor Detail -->
									<div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="instructors-tab">
										<div class="single_instructor">
											<div class="single_instructor_thumb">
												<a href="#">
                                                    @if ($course->users->featured_image == 'default.png')
                                                        <img src="{{ asset('admin/assets/img/icons/default.png') }}" class="img-fluid" alt="{{ $course->users->name }}">
                                                    @else
                                                        <img src="{{ Storage::disk('public')->url('user/'.$course->users->featured_image) }}" class="img-fluid" alt="{{ $course->users->name }}">
                                                    @endif
                                                </a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">{{ $course->users->name }}</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-video-camera"></i>{{ $course->users->courses->count() }} Courses</li>
													{{-- <li><i class="ti-control-forward"></i>102 Lectures</li> --}}
													<li><i class="ti-user"></i>{{ $course->users->created_at->diffForHumans() }}</li>
												</ul>
												<p>
                                                    @if (empty($course->users->about))
                                                        <p class="lead">A Good Instructor</p>
                                                    @else
                                                        {{ $course->users->about }}
                                                    @endif
                                                </p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
									</div>

									<!-- Reviews Detail -->
									<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

										<!-- Overall Reviews -->
										{{-- <div class="rating-overview">
											<div class="rating-overview-box">
												<span class="rating-overview-box-total">4.2</span>
												<span class="rating-overview-box-percent">out of 5.0</span>
												<div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
												</div>
											</div>

											<div class="rating-bars">
												<div class="rating-bars-item">
													<span class="rating-bars-name">5 Star</span>
													<span class="rating-bars-inner">
														<span class="rating-bars-rating high" data-rating="4.7">
															<span class="rating-bars-rating-inner" style="width: 85%;"></span>
														</span>
														<strong>85%</strong>
													</span>
												</div>
												<div class="rating-bars-item">
													<span class="rating-bars-name">4 Star</span>
													<span class="rating-bars-inner">
														<span class="rating-bars-rating good" data-rating="3.9">
															<span class="rating-bars-rating-inner" style="width: 75%;"></span>
														</span>
														<strong>75%</strong>
													</span>
												</div>
												<div class="rating-bars-item">
													<span class="rating-bars-name">3 Star</span>
													<span class="rating-bars-inner">
														<span class="rating-bars-rating mid" data-rating="3.2">
															<span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
														</span>
														<strong>53%</strong>
													</span>
												</div>
												<div class="rating-bars-item">
													<span class="rating-bars-name">1 Star</span>
													<span class="rating-bars-inner">
														<span class="rating-bars-rating poor" data-rating="2.0">
															<span class="rating-bars-rating-inner" style="width:20%;"></span>
														</span>
														<strong>20%</strong>
													</span>
												</div>
											</div>
										</div> --}}

										<!-- Reviews -->
										<div class="list-single-main-item fl-wrap">
											<div class="list-single-main-item-title fl-wrap">
												<h3>Item Reviews -  <span> {{ $reviews->count() }} </span></h3>
											</div>
											<div class="reviews-comments-wrap">


												<!-- reviews-comments-item -->
												@forelse ($reviews as $review)
                                                    <div class="reviews-comments-item">
                                                        <div class="review-comments-avatar">
                                                            <img src="{{ asset('frontend/assets/img/user-1.jpg') }}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="reviews-comments-item-text">
                                                            <h4><a href="#">{{ $review->users->name }}</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>{{ $review->created_at->toDayDateTimeString() }}</span></h4>

                                                            {{-- <div class="listing-rating"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i></div> --}}
                                                            <div class="clearfix"></div>
                                                            <p>{{ $review->message }}</p>
                                                            {{-- <div class="pull-left reviews-reaction">
                                                                <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                                <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                                <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="lead">No course review found. Login <a class="theme-cl" href="{{ route('login') }}">here</a> to review {{ $course->name }}</p>
                                                @endforelse
												<!--reviews-comments-item end-->
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<!-- Sidebar -->
						<div class="col-lg-4 col-md-12 order-lg-last">

							<!-- Course info -->
							<div class="ed_view_box style_3 stick_top">

								<div class="property_video sm">
									<div class="thumb">
										<img class="pro_img img-fluid w100" src="{{ Storage::disk('public')->url('course/'.$course->featured_image) }}" alt="{{ $course->name }}">
										<div class="overlay_icon">
											<div class="bb-video-box">
												<div class="bb-video-box-inner">
													<div class="bb-video-box-innerup">
														<a href="#" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="ed_view_price pl-4">
									<span>Acctual Price</span>
									<h2 class="theme-cl">Ksh. {{ number_format($course->pricing) }}</h2>
								</div>

								<div class="ed_view_short pl-4 pr-4 pb-2">
									<p>{{ $course->short_desc }}</p>
								</div>

								<div class="ed_view_features half_list pl-4 pr-3">
									<span>Course Units</span>
									<ul>
										@forelse ($course->units as $unit)
                                            <li><i class="ti-cup"></i>{{ $unit->name }}</li>
                                        @empty
                                            <li><i class="ti-cup"></i>No unit found</li>
                                        @endforelse

									</ul>
								</div>
								<div class="ed_view_link">
									<a href="{{ route('login') }}" class="btn theme-bg enroll-btn">Enroll Now<i class="ti-angle-right"></i></a>
								</div>

							</div>

						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Course Detail ================================== -->




			<!-- ============================ Related Cources ================================== -->
			<section>
				<div class="container">

					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 mb-3">
							<h4>Related Courses</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="slide_items">


                                @forelse ($relatedCourses as $rlCourse)
                                    <!-- Single Item -->
                                        <div class="lios_item">
                                            <div class="crs_grid shadow_none brd">
                                                <div class="crs_grid_thumb">
                                                    <a href="{{ route('course-detail', $rlCourse->slug) }}" title="{{ $rlCourse->name }}" class="crs_detail_link">
                                                        <img src="{{ Storage::disk('public')->url('course/'.$rlCourse->featured_image) }}" class="img-fluid rounded" alt="{{ $rlCourse->name }}" />
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
                                                            <div class="crs_cates cl_6"><span>{{ $rlCourse->categories->name }}</span></div>
                                                        </div>
                                                        <div class="crs_fl_last">
                                                            <div class="crs_price"><h2><span class="currency">Ksh. </span><span class="theme-cl">{{ $rlCourse->pricing }}</span></h2></div>
                                                        </div>
                                                    </div>
                                                    <div class="crs_title"><h4><a href="{{ route('course-detail', $rlCourse->slug) }}" title="{{ $rlCourse->name }}" class="crs_title_link">{{ $rlCourse->name }}</a></h4></div>
                                                    <div class="crs_info_detail">
                                                        <ul>
                                                            <li><i class="fa fa-clock text-danger"></i><span>{{ $rlCourse->duration }} Months</span></li>
                                                            <li><i class="fa fa-video text-success"></i><span>{{ $rlCourse->units->count() }} Units</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="preview_crs_info">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width:95%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="crs_grid_foot">
                                                    <div class="crs_flex">
                                                        <div class="crs_fl_first">
                                                            <div class="crs_tutor">
                                                                <div class="crs_tutor_thumb"><a href="#"><img src="{{ asset('frontend/assets/img/user-6.jpg') }}" class="img-fluid circle" alt="{{ $rlCourse->users->name }}" /></a></div>
                                                            </div>
                                                        </div>
                                                        <div class="crs_fl_last">
                                                            <div class="foot_list_info">
                                                                <ul>
                                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">{{ $rlCourse->view_count + 100 }}</div></li>
                                                                    {{-- <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li> --}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @empty

                                <p class="lead">No related Course</p>

                                @endforelse



							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ============================ Related Cources ================================== -->


@endsection
