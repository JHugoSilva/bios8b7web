<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' =>
        ['login', 'loginAction', 'register', 'registerAction']]);
    }

    public function login(Request $req)
    {
        return view('admin.login', [
            'error' => $req->session()->get('error')
        ]);
    }

    public function loginAction(Request $req)
    {
        $creds = $req->only('email', 'password');
        if (Auth::attempt($creds)) {
            return redirect('/admin');
        } else {
            $req->session()->flash('error', 'E-mail e/ou senha não conferem');
            return redirect('/admin/login');
        }
    }
    public function register(Request $req)
    {
        return view('admin/register', [
            'error' => $req->session()->get('error')
        ]);
    }
    public function registerAction(Request $req)
    {
        $creds = $req->only('email', 'password');
        $hashEmail = User::where('email', $creds['email'])->count();

        if ($hashEmail === 0) {
            $newUser = new User();
            $newUser->email = $creds['email'];
            $newUser->password = password_hash($creds['password'], PASSWORD_DEFAULT);
            $newUser->save();

            Auth::login($newUser);
            return redirect('/admin');
        } else {
            $req->session()->flash('error', 'Já existe um usuário com este e-mail');
            return redirect('/admin/register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    public function index()
    {
        return view('admin/index');
    }
}
