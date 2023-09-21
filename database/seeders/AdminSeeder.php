<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::query()->create([

            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>bcrypt('password')
        ]);
        $permissions=pession::all();


        $user->givePermissionto;
    }
}
