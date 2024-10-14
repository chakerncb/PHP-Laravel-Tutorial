<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;


class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify user after specific time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $emails = User::pluck('email')->toArray(); // bring the users emails from the database and store them in a array

        foreach ($emails as $email) {
            // how to send email in laravel
            $data = ['title' => 'Cource Notification', 'body' => 'please check your inbox for more details' , 'email' => $email];
            Mail::to($email)->send(new NotifyEmail($data));

        }
    }
}
