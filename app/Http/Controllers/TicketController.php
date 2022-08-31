<?php

namespace App\Http\Controllers;

use App\Models\Laravel_ticket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function opentickets()
    {
        $result['queries'] = Laravel_ticket::where(['program_manager_id'=>Session::get('PROGRAM_MANAGER_ID'),'status'=>'Open'])->get();
       return view('admin.tickets.opentickets',$result);
    }

    public function closetickets()
    {
        $result['queries'] = Laravel_ticket::where(['program_manager_id'=>Session::get('PROGRAM_MANAGER_ID'),'status'=>'Closed'])->get();
       return view('admin.tickets.closetickets',$result);

    }

    public function singleticket($issueid){
        $result['ticket'] = Laravel_ticket::where(['issue_id'=>$issueid,'program_manager_id'=>Session::get('PROGRAM_MANAGER_ID')])->get();
        return view('admin.tickets.viewticket');
    }
}
