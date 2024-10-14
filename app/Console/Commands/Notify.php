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
      //  $users = User::select('email')->get();
        
        $emails = User::pluck('email')->toArray();
        $data = ['title' => 'Cource Notification', 'body' => 'please check your inbox for more details'];

        foreach ($emails as $email){
            // how to send email in laravel
            Mail::to($emails)->send(new NotifyEmail($data));

        }
    }
}
