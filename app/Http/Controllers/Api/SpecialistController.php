<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialist;

class SpecialistController extends Controller
{
    public function index()
    {
        return response()->json(Specialist::all());
    }
}