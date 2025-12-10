<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customers::where('email', $request->email)->first();

        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        if (!Hash::check($request->password, $customer->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
        }

        // Store in session
        session(['customer_id' => $customer->id]);

        return response()->json([
            'success' => true,
            'customer' => [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'role' => $customer->role
            ]
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget('customer_id');
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }

    // Check if logged in
    public function check(Request $request)
    {
        $customerId = session('customer_id');

        if ($customerId) {
            $customer = Customers::find($customerId);
            return response()->json([
                'logged_in' => true,
                'customer' => [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'role' => $customer->role
                ]
            ]);
        }

        return response()->json(['logged_in' => false]);
    }
}
