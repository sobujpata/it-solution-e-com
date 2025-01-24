<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\ProductCart;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
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
}
