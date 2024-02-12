@extends('layouts.website.index')
@section('title', 'Contact Us')

@section('content')

@include('layouts.website.includes.navbar')

@include('layouts.website.includes.pushscripts')

			<!-- ============================ Page Title Start================================== -->
			<section class="page-title gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">

							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Get In Touch</h1>
								<nav class="transparent">
									<ol class="breadcrumb p-0">
										<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
										<li class="breadcrumb-item active theme-cl" aria-current="page">Contact Us</li>
									</ol>
								</nav>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ Contact Detail ================================== -->
			<section>
				<div class="container">
					<div class="row align-items-start">
						<div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
							<div class="form-group">
								<h4>We'd love to here from you</h4>
								<span>Send a message and we'll responed as soos as possible </span>
							</div>
							<form action="{{ route('post-contact-message') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" required name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button class="btn theme-bg text-white btn-md" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
						</div>

						<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
							<div class="lmp_caption pl-lg-5">
								<ol class="list-unstyled p-0">
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
									  <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-home"></i></div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Reach Us</h4>
									  <p>
										Nairobi,<br>Eliza Road,<br>Nairobi, Kenya
									  </p>
									</div>
								  </li>
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
									  <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-at"></i></div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Drop A Mail</h4>
									  <p>
										<a href="mailto:mbucibro@gmail.com">support@njenaschol.com</a> <br> <a href="mailto:mbucibro@gmail.com">support@njenaschol.com</a>
									  </p>
									</div>
								  </li>
								   <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
									  <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-phone-alt"></i></div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Make a Call</h4>
									  <p>
										(254) 123 521 458<br>+254 235 548 7548
									  </p>
									</div>
								  </li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Contact Detail ================================== -->

			<!-- ============================ map Start ================================== -->
			{{-- <section class="p-0">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616969.6694606147!2d76.0180559099777!3d27.71120494451525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397477034c6a8ab1%3A0xc64bfb455f3b8f4f!2sLenovo%20Service%20Center%20-%20Wipro%20Infocare%20Digital%20System!5e0!3m2!1sen!2sin!4v1629534919408!5m2!1sen!2sin" class="full-width" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</section> --}}
			<div class="clearfix"></div>
			<!-- ============================ map End ================================== -->


@endsection
