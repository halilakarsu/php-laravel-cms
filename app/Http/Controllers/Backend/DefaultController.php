<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{

 public function index(){
     return view('backend.default.index');
 }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $request->flash();
        $data = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? 1 : 0;

        if (Auth::attempt($data, $remember_me)) {
            return redirect()->intended(route('admin.home'));
        } else {
            return back()->with('error', 'Hatalı Giriş Yapıldı');
        }
    }

    public function logout(){
      Auth::logout();
      return redirect(route('admin.login'))->with('success','Güvenli Çıkış yapıldı.');
      }
}
