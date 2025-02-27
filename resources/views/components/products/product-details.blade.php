<link rel="stylesheet" href="{{ asset('css/product-details.css') }}">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nova+Square&display=swap');

    .bebas-neue-regular {
        font-family: "Bebas Neue", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .nova-square-regular {
        font-family: "Nova Square", serif;
        font-weight: 400;
        font-style: normal;
    }

    .product-detail ul li {
        margin: 0;
        list-style: none;
        background: url({{ asset('images/shoes_images/checked.png') }}) left center no-repeat;
        background-size: 18px;
        padding-left: 1.7rem;
        margin: 0.4rem 0;
        font-weight: 600;
        opacity: 0.9;
    }

    .purchase-info {
        display: flex;
        /* Makes child elements align horizontally */
        gap: 10px;
        /* Adds space between elements */
        align-items: center;
        /* Aligns elements vertically */
    }

    .quantity-input {
        width: 60px;
        /* Adjust the width as needed */
        padding: 5px;
        font-size: 16px;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    /* .add-to-cart-btn {
        background-color: #f39c12 !important;
        color: white;
    } */

    .add-to-cart-btn:hover {
        background-color: #e67e22 !important;
    }

    .shop-now-btn {
        background-color: #0528d5 !important;
        color: white;
    }

    .shop-now-btn:hover {
        background-color: rgb(188, 209, 240) !important;
        color:black !important;
    }

    .product-img {
        width: 150px;
        border: 1px solid #c7c7c7;
        border-radius: 8px;
        transition: 1s ease;
    }
    .product-img:hover{
        -webkit-transform: scale(0.8);
        -ms-transform: scale(0.8);
        transform: scale(0.8);
        transition: 1s ease;
    }
    .img-product-big{
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }
    .img-product-big:hover{
        -webkit-transform: scale(1.5);
        transform: scale(1.5);
    }
    @media only screen and (max-width: 600px) {
        .product-content {
            font-size: 11px !important;
        }

        .product-img {
            width: 73px;
        }
        .add-to-cart-btn{
            font-size:12px !important;
        }
        .shop-now-btn{
            font-size:12px !important;
        }
        .product-title{
            font-size: 1.5rem !important;
        }

    }
</style>

<div class="product-container">
    <div class="container px-0 px-md-2" style="padding-top: 10px">
        
        <div class="row">
            <div class="col-md-6 px-0 px-md-2">
                <div class="card">
                    <!-- card left -->
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase">
                                @if ($product_details)
                                    @foreach (['img1', 'img2', 'img3', 'img4'] as $img)
                                        <img src="{{ isset($product_details->$img) && $product_details->$img ? asset($product_details->$img) : asset('images/default-image.jpg') }}"
                                            alt="{{ $product->title }}" class="img img-product-big">
                                    @endforeach
                                @else
                                    <p>No product images available.</p>
                                @endif
                            </div>
                        </div>


                        <div class="img-select">
                            @if ($product_details)
                                @foreach (['img1', 'img2', 'img3', 'img4'] as $index => $img)
                                    <div class="img-item">
                                        <a href="#" data-id="{{ $index + 1 }}">
                                            <img src="{{ $product_details->$img ? asset($product_details->$img) : asset('images/default-image.jpg') }}"
                                                alt="{{ $product->title }}" class="product-img">
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p>No product Image available.</p>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-6 px-0 px-md-2">
                <!-- card right -->
                <div class="product-content">
                    <h3 class="product-title">{{ $product->title }}</h3>
                    <a href="{{ url('/products-remark/'.$product->remark) }}" class="product-link">visit our store</a>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>{{ $product->star }}(21)</span>
                    </div>

                    <div class="product-price">
                        <p class="last-price">Old Price: <span>{{ $product->price }}</span></p>
                        <p class="new-price">New Price: <span>{{ $product->discount_price }}</span></p>
                    </div>

                    <div class="product-detail">
                        <h3>Product Description:</h3>
                        <p style="text-align: justify;">{{ $product->short_des }}</p>
                        <p style="text-align: justify;">{{ $product_details->des ?? 'No description available.' }}</p>
                        <ul>
                            <li>Color: <span>{{ $product_details->color ?? 'No color available.' }}</span></li>
                            <li>Available: <span>in stock</span></li>
                            <li>Category: <span>{{ $product->categories->categoryName }}</span></li>
                            <li>Shipping Area: <span>All over the Bangladesh</span></li>
                            <li>Shipping Fee: <span>Free</span></li>
                        </ul>
                        <form action="" method="POST">
                            @csrf


                            <p>
                            </p>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-5">
                                            Color Select:
                                        </div>
                                        <div class="col-7">
                                            <select name="color" id="p_color" class="form-control form-select">
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                
                                    <input type="text" value="{{ $product->id }}" style="display:none;" id="p_id">
                                </div>
                                <div class="col-3">
                                    <input type="number" min="0" value="1" name="quantity" step="1" class="px-0 px-md-2 form-control"
                                    aria-label="Quantity" id="p_qty">
                                </div>
                            </div>
                            
                    </div>

                    <div class="purchase-info">
                        <!-- Inline Input and Button -->

                        

                        <button onclick="AddToCart()" type="button" class="btn add-to-cart-btn btn-sm"
                            aria-label="Add to Cart">
                            Add to Cart <i class="fas fa-shopping-cart"></i>
                        </button>
                        <a href="">
                            <button onclick="AddToWishList()" type="button" class="btn shop-now-btn btn-sm">
                                Add to Wish <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>
                        </a>
                        </form>
                    </div>


                    <div class="social-links">
                        <p><b>Share At : </b></p>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/product-details.js') }}"></script>
</div>
</div>