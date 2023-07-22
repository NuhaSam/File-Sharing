<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class fileController extends Controller
{
    //

    public function index()
    {
        $success = session()->get('success');
        // $success = "session()->get('success');"
        return view('upload', compact('success'));
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path =  $file->storeAs('/', $filename, 'local');

            File::create([
                'file' => $path,
            ]);
        }
        return redirect()->back()->with('success', 'File Uploaded Successfully');
    }
}
