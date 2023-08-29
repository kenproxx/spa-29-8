<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendEmail($mailTo, $mailFrom, $message, $subject)
    {
        Mail::send([], [], function ($message) use ($mailTo, $message, $mailFrom, $subject) {
            $message->to($mailTo)
                ->subject($subject);

            $message->from($mailFrom->value, config('mail.from.name'));
            $message->text($message);
        });

        return response()->json(['message' => 'Email sent successfully']);
    }

    public function sendMailBlade($data, $email, $url, $subject, $mailFrom, $title)
    {
        // url ở đây là đừong dẫn đến blade mà bạn muốn gửi
        // title là tiêu đề của mail
        // data là dữ liệu muốn gửi kèm trong mail
        // email là email nhận mail
        // mailTo là email gửi
        Mail::send($url, $data, function ($message) use ($email, $subject, $mailFrom, $title) {
            $message->to($email, $subject)->subject($subject);
            $message->from($mailFrom, $title);
        });
    }
}
