<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function roles()
    {
        $roles=Role::get();
        return view('role.list',compact('roles'));
    }
    public function getCreateRole()
    {
        return view('role.create');
    }
    public function postCreateRole(Request $request)
    {
        Role::create(['name'=>$request->name]);
        return redirect()->back()->with(['message'=>'Role Created']);
    }
    public function getCreatePermission()
    {
        return view('permission.create');
    }
    public function postCreatePermission(Request$request)
    {
        Permission::create(['name'=>$request->name]);
        return redirect()->back()->with(['message'=>'Permission Create']);
    }
    public function Permission()
    {
        $permission=Permission::get();
        return view('permission.list',compact('permission'));

    }

}
