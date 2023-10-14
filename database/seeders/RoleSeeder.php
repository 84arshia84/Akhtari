<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'superAdmin']);
        $Admin = Role::create(['name' => 'Admin']);
        $customer = Role::create(['name' => 'customer']);


        $superAdmin->givPermissionTo(['user.delete', 'users.all', 'user.find', 'user.update', 'user.add', 'login'
            , 'register_user', 'logout', 'product.add', 'product.delete', 'product.all', 'product.find', 'product.update'
            , 'order.add', 'order.all', 'order.delete', 'order.find', 'roles.all', 'roles.add', 'postAssignRole', 'permissions'
            , 'permission.all', 'permissions.add',
        ]);

        $Admin->givPermissionTo(['users.all', 'user.find', 'login'
            , 'register_user', 'logout', 'product.add', 'product.delete', 'product.all', 'product.find', 'product.update'
            , 'order.add', 'order.all', 'order.delete', 'order.find', 'roles.all',
        ]);


        $customer->givPermissionTo(['login', 'register_user', 'logout', 'product.add', 'product.all', 'product.find'

        ]);
    }
}

