<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Customer', [
            'customers' => (new CustomerRepository())->getAllCustomers()
        ]);
    }

    /**
     * @param CustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerRequest $request)
    {
        (new CustomerRepository())->addCustomer($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * @param int $id
     * @param CustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, CustomerRequest $request)
    {
        (new CustomerRepository())->updateCustomer($id, $request->all());
        return redirect()->route('customer.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        (new CustomerRepository())->destroyCustomer($id);
        return redirect()->route('customer.index');
    }
}
