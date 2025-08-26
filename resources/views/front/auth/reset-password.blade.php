@section('titlte', 'reset password Page')


<!DOCTYPE html>


<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

@include('front.partials.authHead')

<body>
    <!-- Content -->


    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        @include('front.partials.authLogo')
                        <!-- /Logo -->
                        <h4 class="mb-2">Reset Password 🔒</h4>


                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form id="formAuthentication" class="mb-3" action="{{ route('password.store') }}"
                            method="POST">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label for="email" class="form-label" :value="__('Email')">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" :value="old('email', $request->email)" required
                                    autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>


                            {{-- PASSOWRD --}}

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password"
                                    :value="__('Confirm Password')">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>


                            {{-- CONFIRM PASSOWRD --}}

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password" :value="__('Confirm Password')">Confirm
                                    Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                            </div>

                            <button class="btn btn-primary d-grid w-100">Reset Password</button>
                        </form>





                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>


    <!-- / Content -->

    @include('front.partials.authScripts')
</body>

</html>
