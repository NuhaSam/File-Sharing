@extends('layout/app')

@section('title')
    <title>Contact Us | File Sharing System</title>
@endsection

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">Contact Information</h4>
                </div>

                <div class="card-body">
                    <p class="mb-3">If you have any questions, feedback, or need support, feel free to reach out to us using the contact details below:</p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Company Name:</strong> FileShare Technologies
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> <a href="mailto:nuha.sammour02@gmail.com">nuha.sammour02@gmail.com</a>
                        </li>
                        <li class="list-group-item">
                            <strong>Phone:</strong> +972 5922444943
                        </li>
                        <li class="list-group-item">
                            <strong>Address:</strong> Gaza , Palestine
                        </li>
                        <!-- <li class="list-group-item">
                            <strong>Business Hours:</strong> Monday – Friday, 9:00 AM – 6:00 PM (PST)
                        </li> -->
                    </ul>
                </div>

                <div class="card-footer text-muted text-center">
                    We’re here to help you 24/7!
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
