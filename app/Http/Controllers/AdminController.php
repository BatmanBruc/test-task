<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = DB::select('SELECT r.id, r.created_at, r.file, r.check, r.theme, r.message, u.name, u.email FROM requests AS r LEFT JOIN users AS u ON r.user_id = u.id');
        return view('adminPanel')->with('requests', $requests);
    }

    /**
     * Notes check request.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return void
     */
    public function checkRequest(Request $request)
    {
        $req = Requests::find($request->input('id'));
        $req->check = 1;
        $req->save();
    }
}
