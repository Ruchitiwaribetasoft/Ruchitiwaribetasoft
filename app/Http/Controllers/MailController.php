<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmail(){
        $email = 'softwaretester491@gmail.com';
        $mailData = [
            'title' => 'Demo Email',
            'subject'=>'welcome to home',
        ];
        Mail::to($email)->send(new EmailDemo($mailData));
        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);

    }
}
