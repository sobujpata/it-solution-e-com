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
            <div class="col-md-6">
                <div class="page-title">
                    <h1 class="text-decoration-underline">order List</h1>
                </div>
            </div>
            <div class="col-md-6">
                <span><a href="{{ url('/') }}">Home</a></span>/<span><a href="{{ url('/order') }}">order
                        List</a></span>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<hr>
<div class="mt-5">
    <div class="container my-5 container-table">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_order_table">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th class="product-name">Total</th>
                                <th class="product-quantity">Shipping charge</th>
                                <th class="product-subtotal">Payable</th>
                                <th class="product-thumbnail">Shipping Address</th>
                                <th class="product-remove">Show</th>
                            </tr>
                        </thead>
                        <tbody id="byList">
                        </tbody>
                        
                    </table>
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
