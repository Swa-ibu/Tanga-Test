<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <section class="container">
       <div class="card">
        <div class="card-header text-center bg-success-subtle">
           <div class="row py-5">
            <div class="col-lg-4">
                <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="logo" class="img-fluid">
                <p class="text-muted text-monospace">By: {{ config('app.name') }}</p>
               </div>
               <div class="col-lg-8 text-end">
                <p class="text-muted lh-lg">
                    {{ $course->name }} <br>
                    {{ $course->categories->name }} Course <br>
                    Tel: <a href="tel:+254705610800">(254) 705 610 800</a>
                </p>
               </div>
           </div>
        </div>
           <div class="card-body">
                <p class="h4 text-center text-uppercase">{{ $course->name }}</p>
                <p class="text-muted text-monospace text-center text-uppercase">Start on {{ date('M d, Y') }} to {{ date('M d, Y', strtotime($course->duration .' months')) }}</p>

                {{-- Course Information --}}
                <h4 class="text-success text-uppercase">Course Information</h4>
                <p class="text-muted"><strong>Course Duration:</strong> {{ $course->duration }} Months</p>
                <p class="text-muted"><strong>Number of Units:</strong> {{ $course->units->count() }} Units</p>
                <p class="text-muted"><strong>Cost:</strong> Ksh. {{ number_format($course->pricing) }}</p>



                {{-- Course Objectives --}}
                <h4 class="text-success text-uppercase mt-5">Course Objectives</h4>
                <p>{{ $course->short_desc }}</p>

                {{-- About the course --}}
                <h4 class="text-success text-uppercase mt-5">About {{ $course->name }}</h4>
                {!! $course->desc !!}

                {{-- Units --}}
                <h4 class="text-success text-uppercase mt-5">Units to be Covered</h4>

                <ol>
                    @forelse ($course->units as $unit)
                        <li class="lead">{{ $unit->name }}</li>
                            <ul>
                                @forelse ($unit->topics as $topic)
                                    <li><strong>{{ $topic->name }}</strong></li>
                                        <ol>
                                            @forelse ($topic->lessons as $lesson)
                                                <li>{{ $lesson->title }}</li>
                                            @empty
                                                <li>No lesson found</li>
                                            @endforelse
                                        </ol>
                                @empty
                                    <li>Unit do not have a topic </li>
                                @endforelse
                            </ul>
                    @empty
                        <p class="lead">No unit(s) found</p>
                    @endforelse
                </ol>


            </div>
       </div>
    </section>
















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
