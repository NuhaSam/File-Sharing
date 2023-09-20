@extends('layout/header')
@section('content')

<body>

    <body>
        <div class="card text-center">
            <div class="card-header">
            </div>
            @if($success)
            <div class="alert alert-success">
                {{ $success }}
            </div>
            @endif

            <h5>
                {{ $code }}
            </h5>
        </div>
    </body>

    </html>
    @endsection