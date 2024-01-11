<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // dd($credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
            // dd($request);
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     // $this->clearLoginAttempts($request);

    //     if (Auth::user()->hasRole('admin_master')) {
    //         return redirect()->route('admin-master.index');
    //     } elseif (Auth::user()->hasRole('admin_pka')) {
    //         return redirect()->route('admin-pka.index');
    //     } elseif (Auth::user()->hasRole('mahasiswa')) {
    //         return redirect()->route('mahasiswa.index');
    //     }

    //     return redirect()->intended($this->redirectPath());
    // }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        // $user = Auth::user();
        $user = Auth::guard('admin')->user();
        // dd($user->role == 'admin_master');

        if ($user) {
            if ($user->role == 'admin_master') {
                // echo "reo";
                // dd($user->role);
                // return redirect()->route('admin-master.index');
                // return view('admin-master.index');
                $admins = Admin::where('role', 'admin_master')->get();
                return view('admin-master.index', compact('admins'));
                // return redirect('/admin-master');
            } elseif ($user->role == 'admin_pka') {
                // return redirect()->route('admin_pka.index');
                $mahasiswa = Mahasiswa::all(); // Ambil semua data mahasiswa
                return view('admin_pka.index', compact('mahasiswa'));
            } elseif ($user->role == 'mahasiswa') {
                return redirect()->route('mahasiswa.index');
            }
        }

        // return redirect()->intended($this->redirectPath());
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    protected function clearLoginAttempts(Request $request)
    {
        $this->limiter()->clear($this->throttleKey($request));
    }
}
