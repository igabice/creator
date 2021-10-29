@extends('layouts.main')

@section('content')
    <div class="inner-page">




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Cart Page</h3>
                    <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Cart page</span>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER_PAGE_BANNER AREA END -->

    <!-- CART_VIEW AREA START -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="cart-items text-center">
                                <h3>$135</h3>
                                <img src="asset/images/product1.png" alt="product-img" class="img-fluid">
                                <h4>Ober Headset</h4>
                                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="cart-items text-center">
                                <h3>$198</h3>
                                <img src="asset/images/product3.png" alt="product-img" class="img-fluid">
                                <h4>Wired Earphone</h4>
                                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 contact-box">
                    <div class="checkout-box">
                        <div class="row">
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Subtotal</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4>$320.00</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Discount</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4>10%</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Total</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4>$298.00</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 checkout-button">
                                <a class="main-btn btn-c-white" data-toggle="modal" data-target="#billing-model-large">Make Payment</a>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Coupon Code">
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="coupon-btn btn btn-primary">Apply</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- CART_VIEW AREA END -->

    <!-- PRODUCT AREA START -->
    <section id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading">
                    <h3>Related</h3>
                </div>
            </div>
            <div class="row product-pa">
                <div class="col-lg-12">
                    <div class="product-main">
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>$135</h3>
                                <img src="asset/images/product1.png" alt="product-img" class="img-fluid">
                                <h4>Ober headset</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>$240</h3>
                                <div class="sale">
                                    <span>Sale</span>
                                </div>
                                <img src="asset/images/product2.png" alt="product-img" class="img-fluid">
                                <h4>D-Link Webcam</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>$135</h3>
                                <img src="asset/images/product1.png" alt="product-img" class="img-fluid">
                                <h4>Ober headset</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>$99</h3>
                                <div class="sale">
                                    <span>Sale</span>
                                </div>
                                <img src="asset/images/product3.png" alt="product-img" class="img-fluid">
                                <h4>Wired Earphone</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>$240</h3>
                                <img src="asset/images/product2.png" alt="product-img" class="img-fluid">
                                <h4>D-Link Webcam</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </div>
@endsection