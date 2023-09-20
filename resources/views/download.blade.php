@extends('layout/header')
@section('content')

<div class="card-body">
    @if($success)
    <div class="alert alert-success">
        {{$success }}
    </div>
    @endif
       <form method="post" action="{{ route('file.download') }}">
        @csrf
        <label>Type File Code to Download </label> <br>
        <input type="text" name="code">
        <br>
        <button class="blue" type="submit" name="download" value="Download">Download</button>
    </form>
</div>
<div class="card-footer text-body-secondary">
    2 days ago
</div>
@endsection