<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dob = Carbon::parse('1999-11-30');
        User::create([
            'username' => 'admin',
            'name' => 'Jurie Tylier, Pedrogas',
            'email' => 'juriepedrogas@gmail.com',
            'birthdate' => $dob,
            'age' => $dob->age,
            'religion' => 'Roman Catholic',
            'password' => Hash::make('password')
        ])
        ->assignRole('Admin');
    }
}
