<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        
        try {
            $toEmailAddress = "ccheikh1722@gmail.com";
            $welcomMessage= "Test Email";
            $Response=Mail::to($toEmailAddress)
                ->send(new \App\Mail\sendMail($welcomMessage));
             dd($Response);
        } catch (\Exception $e) {
             \Log::error('Mail sending failed: ' . $e->getMessage());
        }

        
    }
}
