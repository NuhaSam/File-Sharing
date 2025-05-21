@extends('layout/app')

@section('title')
    <title>File Sharing System | Download File</title>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow rounded-4">
                <div class="card-header text-black rounded-top-4">
                    <h5 class="mb-0">{{ __('messages.Download File') }}</h5>
                </div>

                <div class="card-body">

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

                    <form method="POST" action="{{ route('file.download') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="code" class="form-label">{{ __('messages.Enter Download Code') }}</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="e.g., Xk9f2Ht7Ws93LdP4" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">{{ __('messages.Download') }}</button>
                    </form>

                </div>

                <div class="card-footer text-muted text-center">
                    File Sharing System © {{ date('Y') }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
