<style>
    .buy-now {
        background-color: #ff5722;
        color: #fff;
        float: left;
        margin: 0px 0px 10px 8px;
        padding: 5px;
        border-radius: 5px;
    }

    .add-to-cart {
        background-color: #000;
        color: #fff;
        float: right;
        margin: 0px 8px 10px 0px;
        padding: 5px;
        border-radius: 5px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #007bff;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination li.disabled span {
        color: #999;
    }

    a {
        text-decoration: none !important;
    }
    .title a {
    display: inline; /* Ensure links are inline */
    text-decoration: none; /* Optional: Remove underline */
    margin: 0 5px; /* Adjust spacing */
    }

    .title {
        font-size: 1.5rem; /* Optional: Adjust title size */
    }

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<div class="product-container">
    <hr>
    <div class="container" style="padding-top: 10px">
        {{-- @include('layouts.partials.sidebar') --}}

        <div class="product-box">
            <h2 class="title">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('/product/' . $remark) }}">{{ $remark}}</a>
            </h2>
            

            <div class="header-search-container">
                <input type="search" name="search-category-product" id="category-search" class="search-field"
                    placeholder="Search products in category... ">
            </div>
            <div id="loading-indicator" style="display: none; text-align: center;">
                <p>Loading...</p>
            </div>
            <div class="product-main" style="padding-top: 10px">
                <div class="product-grid" id="product-list">
                    <!-- Products will be dynamically loaded here -->
                    @foreach ($products as $product)
                        <div class="showcase pb-1">
                            <div class="showcase-banner">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="product-img"
                                    width="300">
                            </div>
                            <div class="showcase-content">
                                <h3>
                                    <a href="{{ url('products/'.$product->id) }}" class="showcase-title">{{ $product->title }}</a>
                                </h3>
                                <div class="price-box">
                                    <p class="price">Tk {{ $product->discount_price }}</p>
                                    <del>Tk {{ $product->price }}</del>
                                </div>
                            </div>
                            <button class="btn btn-primary">Buy Now</button>
                            <button class="btn btn-success">Add to Card</button>
                        </div>
                    @endforeach
                    
                </div>
                {{ $products->links() }}

                <div id="pagination" class="pagination-container"></div>
            </div>

        </div>
    </div>
</div>

<script>
    getCategoryData();
</script>
