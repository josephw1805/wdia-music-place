@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Album genres</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-genres.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i>
                            Add new
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($genres as $genre)
                                    <tr>
                                        <td>{{ $genre->name }}</td>
                                        <td>{{ $genre->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.album-genres.edit', $genre->id) }}"
                                                class="btn btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.album-genres.destroy', $genre->id) }}"
                                                class="btn btn-danger delete-item">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Data Available!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $genres->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
