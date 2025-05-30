<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::with('children')
            ->whereNull('parent_id') // hanya ambil parent
            ->get();
        return view('permissions.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
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

        return redirect('/permissions')->with('success', 'Parent Permission & Permission is created successfully');
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
    public function update(UpdatePermissionRequest $request, string $id)
    {

        //update parent permission
        $permission = Permission::find($id);
        // 1. Buat parent permission
         $permission->update([
            'name' => $request->permission_name,
        ]);
        return redirect('dashboard/permissions')->with('success', 'Permission is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Hapus semua sub permission
        $subPermissions = Permission::where('parent_id', $id)->get();
        foreach ($subPermissions as $subPermission) {
            $subPermission->delete();
        }
        // 2. Hapus parent permission
        $permission = Permission::find($id);
        if (!$permission) {
            return redirect('/permissions')->with('error', 'Permission not found');
        }
        $permission->delete();
        return redirect('/permissions')->with('success', 'Permission is deleted successfully');
    }
}
