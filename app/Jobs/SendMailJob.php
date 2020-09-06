<?php

namespace App\Jobs;

use App\Mail\ConfirmMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    private $details;
    /**
     * @var string
     */
    private $type;

    /**
     * Create a new job instance.
     *
     * @param array $details
     * @param string $type
     */
    public function __construct(array $details, string $type)
    {
        $this->details = $details;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->type) {
            case 'confirm' : {
                Mail::send(new ConfirmMail($this->details));
            }
            case 'reset' : {
                Mail::send(new ResetPasswordMail($this->details));
            }
        }
        //if ($this->type == 'confirm')
    }
}
