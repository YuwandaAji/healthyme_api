<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // ambil history chat per conversation
    public function index(Request $request, $conversationId)
    {
        $conversation = Conversation::where('user_id', $request->user()->id)
            ->findOrFail($conversationId);

        $messages = Message::where('conversation_id', $conversation->id)
            ->oldest()
            ->get();

        return response()->json($messages);
    }

    public function store(Request $request, $conversationId)
    {
        $conversation = Conversation::where('user_id', $request->user()->id)
            ->findOrFail($conversationId);

        $validated = $request->validate([
            'type' => 'required|in:text,voice',
            'content' => 'required_if:type,text|string|nullable',
            'voice_url' => 'required_if:type,voice|string|nullable',
            'voice_duration' => 'required_if:type,voice|integer|nullable',
        ]);

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_type' => 'user',
            'type' => $validated['type'],
            'content' => $validated['content'] ?? null,
            'voice_url' => $validated['voice_url'] ?? null,
            'voice_duration' => $validated['voice_duration'] ?? null,
        ]);

        return response()->json($message, 201);
    }
}