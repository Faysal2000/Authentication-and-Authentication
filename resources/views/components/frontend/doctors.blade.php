 <!-- Doctors Section -->
 <section id="doctors" class="doctors section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
         <h2>Doctors</h2>
     </div><!-- End Section Title -->

     <div class="container">

         <div class="row gy-4">
             @foreach ($doctors as $doctor)
                 <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                     <div class="team-member d-flex align-items-start">
                         <div class="pic">
                             <img src="{{ asset('project_img/' . $doctor->doctors_image) }}" class="img-fluid"
                                 alt="{{ $doctor->doctors_name }}">
                         </div>
                         <div class="member-info">
                             <h4>{{ $doctor->doctors_name }}</h4>
                             <p>Doctor's Phone: {{ $doctor->doctors_phone }}</p>
                             <span>{{ $doctor->speciality }}</span>
                             <p>Room No: {{ $doctor->room_number }}</p>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>

     </div>

 </section><!-- /Doctors Section -->
