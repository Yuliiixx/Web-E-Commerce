<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'nohp' => 'required|string|max:15',
        ]);

        $user = new User([
            'fullname' => $request->get('fullname'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'nohp' => $request->get('nohp'),
        ]);

        $user->save();

        return redirect('/user')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username,'.$id,
            'email' => 'required|string|email|max:255|unique:user,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'nohp' => 'required|string|max:15',
        ]);

        $user = User::findOrFail($id);
        $user->fullname = $request->get('fullname');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->nohp = $request->get('nohp');

        $user->save();

        return redirect('/user')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user')->with('success', 'User deleted successfully.');
    }
}
