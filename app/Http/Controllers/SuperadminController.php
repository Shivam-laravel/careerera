<?php

namespace App\Http\Controllers;

use App\Models\Laravel_ticket;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function login(){
        return view('superadmin.login');
    }

    public function loginauth(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        $email = $request->post('email');
        $pass = $request->post('password');



        if($email == 'shivam@sbsind.in' && $pass == '12345678'){

                $request->session()->put('SUPERADMIN_LOGIN',true);
                $request->session()->put('SUPERADMIN_EMAIL',$email);
                return redirect('superadmin/dashboard');

        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('superadmin');
        }
            }

            public function dashboard(){
                $result['tickets'] = Laravel_ticket::all();
                $result['ticket'] = collect($result['tickets'])->countBy('status');
                // echo "<pre>";
                // print_r($result);
                // exit;
                return view('superadmin.dashboard',$result);
            }
}
