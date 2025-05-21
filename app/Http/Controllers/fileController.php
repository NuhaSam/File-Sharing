<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadFileRequest;
use App\Http\Requests\UploadFileRequest;
use App\Models\File;
use App\Models\FileDownload;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index()
    {
        return view('upload')->with([
            'success' => session('success'),
            'error' => session('error'),
        ]);
    }

    public function upload(UploadFileRequest $request)
    {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
    // 'filename' => mb_convert_encoding($filename, 'UTF-8', 'UTF-8'),

        // Check for existing file
        if (File::where('file', $filename)->exists()) {
            return back()->with('error', 'File already exists');
        }

        $code = Str::random(16);


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('SUPABASE_SERVICE_KEY'),
            'Content-Type' => 'application/octet-stream',
        ])->put(
            env('SUPABASE_URL') . '/storage/v1/object/doctor-files/file_sharing_system/' . $code . '/' . $filename,
             mb_convert_encoding($filename, 'UTF-8', 'UTF-8')
        );
        if (!$response->successful()) {
            return back()->with('error', 'Failed to upload file to Supabase');
        }

        File::create([
            'file' => $filename,
            'code' => $code,
            'count' => 0,
        ]);

        return back()->with('success', 'File Uploaded Successfully')->with('code', $code);
    }

    public function showDownload()
    {
        return view('download')->with([
            'success' => session('success'),
            'error' => session('error'),
        ]);
    }

    public function download(DownloadFileRequest $request)
    {
        $file = File::where('code', $request->code)->first();

        if (!$file) {
            return back()->with('error', 'Invalid Download Code, Please try again!');
        }

        // Log download
        FileDownload::create([
            'file_id' => $file->id,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        event('file.downloaded', [$file->id]);

        $downloadUrl = config('app.supabase_url') . '/storage/v1/object/public/' . config('app.supabase_bucket') . '/file_sharing_system' .'/'.$file->code .'/'  . $file->file;

        return redirect($downloadUrl);
    }
}
