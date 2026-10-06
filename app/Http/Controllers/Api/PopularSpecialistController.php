<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PopularSpecialist;

class PopularSpecialistController extends Controller
{
    public function index()
    {
        return response()->json(PopularSpecialist::all());
    }
}