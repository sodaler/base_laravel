@extends('layouts.admin')
@section('content')
    <div>
        <form action="{{ route('admin.post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input
                    value="{{ old('title') }}"
                    type="text" name="title" class="form-control" id="title" placeholder="Enter title">

                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Enter content">{{ old('content') }}</textarea>
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="image">Image</label>
                <input
                    value="{{ old('image') }}"
                    type="text" class="form-control" name="image" id="image" placeholder="Enter image">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? ' selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="mt-2 btn btn-primary">Create</button>
        </form>
    </div>
@endsection
