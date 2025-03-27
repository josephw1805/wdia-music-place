@extends('admin.setting.layout')
@section('setting-content')
    <div class="col-12 col-md-9 d-flex flex-column">
        <div class="card-body">
            <h3 class="card-title mt-4">General Settings</h3>
            <form action="{{ route('admin.general-settings.update') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <x-input-block name="site_name" label="Site Name" value="{{ config('settings.site_name') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input-block name="phone" value="{{ config('settings.phone') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input-block name="location" value="{{ config('settings.location') }}" />
                    </div>
                    <div class="col-md-6">
                        <div class="form-label">Site Default Currency</div>
                        <select name="default_currency" class="form-control">
                            <option value="">Select default currency</option>
                            @foreach (config('gateway_currency.all_currencies') as $key => $value)
                                <option @selected(config('settings.default_currency') == $value) value="{{ $value }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <x-input-block name="currency_icon" label="Currency Icon"
                            value="{{ config('settings.currency_icon') }}" />
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
