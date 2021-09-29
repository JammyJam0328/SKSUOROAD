<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    //
    public function dashboard()
    {
        return view('pages.registrar.dashboard');
    }
    public function request()
    {
        return view('pages.registrar.request');
    }
    public function graduates()
    {
        return view('pages.registrar.graduate');
    }

    public function reports()
    {
        return view('pages.registrar.report');
    }
// Request
    public function all()
    {
        return view('pages.registrar.requests.all');
    }
     public function approved(Request $request)
    {
        return view('pages.registrar.requests.apporved',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
     public function pending(Request $request)
    {
        return view('pages.registrar.requests.pending',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
    public function review(Request $request)
    {
        return view('pages.registrar.requests.payment-review',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
     public function denied(Request $request)
    {
        return view('pages.registrar.requests.denied',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
    public function toclear(Request $request)
    {
        return view('pages.registrar.requests.from-gradute',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
    public function ready(Request $request)
    {
        return view('pages.registrar.requests.ready-to-claim',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
     public function claimed(Request $request)
    {
        return view('pages.registrar.requests.claimed',[
            'id'=> $request->id ? $request->id : '',
        ]);
    }
}