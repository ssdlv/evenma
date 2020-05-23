<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class ReseizeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $file;
    /**
     * @var array
     */
    private $format;

    /**
     * Create a new job instance.
     *
     * @param string $file
     * @param array $format
     */
    public function __construct(string $file, array $format)
    {
        $this->file = $file;
        $this->format = $format;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->format as $format) {
            $manager = new ImageManager(['driver' => 'gd']);
            /*$manager = Image::make($this->file);
            $manager->resize($format, $format)
                ->rotate(45)
                ->save(public_path('uploads') . "/" . pathinfo($this->file, PATHINFO_FILENAME) . "_{$format}x{$format}");
            */$manager->make($this->file)
                ->fit($format, $format)
                ->rotate(45)
                ->save(public_path('uploads') . "/" . pathinfo($this->file, PATHINFO_FILENAME) . "_{$format}x{$format}");
        //*/
        }
    }
}
