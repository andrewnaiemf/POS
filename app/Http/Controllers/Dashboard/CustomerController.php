<?php

namespace App\Http\Controllers\Dashboard;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_customers'])->only('index');
        $this->middleware(['permission:create_customers'])->only('create');
        $this->middleware(['permission:update_customers'])->only('edit');
        $this->middleware(['permission:delete_customers'])->only('destroy');
    }

    public function index(Request $request)
    {
        $customers = Customer::when($request->search, function ($q) use ($request) {
            return $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        })->latest()->paginate(3);
        return view('dashboard.customers.index',compact('customers'));
    }

    public function create()
    {
        $services=Service::all();
        return view('dashboard.customers.create',compact('services'));

    }


    public function store(Request $request )
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'phone'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'services'=>'required'
        ]);
        $customer=Customer::create($request->all());
        $customer->services()->attach($request->services);
        session()->flash('success','added successfully');
        return redirect()->route('dashboard.customers.index');

    }


    public function edit(Customer $customer)
    {
        $services=Service::all();
        $service_customer= $customer->services->pluck('id')->toArray();

        return view('dashboard.customers.edit',compact('customer','services','service_customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'phone'=>'required|max:12|min:12',
            'start_date'=>'required',
            'end_date'=>'required',
            'services'=>'required'
        ]);
        $services=$request->services;
        $customer->update($request->all());
        $customer->services()->sync($request->services);
        session()->flash('success','updated successfully');
        return redirect()->route('dashboard.customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        $customer->services()->delete();
        session()->flash('success','deleted successfully');
        return redirect()->route('dashboard.customers.index');
    }
}
