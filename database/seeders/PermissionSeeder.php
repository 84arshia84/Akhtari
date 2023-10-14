<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        $permissions = ['delete_user', 'all_users', 'find_user', 'update_user', 'add_user', 'login',
//            'register_user', 'logout', 'add_product', 'delete_product', 'all_product', 'find_product',
//            'update_product', 'add_order', 'all_order', 'delete_order', 'find_order', 'all_roles', 'add_roles',
//            'postAssignRole', 'permissions', 'all_permission', 'add_permissions'
//        ];
//        // Loop through the permissions and create them with the api guard
//        foreach ($permissions as $permission) {
//            Permission::create(['name' => $permission, 'guard_name' => 'api']);
//        }
//
//            // Create the SuperAdmin role and assign all permissions to it
//            $SuperAdmin = \Spatie\Permission\Models\Role::create(["name" => "SuperAdmin", "guard_name" => "api"]);
//            $SuperAdmin->givePermissionTo(Permission::all());
//        }
//
//
//}

//        Permission::insert([
//            ['name' => 'delete_user'],
//            ['name' => 'all_users'],
//            ['name' => 'find_user'],
//            ['name' => 'update_user'],
//            ['name' => 'add_user'],
//
//            ['name' => 'login'],
//            ['name' => 'register_user'],
//            ['name' => 'logout'],
//
//            ['name' => 'add_product'],
//            ['name' => 'delete_product'],
//            ['name' => 'all_product'],
//            ['name' => 'find_product'],
//            ['name' => 'update_product'],
//
//            ['name' => 'add_order'],
//            ['name' => 'all_order'],
//            ['name' => 'delete_order'],
//            ['name' => 'find_order'],
//
//            ['name' => 'all_roles'],
//            ['name' => 'add_roles'],
//            ['name' => 'postAssignRole'],
//
//            ['name' => 'permissions'],
//            ['name' => 'all_permission'],
//            ['name' => 'add_permissions'],
//            ['name' => 'delete_user'],
//        ]);


        Permission::create(['name'=>'user.delete']);
        Permission::create(['name'=>'users.all']);
        Permission::create(['name'=>'user.find']);
        Permission::create(['name'=>'user.update']);
        Permission::create(['name'=>'user.add']);

        Permission::create(['name'=>'login']);
        Permission::create(['name'=>'register_user']);
        Permission::create(['name'=>'logout']);

        Permission::create(['name'=>'product.add']);
        Permission::create(['name'=>'product.delete']);
        Permission::create(['name'=>'product.all']);
        Permission::create(['name'=>'product.find']);
        Permission::create(['name'=>'product.update']);

        // order.*

        Permission::create(['name'=>'order.add']);
        Permission::create(['name'=>'order.all']);
        Permission::create(['name'=>'order.delete']);
        Permission::create(['name'=>'order.find']);

        Permission::create(['name'=>'roles.all']);
        Permission::create(['name'=>'roles.add']);
        Permission::create(['name'=>'postAssignRole']);

        Permission::create(['name'=>'permissions']);
        Permission::create(['name'=>'permission.all']);
        Permission::create(['name'=>'permissions.add']);
    }}

