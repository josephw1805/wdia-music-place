@extends('frontend.layouts.master')

@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('frontend.artist-dashboard.sidebar')
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Payout Gateway Settings</h5>
                            </div>
                        </div>
                        <form action="{{ route('artist.update-gateway-info') }}" class="wsus__dashboard_profile_update"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        @foreach ($gateways as $gateway)
                                            <span class="d-none gateway-{{ $gateway->id }}">{!! $gateway->description !!}</span>
                                        @endforeach
                                        <label class="form-label">Gateway</label>
                                        <select name="gateway" class="form-control gateway">
                                            <option value="">Select</option>
                                            @foreach ($gateways as $gateway)
                                                <option @selected(user()->gatewayInfo?->gateway == $gateway->name) value="{{ $gateway->name }}"
                                                    data-id="{{ $gateway->id }}">
                                                    {{ $gateway->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label class="form-label">Gateway Information</label>
                                        <textarea name="information" rows="5" class="form-control gateway_description">{!! user()->gatewayInfo?->information !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.gateway').on('change', function() {
            let id = $(this).find(':selected').data('id');
            $('.gateway_description').attr('placeholder', $('.gateway-' + id).html());
        })
    </script>
@endpush
