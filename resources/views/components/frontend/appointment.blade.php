@auth
    @if (auth()->user()->role === 'user')
        <section id="appointment" class="appointment">
            <div class="page-section">
                <div class="container">
                    <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
                    <p class=" bg bg-primary">
                        @if (session('appointment_message'))
                            {{ session('appointment_message') }}
                        @endif
                    </p>
                    <form class="main-form" method="POST" action="{{ route('appointment') }}">
                        @csrf
                        <div class="row mt-5">
                            <!-- Full Name -->
                            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                                    required>
                            </div>

                            <!-- Email Address -->
                            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                <input type="email" name="email_address" class="form-control" placeholder="Email Address"
                                    required>
                            </div>

                            <!-- Submission Date -->
                            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                <input type="datetime-local" name="submission_date" class="form-control" required>
                            </div>

                            <!-- Department / Speciality -->
                            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                                <select name="speicality" class="form-select" required>
                                    <option value="">Select Department / Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->speciality }}">
                                            {{ $doctor->speciality }} --> {{ $doctor->doctors_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                <input type="tel" name="phone_number" class="form-control" placeholder="Phone Number"
                                    required>
                            </div>

                            <!-- Description / Message -->
                            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                <textarea name="description" class="form-control" rows="6" placeholder="Enter Message (Optional)"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary wow zoomIn">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif

@endauth
