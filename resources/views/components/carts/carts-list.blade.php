<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    a{
        text-decoration: none;
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
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">This Page</a></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>

<div class="mt-5">
    <div class="container my-5">
        <div  class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
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
                            <td colspan="6" class="px-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                        Total: $ <span id="total"></span>
                                    </div>
                                    <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                        <button onclick="CheckOut()" class="btn btn-line-fill btn-sm" type="submit">Check Out</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    CartList();
    async function CartList(){
        let res=await axios.get(`/CartList`);
        // console.log(res);
        $("#byList").empty();

        res.data['data'].forEach((item,i)=>{
            let EachItem=`<tr>
                            <td class="product-thumbnail"><img src=${item['product']['image']} alt="product" style="width:60px"></td>
                            <td class="product-name" >${item['product']['title']} </td>
                            <td class="product-quantity"> ${item['qty']} </td>
                            <td class="product-subtotal">$ ${item['price']}</td>
                            <td class="product-remove"><a class="remove btn btn-danger" data-id="${item['product_id']}">Delete</a></td>
                        </tr>`
            $("#byList").append(EachItem);
        })

        await CartTotal(res.data['data']);

        $(".remove").on('click',function () {
            let id= $(this).data('id');
            console.log(id);
            RemoveCartList(id);
        })


    }


    async function CartTotal(data){
        let Total=0;
        data.forEach((item,i)=>{
            Total=Total+parseFloat(item['price']);
        })
        $("#total").text(Total);
    }



   async function RemoveCartList(id){
      $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        let res=await axios.get("/DeleteCartList/"+id);
      $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        if(res.status===200) {
            await CartList();
        }
        else{
            alert("Request Fail")
        }
    }


    async function CheckOut(){
        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');

        $("#paymentList").empty();

        let res=await axios.get("/InvoiceCreate");

        $(".preloader").delay(90).fadeOut(100).addClass('loaded');


        if(res.status===200) {

            $("#paymentMethodModal").modal('show');

            res.data['data'][0]['paymentMethod'].forEach((item,i)=>{
                let EachItem=`<tr>
                                <td><img class="w-50" src=${item['logo']} alt="product"></td>
                                <td><p>${item['name']}</p></td>
                                <td><a class="btn btn-danger btn-sm" href="${item['redirectGatewayURL']}">Pay</a></td>
                            </tr>`
                $("#paymentList").append(EachItem);
            })

        }
        else{
            alert("Request Fail");
        }

    }




</script>
