<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AppointmentOri;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            // Stay on the same page after login
            return view('user.home');
        } else {
            return redirect()->back()->with('success', 'Appointment scheduled successfully!');
        }
    }

    public function index()
    {
        return view('user.home');
    }

    public function saveAppointment(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'appointment_date' => 'required|date',
            'departement' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'nullable|string',
        ]);

        AppointmentOri::create([
            'patient_name' => $request->patient_name,
            'email' => $request->email,
            'appointment_date' => $request->appointment_date,
            'departement' => $request->departement,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Appointment scheduled successfully!');
    }
}

