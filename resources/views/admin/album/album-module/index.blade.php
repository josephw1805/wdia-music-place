@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Albums</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.albums.create') }}" class="btn btn-primary">
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
                                    <th>Price</th>
                                    <th>Artist</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($albums as $album)
                                    <tr>
                                        <td>{{ $album->title }}</td>
                                        <td>{{ $album->price }}</td>
                                        <td>{{ $album->artist->name }}</td>
                                        <td>
                                            @if ($album->is_approved == 'pending')
                                                <span class="badge bg-yellow text-yellow-fg">Pending</span>
                                            @elseif ($album->is_approved == 'approved')
                                                <span class="badge bg-green text-green-fg">Approved</span>
                                            @elseif ($album->is_approved == 'rejected')
                                                <span class="badge bg-red text-red-fg">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <select class="form-select update-approval-status"
                                                data-id="{{ $album->id }}">
                                                <option @selected($album->is_approved == 'pending') value="pending">Pending</option>
                                                <option @selected($album->is_approved == 'approved') value="approved">Approved</option>
                                                <option @selected($album->is_approved == 'rejected') value="rejected">Rejected</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.albums.edit', ['id' => $album->id, 'step' => 1]) }}"
                                                class="btn btn-info">
                                                <i class="ti ti-edit"></i>
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
                            {{ $albums->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/admin/album.js'])
@endpush
