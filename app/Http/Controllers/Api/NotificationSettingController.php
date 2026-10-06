<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NotificationSetting;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
    public function show(Request $request)
    {
        $setting = NotificationSetting::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['push_enabled' => true, 'email_enabled' => true, 'appointment_reminder' => true]
        );

        return response()->json($setting);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'push_enabled' => 'boolean',
            'email_enabled' => 'boolean',
            'appointment_reminder' => 'boolean',
        ]);

        $setting = NotificationSetting::updateOrCreate(
            ['user_id' => $request->user()->id],
            $validated
        );

        return response()->json($setting);
    }
}