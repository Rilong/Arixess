<?php

namespace App\Jobs;

use App\Mail\EmailForQueuing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $details = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $details)
    {

        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailForQueuing($this->details);
        $managers = User::getManagers();

        foreach ($managers as $manager) {
            Mail::to($manager->email)->send($email);
        }
    }
}
