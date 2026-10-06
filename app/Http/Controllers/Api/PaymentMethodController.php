<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            PaymentMethod::where('user_id', $request->user()->id)->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'provider' => 'required|string',
            'account_name' => 'required|string',
            'last_digits' => 'required|string',
            'is_default' => 'boolean',
        ]);

        $validated['user_id'] = $request->user()->id;

        $payment = PaymentMethod::create($validated);

        return response()->json($payment, 201);
    }

    public function destroy(Request $request, $id)
    {
        $payment = PaymentMethod::where('user_id', $request->user()->id)->findOrFail($id);
        $payment->delete();

        return response()->json(['message' => 'Payment method dihapus']);
    }
}