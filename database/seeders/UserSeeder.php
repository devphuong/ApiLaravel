<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'tr.phuong.dev@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

// chạy để add tk vào database
// php artisan db:seed --class=UserSeeder
