@extends('frontend.layouts.master')
@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Shopping Cart</h1>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__cart_view mt_120 xs_mt_100 pb_120 xs_pb_100">
        @if (count($cart) > 0)
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="cart_list">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="pro_img">Product</th>

                                            <th class="pro_name"></th>

                                            <th class="pro_tk">Price</th>

                                            <th class="pro_icon">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td class="pro_img">
                                                    <img src="{{ asset($item->album->thumbnail) }}" alt="product"
                                                        class="img-fluid w-100">
                                                </td>

                                                <td class="pro_name">
                                                    <a
                                                        href="{{ route('albums.show', $item->album->slug) }}">{{ $item->album->title }}</a>
                                                </td>
                                                <td class="pro_tk">
                                                    @if ($item->album->discount > 0)
                                                        <del>
                                                            <h6>${{ $item->album->price }}</h6>
                                                        </del>
                                                        <h6>${{ $item->album->discount }}</h6>
                                                    @else
                                                        <h6>${{ $item->album->price }}</h6>
                                                    @endif
                                                </td>
                                                <td class="pro_icon">
                                                    <a href="{{ route('remove-from-cart', $item->id) }}"><i
                                                            class="fal fa-times" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-xxl-7 col-md-5 col-lg-6 wow fadeInUp"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="continue_shopping">
                            <a href="{{ route('albums.index') }}" class="common_btn">continue shopping</a>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-7 col-lg-6 wow fadeInUp"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="total_price">
                            <div class="subtotal_area">
                                <h5>total<span>${{ cartTotal() }}</span></h5>
                                <a href="{{ route('checkout.index') }}" class="common_btn">proceed checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container text-center">
                <img style="width: 200px !important" src="{{ asset('frontend/assets/images/empty-cart.png') }}"
                    alt="empty-cart">
                <h6 class="mt-2">Your cart is empty</h6>
                <a href="{{ route('home') }}" class="common_btn mt-3">Go Home</a>
            </div>
        @endif
    </section>
@endsection
