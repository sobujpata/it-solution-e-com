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
                    <span><a href="{{ url('/') }}" class="text-dark bolder">Home</a></span> / <span><a href="{{ url('/order') }}" class="text-dark border-2">Order List</a></span>
                </h2>
            </div>
            <div class="col-md-8">
                <div class="page-title">
                    <h1 class="text-decoration-underline">Invoice List</h1>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<hr>
<div class="mt-5">
    <div class="container my-5 container-table">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="text-decoration-underline title">Amount</h5>
                                    </div>
                                    
                                    <div class="col-6">Subtotal</div>
                                    <div class="col-1">:</div>
                                    <div class="col-5"><span style="float: right;">150000.00</span></div>

                                    <div class="col-6">Shipping Charge</div>
                                    <div class="col-1">:</div>
                                    <div class="col-5"><span style="float: right;">150.00</span></div>
                                    <hr>
                                    <div class="col-6"><strong>Payable</strong></div>
                                    <div class="col-1">:</div>
                                    <div class="col-5"><strong style="float: right;">150150.00</strong></div>
                                    
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5 class="text-decoration-underline text-center title">Shipping Address:</h5>
                                        <p>Rahim, Uddin, customer@gmail.com, 01739871705, Cantonment, Dhaka, Dhaka, 1206, Bangladesh</p>
                                        
                                    </div>
                                    <div class="col-md-2 mt-4 text-center">
                                        <button class="btn btn-primary btn-sm">Print</button>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="">
</div>

<script>
async function orderList() {
    try {
        showLoader(); // Display loader
        const res = await axios.get('/invoice-customer-list');
        hideLoader(); // Hide loader

        const orderItems = res.data['data'];
        const orderContainer = $("#byList");
        console.log(orderItems)
        // Clear existing order items
        orderContainer.empty();

        // Handle empty order
        if (orderItems.length === 0) {
            orderContainer.append('<tr><td colspan="5">Your order is empty. Start shopping now!</td></tr>');
            $("#total").text(0);
            return;
        }

        // Render order items
        orderItems.forEach(item => {
            orderContainer.append(renderorderRow(item));
        });

        

    } catch (error) {
        hideLoader();
        console.error(error);
        errorToast("Failed to fetch order items. Please try again.");
    }
}

// Helper to render a order row
function renderorderRow(item) {
    return `
        <tr>
            <td class="product-thumbnail" align="center">
              ${item.total}
            </td>
            <td class="product-name">${item.shipping_charge}</td>
            <td class="product-quantity">${item.payable}</td>
            <td class="product-subtotal">${item.ship_details}</td>
            <td class="product-remove" align="center">
                <a class="remove btn btn-success" data-id="${item.id}">Details</a>
            </td>
        </tr>`;
}

// Helper to calculate and display total price
function calculateTotal(orderItems) {
    const total = orderItems.reduce((sum, item) => sum + parseFloat(item.price), 0);
    $("#total").text(total.toFixed(2)); // Display total with 2 decimal points
}

// Handle product removal
async function confirmRemoval(productId) {
    if (confirm("Are you sure you want to remove this item?")) {
        await removeorderItem(productId);
    }
}



// Initial call to load the order
orderList();

</script>
