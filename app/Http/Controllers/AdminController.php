<?php

namespace App\Http\Controllers;

use App\Models\Laravel_ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function loginauth(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        $email = $request->post('email');
        $pass = $request->post('password');
        $type = $request->post('type');
        $manager_id = $request->post('manager_id');



        if($email == 'shivam@sbsind.in' && $pass == '12345678' && $type == 'program_manager' && $manager_id == 'BIG100000077'){

                $request->session()->put('PROGRAM_MANAGER_LOGIN',true);
                $request->session()->put('PROGRAM_MANAGER_ID',$manager_id);
                $request->session()->put('PROGRAM_MANAGER_EMAIL',$email);
                return redirect('home/dashboard');

        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }
            }

            public function dashboard(){
                $result['tickets'] = Laravel_ticket::where(['program_manager_id'=>Session::get('PROGRAM_MANAGER_ID')])->get();
                $result['ticket'] = collect($result['tickets'])->countBy('status');
                // echo "<pre>";
                // print_r($result);
                // exit;
                return view('admin.dashboard',$result);
            }
}
