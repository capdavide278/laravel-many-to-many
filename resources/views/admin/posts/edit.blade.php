@extends('admin.layouts.base')

@section('mainContent')
   {{--  <h1>Edit post</h1> --}}
   {{--  @method('PUT')
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
        </div> --}}
        <h1>Edit post</h1>
        <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="post" novalidate>
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title',$post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="slug">Slug</label>
                <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
                <button type="button" class="btn btn-primary">Reset</button>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="image">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="url" name="image" id="image" value="{{ old('image',$post->image) }}">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="category_id">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option @if(!old('category_id')) selected @endif disabled value="">Choose...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <fieldset class="mb-3">
                <legend>Tags</legend>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        {{-- ricordarsi di aggiungere [] al name per avere un array come valore di ritorno --}}
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="tags[]"
                            value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}"
                            @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->all()) ?: [])) checked @endif
                        >
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
    
                {{-- TODO: l'errore non si vede --}}
    {{--             @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}
    
                @foreach ($errors ->get('tags.*') as $message)
                    @foreach ($messages as $message)
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>               
                    @endforeach
                @endforeach
            </fieldset>
    
            <div class="mb-3">
                <label class="form-label" for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="excerpt">Excerpt</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
@endsection