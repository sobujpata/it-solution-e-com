<style>
    a {
        text-decoration: none;
    }

    .remove-btn {
        /* background-color: rgb(236, 41, 100); */
        color: white;
        padding: 5px;
        border-radius: 5px;
        width: 70px;
    }

    .remove-btn:hover {
        background-color: #f7f0ef;
        color: rgb(231, 12, 12);
    }

    .check-out-btn {
        background-color: blueviolet;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }

    .check-out-btn:hover {
        background-color: #7cc2eb;
        color: black;
    }

    table {
        width: 100%;
        text-align: center;
    }

    .page-title {
        text-align: center;
    }

    hr {
        margin-bottom: 10px;
        margin-top: 10px
    }

    thead {
        background-color: #303233;
        color: white;
    }

    th {
        padding: 10px;
    }

    tr:hover {
        background-color: #b4b4b4;
    }
    .text-decoration-underline{
        text-decoration:underline;
    }
    @media only screen and (max-width: 600px) {
        th, td {
            font-size:12px;
        }
        .container-table{
            padding:0px;
        }

    }
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-md-2">
                <h2 class="title">
                    <span><a class="text-dark" href="{{ url('/') }}">Home</a></span> / <span><a class="text-dark" href="{{ url('/cart') }}">Cart List</a></span>
                </h2>
                
            </div>
            <div class="col-md-8">
                <div class="page-title">
                    <h1 class="text-decoration-underline">Cart List</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<hr>
<div class="mt-5">
    <div class="container my-5 container-table">
        <div class="row">
            <div class="col-md-8">
                <div class="card" id="cartProduct">
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{-- <p><span>Subtotal:</span><span style="float:right;">150000</span></p> --}}
                    <p><span>Total:</span><span style="float:right;" id="total"></span></p>
                        <a href="{{ url('/payment-form') }}" class="btn btn-success w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <hr style="">
</div>

<script>
async function CartList() {
    try {
        showLoader(); // Display loader
        const res = await axios.get('/CartList');
        hideLoader(); // Hide loader

        const cartItems = res.data['data'];
        const cartContainer = $("#byList");
        // console.log(cartItems)
        // Clear existing cart items
        cartContainer.empty();

        // Handle empty cart
        if (cartItems.length === 0) {
            cartContainer.append('<tr><td colspan="5">Your cart is empty. Start shopping now!</td></tr>');
            $("#total").text(0);
            return;
        }

        // Render cart items
        cartItems.forEach(item => {
            cartContainer.append(renderCartRow(item));
        });

        // Calculate and display total price
        calculateTotal(cartItems);

        // Attach remove-btn event listener
        $(".remove-btn").on('click', function () {
            const productId = $(this).data('id');
            console.log(productId);
            confirmRemoval(productId);
        });

    } catch (error) {
        hideLoader();
        console.error(error);
        errorToast("Failed to fetch cart items. Please try again.");
    }
}

// Helper to render a cart row
function renderCartRow(item) {
    let div = `
                  <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row"> 
                                    <div class="col-3 mb-2">
                                        <img src="${item.product.image}" alt="" style="width: 60px; border-radius:7px;">
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h5 style="float:left;">${item.product.title}</h5>
                                            </div>
                                            <div class="col-sm-4">
                                                <strong>BDT ${item.price}</strong>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="">Qty: ${item.qty}</h6>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn remove-btn" data-id="${item.product_id}"><i class="fa fa-trash text-danger"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>          
        `;

        // Append the constructed HTML to the /products/${item['id']}topRate2 element
        document.getElementById("cartProduct").innerHTML += div;

    
}

// Helper to calculate and display total price
function calculateTotal(cartItems) {
    const total = cartItems.reduce((sum, item) => sum + parseFloat(item.price), 0);
    $("#total").text(total.toFixed(2)); // Display total with 2 decimal points
}

// Handle product removal
async function confirmRemoval(productId) {
    if (confirm("Are you sure you want to remove this item?")) {
        await removeCartItem(productId);
    }
}

// Send a request to remove-btn the item from the cart
async function removeCartItem(productId) {
    try {
        showLoader();
        const res = await axios.get(`/DeleteCartList/${productId}`);
        hideLoader();

        if (res.status === 200) {
            successToast("Product removed from cart.");
            await CartList(); // Refresh cart
            window.location.href='/cart'
        } else {
            errorToast("Failed to remove product. Please try again.");
        }
    } catch (error) {
        hideLoader();
        console.error(error);
        errorToast("Failed to remove product. Please try again.");
    }
}

// Initial call to load the cart
CartList();

</script>
