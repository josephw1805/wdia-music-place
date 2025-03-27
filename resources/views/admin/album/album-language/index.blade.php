@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Album Languages</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-languages.create') }}" class="btn btn-primary">
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

                                @forelse ($languages as $language)
                                    <tr>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.album-languages.edit', $language->id) }}"
                                                class="btn btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.album-languages.destroy', $language->id) }}"
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
                            {{ $languages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
