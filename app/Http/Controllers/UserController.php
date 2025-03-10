<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
           
            'email'=>'required|email|unique:users',

            'password'=> 'required|min:8'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success','User created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dddd=User::find($id);
        return view('users.edit',compact('dddd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
             'name' =>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            ]);

        User::update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),

        ]);

        return redirect()->route('users.index')->with('succes','User update avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::delete($id);
       return redirect()->route('users.index')->with('success','user deleted successfuly');
    }
}
