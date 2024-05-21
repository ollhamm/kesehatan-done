<?php

// app/Http/Controllers/Auth/AdminController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Reagensia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Register
    public function showRegisterForm()
    {
        return view('auth.registerAdmin');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('admin.login')->with('success', 'Registrasi berhasil!');
    }

    // Login
    public function showLoginForm()
    {
        return view('auth.loginAdmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            $request->session()->put('user_name', $admin->name);

            return redirect()->route('admin.home');
        }

        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }




    public function getTotalPatientsCount()
    {
        try {
            $totalPatients = Patient::count();
            return $totalPatients;
        } catch (\Exception $e) {
            return 0;
        }
    }

    // Home
    public function showHomeForm(Request $request)
    {
        $query = Patient::query();
        $reagensias = Reagensia::all();

        $patients = $query->get();
        $totalPatientsCount = $this->getTotalPatientsCount();

        return view('auth.home', compact('patients', 'totalPatientsCount', 'reagensias'));
    }

}
