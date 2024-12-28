<style>
    a {
        text-decoration: none;
    }
    .remove{
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
    .page-title{
        text-align: center;
    }
    hr{
        margin-bottom: 10px; margin-top:10px
    }
    thead{
        background-color: #303233;
        color:white;
    }
    th{
        padding: 10px;
    }
    tr:hover{
        background-color: #b4b4b4;
    }
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Cart List</h1>
                </div>
            </div>
            <div class="col-md-6">
                <span><a href="{{ url('/') }}">Home</a></span>/<span><a href="{{ url('/cart') }}">Cart List</a></span>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<hr>
<div class="mt-5">
    <div class="container my-5">
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
                                    <button class="check-out-btn" type="submit"
                                        style=""><a href="{{ url('/payment-form') }}" style="color:white;">Check Out</a></button>
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
    CartList();
    async function CartList() {
        showLoader();
        let res = await axios.get(`/CartList`);
        hideLoader();
        $("#byList").empty();

        res.data['data'].forEach((item, i) => {
            let EachItem = `<tr>
                            <td class="product-thumbnail" align="center"><img src=${item['product']['image']} alt="product" style="width:60px"></td>
                            <td class="product-name" >${item['product']['title']} </td>
                            <td class="product-quantity"> ${item['qty']} </td>
                            <td class="product-subtotal">${item['price']}Tk</td>
                            <td class="product-remove" align="center"><a class="remove btn btn-danger" data-id="${item['product_id']}">Delete</a></td>
                        </tr>`
            $("#byList").append(EachItem);
        })

        await CartTotal(res.data['data']);

        $(".remove").on('click', function() {
            let id = $(this).data('id');
            console.log(id);
            RemoveCartList(id);
        })


    }


    async function CartTotal(data) {
        let Total = 0;
        data.forEach((item, i) => {
            Total = Total + parseFloat(item['price']);
        })
        $("#total").text(Total);
    }



    async function RemoveCartList(id) {
        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        let res = await axios.get("/DeleteCartList/" + id);
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        if (res.status === 200) {
            successToast("Product remove from cart.")
            await CartList();
        } else {
            errorToast("Request Fail")
        }
    }


    // async function CheckOut() {
    //     $(".preloader").delay(90).fadeIn(100).removeClass('loaded');

    //     $("#paymentList").empty();
    //     showLoader();
    //     let res = await axios.get("/InvoiceCreate");
    //     hideLoader();
    //     $(".preloader").delay(90).fadeOut(100).addClass('loaded');

    //     console.log(res);
    //     if (res.status === 200) {

    //         $("#paymentMethodModal").modal('show');

    //         res.data['data'][0]['paymentMethod'].forEach((item, i) => {
    //             let EachItem = `<tr>
    //                             <td><img class="w-50" src=${item['logo']} alt="product"></td>
    //                             <td><p>${item['name']}</p></td>
    //                             <td><a class="btn btn-danger btn-sm" href="${item['redirectGatewayURL']}">Pay</a></td>
    //                         </tr>`
    //             $("#paymentList").append(EachItem);
    //         })

    //     } else {
    //         alert("Request Fail");
    //     }

    // }
</script>
