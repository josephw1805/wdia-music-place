@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Payment Settings</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#paypale-setting" class="nav-link active" data-bs-toggle="tab"
                                        aria-selected="false" role="tab" tabindex="-1">Paypale Setting</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#stripe-setting" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                        role="tab" tabindex="-1">Stripe Setting</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="paypale-setting" role="tabpanel">
                                    <form action="{{ route('admin.paypal-setting.update') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Paypal Mode</label>
                                                <select name="paypal_mode" class="form-control">
                                                    <option @selected(config('gateway_settings.paypal_mode') === 'sandbox') value="sandbox">Sandbox</option>
                                                    <option @selected(config('gateway_settings.paypal_mode') === 'live') value="live">Live</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Currency</label>
                                                <select name="paypal_currency" class="form-control">
                                                    @foreach (config('gateway_currency.paypal_currencies') as $key => $value)
                                                        <option @selected(config('gateway_settings.paypal_currency') === $key) value="{{ $key }}">
                                                            {{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <x-input-block label="Rate (USD)" name="paypal_rate"
                                                    placeholder="Enter Paypale Rate"
                                                    value="{{ config('gateway_settings.paypal_rate') }}" />
                                            </div>
                                            <div class="col-md-4">
                                                <x-input-block label="Client ID" name="paypal_client_id"
                                                    placeholder="Enter Paypal client id"
                                                    value="{{ config('gateway_settings.paypal_client_id') }}" />
                                            </div>
                                            <div class="col-md-4">
                                                <x-input-block label="Client Secret" name="paypal_client_secret"
                                                    placeholder="Enter paypal client secret"
                                                    value="{{ config('gateway_settings.paypal_client_secret') }}" />
                                            </div>
                                            <div class="col-md-4">
                                                <x-input-block label="App ID" name="paypal_app_id"
                                                    placeholder="Enter paypal app id"
                                                    value="{{ config('gateway_settings.paypal_app_id') }}" />
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="stripe-setting" role="tabpanel">
                                    <form action="{{ route('admin.stripe-setting.update') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Stripe status</label>
                                                <select name="stripe_status" class="form-control">
                                                    <option @selected(config('gateway_settings.stripe_status') === 'active') value="active">Active</option>
                                                    <option @selected(config('gateway_settings.stripe_status') === 'inactive') value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Currency</label>
                                                <select name="stripe_currency" class="form-control">
                                                    @foreach (config('gateway_currency.stripe_currencies') as $key => $value)
                                                        <option @selected(config('gateway_settings.stripe_currencies') === $value) value="{{ $value }}">
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <x-input-block label="Rate (USD)" name="stripe_rate"
                                                    placeholder="Enter Stripe Rate"
                                                    value="{{ config('gateway_settings.stripe_rate') }}" />
                                            </div>
                                            <div class="col-md-6">
                                                <x-input-block label="Publishable Key" name="stripe_publishable_key"
                                                    placeholder="Enter Stripe Publishable Key"
                                                    value="{{ config('gateway_settings.stripe_publishable_key') }}" />
                                            </div>
                                            <div class="col-md-6">
                                                <x-input-block label="Secret Key" name="stripe_secret"
                                                    placeholder="Enter Stripe Secret Key"
                                                    value="{{ config('gateway_settings.stripe_secret') }}" />
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
