@extends('layout/app')

@section('title')
    File Sharing System | Upload File
@endsection

@section('content')
<style>
    body {
        background: #f4f7f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .upload-container {
        max-width: 600px;
        margin: 60px auto;
        background: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    .upload-container h1 {
        font-size: 26px;
        margin-bottom: 20px;
        color: #333;
        font-weight: 600;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .alert-success {
        background-color: #e6ffed;
        color: #207240;
        border: 1px solid #a3d9b1;
    }

    .alert-danger {
        background-color: #ffe6e6;
        color: #a94442;
        border: 1px solid #f5c6cb;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
        font-size: 15px;
    }

    .btn-primary {
        background-color: #0051ff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        font-size: 15px;
    }

    .btn-primary:hover {
        background-color: #003fcc;
    }

    .code-box {
        background-color: #f1f4f8;
        padding: 12px 18px;
        border-left: 4px solid #0051ff;
        font-size: 16px;
        border-radius: 6px;
        color: #333;
        margin-bottom: 20px;
    }
</style>

<div class="upload-container">
    <h1>{{ __('messages.Upload Your File') }}</h1>

    @if($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

   @if(session('code'))
    <div class="code-box">
        <strong>{{ __('messages.File Download Code') }}:</strong> {{ session('code') }}
    </div>
@endif

    @if($error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    <form action="{{ route('file.uploads') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')

        <div class="form-floating mb-3">
            <input type="file" class="form-control" name="file" id="file" required>
            <label for="file">{{ __('messages.Select File') }}</label>
        </div>

        <button type="submit" name="upload" class="btn btn-primary">{{ __('messages.Upload') }}</button>
    </form>
</div>
@endsection
