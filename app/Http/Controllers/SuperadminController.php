<?php

namespace App\Http\Controllers;

use App\Models\Laravel_comment;
use App\Models\Laravel_ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
                $result['hours'] =
                DB::table('laravel_tickets')->where('created_at', '>', Carbon::now()->subHours(8)->toDateTimeString())
                ->get();
                // echo "<pre>";
                // print_r($result);
                // exit;
                return view('superadmin.dashboard',$result);
            }

            public function opentickets()
    {
        $result['queries'] = Laravel_ticket::where(['status'=>'Open'])->get();
       return view('superadmin.tickets.opentickets',$result);
    }

    public function closetickets()
    {
        $result['queries'] = Laravel_ticket::where(['status'=>'Closed'])->get();
       return view('superadmin.tickets.closetickets',$result);

    }

    public function singleticket($issueid){
        $result['ticket'] = Laravel_ticket::where(['issue_id'=>$issueid])->get();
        $result['comments'] = Laravel_comment::where(['issue_id'=>$issueid])->get();
        return view('superadmin.tickets.viewticket',$result);
    }

    public function status(Request $request){
        Laravel_ticket::where('issue_id',$request->issue_id)->update(['status'=>$request->post('status')]);

        return redirect()->back();
    }
}
