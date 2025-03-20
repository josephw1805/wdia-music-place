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
                                <li>Orders</li>
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
                                <h5>Order Details</h5>
                            </div>
                        </div>
                        <div class="wsus__dash_course_table wow fadeInUp">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="image">
                                                        ALBUM
                                                    </th>
                                                    <th class="sale">
                                                        PURCHASE BY
                                                    </th>
                                                    <th class="amount">
                                                        PRICE
                                                    </th>
                                                    <th class="amount">
                                                        COMMISSION
                                                    </th>
                                                    <th class="amount">
                                                        EARNING
                                                    </th>
                                                </tr>
                                                @forelse ($orderItems as $orderItem)
                                                    <tr>
                                                        <td class="details">
                                                            {{ $orderItem->album->title }}
                                                        </td>
                                                        <td class="sale">
                                                            {{ $orderItem->order->customer->name }}
                                                        </td>
                                                        <td class="amount">
                                                            {{ $orderItem->price }}
                                                            {{ config('settings.default_currency') }}
                                                        </td>
                                                        <td class="amount">
                                                            {{ $orderItem->commission_rate ?? 0 }}%
                                                        </td>
                                                        <td class="amount">
                                                            {{ calculateCommission($orderItem->price, $orderItem->commission_rate ?? 0) }}
                                                            {{ config('settings.default_currency') }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
