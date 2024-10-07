<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Users::all()->toArray());
        $data = Users::where('status', 1)->get();

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $save = new Users();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = md5($request->password);
        $save->save();
        // return redirect()->back();
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Users::find($id);
        return view('user.edit', compact('user'));
    }
    
    public function update(Request $request, string $id)
    {
        $user = Users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        // Jika password diisi, maka diperbarui
        if ($request->filled('password')) {
            $user->password = md5($request->password);
        }
    
        $user->save();
        return redirect()->route('user.index');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Users::find($id);
        $data->status = 0;
        // $data->delete();
        $data->save();
        return redirect()->back();
    }
}
