<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
                <meta name="description" content="Njena Accounting School">
                    <meta name="keywords" content="cpa, elearning, kasneb, icm, accounting, mbuci, financial, fa, revision, online cpa">
                <meta name="author" content="Nahashon Mbuci">
            <meta name="robots" content="noindex, nofollow">
        <title>@yield('title') | Njena</title>
        <!-- Include Header assets -->
        @include('layouts.admin.includes.header')

    </head>


<body>
    <!-- Preloader -->
  <!-- <div id="global-loader">
    <div class="whirly-loader"></div>
  </div> -->


  <div class="main-wrapper">
    
    <!-- Include the navabar -->
    @include('layouts.admin.includes.navbar')


    <!-- Include sidebar -->
    @include('layouts.admin.includes.sidebar')



    <div class="page-wrapper">
    <!-- Should yield the page heading -->
     


        <!-- Content should be place here -->
        @yield('content')
        

    </div>
  </div>

  <!-- Include scripts -->
  @include('layouts.admin.includes.scripts')

</body>
</html>