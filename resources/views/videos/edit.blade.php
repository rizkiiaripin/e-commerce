@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">
        <form action="/videos/{{ $video->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input name="video" placeholder="video" value="{{ $video->video }}" label="Video" type="file" required=""/>
            <x-form.input name="title" id="title" placeholder="judul" value="{{ $video->title }}" label="Judul" />
            <x-form.input name="slug" id="slug" placeholder="slug" value="{{ $video->slug }}" label="Slug" />
            <x-form.textarea name="description" placeholder="deskripsi" value="{{ $video->description }}" label="Deskripsi" />
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/videos" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
@push('script')
    <script>
        function generateSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '-')           // Ganti spasi jadi -
                .replace(/[^\w\-]+/g, '')       // Hapus karakter spesial
                .replace(/\-\-+/g, '-')         // Ganti multiple - jadi satu -
                .replace(/^-+/, '')             // Hapus - di awal
                .replace(/-+$/, '');            // Hapus - di akhir
        }
    
        document.addEventListener('DOMContentLoaded', function () {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');
    
            if (titleInput && slugInput) {
                titleInput.addEventListener('input', function () {
                    slugInput.value = generateSlug(titleInput.value);
                });
            }
        });
    </script>
    
@endpush
