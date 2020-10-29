<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Conatactus;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
    	return view('contactus');
    }

    public function submit(Request $req)
    {
    	if ($this->send($req)) {
    		return redirect()->back()->with('success', 'Your enquiry submitted! we will contact you soon.');
    	} else {
    		return redirect()->back()->with('error', 'Sorry! Something went wrong. please try again.');
    	}
    }

    public function send($data)
    {
        $objDemo = new \stdClass();
        $objDemo->name = $data->name;
        $objDemo->mobile = $data->mobile;
        $objDemo->email = $data->email;
        $objDemo->comments = $data->comments;
        $objDemo->sender = 'no-reply@industrialsupplycart.com';
        $objDemo->receiver = 'support@energi-adidaya.com';
 
        Mail::to("support@energi-adidaya.com")->send(new Conatactus($objDemo));
        	

        if(count(Mail::failures()) > 0){
		    return false;
		}
		return true;

    }
}
