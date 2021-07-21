<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as newFile;

class FileController extends Controller
{
    public function update() {
        return response()->json([
            'data' => File::all()->sortByDesc('created_at')->take(10)
        ], 200);
    }

    public function upload(Request $request) {

        $model = new File();
        $file = $request->file('file');

        Storage::disk('public')->put(trim($file->getClientOriginalName()), newFile::get($file));

        $url = Storage::disk('public')->url($file->getClientOriginalName());
        $url = str_replace('localhost', 'localhost:9081', $url);
        $model->link = $url;
        $model->size = round($file->getSize()/1024, 2). " KB";
        $model->save();
    }
}
