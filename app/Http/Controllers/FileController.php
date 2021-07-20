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
            'data' => File::all()
        ], 200);
    }

    public function upload(Request $request) {

        $model = new File();
        $file = $request->file('file');

        Storage::disk('public')->put(trim($file->getClientOriginalName()), newFile::get($file));

        $model->link = Storage::disk('public')->url($file->getClientOriginalName());
        $model->size = round($file->getSize()/1024, 2). " KB";
        $model->save();
    }
}
