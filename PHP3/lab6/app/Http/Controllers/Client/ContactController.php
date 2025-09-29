<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view("client.contact");
    }

    public function store(ContactRequest $request) {
        Mail::to('linhpqpc05353@fpt.edu.vn')->send(new ContactMail($request->all()));
        return 
            redirect()
                ->back()
                ->with('success', 'Đã gửi mail thành công');
    }
}
