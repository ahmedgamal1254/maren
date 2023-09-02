<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadLesoonVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $videoPath;
    public function __construct($videoPath)
    {
        $this->videoPath = $videoPath;
    }

    public function handle(): void
    {
    // Get the video file name
    $videoFileName = pathinfo($this->videoPath, PATHINFO_FILENAME);

    // Define the disk where you want to store the video (e.g., 'public', 's3', etc.)
    $disk = 'public';

    // Upload the video file using the Storage facade
    Storage::disk($disk)->putFileAs('', $this->videoPath, $videoFileName);


    // For example, you can retrieve the uploaded video URL
    $videoUrl = Storage::disk($disk)->url($videoFileName);

    }
}
