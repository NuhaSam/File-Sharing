@extends('layout/header')

@section('content')
<center>
<div class=" btn-group btn-group-lg" role="group" aria-label="Large button group" style="margin-top: 10%;">
    <div class="d-flex justify-content-between">
        <form action="{{ route('file.index') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-primary" name="upload" >Upload Files</button>
        </form>
        <form action="{{ route('file.showDownload') }}"  method="get">
            @csrf
            <button type="submit" class="btn btn-outline-primary" >Download Files</button>
        </form>
    </div>
</div>
</center>
@endsection
