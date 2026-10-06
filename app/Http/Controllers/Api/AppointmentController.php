<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::with('doctor')
            ->where('user_id', $request->user()->id)
            ->orderBy('date')
            ->get();

        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $appointment = Appointment::create([
            'user_id' => $request->user()->id,
            'doctor_id' => $validated['doctor_id'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'status' => 'scheduled',
        ]);

        return response()->json($appointment, 201);
    }
}