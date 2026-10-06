<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $conversations = Conversation::with('doctor')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json($conversations);
    }

    // buat/ambil conversation dengan dokter tertentu
    public function getOrCreate(Request $request)
    {
        $validated = $request->validate(['doctor_id' => 'required|exists:doctors,id']);

        $conversation = Conversation::firstOrCreate([
            'user_id' => $request->user()->id,
            'doctor_id' => $validated['doctor_id'],
        ]);

        return response()->json($conversation);
    }
}