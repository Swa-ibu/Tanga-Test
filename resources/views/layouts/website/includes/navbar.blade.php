 <!-- Start Navigation -->
 <div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('frontend/assets/img/logo.png') }}" class="logo" alt="{{ config('app.name') }}" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="{{ route('login') }}" class="crs_yuo12 w-auto text-white theme-bg">
                                <span class="embos_45"><i class="fas fa-sign-in-alt mr-1"></i>Sign In</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    <li class="{{ Route::is('/') ? 'active' : '' }}"><a href="{{ route('welcome') }}">Home</a></li>

                    <li class="{{ Route::is('course') ? 'active' : '' }}"><a href="{{ route('course') }}">Courses</a></li>

                    <li><a href="#">Course Categories<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            @forelse ($categories as $category)
                                <li><a href="{{ route('course-category', $category->slug) }}">{{ $category->name }}</a></li>
                            @empty
                                <li><a href="#">No Course Category Found</a></li>
                            @endforelse
                        </ul>
                    </li>

                    <li class="{{ Route::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>

                    <li class="{{ Route::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>

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
