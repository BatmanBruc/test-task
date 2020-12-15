<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use Exception;
use Mail;
use App\Jobs\SendEmail;
class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    /**
     * Create request.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function request(Request $request)
    {
        if(!Gate::allows('create-request')){
            return view('formUser')->with([
                'message'=>'Оставлять заявку возможно только раз в сутки.',
                'success'=>2
            ]);
        }
        $this->validate($request, [
            'message' => ['required'],
            'theme' => ['required'],
            'file' => ['required'],
        ]);
        
        $file = Storage::disk('public')->put($request->file('file')->getClientOriginalName(), $request->file('file'));
        $client_request = new Requests();
        $client_request->message = $request->input('message');
        $client_request->theme = $request->input('theme');
        $client_request->file = $file;
        $client_request->user_id = $request->user()->id;
        $client_request->save();
        
        $this->sendEmail([
            'mess' => $request->input('message'),
            'theme' => $request->input('theme'),
            'file' => $file,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'date' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $user = User::find($request->user()->id);
        $user->request = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();

        return view('formUser')->with([
            'message'=>'Заявка успешно отправлена.',
            'success'=>1
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('formUser');
    }

    /**
     * Send email.
     *
     * @param array $data
     * 
     * @return void
     */
    public function sendEmail($data)
    {
        SendEmail::dispatch($data);        
    }
}
