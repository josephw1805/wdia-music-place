@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Withdraw Requests</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Artist</th>
                                    <th>Payout Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdraws as $withdraw)
                                    <tr>
                                        <td>{{ $withdraw->artist->name }}</td>
                                        <td>{{ config('settings.currency_icon') }}{{ $withdraw->amount }}</td>
                                        <td>
                                            @if ($withdraw->status == 'pending')
                                                <span class="badge bg-yellow text-yellow-fg">Pending</span>
                                            @elseif ($withdraw->status == 'rejected')
                                                <span class="badge bg-red text-red-fg">Rejected</span>
                                            @else
                                                <span class="badge bg-green text-green-fg">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.withdraw-request.show', $withdraw->id) }}"
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
                            {{ $withdraws->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
