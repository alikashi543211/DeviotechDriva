<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\ConsumerProfile;
use Mail;

class SendDiscountEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
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
        $subject = $this->details['subject'];
        $id = $this->details['garage'];
        $discount = $this->details['discount'];
        $followers = $this->details['followers'];
        $consumers = ConsumerProfile::whereIn('id', $followers)->get();

        foreach ($consumers as $item) {
            Mail::send('emails.garage.discount_send', get_defined_vars() , function($message) use($item, $subject){
                $message->to($item->user->email, $item->user->name)
                    ->subject($subject);
            });
        }
    }
}
