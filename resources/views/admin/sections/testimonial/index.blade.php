@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Testimonials</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">
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
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($testimonial->user_image) }}" width="100">
                                        </td>
                                        <td>{{ $testimonial->user_name }}</td>
                                        <td>{{ $testimonial->user_title }}</td>
                                        <td>
                                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                                <i class="ti ti-star"></i>
                                            @endfor
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
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
