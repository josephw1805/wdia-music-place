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
                                <li>Request Payout</li>
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
                                <h5>Request Payout</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                <div class="wsus__dash_earning">
                                    <h6>Current Balance</h6>
                                    <h3>{{ config('settings.currency_icon') }} {{ $currentBalance }}</h3>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                <div class="wsus__dash_earning">
                                    <h6>Pending Payout</h6>
                                    <h3>{{ config('settings.currency_icon') }} {{ $pendingBalance }}</h3>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                <div class="wsus__dash_earning">
                                    <h6>Total Payout</h6>
                                    <h3>{{ config('settings.currency_icon') }} {{ $totalPayout }}</h3>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('artist.withdrawals.request-payout.create') }}"
                            class="wsus__dashboard_profile_update" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__dash_course_table wow fadeInUp">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Gateway</strong></td>
                                                                <td>{{ user()->gatewayInfo?->gateway }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Information</strong></td>
                                                                <td>{!! user()->gatewayInfo?->information !!}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wsus__dashboard_profile_update_info">
                                        <x-input-block label="Payout Amount" placeholder="Enter your amount"
                                            name="amount" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Submit</button>
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
