<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;


class HomeController extends Controller
{
    //
    function index()
    {
        return view('index');
    }

    function email()
    {
        return view('email');
    }
    // send email
    public function send_email(Request $request)
    {
        // validate requests
        $this->validate($request, [
            'emails'     =>  'required',
            'subject'   =>  'required',
            'content'   =>  'required'
        ]);
        // format emails
        $emails = array_filter(array_map('trim', explode(',', $request->emails)));
        foreach ($emails as $key => $email) {
            $data['view'] = 'sendmail';
            $data['subject'] = $request->subject;
            $data['email'] = env('MAIL_FROM_ADDRESS');
            $data['fname'] = env('MAIL_FROM_NAME');
            $data['message'] = $request->content;
            
            try {
                Mail::to($email)->queue(new Sendmail($data));
            } catch (\Exception $e) {
                dd($e);
            }
        }  
        return back()->withSuccess('Email sent successfully');
    }
     function setting()
    {
        return view('setting');
    }
    // save settings
    public function save_settings(Request $request)
    {
        // return $request->all();
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        return back()->withSuccess(__("Settings updated successfully"));
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }
    
}
