<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    public function InvoicesCustomer(){
        return view('home.orders');
    }
    public function InvoiceList(){
        $invoices = Invoice::all();

        return response()->json($invoices);
    }

    public function InvoicePage(Request $request){
        $user_id = $request->header('id');
        $user = User::findOrFail($user_id);

        $products = ProductCart::where('user_id', $user_id)->with('product')->get();
        $total_product_price_r = ProductCart::where('user_id', $user_id)->sum('price');
        $total_product_price = round($total_product_price_r, 2);
        $shipping_charge = round(40, 2);
        $total_pay = round($total_product_price + $shipping_charge, 2);
        // dd($products);
        return view('home.payment-page', compact(
            'user', 
            'products', 
            'total_product_price',
            'shipping_charge',
            'total_pay'
        ));
    }

    public function updateDeliveryStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|exists:invoices,id', // Ensure ID exists in the invoices table
            'delivery_status' => 'required|string|in:Pending,Processing,Completed,Return',
        ]);

        try {
            // Find the invoice by ID and update the delivery status
            $invoice = Invoice::findOrFail($validated['id']);
            $invoice->delivery_status = $validated['delivery_status'];
            $invoice->save();

            return response()->json(['success' => true, 'message' => 'Delivery status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update delivery status'], 500);
        }
    }

    public function InvoiceCreate(Request $request)
    {
        // dd($request);
        $user_id = $request->header('id');

        // Validate the form data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'apartment' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'nullable|string|max:10',
            'country' => 'required|string|max:255',
            'subtotal' => 'required|numeric|min:0',
            'shipping_charge' => 'required|numeric|min:0',
        ]);
        
        try {
            // Start the database transaction
            DB::beginTransaction();

            // Create customer and shipping details as strings
            $details = implode(', ', [
                $request->firstName,
                $request->lastName,
                $request->email,
                $request->mobile,
                $request->address,
                $request->city,
                $request->postal_code,
                $request->country,
            ]);
            
            // Create the invoice
            $invoice = Invoice::create([
                'total' => $request->subtotal,
                'shipping_charge' => $request->shipping_charge,
                'payable' => $request->subtotal + $request->shipping_charge,
                'cus_details' => $details,
                'ship_details' => $details,
                'delivery_status' => "Pending",
                'user_id' => $user_id,
            ]);
            // Retrieve products from the product_carts table
            $productCards = DB::table('product_carts')->where('user_id', $user_id)->get();
            
            if ($productCards->isEmpty()) {
                throw new \Exception('No products found in the cart.');
            }

            // Insert products into the product_details table
            $productDetails = [];
            foreach ($productCards as $productCard) {
                $productDetails[] = [
                    'invoice_id' => $invoice->id,
                    'product_id' => $productCard->product_id,
                    'user_id' => $user_id,
                    'qty' => $productCard->qty,
                    'sale_price' => $productCard->price,
                    'color' => $productCard->color,
                    'size' => $productCard->size,
                    
                ];
            }
            InvoiceProduct::insert($productDetails);

            // Clear the product_carts table for the user
            DB::table('product_carts')->where('user_id', $user_id)->delete();

            // Commit the transaction
            DB::commit();

            return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error for debugging
            Log::error('Invoice creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to create invoice. Please try again.');
        }
    }


    public function InvoiceByCustomer(Request $request){
        $user_id = $request->header('id');

        $invoices = Invoice::where('user_id', $user_id)->get();

        return response()->json([
            'data'=>$invoices,
            'status'=>"success"
        ]);
    }


}
