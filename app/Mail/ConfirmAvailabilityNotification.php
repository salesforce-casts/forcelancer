<?php

namespace App\Mail;

use App\Models\Resource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmAvailabilityNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env("MAIL_FROM_ADDRESS"))
            ->subject("YES! I will be available.")
            ->markdown("mails.confirm-availability", [
                "url" => "https://www.salesforcecasts.com",
                "resourceId" => $this->resource->id,
            ]);
    }
}
