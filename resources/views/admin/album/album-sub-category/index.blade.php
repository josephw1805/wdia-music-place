@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $album_category->name }}</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-categories.index') }}"
                            class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                        <a href="{{ route('admin.album-sub-categories.create', $album_category->id) }}"
                            class="btn btn-primary">
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
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Trending</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($sub_cat as $cat)
                                    <tr>
                                        <td><i class="{{ $cat->icon }}"></i></td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            @if ($cat->show_at_trending)
                                                <span class="badge bg-lime text-lime-fg">Yes</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($cat->status)
                                                <span class="badge bg-lime text-lime-fg">Yes</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.album-sub-categories.edit', ['album_category' => $cat->parent_id, 'album_sub_category' => $cat->id]) }}"
                                                class="btn btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.album-sub-categories.destroy', ['album_category' => $cat->parent_id, 'album_sub_category' => $cat->id]) }}"
                                                class="btn btn-danger delete-item">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Data Available!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
