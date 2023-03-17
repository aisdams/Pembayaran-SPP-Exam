<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function viewlogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:6'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('msg', 'Something Wrong');
        }
        
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin')
                    ->withSuccess('You have Successfully loggedin');
            } elseif ($user->level == 'petugas') {
                return redirect()->intended('petugas')
                    ->withSuccess('You have Successfully loggedin');
            } elseif ($user->level == 'siswa') {
                return redirect()->intended('siswa')
                    ->withSuccess('You have Successfully loggedin');
            } else {
                return redirect('auth/login')->withErrors('You have Error loggedin');
            }
        }
    }

    public function viewregister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'nama_petugas'=>'required|string',
            'username'=>'required|string',
            'level'=>'required',
            'password' => 'required|string|min:6'
        ]);

        $petugas_nama = $request->nama_petugas;
        $username = $request->username;
        $level = $request->level;
        $password = bcrypt($request->password);

        $id_petugas = Helper::IDGenerator(new User, 'id_petugas', 2, 'STD'); /** Generate id */
        
        $q = new User;
        $q->id_petugas = $id_petugas;
        $q->nama_petugas = $petugas_nama;
        $q->username = $username;
        $q->level = $level;
        $q->password = $password;
        $save =  $q->save();

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        return redirect("auth/login")->with('success', 'User successfully Login');
        
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('auth/login');
    }

}
