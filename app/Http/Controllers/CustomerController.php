<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function customer(){
        $customer = Customer::latest()->paginate(4);
        return view('admin.customer.index', compact('customer'));
    }
    public function delete($id){
        Customer::find($id)->delete();
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
