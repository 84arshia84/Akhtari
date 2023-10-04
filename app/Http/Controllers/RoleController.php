<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function all_roles()
    {
        $roles = Role::get();
        return response()->json($roles);
    }
    public function add_roles(Request $request)
    {
        Role::create(['name' => $request->name]);
        return response()->json('Role Created');
    }
    public function all_permissions()
    {
        $permissions = Permission::get();
        return response()->json($permissions);
    }
    public function add_Permission(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return response()->json('Permission Created');
    }
    public function getAssignRole()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return response()->json([$roles,$permissions]);
    }

    public function postAssignRole(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);

        $role->givePermissionTo($permission);
        return response()->json('successfully role assigned');
        //$role->syncpermissions with checkbox
    }

}
