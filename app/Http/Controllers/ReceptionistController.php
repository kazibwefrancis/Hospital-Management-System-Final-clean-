<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\AppointmentOri;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    // Display the Register Patient form
    public function registerPatient()
    {
        return view('admin.receptionist.register-patient'); 
    }

    // Save a new patient
    public function savePatient(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'phone' => 'nullable|string|max:15',
                'email' => 'nullable|email|unique:patients,email',
                'address' => 'nullable|string|max:255',
            ]);

            // Debugging: Log the validated data
            Log::info('Validated Patient Data:', $validatedData);

            // Save the patient to the database
            Patient::create($validatedData);

            // Redirect back with a success message
            return redirect()->route('register.patient')->with('success', 'Patient registered successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error saving patient: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to register patient. Please try again.');
        }
    }

    // Display the list of bills
    public function viewBills()
    {
        // Fetch all invoices with their related patient data
        $bills = Invoice::with('patient')->get();

        // Pass the data to the view
        return view('admin.receptionist.view_bills', compact('bills'));
    }

    // Print a bill for a specific patient
    public function printBill($id)
    {
        // Fetch the invoice with the related patient data
        $bill = Invoice::with('patient')->findOrFail($id);

        // Load the view and pass the data
        $pdf = Pdf::loadView('admin.receptionist.bill_pdf', compact('bill'));

        // Return the generated PDF for download
        return $pdf->download('bill_' . $bill->id . '.pdf');
    }

    // Display the Schedule Appointment form
    public function scheduleAppointment()
    {
        return view('receptionist.schedule-appointment'); // Create this view for scheduling appointments
    }

    // Display the list of appointments
    public function viewAppointments()
    {
        // Fetch all appointments from the database
        $appointments = AppointmentOri::all();

        // Pass the data to the view
        return view('admin.receptionist.view_appointments', compact('appointments'));
    }

    public function confirmAppointment($id)
    {
        $appointment = AppointmentOri::findOrFail($id);

        // Send confirmation email
        Mail::raw(
            "Greetings {$appointment->patient_name}, your appointment has been set. Please keep time.",
            function ($message) use ($appointment) {
                $message->to($appointment->email)
                        ->subject('Appointment Confirmation');
            }
        );

        return redirect()->back()->with('success', 'Appointment confirmed and email sent.');
    }

    public function rejectAppointment($id)
    {
        $appointment = AppointmentOri::findOrFail($id);

        // Send rejection email
        Mail::raw(
            "Unfortunately, we can't honor your appointment. Please contact us on 08009092920.",
            function ($message) use ($appointment) {
                $message->to($appointment->email)
                        ->subject('Appointment Rejection');
            }
        );

        return redirect()->back()->with('success', 'Appointment rejected and email sent.');
    }
}
