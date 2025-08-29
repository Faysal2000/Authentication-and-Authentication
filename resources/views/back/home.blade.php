@extends('back.master')


@section('title', 'Back Home Page')
@section('contect')


    <div class="container">
        <div class="booking-container">
            <div class="booking-header">
                <h2><i class="bi bi-calendar-check"></i> Appointment Booking</h2>
                <p class="mb-0">Book your appointment in a few simple steps</p>
            </div>

            <div class="booking-steps position-relative">
                <div class="step active" data-step="1">
                    <div class="step-number">1</div>
                    <div class="step-title">Category</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-number">2</div>
                    <div class="step-title">Service</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-number">3</div>
                    <div class="step-title">Staff</div>
                </div>
                <div class="step" data-step="4">
                    <div class="step-number">4</div>
                    <div class="step-title">Date & Time</div>
                </div>
                <div class="step" data-step="5">
                    <div class="step-number">5</div>
                    <div class="step-title">Confirm</div>
                </div>
                <div class="progress-bar-steps">
                    <div class="progress"></div>
                </div>
            </div>

            <div class="booking-content">
                <!-- Step 1: Category Selection -->
                <div class="booking-step active" id="step1">
                    <h3 class="mb-4">Select a Category</h3>
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="categories-container">
                        <!-- Categories will be inserted here by jQuery -->
                    </div>
                </div>

                <!-- Step 2: Service Selection -->
                <div class="booking-step" id="step2">
                    <h3 class="mb-4">Select a Service</h3>
                    <div class="selected-category-name mb-3 fw-bold"></div>
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="services-container">
                        <!-- Services will be loaded dynamically based on category -->
                    </div>
                </div>

                <!-- Step 3: Employee Selection -->
                <div class="booking-step" id="step3">
                    <h3 class="mb-4">Select a Staff Member</h3>
                    <div class="selected-service-name mb-3 fw-bold"></div>
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="employees-container">
                        <!-- Employees will be loaded dynamically based on service -->
                    </div>
                </div>

                <!-- Step 4: Date and Time Selection -->
                <div class="booking-step" id="step4">
                    <h3 class="mb-4">Select Date & Time</h3>
                    <div class="selected-employee-name mb-3 fw-bold"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-secondary" id="prev-month"><i
                                            class="bi bi-chevron-left"></i></button>
                                    <h5 class="mb-0" id="current-month">March 2023</h5>
                                    <button class="btn btn-sm btn-outline-secondary" id="next-month"><i
                                            class="bi bi-chevron-right"></i></button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-calendar">
                                        <thead>
                                            <tr>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tue</th>
                                                <th>Wed</th>
                                                <th>Thu</th>
                                                <th>Fri</th>
                                                <th>Sat</th>
                                            </tr>
                                        </thead>
                                        <tbody id="calendar-body">
                                            <!-- Calendar will be generated dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Available Time Slots</h5>
                                    <div id="selected-date-display" class="text-muted small"></div>
                                </div>
                                <div class="card-body">
                                    <div id="time-slots-container" class="d-flex flex-wrap">
                                        <!-- Time slots will be loaded dynamically -->
                                        <div class="text-center text-muted w-100 py-4">
                                            Please select a date to view available times
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Confirmation -->
                <div class="booking-step" id="step5">
                    <h3 class="mb-4">Confirm Your Booking</h3>
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Booking Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="summary-item">
                                <div class="row">
                                    <div class="col-md-4 text-muted">Category:</div>
                                    <div class="col-md-8" id="summary-category"></div>
                                </div>
                            </div>
                            <div class="summary-item">
                                <div class="row">
                                    <div class="col-md-4 text-muted">Service:</div>
                                    <div class="col-md-8" id="summary-service"></div>
                                </div>
                            </div>
                            <div class="summary-item">
                                <div class="row">
                                    <div class="col-md-4 text-muted">Staff Member:</div>
                                    <div class="col-md-8" id="summary-employee"></div>
                                </div>
                            </div>
                            <div class="summary-item">
                                <div class="row">
                                    <div class="col-md-4 text-muted">Date & Time:</div>
                                    <div class="col-md-8" id="summary-datetime"></div>
                                </div>
                            </div>
                            <div class="summary-item">
                                <div class="row">
                                    <div class="col-md-4 text-muted">Duration:</div>
                                    <div class="col-md-8" id="summary-duration"></div>
                                </div>
                            </div>
                            <div class="summary-item">
                                <div class="row">
                                    <div class="col-md-4 text-muted">Price:</div>
                                    <div class="col-md-8" id="summary-price"></div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5>Your Information</h5>
                                <form id="customer-info-form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="customer-name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="customer-name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="customer-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="customer-email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="customer-phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="customer-phone" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="customer-notes" class="form-label">Notes (Optional)</label>
                                            <textarea class="form-control" id="customer-notes" rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="booking-footer">
                <button class="btn btn-outline-secondary" id="prev-step" disabled>
                    <i class="bi bi-arrow-left"></i> Previous
                </button>
                <button class="btn btn-primary" id="next-step">
                    Next <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>




@endsection
