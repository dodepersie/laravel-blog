<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class DashboardUsersListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('god');

        return view('dashboard.users_list.index', [
            'users' => User::all()->sortByDesc('created_at'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('god')) {
            return 'Role kamu: God';
        } elseif(Gate::allows('admin')) {
            return 'Role kamu: Admin';
        } else {
            return 'Role kamu: User';
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('god');

        $validatedData = Validator::make($request->all(), [
            'username' => [
                'required',
                'min:8',
                'max:255',
                'unique:users',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'email:dns',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ], [
            'username.required' => 'The :attribute field is required.',
            'username.min' => 'The :attribute must be at least :min characters.',
            'username.unique' => 'The :attribute has already been taken.',
            'name.required' => 'The :attribute field is required.',
            'email' => 'The :attribute field is required.',
            'email.required' => 'The :attribute field is required.',
            'email.unique' => 'The :attribute has already been taken.',
            'password.required' => 'The :attribute field is required.',
            'password.min' => 'The :attribute must be at least :min characters.',
        ]);

        if ($validatedData->fails()) {
                return redirect('/dashboard/users_list')
                ->withErrors($validatedData)
                ->withInput();
          } else {
            $data_new_administrator = [
                'username' => $request['username'],
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                'email' => $request['email'],
                'role' => $request->has('role') ? 'Admin' : 'User',
            ];

            User::create($data_new_administrator);
            return redirect()->back()->with('success', 'Register success!');
        }
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
        // dd($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('god');

        $validatedData = Validator::make($request->all(), [
            'username' => [
                'required',
                'min:8',
                'max:255',
                Rule::unique('users', 'username')->ignore($request['id']),
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'email:dns',
                'max:255',
                Rule::unique('users', 'email')->ignore($request['id']),
            ],
        ], [
            'username.required' => 'The :attribute field is required.',
            'username.min' => 'The :attribute must be at least :min characters.',
            'username.unique' => 'The :attribute has already been taken.',
            'name.required' => 'The :attribute field is required.',
            'email' => 'The :attribute field is required.',
            'email.required' => 'The :attribute field is required.',
            'email.unique' => 'The :attribute has already been taken.',
        ]);

        if ($validatedData->fails()) {
                return redirect('/dashboard/users_list')
                ->withErrors($validatedData)
                ->withInput();
          } else {
            $data_new_administrator = [
                'id' => $request['id'],
                'username' => $request['username'],
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request->has('role') ? 'Admin' : 'User',
            ];

            $request->user()->find($request['id'])->update($data_new_administrator);
            return redirect()->back()->with('success', 'Account details has been edited!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('god');

        $user = User::find($id);
        $user->delete();

        return redirect('/dashboard/users_list')->with('success', 'Selected user has been deleted!');
    }
}
