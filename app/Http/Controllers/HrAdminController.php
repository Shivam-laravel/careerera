<?php

namespace App\Http\Controllers;

use App\Models\HrAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HrAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
    }

    public function dashboard(){
        return view('hradmin.dashboard');
    }

    public function login(){
        return view('hradmin.login');
    }

    public function loginauth(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        $email = $request->post('email');
        $pass = $request->post('password');

        $result = HrAdmin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($pass, $result->password)){
                $request->session()->put('HR_LOGIN',true);
                $request->session()->put('HR_ID',$result->id);
                $request->session()->put('HR_NAME',$result->name);
                $request->session()->put('HR_EMAIL',$result->email);
                $request->session()->put('HR_PHONE',$result->phone);
                $request->session()->put('ADMIN_ID',$result->admin_id);
                return redirect('hr/dashboard');


            }else{
                $request->session()->flash('error','Please enter correct username/password');
                return redirect('hr-login');
            }
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('hr-login');
        }
            }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HrAdmin  $hrAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(HrAdmin $hrAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HrAdmin  $hrAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(HrAdmin $hrAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HrAdmin  $hrAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HrAdmin $hrAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HrAdmin  $hrAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(HrAdmin $hrAdmin)
    {
        //
    }
}
