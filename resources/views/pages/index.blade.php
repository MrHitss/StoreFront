@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Pages List</h1>
        <a href="{{ route('pages.create') }}" class="btn btn-primary">Create New Page</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <a href="{{ route('pages.edit', $page->slug) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('pages.destroy', $page->slug) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($pages->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">No Records Found</td>
                </tr>
            @endif

            @if(!$pages->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">
                        {{ $pages->links() }}
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
