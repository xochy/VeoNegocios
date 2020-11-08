<?php

namespace App\Listeners;

use App\Events\ImageSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ImageSaved  $event
     * @return void
     */
    public function handle(ImageSaved $event)
    {
        $image = Image::make(Storage::get($event->image->url));
        $image->widen($event->width)->encode();

        Storage::put($event->image->url, (string) $image);
    }
}
