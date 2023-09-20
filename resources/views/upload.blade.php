    @extends('layout/header')
    @section('content')
    <h1 style="margin-left: 7%;">Upload file</h1>
    @if($success)
    <div class="alert alert-success">
        {{ $success }}
    </div>
    @endif
    @if($error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endif

    <form action="{{ route('file.uploads')  }}" method="post" style="width: 70%;  margin-left:7% " enctype='multipart/form-data'>
        {{ csrf_field() }}
        @method('put')
        <div class="form-floating mb-3">
            <input type="file" class="form-control" name="file" id="file" placeholder="File">
            <label for="file">File</label>
        </div>
       <button type="submit" name="upload" class="btn btn-primary">Upload</button>
        
    </form>

    </body>

    </html>
    @endsection