<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::with('order')->get();

        // dd($customer);

        return view('master.customer', compact('customer'));
    }

    public function create()
    {
        return view('master.customer_create');
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect('/customer');
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('master.customer_edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $customer = Customer::find($request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect('/customer');
    }
    
    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        return redirect('/customer');
    }
}
