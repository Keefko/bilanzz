<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'bodyMessage' => $request->input('text')
        );

        Mail::send('mail', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('kohooutdan@gmail.com');
            $message->subject('Nová správa');
        });

        session()->flash('success', 'Váš email bol odoslaný');

        return redirect()->back()->with('success', 'Váš email bol odoslaný');
    }
}
