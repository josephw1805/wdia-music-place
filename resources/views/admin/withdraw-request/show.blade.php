@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Withdraw Details</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <tbody>
                                <tr>
                                    <td>Artist</td>
                                    <td>
                                        <div>{{ $withdraw->artist->name }}</div>
                                        <span>{{ $withdraw->artist->email }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Current Wallet Ballence</td>
                                    <td>{{ config('settings.currency_icon') }}{{ $withdraw->artist->wallet }}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{ config('settings.currency_icon') }}{{ $withdraw->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if ($withdraw->status == 'pending')
                                            <span class="badge bg-yellow text-yellow-fg">Pending</span>
                                        @elseif ($withdraw->status == 'rejected')
                                            <span class="badge bg-red text-red-fg">Rejected</span>
                                        @else
                                            <span class="badge bg-green text-green-fg">Approved</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <div class="alert alert-important alert-danger role="alert">After Updating the
                                            status, you can't
                                            revert the status.</div>
                                        <form action="{{ route('admin.withdraw-request.status.update', $withdraw->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-control">
                                                <label>Status</label>
                                                <select name="status" class="form-control"{{ $withdraw->status != 'pending' ? 'disabled' : '' }}>
                                                    <option value="">Select status</option>
                                                    <option @selected($withdraw->status == 'pending') value="pending">Pending</option>
                                                    <option @selected($withdraw->status == 'approved') value="approved">Approved</option>
                                                    <option @selected($withdraw->status == 'rejected') value="rejected">Rejected</option>
                                                </select>
                                                <div class="mt-3">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
