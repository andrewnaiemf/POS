<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }

    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')->when($request->search, function ($q) use ($request) {
            return $q->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(1);

        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
        ]);
        $data=$request->except(['password','password_confirmation','permissions']);
        $data['password']=bcrypt($request->password);

        $user=User::create($data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.users.index');

    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        ]);
        $data=$request->except(['permissions']);
        $user->update($data);
        $user->syncPermissions($request->permissions);
        session()->flash('success',__('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
}
