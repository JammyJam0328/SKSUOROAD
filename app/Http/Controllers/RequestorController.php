<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
class RequestorController extends Controller
{
    public function dashboard()
    {
        return view('pages.requestor.dashboard');
    }
    public function request()
    {
        return view('pages.requestor.request');
    }

    public function finalize(Request $request)
    {
        if (!$request->id) {
            abort(404);
        }
        $request = RequestModel::where('id',$request->id)->first();
        return view('pages.requestor.finalize',[
            'id'=>$request->id,
        ]);
    }
    // 
    public function information()
    {
        if (!auth()->user()) {
            return redirect()->route('login');
        }
        if(Auth()->user()->hasInfo){
            return redirect()->route('dashboard');
        }
        return view('pages.requestor.information');
    }
    // 

    public function viewrequest(Request $request)
    {
        if (!$request->id||!$request->code) {
            abort(404);
        }

        $docxrequest =  RequestModel::where('id',$request->id)->where('request_code',$request->code)->first();
        if (!$docxrequest||auth()->user()->id != $docxrequest->user_id) {
             abort(404,"here");
        }else{
            return view('pages.requestor.view-request',[
                'id'=>$request->id,
                'code'=>$request->code,

            ]);
        }

        
    }
}