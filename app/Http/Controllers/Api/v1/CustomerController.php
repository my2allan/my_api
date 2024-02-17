<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CustomerResource;
use App\Http\Resources\v1\CustomerCollection;
use App\Filters\v1\CustomerFilters;
use Illuminate\Http\Request;




class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomerFilters();
        $filteritems = $filter->transform($request);

        //want to be able to list customers, together with their corresponding invoices
        $includeinvoices = $request->query('includeinvoices');
        $customers = Customer::where($filteritems);

        if($includeinvoices){
            $customers = $customers->with('invoices');
        }
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $includeinvoices = request()->query('includeinvoices');

        if($includeinvoices){
            
            return new CustomerResource($customer->loadMissing('invoices'));
        }
        return new CustomerResource($customer);
        
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
