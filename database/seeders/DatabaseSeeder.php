<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\HealthRecord;
use App\Models\Medicine;
use App\Models\Notification;
use App\Models\PopularSpecialist;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User tes khusus — buat login di Postman
        $testUser = User::create([
            'name' => 'Aji Tes',
            'email' => 'test@healthyme.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
            'birth_date' => '2003-05-10',
        ]);

        // 2. Specialists (9 sesuai desain, bukan random factory biar namanya pas)
        $specialistNames = [
            'Dokter Umum', 'Anak', 'Kulit', 'Penyakit Dalam',
            'THT', 'Kandungan', 'Paru-Paru', 'Psikologi',
        ];
        $specialists = collect($specialistNames)->map(
            fn ($name) => Specialist::create(['name' => $name])
        );
        Specialist::create(['name' => 'Lainnya', 'is_more' => true]);

        // 3. Doctors — 2-3 dokter per spesialis
        $doctors = collect();
        $specialists->each(function ($specialist) use (&$doctors) {
            $created = Doctor::factory()
                ->count(fake()->numberBetween(2, 3))
                ->create(['specialist_id' => $specialist->id]);
            $doctors = $doctors->merge($created);
        });

        // 4. Popular Specialists
        PopularSpecialist::create(['title' => 'Infeksi Pernapasan']);
        PopularSpecialist::create(['title' => 'Bapil Anak']);
        PopularSpecialist::create(['title' => 'Eksim']);
        PopularSpecialist::create(['title' => 'Infeksi Mata']);

        // 5. Articles
        Article::factory()->count(5)->create();

        // 6. Medicines
        Medicine::factory()->count(15)->create();

        // 7. Health record hari ini, khusus testUser
        HealthRecord::create([
            'user_id' => $testUser->id,
            'date' => now()->toDateString(),
            'water_liter' => 1.8,
            'steps' => 6420,
            'blood_glucose' => 98,
            'systolic' => 120,
            'diastolic' => 80,
        ]);

        // 8. Notifications, khusus testUser
        Notification::factory()->count(6)->create(['user_id' => $testUser->id]);

        // 9. Conversation + messages, khusus testUser dengan 1 dokter random
        $conversation = Conversation::create([
            'user_id' => $testUser->id,
            'doctor_id' => $doctors->random()->id,
        ]);
        \App\Models\Message::factory()->count(5)->create([
            'conversation_id' => $conversation->id,
        ]);
    }
}