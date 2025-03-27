@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Currency</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($orders as $order)
                                    <tr>
                                        <td>
                                            <div>{{ $order->customer->name }}</div>
                                            <small>{{ $order->customer->email }}</small>
                                        </td>
                                        <td>{{ $order->paid_amount }}</td>
                                        <td>{{ $order->currency }}</td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-yellow text-yello-fg">{{ $order->status }}</span>
                                            @else
                                                <span class="badge bg-green text-green-fg">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                class="btn btn-info">
                                                <i class="ti ti-eye"></i>
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
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
