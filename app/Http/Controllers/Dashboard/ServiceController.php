<?php

namespace App\Http\Controllers\Dashboard;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_services'])->only('index');
        $this->middleware(['permission:create_services'])->only('create');
        $this->middleware(['permission:update_services'])->only('edit');
        $this->middleware(['permission:delete_services'])->only('destroy');
    }

    public function index(Request $request)
    {
        $services = Service::all();
        return view('dashboard.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'link'=>'required',
            'description'=>'required',
        ]);

        Service::create([
            'title'=>request('title'),
            'description'=>request('description'),
            'link'=>request('link')
        ]);

        session()->flash('success','added successfully');
        return redirect()->route('dashboard.services.index');
    }


    public function show($id){
        $customer=Customer::find($id);
        $services=$customer->services;
        return view('dashboard.services.index',compact('services'));
    }


    public function edit(Service $service)
    {
        return view('dashboard.services.edit',compact('service'));

    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>'required|unique:services',
            'link'=>'required',
            'description'=>'required',

        ]);

        $service->update($request->all());
        session()->flash('success','updated successfully');
        return redirect()->route('dashboard.services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('success','deleted successfully');
        return redirect()->route('dashboard.services.index');
    }
}
