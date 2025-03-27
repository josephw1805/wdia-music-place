@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Payout gateway</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.payout-gateway.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.payout-gateway.update', $payout_gateway->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input-block name="name" placeholder="Enter Gateway name"
                            value="{{ $payout_gateway->name }}" />
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="5" class="form-control" style="resize: none;">{!! $payout_gateway->description !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <select name="status" class="form-control">
                                <option value="1" @selected($payout_gateway->status === 1)>Active</option>
                                <option value="0" @selected($payout_gateway->status === 0)>InActive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit"><i class="ti ti-device-floppy"></i>
                                Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
