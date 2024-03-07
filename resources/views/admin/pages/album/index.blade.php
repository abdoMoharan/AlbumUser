@extends('admin.dashboard')
@section('content')
@section('title', 'Albums')
@section('title_page', 'All Albums')
<div class="container  ">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.albums.create') }}" class="btn btn-outline-primary btn-sm float-end">Create Album</a>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <p class="card-text">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($albums as $album)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $album->name }}</td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $album->id }}">
                                    view image<i class='bx bx-image-alt'></i>
                                </a>
                                @include('admin.pages.album.image_album')
                            </td>
                            <td>
                                <a href="{{ route('admin.albums.edit', $album->id) }}"
                                    class="btn btn-outline-warning btn-sm">Edit</a>
                                <a  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $album->id }}"
                                    class="btn btn-outline-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @include('admin.pages.album.delete')
                    @empty
                        <tr>
                            <th colspan="4" class="text-center text-danger">Not Found Data</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            </p>
        </div>

        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>

</div>
@endsection

