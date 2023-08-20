<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUsersListRequest;
use App\Http\Requests\UpdateUsersListRequest;

class DashboardUsersListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('god');

        return view('dashboard.users_list.index', [
            'users' => User::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('god');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersListRequest $request)
    {
        $this->authorize('god');
    
        $request->validated();
        
        $data_new_administrator = [
            'username' => $request['username'],
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'role' => $request->has('role') ? 'Admin' : 'User',
        ];
    
        User::create($data_new_administrator);
        return back()->with('success', 'Register success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersListRequest $request, User $user)
    {
        $this->authorize('god');

        $request->validated();

        $data_new_administrator = [
            'id' => $request['id'],
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request->has('role') ? 'Admin' : 'User',
        ];

        $request->user()->find($request['id'])->update($data_new_administrator);
        return back()->with('success', 'Account details has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('god');

        $user = User::find($id);
        $user->delete();

        return back()->with('success', 'Selected user has been deleted!');
    }
}
