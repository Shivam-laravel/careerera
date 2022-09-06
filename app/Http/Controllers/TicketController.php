<?php

namespace App\Http\Controllers;

use App\Models\Laravel_comment;
use App\Models\Laravel_ticket;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function openticketshours()
    {
        $result['queries'] = DB::table('laravel_tickets')->where('created_at', '>', Carbon::now()->subHours(8)->toDateTimeString())
        ->where('program_manager_id','=',Session::get('PROGRAM_MANAGER_ID'))
        ->get();

       return view('admin.tickets.opentickets',$result);
    }

    public function closetickets()
    {
        $result['queries'] = Laravel_ticket::where(['program_manager_id'=>Session::get('PROGRAM_MANAGER_ID'),'status'=>'Closed'])->get();
       return view('admin.tickets.closetickets',$result);

    }

    public function singleticket($issueid){
        $result['ticket'] = Laravel_ticket::where(['issue_id'=>$issueid,'program_manager_id'=>Session::get('PROGRAM_MANAGER_ID')])->get();
        $result['comments'] = Laravel_comment::where(['issue_id'=>$issueid])->get();
        return view('admin.tickets.viewticket',$result);
    }

    public function status(Request $request){
        Laravel_ticket::where('issue_id',$request->issue_id)->update(['status'=>$request->post('status')]);

        return redirect()->back();
    }
}
