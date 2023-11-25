<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginsubmit(Request $req)
    {
        $req->validate([
            'uname' => 'required',
            'password' => 'required',


        ]);

        $login = User::where('name', $req->uname)->first();

        if (Hash::check($req->password, $login->password)) {
            if ($login) {
                Session::put('admin', $login->role);
                Session::flash('message', 'Login Successfully');
                return redirect()->route('product.index');
            } else {
                Session::flash('mgs', 'Please Check Username');
                return back();
            }
        } else {
            Session::flash('mgs', 'Please Check Password');
            return back();
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('login.form');
    }
}