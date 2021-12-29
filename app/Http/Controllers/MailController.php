<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function complainEmail($id){
        $complain = Complain::find($id);
        $details = [
            'title' => 'Response from AgricultureManagementSystem',
            'body' => 'Your Answer: ' . $complain->answer,
        ];
        Mail::to($complain->email)->send(new SendMail($details));
        return redirect()->route('complain')->with('success', 'Email Sent');

    }
}
