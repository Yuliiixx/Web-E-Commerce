<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        return view('user.index', ['user' => $user]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:8',
            'nohp' => 'required',
        ]);

        User::create([
            'name' => $request->input('fullname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'nohp' => $request->input('nohp'),
        ]);

        return redirect()->route('user.index')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:user,username,' . $user->id,
            'email' => 'required|email|unique:user,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'nohp' => 'required',
        ]);

        $data = [
            'name' => $request->input('fullname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'nohp' => $request->input('nohp'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data Berhasil di Ubah');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil di Hapus');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return redirect()->route('auth.login')
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
        
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'nohp' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('fullname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'nohp' => $request->input('nohp'),
        ]);

        auth()->login($user);

        return redirect('/home');
    }
}
