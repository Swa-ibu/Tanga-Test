@extends('layouts.website.index')
@section('title', 'FAQ')

@section('content')

@include('layouts.website.includes.navbar')


			<!-- ============================ Page Title Start================================== -->
			<section class="page-title gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">

							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">FAQ's</h1>
								<nav class="transparent">
									<ol class="breadcrumb p-0">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active theme-cl" aria-current="page">faqs</li>
									</ol>
								</nav>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ FAQ Start ================================== -->
			<section>
				<div class="container">

					<div class="row justify-content-start">
						<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
							<div id="accordionExample" class="accordion">



								@forelse ($faqs as $faq)
                                    <!-- Part 2 -->
                                    <div class="card">
                                        <div id="heading-{{ $faq->id }}" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title">
                                                <a href="#" data-toggle="collapse" data-target="#faq-{{ $faq->id }}" aria-expanded="false" aria-controls="faq-{{ $faq->id }}"
                                                class="d-block position-relative collapsed text-dark collapsible-link py-2">
                                                {{ $faq->title }}
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="faq-{{ $faq->id }}" aria-labelledby="heading-{{ $faq->id }}" data-parent="#accordionExample" class="collapse">
                                        <div class="card-body pl-3 pr-3 pt-0">
                                            {{ $faq->desc }}
                                        </div>
                                        </div>
                                    </div>
                                @empty
                                        <p class="lea">No FAQ found</p>
                                @endforelse



							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ FAQ End ================================== -->


@endsection
