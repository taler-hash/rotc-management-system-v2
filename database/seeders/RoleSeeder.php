<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'MS01',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'MS02',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'MS31',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'MS32',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'MS41',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'MS42',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'S1',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'S2',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'S3',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'S4',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'S7',
                'guard_name' => 'web' 
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web' 
            ],
        ]);
    }
}
