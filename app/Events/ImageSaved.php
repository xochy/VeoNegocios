<?php

namespace App\Events;

use App\Image;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImageSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $image;
    public $width;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Image $image, $width)
    {
        $this->image = $image;
        $this->width = $width;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
