@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Invoice
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <i class="ti ti-printer"></i>
                            Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="h3">Company</p>
                                <address>
                                    Street Address<br>
                                    State, City<br>
                                    Region, Postal Code<br>
                                    ltd@example.com
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <p class="h3">Client</p>
                                <address>
                                    {{ $order->customer->name }}<br>
                                    {{ $order->customer->email }}
                                </address>
                            </div>
                            <div class="col-12 my-5">
                                <h1>Invoice #{{ $order->invoice_id }}</h1>
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>Product</th>
                                    <th class="text-center" style="width: 1%">Qnt</th>
                                    <th class="text-end" style="width: 1%">Unit</th>
                                    <th class="text-end" style="width: 1%">Amount</th>
                                </tr>
                            </thead>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>
                                        <p class="strong mb-1">{{ $item->album->title }}</p>
                                    </td>
                                    <td class="text-center">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="text-end">${{ $item->album->price }}</td>
                                    <td class="text-end">
                                        ${{ $item->price }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="strong text-end">Subtotal</td>
                                <td class="text-end">${{ $order->total_amount }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Paid Amount</td>
                                <td class="font-weight-bold text-end">
                                    {{ $order->paid_amount }} {{ $order->currency }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
