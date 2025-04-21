<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Models\Permission;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:view-role')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('roles.index', ['permissions' => $permissions, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::with('children')->get();
        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect('/roles')->with('success', 'Role is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role = Role::find($role->id);
        $permissions = Permission::with('children')->whereNull('parent_id')->get();
        return view('roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
        ]);
        $role->syncPermissions($request->permissions ?? []);
        redirect('/roles')->with('success', 'Role is created successfully');
        return redirect('/roles')->with('success', 'Role is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/roles')->with('success', 'Role is deleted successfully');
    }
}
