<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('permissions.permissions', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::with('children')
        ->whereNull('parent_id') // hanya ambil parent
        ->get();
        return view('permissions.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parent_name' => 'required|unique:permissions,name',
            'sub_permissions' => 'required|array',
            'sub_permissions.*' => 'required|string|distinct'
        ]);

        // 1. Buat parent permission
        $parent = Permission::create([
            'name' => $request->parent_name,
            'parent_id' => null,
        ]);

        // 2. Buat sub permission dengan parent_id
        foreach ($request->sub_permissions as $subName) {
            Permission::create([
                'name' => $subName,
                'parent_id' => $parent->id,
            ]);
        }

        return redirect('/permissions')->with('success', 'Parent Permission & Sub Permission is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findById($id);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::update([
            'name' => $request->name,
        ]);
        Permission::updated(['name' => $request->name]);


        return redirect('/permissions')->with('success', 'Permission is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
