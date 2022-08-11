<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return $request->all();
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
