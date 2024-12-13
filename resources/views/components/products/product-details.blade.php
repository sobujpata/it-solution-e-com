<div class="product-container">
    <hr>
    <div class="container" style="padding-top: 10px">
        {{-- @include('layouts.partials.sidebar') --}}


        <link rel="stylesheet" href="{{ asset('css/product-details.css') }}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

            .add-to-cart-btn {
                background-color: #f39c12;
                color: white;
            }

            .add-to-cart-btn:hover {
                background-color: #e67e22;
            }

            .shop-now-btn {
                background-color: rgb(0, 110, 255);
                color: white;
            }

            .shop-now-btn:hover {
                background-color: rgb(0, 80, 200);
            }
            .product-img{
                width: 150px;
            }
        </style>



        <div class = "card">
            <!-- card left -->
            <div class = "product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        @if ($product_details)
                            @foreach (['img1', 'img2', 'img3', 'img4'] as $img)
                                <img src="{{ isset($product_details->$img) && $product_details->$img ? asset($product_details->$img) : asset('images/default-image.jpg') }}" 
                                     alt="{{ $product->title }}">
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
                    <p>No product details available.</p>
                @endif
            </div>
            
          </div>
          
            </div>
            <!-- card right -->
            <div class = "product-content">
                <h2 class = "product-title">{{ $product->title }}</h2>
                <a href = "{{ $product->remark }}" class = "product-link">visit our store</a>
                <div class = "product-rating">
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star-half-alt"></i>
                    <span>{{ $product->star }}(21)</span>
                </div>

                <div class = "product-price">
                    <p class = "last-price">Old Price: <span>{{ $product->price }}</span></p>
                    <p class = "new-price">New Price: <span>{{ $product->discount_price }}</span></p>
                </div>

                <div class = "product-detail">
                    <h2>About this products: </h2>
                    <p>{{ $product->short_des }}</p>
                    <p>{{ $product_details->des ?? 'No description available.' }}</p>
                    <ul>
                        <li>Color: <span>{{$product_details->color ?? 'No color available.'}}</span></li>
                        <li>Available: <span>in stock</span></li>
                        <li>Category: <span>{{ $product->categories->categoryName }}</span></li>
                        <li>Shipping Area: <span>All over the Bangladesh</span></li>
                        <li>Shipping Fee: <span>Free</span></li>
                    </ul>
                </div>

                {{-- <div class = "purchase-info">
                <input type = "number" min = "0" value = "1">
                <button type = "button" class = "btn">
                  Add to Cart <i class = "fas fa-shopping-cart"></i>
                </button>
                <a href="../Pmayent page/Pmayent-page.html"><button type = "button" class = "btn" style="background-color: rgb(0, 110, 255);">Shop Now</button></a>
              </div> --}}
                <div class="purchase-info">
                    <!-- Inline Input and Button -->
                    <input type="number" min="0" value="1" name="quantity" step="1"
                        class="quantity-input" aria-label="Quantity">
                    <button type="button" class="btn add-to-cart-btn" aria-label="Add to Cart">
                        Add to Cart <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="../Pmayent page/Pmayent-page.html">
                        <button type="button" class="btn shop-now-btn">
                            Shop Now
                        </button>
                    </a>
                </div>


                <div class = "social-links">
                    <p><b>Share At : </b></p>
                    <a href = "#">
                        <i class = "fab fa-facebook-f"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-twitter"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-instagram"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-whatsapp"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>




        <script src="{{ asset('js/product-details.js') }}"></script>


    </div>
</div>