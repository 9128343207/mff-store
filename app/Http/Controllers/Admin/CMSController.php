<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Header, Footer};

class CMSController extends Controller
{
    public function header()
    {
    	return view('admin.CMS.header');
    }

    public function footer()
    {
    	return view('admin.CMS.footer');
    }

    public function UpdateFooter(Request $req)
    {
    	$footer = Footer::find($req->id);
    	$footer->about = $req->about ;
    	$footer->address = $req->address ;
    	$footer->support_number = $req->phone;
    	$footer->support_mail = $req->mail;
    	$footer->status = 1;
    	$footer->save();
    	return redirect()->back()->with('message', 'Footer updated successfully');
    }

    public function UpdateHeader(Request $req)
    {
    	$header = Header::find($req->id);
    	$header->title = $req->com_title;
    	$header->desc = $req->com_desc;
    	$header->status = 1;
    	$header->save();

    	return redirect()->back()->with('message', 'Header updated successfully');
    }
}
