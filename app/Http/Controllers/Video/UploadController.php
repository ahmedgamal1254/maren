<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class UploadController extends Controller
{
        /**
     * @return Application|Factory|View
     */
    public function index($id) {
        $video_id=$id;
        $lesson=Lesson::find($id);
        return view('Videos.index',compact("lesson"));
    }

    public function upload(Request $request) {
        $_REQUEST["name"];
        $input = $request->all();

        // THE UPLOAD DESITINATION - CHANGE THIS TO YOUR OWN
        $filePath = storage_path('app/public/vidoes');

        if (!file_exists($filePath)) {
            if (!mkdir($filePath, 0777, true)) {
                return response()->json(["ok"=>0, "info"=>"Failed to create $filePath"]);
            }
        }

        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
        $filePath = $filePath . DIRECTORY_SEPARATOR . $fileName;

        // DEAL WITH CHUNKS
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = fopen($_FILES['file']['tmp_name'], "rb");

            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                return response()->json(["ok"=>0, "info"=>'Failed to open input stream']);
            }

            fclose($in);
            fclose($out);
            unlink($_FILES['file']['tmp_name']);
        }

        // CHECK IF FILE HAS BEEN UPLOADED

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
            $array = ['file' => $fileName];
        }

        $info = "Upload OK";
        $ok =1;

        $lesson=Lesson::find($request->id);
        $lesson->video_url=$fileName;
        $lesson->save();

        return response()->json(["ok"=>$ok, "info"=>$info]);
    }
}
