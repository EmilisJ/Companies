<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Company;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all()->sortBy('surname', SORT_NATURAL|SORT_FLAG_CASE);
        return view('customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        return view('customer.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'customer_name' => ['required', 'min:3', 'max:32'],
            'customer_surname' => ['required', 'min:3', 'max:32'],
            'customer_phone' => ['required', 'min:3', 'max:24'],
            'customer_email' => ['required', 'min:3', 'max:32'],
            'customer_comment' => ['max:300'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('customer.create')->withErrors($validator);
        }

        $customer = new Customer;
        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;
        $customer->email = $request->customer_email;
        $customer->comment = $request->customer_comment;
        $customer->company_id = $request->company_id;
        $customer->save();
        return redirect()->route('customer.index')->with('success_message', 'customer was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $companies = Company::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        return view('customer.edit', ['customer' => $customer, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(),
        [
            'customer_name' => ['required', 'min:3', 'max:32'],
            'customer_surname' => ['required', 'min:3', 'max:32'],
            'customer_phone' => ['required', 'min:3', 'max:24'],
            'customer_email' => ['required', 'min:3', 'max:32'],
            'customer_comment' => ['max:300'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('customer.create')->withErrors($validator);
        }

        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;
        $customer->email = $request->customer_email;
        $customer->comment = $request->customer_comment;
        $customer->company_id = $request->company_id;
        $customer->save();
        return redirect()->route('customer.index')->with('success_message', 'customer was successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success_message', 'Customer was successfully deleted');
    }
}
