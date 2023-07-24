<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    //

    public function index()
    {
        $success = session()->get('success');
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
            $code = Str::random(16);

        //    $exist =  File::where('file', $filename);
           $exist = DB::select('select * from files where file = :file', array($filename));
            if($exist) {
                return "File is already exists";
            }else {
            File::create([
                'file' => $path,
                'code' => $code,
            ]);
        }
        }
        return view('code')->with('code' ,$code)->with('success', 'File Uploaded Successfully');
    }

    public function download(Request $request)  {
        $code = $request->post('code');
        $myfile = DB::select('select * from files where code = :code', array($code));
        $file= public_path(). "\\".$myfile[0]->file;
        $path =  storage_path('app')  . "\\".$myfile[0]->file;
        return response()->download($path);
    }
}
