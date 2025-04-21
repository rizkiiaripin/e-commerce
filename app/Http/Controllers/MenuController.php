<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menus.index');
    }
    /**
     * Show the data.
     */
    public function data()
    {
        $menus = Menu::orderBy('order')->get();
        return response()->json([
            'menus' => $menus,
            'success' => true,
            'message' => 'Menus retrieved successfully',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::with('children')->get();
        $types = Menu::select('type')->distinct()->get();
        return view('menus.create',[
            'permissions' => $permissions,
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'integer|exists:menus,id',
        ]);
        foreach ($request->orders as $index => $id) {
            Menu::where('id', $id)->update(['order' => $index + 1]);
        }
        $orders = Menu::orderBy('order')->get();
        

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully',
            'data' => $orders
        ]);
    }
}
