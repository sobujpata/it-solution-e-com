<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function InvoiceList(){
        $invoices = Invoice::all();

        return response()->json($invoices);
    }

    public function InvoicePage(Request $request){
        $user_id = $request->header('id');

        dd("Under Development");
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
