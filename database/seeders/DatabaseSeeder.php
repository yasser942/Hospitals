<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Replace 'email@example.com' with the desired email for the user
        $email = 'test@gmail.com';

        // Replace 'YourDesiredUsername' with the desired username for the user
        $username = 'YASSER EL HASAN';

        // Replace '2y$10$GZLPGHIUC95wjXmFNSQWb.4X14wY2dzvOTfRro7aY7wO/ZzuIx2p6' with the provided hashed password
        $hashedPassword = '$2y$10$SHzvHYqaCjO5dPoACb079u5rxSWu6ahuDMRumQCYhYKWtK1LSkove';

        DB::table('admins')->insert([
            'email' => $email,
            'name' => $username,
            'password' => $hashedPassword,
            // Add other columns if needed
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       $this->call([

           AppointmentSeeder::class,
           SectionTableSeeder::class,
           DoctorTableSeeder::class,
           ImageTableSeeder::class,

       ]);
    }
}
