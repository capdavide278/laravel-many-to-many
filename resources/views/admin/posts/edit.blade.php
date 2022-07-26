@extends('admin.layouts.base')

@section('mainContent')
    <h1>Edit post</h1>
    @method('PUT')
        @csrf

        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="content">Content</label>
            <input class="form-control @error('content') is-invalid @enderror" type="text" name="content" id="content" value="{{ old('content', $post->content) }}">
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="slug">Slug</label>
            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select @error('category') is-invalid @enderror" id="category" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="excerpt">Excerpt</label>
            <input class="form-control @error('excerpt') is-invalid @enderror" type="text" name="excerpt" id="excerpt" value="{{ old('excerpt', $post->excerpt) }}">
            @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
@endsection