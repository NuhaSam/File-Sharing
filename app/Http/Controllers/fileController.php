<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\filedownload;
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
        $error = session()->get('error');
        return view('upload', compact('success','error'));
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        $code = "";
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path =  $file->storeAs('/', $filename, 'local');
            $code = Str::random(16);

        //    $exist =  File::where('file', $filename);
           $exist = DB::select('select * from files where file = :file', array($filename));
            if($exist) {
                // return "File is already exists";
                return redirect()->back()->with('error','File is already exists');
            }
            File::create([
                'file' => $path,
                'code' => $code,
            ]);
        
        }
        return view('code')->with('code' ,$code)->with('success', 'File Uploaded Successfully');
    }

    public function showDownload(){
        $success = session('success');
        return view('download', compact('success'));
    }
    public function download (Request $request) {
        $code = $request->post('code');
        $downloadedFile = DB::table('files')->where('code', $code)->first();
        $path =  storage_path('app')  . "\\".$downloadedFile->file;
         $created  = filedownload::where('file_id',$downloadedFile->id)->first();
         if($created == null){
                $created = filedownload::create([
                    'file_id' => $downloadedFile->id,
                    'ip' => $request->ip(),
                    'user_agent' => $request->header('user_agent'),
                    'count' => 0,
                ]);
        }
        event('file.downloaded',[$created]);
        
        response()->download($path);
        
        return back()->with('success','The file downloaded successfully');
    }
}
