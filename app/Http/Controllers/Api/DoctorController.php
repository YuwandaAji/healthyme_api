<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // GET /api/specialists/{id}/doctors
    public function bySpecialist($specialistId)
    {
        $doctors = Doctor::where('specialist_id', $specialistId)->get();
        return response()->json($doctors);
    }

    public function show($id)
    {
        $doctor = Doctor::with('specialist')->findOrFail($id);
        return response()->json($doctor);
    }
}