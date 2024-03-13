<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function proseslogin(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('failed', 'email atau password salah!');
        }
    }

    public function logout(){
        // dd('oke');
        Auth::logout();
        return redirect()->route('login')->with('success', 'berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function prosesregister(Request $request){
        // dd($request->all());
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

         $data['name'] = $request->name;
         $data['email'] = $request->email;
         $data['password'] = Hash::make($request->password);

         User::create($data);

         $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('dashboard')->with('succesregister', 'Register Berhasil, otomatis terlogin!');
        }else{
            return redirect()->route('login')->with('failed', 'email atau password salah!');
        }

    }


}
