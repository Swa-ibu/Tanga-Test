@extends('layouts.website.index')
@section('title', 'Courses')

@section('content')

@include('layouts.website.includes.navbar')


			<!-- ============================ Page Title Start================================== -->
			<section class="page-title">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">

							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Search results for <u>{{ $name }}</u></h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb p-0 bg-white">
										<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
										<li class="breadcrumb-item"><a href="{{ route('course') }}">Courses</a></li>
										<li class="breadcrumb-item active theme-cl" aria-current="page">{{ $name }}</li>
									</ol>
								</nav>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ All Cources ================================== -->
			<section class="gray">
				<div class="container">
					<div class="row">

						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
							<div class="page-sidebar p-0">
								<a class="filter_links" data-toggle="collapse" href="#fltbox" role="button" aria-expanded="false" aria-controls="fltbox">Open Advance Filter<i class="fa fa-sliders-h ml-2"></i></a>
								<div class="collapse" id="fltbox">
									<!-- Find New Property -->
									<div class="sidebar-widgets p-4">

										<div class="form-group">
											<div class="input-with-icon">
												<input type="text" class="form-control" placeholder="Search Your Cources">
												<i class="ti-search"></i>
											</div>
										</div>

										<div class="form-group">
											<div class="simple-input">
												<select id="cates" class="form-control">
                                                    <option disabled selected>-- Select Course Category--</option>
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                        <option selected disabled>-- No Course Category Found --</option>
                                                    @endforelse
												</select>
											</div>
										</div>

										<div class="form-group">
											<h6>Top Instructor</h6>
											<ul class="no-ul-list mb-3">
												@forelse ($instructors as $instructor)
                                                    <li>
                                                        <input id="aa-41" class="checkbox-custom" name="aa-41" type="checkbox">
                                                        <label for="aa-41" class="checkbox-custom-label">{{ $instructor->name }}<i class="count">{{ $instructor->courses->count() }}</i></label>
                                                    </li>
                                                @empty
                                                    <li>
                                                        <input id="aa-41" class="checkbox-custom" name="aa-41" type="checkbox">
                                                        <label for="aa-41" class="checkbox-custom-label">No Available Instructor<i class="count">0</i></label>
                                                    </li>
                                                @endforelse
											</ul>
										</div>

										<div class="form-group">
											<h6>Skill Level</h6>
											<ul class="no-ul-list mb-3">
												@forelse ($categories as $category)
                                                    <li>
                                                        <input id="l1" class="checkbox-custom" name="l1" type="checkbox">
                                                        <label for="l1" class="checkbox-custom-label">{{ $category->name }}</label>
                                                    </li>
                                                @empty
                                                    <li>
                                                        <input id="l1" class="checkbox-custom" name="l1" type="checkbox">
                                                        <label for="l1" class="checkbox-custom-label">No Available Category</label>
                                                    </li>
                                                @endforelse
											</ul>
										</div>

										{{-- <div class="form-group">
											<h6>Price</h6>
											<ul class="no-ul-list mb-3">
												<li>
													<input id="p1" class="checkbox-custom" name="p1" type="checkbox">
													<label for="p1" class="checkbox-custom-label">All<i class="count">89</i></label>
												</li>
												<li>
													<input id="p2" class="checkbox-custom" name="p2" type="checkbox">
													<label for="p2" class="checkbox-custom-label">Free<i class="count">56</i></label>
												</li>
												<li>
													<input id="p3" class="checkbox-custom" name="p3" type="checkbox">
													<label for="p3" class="checkbox-custom-label">Paid<i class="count">42</i></label>
												</li>
											</ul>
										</div> --}}

										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 pt-4">
												<button class="btn theme-bg rounded full-width">Apply Filter (s)</button>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- Sidebar End -->

						</div>

						<!-- Content -->
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="short_wraping">
										<div class="row m-0 align-items-center justify-content-between">

											<div class="col-lg-4 col-md-5 col-sm-12  col-sm-6">
												<div class="shorting_pagination_laft">
													<h6 class="m-0">Showing {{ $courses->count() }} of {{ $courses->count() }}</h6>
												</div>
											</div>

											<div class="col-lg-8 col-md-7 col-sm-12 col-sm-6">
												<div class="dlks_152">
													<div class="shorting-right mr-2">
														<label>Sort By:</label>
														<div class="dropdown show">
															<a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<span class="selection">Most Rated</span>
															</a>
															<div class="drp-select dropdown-menu">
																<a class="dropdown-item" href="JavaScript:Void(0);">Most Rated</a>
																<a class="dropdown-item" href="JavaScript:Void(0);">Most Viewd</a>
																<a class="dropdown-item" href="JavaScript:Void(0);">News Listings</a>
																<a class="dropdown-item" href="JavaScript:Void(0);">High Rated</a>
															</div>
														</div>
													</div>
													<div class="lmk_485">
														<ul class="shorting_grid">
															<li class="list-inline-item"><a href="{{ route('course') }}" class="active"><span class="ti-layout-grid2"></span></a></li>
															<li class="list-inline-item"><a href="{{ route('course-list') }}" class="active"><span class="ti-view-list"></span></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row justify-content-center">

                                @forelse ($courses as $course)
                                    <!-- Single Grid -->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="crs_lt_2">

                                                <div class="crs_lt_boxes">
                                                    <div class="crs_grid_list_thumb">
                                                        <a href="{{ route('course-detail', $course->slug) }}"><img src="{{ Storage::disk('public')->url('course/'.$course->featured_image) }}" class="img-fluid rounded" alt="{{ $course->name }}"></a>
                                                    </div>

                                                    <div class="crs_grid_list_caption">
                                                        <div class="crs_lt_101">
                                                            <span class="est st_2">{{ $course->categories->name }}</span>
                                                        </div>
                                                        <div class="crs_lt_102">
                                                            <h4 class="crs_tit">{{ $course->name }}</h4>
                                                            <span class="crs_auth"><i>By</i> {{ $course->users->name }}</span>
                                                        </div>
                                                        <div class="crs_lt_103">
                                                            <div class="crs_info_detail">
                                                                <ul>
                                                                    <li><i class="fa fa-video"></i><span>{{ $course->units->count() }} Units </span></li>
                                                                    <li><i class="fa fa-user"></i><span>{{ $course->units->count() }} Units</span></li>
                                                                    <li><i class="fa fa-eye"></i><span>{{ $course->view_count }} Views</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="crs_flex">
                                                            <div class="crs_fl_first">
                                                                <div class="crs_price"><h2><span class="currency">Ksh. </span><span class="theme-cl">{{ number_format($course->pricing) }}</span></h2></div>
                                                            </div>
                                                            <div class="crs_fl_last">
                                                                <div class="crs_linkview"><a href="{{ route('course-detail', $course->slug) }}" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lt_cr_footer">
                                                    <div class="lt_cr_footer_first">
                                                        <ul class="lt_cr_list">
                                                            <li><a href="{{ route('course-detail', $course->slug) }}" class="prv_li"><i class="fa fa-play text-success"></i>View Preview</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lt_cr_footer_last">
                                                        <ul class="lt_cr_list">
                                                            <li><i class="fa fa-lightbulb text-info"></i>{{ $course->categories->name }}</li>
                                                            <li><i class="fa fa-hourglass-half  text-warning"></i>{{ $course->duration }} Months</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                @empty
                                        <p class="lead">No Course Available</p>
                                @endforelse



							</div>

							<!-- Pagination -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul class="pagination p-center">
										{!! $courses->links() !!}
									</ul>
								</div>
							</div>

						</div>

					</div>
				</div>
			</section>
			<!-- ============================ All Cources ================================== -->


@endsection
