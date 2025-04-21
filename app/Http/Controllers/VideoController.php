<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $video = new Video();
        $video->title = $request->input('title');
        $video->slug = $request->input('slug');
        $video->description = $request->input('description');
        $video->video = $request->file('video')->store('videos', 'public');
        $video->save();
        return redirect()->route('videos.index')->with('success', 'Video berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        if (!$video) {
            return redirect()->route('videos.index')->with('error', 'Video tidak ditemukan');
        }
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, Video $video)
    {
        $video->title = $request->input('title');
        $video->slug = $request->input('slug');
        $video->description = $request->input('description');
        if($request->hasFile('video')){
            $video->video = $request->file('video')->update('videos', 'public');
        }else{
            $video->video;
        }
        $video->update();
        return redirect()->route('videos.index')->with('success', 'Video berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        if ($video->video) {
            Storage::disk('public')->delete($video->video);
        }
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video berhasil dihapus');
    }
}
