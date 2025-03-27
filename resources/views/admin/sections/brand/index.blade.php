@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Brand</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
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
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($brand->image) }}" width="100">
                                        </td>
                                        <td>
                                            @if ($brand->status)
                                                <span class="badge bg-lime text-lime-fg">Active</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.brand.destroy', $brand->id) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
