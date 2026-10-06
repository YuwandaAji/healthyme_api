<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HealthRecord;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    // ambil data hari ini
    public function index(Request $request)
    {
        $record = HealthRecord::where('user_id', $request->user()->id)
            ->where('date', now()->toDateString())
            ->first();

        return response()->json($record);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'water_liter' => 'required|numeric',
            'steps' => 'required|integer',
            'blood_glucose' => 'required|string',
            'systolic' => 'required|integer',
            'diastolic' => 'required|integer',
        ]);

        $record = HealthRecord::updateOrCreate(
            ['user_id' => $request->user()->id, 'date' => now()->toDateString()],
            $validated
        );

        return response()->json($record);
    }
}