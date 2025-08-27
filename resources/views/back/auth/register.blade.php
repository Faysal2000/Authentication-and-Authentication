@section('titlte', 'Register Page')


<!DOCTYPE html>


<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

@include('front.partials.authHead')

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        @include('back.partials.authLogo')
                        <!-- /Logo -->

                        <p class="mb-4">The password must contain at least one letter, one number, and one special
                            character (e.g. #).</p>


                        <div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />


                        </div>

                        <form id="formAuthentication" class="mb-3" action="{{ route('back.register') }}"
                            method="POST">
                            @csrf

                            {{-- NAME --}}

                            <div class="mb-3">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" class="form-control" id="username" name="name"
                                    placeholder="Enter your name" :value="old('name')" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            </div>

                            {{-- EMAIL --}}

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" :value="old('email')" />
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
                                {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}

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


                            <button class="btn btn-primary d-grid w-100">Sign up</button>
                        </form>

                        <p class="text-center">

                            <a href="auth-login-basic.html">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                            </a>

                        </p>
                    </div>


                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    @include('front.partials.authScripts')
</body>

</html>
