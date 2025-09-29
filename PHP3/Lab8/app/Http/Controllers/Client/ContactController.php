<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('client.contact');
    }


    public function store(ContactRequest $request){
        
        // gửi mail sau đó chuyển hướng
        // gửi mail ở đây

        Mail::to('tinhpv10@fpt.edu.vn')->send(new ContactMail($request->all()));
        // chuyển hướng
        return redirect()->back()->with('success', 'Đã gửi thành công');
    }
}
