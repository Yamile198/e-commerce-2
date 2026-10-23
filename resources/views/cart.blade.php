@extends('layouts.app')

@section('title', 'Carrito | Sabores en Casa')

@section('content')
        <!-- BREADCRUMB SECTION START -->
        <div class="ul-breadcrumb">
            <div class="wow animate__fadeInUp">
                <h2 class="ul-breadcrumb-title">Cart Page</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="separator">/</span>
                    <span class="current-page">Cart Page</span>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB SECTION END -->


        <!-- CART SECTION START -->
        <div class="ul-container ul-section-spacing">
            <div class="cart-top">
                <div class="table-responsive">
                    <table class="ul-cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Remove</th>
                            </tr>
                        </thead>

                        <tbody id="cart-body">
                         
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="cart-bottom">
                <div class="ul-cart-expense-overview">
                    <h3 class="ul-cart-expense-overview-title">Subtotal</h3>
                    <div class="middle">
                        <div class="single-row">
                            <span class="inner-title">Subtotal</span>
                            <span class="number" id="cart-subtotal">$0.00</span>
                        </div>

                        <div class="single-row">
                            <span class="inner-title">Shipping Fee</span>
                            <span class="number" id="cart-shipping">$0.00</span>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="single-row">
                            <span class="inner-title">Total</span>
                          <span class="number" id="cart-total">$0.00</span> 
                        </div>


                        <div style="margin-bottom:16px;">
    <label for="delivery-date" class="inner-title" style="display:block; margin-bottom:6px;">Fecha de entrega</label>
    <input type="text" id="delivery-date" placeholder="Selecciona una fecha" readonly
           style="width:100%; padding:10px 12px; border:1px solid #ddd; border-radius:6px; background:#fff;">
</div>

<button class="ul-cart-checkout-direct-btn">CHECKOUT</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- CART SECTION END -->
@endsection
