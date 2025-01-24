<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Shipping & Billing</h4>
                    <hr>
                    <form action="" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="firstName" placeholder="First Name" value="{{ $user->firstName }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="lastName" placeholder="Last Name" class="form-control" value="{{ $user->lastName }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="postal-code" placeholder="Mobile No" class="form-control" value="{{ $user->mobile }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="apartment" placeholder="Apartment" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <textarea type="text" name="address" placeholder="Delivery Address" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="city" placeholder="City" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="postal-code" placeholder="Postal code" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <input type="text" name="country" value="Bangladesh" readonly class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Products</h4>
                    <hr>
                    @foreach ($products as $product)
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset($product->product['image']) }}" alt="" class="rounded" style="width: 70px">
                            </div>
                            <div class="col-9">
                                <p>{{ $product->product['title'] }}<br>
                                <strong>৳{{ $product->price }}</strong></p>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <div class="row">
                        <div class="col-7">Subtotal</div>
                        <div class="col-5" style="text-align:right;">৳{{ $total_product_price }}</div>
                        <div class="col-7">Shipping</div>
                        <div class="col-5" style="text-align:right;">৳{{ $shipping_charge }}</div>
                        <div class="col-7"><strong>Total</strong> </div>
                        <div class="col-5 mb-3" style="text-align:right;">BDT ৳{{ $total_pay }}</div>
                        <div class="col-12">
                            <input type="button" value="Order Confirm" class="btn btn-primary">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
</div>