  <header id="header" class="header sticky-top">

      <div class="topbar d-flex align-items-center">
          <div class="container d-flex justify-content-center justify-content-md-between">

              <div class="social-links d-none d-md-flex align-items-center">

              </div>
          </div>
      </div><!-- End Top Bar -->


      <div class="branding d-flex align-items-center">

          <div class="container position-relative d-flex align-items-center justify-content-between">
              <a href="index.html" class="logo d-flex align-items-center me-auto">
                  <!-- Uncomment the line below if you also wish to use an image logo -->
                  <!-- <img src="{{ asset('frontend/assets/img/logo.png') }}" alt=""> -->
                  <h1 class="sitename">Medilab</h1>
              </a>

              <nav id="navmenu" class="navmenu">
                  <ul>
                      <li><a href="#hero" class="active">Home<br></a></li>
                      <li><a href="#about">About</a></li>
                      <li><a href="#services">Services</a></li>
                      <li><a href="#departments">Departments</a></li>
                      <li><a href="#doctors">Doctors</a></li>

                      {{-- يظهر فقط للمستخدم العادي --}}
                      @can('appointments.create')
                          <a href="{{ route('appointments.create') }}" class="btn btn-primary">إضافة موعد</a>
                      @endcan


                      @if (!Auth::check())
                          {{-- المستخدم مش مسجل دخول --}}
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                          {{-- المستخدم مسجل دخول --}}
                          @if (Auth::user()->role === 'admin')
                              <li><a href="{{ route('dashboard') }}">Admin Dashboard</a></li>
                          @elseif (Auth::user()->role === 'doctor')
                              <li><a href="{{ '#' }}">Doctor Dashboard</a></li>
                          @endif

                          {{-- زر تسجيل الخروج --}}
                          <li>
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <x-dropdown-link :href="route('logout')"
                                      onclick="event.preventDefault(); this.closest('form').submit();">
                                      {{ __('Log Out') }}
                                  </x-dropdown-link>
                              </form>
                          </li>
                      @endif
                  </ul>

                  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
              </nav>



          </div>

      </div>

  </header>
