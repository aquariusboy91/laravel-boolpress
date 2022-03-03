@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    Categories
                </h1>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th colspan="3" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td><a class="btn btn-primary"
                                    href="{{ route('admin.categories.show', $category->id) }}">View</a>
                            </td>
                            <td><a class="btn btn-primary"
                                    href="{{ route('admin.categories.create', $category->id) }}">Create</a>
                            </td>
                            <td><a class="btn btn-info" href="{{ route('admin.categories.edit', $category) }}">Modify</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">{{ $categories->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection