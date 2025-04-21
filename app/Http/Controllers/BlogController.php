<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;
// use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:view-blog')->only('index');
        // $this->middleware('can:create-blog')->only('create', 'store');
        // $this->middleware('can:edit-blog')->only('edit', 'update');
        // $this->middleware('can:delete-blog')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //give data to ajax
        if (request()->ajax()) {
            $blogs = Blog::get();
            return response()->json([
            'categories' => [['id' => 1,'name' => 'fruit'], ['id' => 2 ,'name' => 'red']],
                'blogs' => $blogs,
                'success' => true,
                'message' => 'Data retrieved successfully',
            ]);
        }
        return view('blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|max:1024', // 1MB Max
        //     'category_id' => 'required',  
        //     'title' => 'required',  
        //     'description' => 'required',  
        // ]);
        $imagePath = $request->image->store('images/blogs', 'public');
        $blog = Blog::create([
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Blog created successfully',
            'blog' => $blog,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        return response()->json([
            'categories' => [['id' => 1,'name' => 'fruit'], ['id' => 2 ,'name' => 'red']],
            'blogs' => $blog,
            'success' => true,
            'message' => 'Data retrieved successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
