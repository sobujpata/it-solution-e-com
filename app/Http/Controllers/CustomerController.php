<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CustomerProfile;

class CustomerController extends Controller
{
    public function CustomerList()
    {
        // Retrieve all users with their profiles
        $customers = User::with('profile')->get();

        // Get profiles associated with these users
        $customer_ids = $customers->pluck('id'); // Extract user IDs
        $customer_profiles = CustomerProfile::whereIn('user_id', $customer_ids)->get();

        return response()->json([
            'customers' => $customers,
            'profiles' => $customer_profiles
        ]);
    }
}

