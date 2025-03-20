@extends('admin.setting.layout')
@section('setting-content')
    <div class="col-12 col-md-9 d-flex flex-column">
        <div class="card-body">
            <h3 class="card-title mt-4">Commission Settings</h3>
            <form action="{{ route('admin.commission-settings.update') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <x-input-block name="commission_rate" label="Artist Commission Rate Per Sale (%)" value="{{ config('settings.commission_rate') }}" />
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
