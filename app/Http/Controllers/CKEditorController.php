<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Đừng quên thêm use Log

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            $file->move(public_path('uploads'), $filename);
            $url = asset('uploads/' . $filename);
    
            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => $url
            ]);
        }
    
        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'No file uploaded.']
        ]);
    }
    
}
