@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Review</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Album</th>
                                    <th>User</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th></th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td>
                                            <div>{{ $review->album->title }}</div>
                                            <div class="text-muted">{{ $review->album->artist->name }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $review->user->name }}</div>
                                            <div class="text-muted">{{ $review->user->email }}</div>
                                        </td>
                                        <td style="max-width: 400px;">{{ $review->review }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>
                                            @if ($review->status)
                                                <span class="badge bg-lime text-lime-fg">Approved</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control"onchange="this.form.submit()">
                                                    <option @selected($review->status == 0) value="0">Pending</option>
                                                    <option @selected($review->status == 1) value="1">Approved</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.reviews.destroy', $review->id) }}"
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
