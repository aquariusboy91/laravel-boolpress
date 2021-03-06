@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    Create new post {{Auth::User()->id}}
                </h1>
                <form action="{{ route('admin.boolpresses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="category_id">
                        <option value="">Open this select menu</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="3"
                            name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <input class="btn btn-primary" type="submit" value="Salva">
                </form>
            </div>
        </div>
    </div>
@endsection