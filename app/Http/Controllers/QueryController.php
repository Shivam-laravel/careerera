<?php

namespace App\Http\Controllers;

use App\Models\Laravel_ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class QueryController extends Controller
{
    public function index(Request $request){
        $result['batch_id'] = $request->batch_id;
        $result['user_id'] = $request->user_id;
        $result['programmanagerid'] = DB::table('Course_Batches_detail')
        ->where('workshop_id','=',$result['batch_id'])
        ->select('ProgramManager')
        ->first();
        $result['studentname'] = DB::table('user')
        ->where('user_registration_id','=',$result['user_id'])
        ->select('user_name')
        ->first();
        $result['query'] = DB::table('laravel_querytypes')
        ->select('query_type')
        ->get();
        // echo "<pre>";
        // print_r($result);
        // exit;
        return view('query.form',$result);
    }

    public function querysubmit(Request $request){

        $id = IdGenerator::generate(['table' => 'laravel_tickets','field'=>'issue_id', 'length' => 8, 'prefix' => 'ISSUE-']);
        $model = new Laravel_ticket();
        $model->student_name = $request->post('student_name');
        $model->issue_id = $id;
        $model->batch_id =  $request->post('batch_id');
        $model->program_manager_id =  $request->post('program_manager_id');
        $model->student_id =  $request->post('student_id');
        $model->query_type =  $request->post('query_type');
        $model->description = $request->post('description');
        $model->status = 'Open';
        $model->save();
        echo "Your Query has been Submitted";
    }
}
