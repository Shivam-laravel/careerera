<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result['batches'] = DB::table('Course_Batches_detail')
        // ->select('workshop_id','ProgramManager')
        // ->get();
        // // echo "<pre>";
        // // print_r($result);
        // // exit;

        return view('query.form');
    }


    public function store(Request $request)
    {
            $id = IdGenerator::generate(['table' => 'interviews','field'=>'snva_id', 'length' => 8, 'prefix' => 'SNVA']);
            $model = new Interview();
            if($request->has('file')){
                $path = $request->file('file')->store(
                    'resumes', 'public'
                );
                $model->resume = $path;
            }

            $model->snva_id = $id;
            $model->name = $request->post('name');
            $model->email = $request->post('email');
            $model->phone = $request->post('phone');
            $model->status = 'new';
            $model->save();
            $snva_id = $model->snva_id;
            $request->session()->flash("msg","Thank You. Your Interview is scheduled. Your Reference id is: $snva_id");
            return redirect('interview-form');

    }

    public function candidates(){
        $result['candidates'] = Interview::orderBy('id', 'DESC')->get();
        return view('hradmin.interviews.index',$result);
    }

    public function status(Request $request){
        $status = $request->post('status');
        $id = $request->post('id');
        $model = Interview::find($id);
        $model->status = $status;
        $model->save();
        return redirect('hr/interview/candidates');
    }
}
