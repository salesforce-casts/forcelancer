<?php

namespace App\Mail;

use App\Models\Resource;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class AvailableForHireNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $resource;

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
        // $signedUrl = URL::signedRoute('confirm-available', ['resource' => $this->resource->id]);
        $signedUrl = URL::temporarySignedRoute(
            "confirm-available",
            now()->addMinutes(10),
            ["resource" => $this->resource->id]
        );
        return $this->from(env("MAIL_FROM_ADDRESS"))
            ->subject("Are you available to Hire?")
            ->markdown("mails.available-for-hire", [
                "url" => "https://www.salesforcecasts.com",
                "resourceId" => $this->resource->id,
                "resourceName" => $this->resource->user->name,
                "signedUrl" => $signedUrl,
            ]);
    }
}
