<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success text-center mt-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Disclaimer --}}
        <p class="text-center text-muted mt-3">
            <strong>Disclaimer:</strong> Appointment hours are between <strong>8:00 AM</strong> and <strong>12:00 PM</strong>. Please ensure your selected time falls within this range.
        </p>

        <form class="main-form" action="{{ route('save.appointment') }}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="patient_name" class="form-control" placeholder="Full name" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" name="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="appointment_date" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="departement" id="departement" class="custom-select" required>
                        <option value="general">General Health</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="dental">Dental</option>
                        <option value="neurology">Neurology</option>
                        <option value="orthopaedics">Orthopaedics</option>
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div>
