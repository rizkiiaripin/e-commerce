<?php

namespace App\Livewire;

use App\Models\Blog as ModelBlog;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithFileUploads ,WithPagination ;
    
    public $image ;
    public $category_id;
    public $title ;
    public $editId ;
    public $editForm = false ;
    public $description ;
    public function create(){
        $this->resetfield();
    }
    public function store(){
        $this->validate([
            'image' => 'required|image|max:1024', // 1MB Max
            'category_id' => 'required',  
            'title' => 'required',  
            'description' => 'required',  
        ]);
        $imagePath = $this->image->store('images/blogs', 'public');
        ModelBlog::create([
            'image' => $imagePath,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
        ]);
        $this->reset();
    }
    public function update($id){
        $blog = ModelBlog::find($id);
        $this->validate([
            'category_id' => 'required',  
            'title' => 'required',  
            'description' => 'required',  
        ]);
        $imagePath = $blog->image;
        ModelBlog::create([
            'image' => $imagePath,
            'category_id' => $blog->category_id,
            'title' => $blog->title,
            'description' => $blog->description,
        ]);
        session()->flash('success','updated');
    }

    public function delete($id){
        $blog = ModelBlog::find($id);
        if ($blog) {
            // Delete the image from storage
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->delete();
        }
    }

    public function edit($id){
        $blog = ModelBlog::find($id);
        $this->image = $blog->image;
        $this->category_id = $blog->category_id;
        $this->description = $blog->description;
        $this->title = $blog->title;
        $this->editId = $blog->id;
        $this->editForm = true;

    }
    public function resetfield(){
        $this->image = '';
        $this->category_id = '';
        $this->description = '';
        $this->title = '';
        $this->editId = '';
        $this->editForm = false;
    }
    public function render()
    {
        $blogs = ModelBlog::paginate(3);
        return view('livewire.blogs', compact('blogs'));
    }
}
