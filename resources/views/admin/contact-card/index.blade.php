@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Card</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.contact.create') }}" class="btn btn-primary">
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
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contactCards as $card)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($card->icon) }}" width="50">
                                        </td>
                                        <td>{{ $card->title }}</td>
                                        <td>
                                            @if ($card->status)
                                                <span class="badge bg-lime text-lime-fg">Active</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contact.edit', $card->id) }}" class="btn btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.contact.destroy', $card->id) }}"
                                                class="btn btn-danger delete-item">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data Available!</td>
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
