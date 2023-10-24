<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * @var User $user
     */
    public function run(): void
    {
        $user = User::query()->create([

            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make("password"),
            'phone_number' => (+989122221976),
            'family' => 'Akhtari',

        ]);
        $user->assignRole('superAdmin');
//        $permissions=Permission::all();

//        $user->givePermissionTo(['delete_user',]);

    }
}
