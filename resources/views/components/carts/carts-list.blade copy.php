<style>
    a {
        text-decoration: none;
    }

    .remove {
        background-color: rgb(236, 41, 100);
        color: white;
        padding: 5px;
        border-radius: 5px;
        width: 70px;
    }

    .remove:hover {
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 mb-2">
                                <img src="{{ asset('images/default.jpg') }}" alt="" style="width: 60px;">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Iphone 16 pro</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <strong>BDT 150000</strong>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="">Qty: 1</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" class="btn"><i class="fa fa-trash text-danger"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p><span>Subtotal:</span><span style="float:right;">150000</span></p>
                    <p><span>Total:</span><span style="float:right;">150000</span></p>
                        <a href="{{ url('/payment-form') }}" class="btn btn-success w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Product Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody id="byList">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>Total:</td>
                                <td><span id="total"></span>Tk</td>
                                <td align="center">
                                    <button class="check-out-btn" type="submit" style=""><a
                                            href="{{ url('/payment-form') }}" style="color:white;">Check
                                            Out</a></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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

        // Attach remove event listener
        $(".remove").on('click', function () {
            const productId = $(this).data('id');
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
    return `
        <tr>
            <td class="product-thumbnail" align="center">
                <img src="${item.product.image}" alt="product" style="width:60px; border-radius:5px;">
            </td>
            <td class="product-name">${item.product.title}</td>
            <td class="product-quantity">${item.qty}</td>
            <td class="product-subtotal">${item.price} Tk</td>
            <td class="product-remove" align="center">
                <a class="remove btn btn-danger" data-id="${item.product_id}">Delete</a>
            </td>
        </tr>`;
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

// Send a request to remove the item from the cart
async function removeCartItem(productId) {
    try {
        showLoader();
        const res = await axios.get(`/DeleteCartList/${productId}`);
        hideLoader();

        if (res.status === 200) {
            successToast("Product removed from cart.");
            await CartList(); // Refresh cart
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
