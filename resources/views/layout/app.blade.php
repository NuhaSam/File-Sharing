<!DOCTYPE html>
<html <html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'File Sharing System')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS or Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>
    {{-- Optional: Header or Nav --}}
    @include('layout.header')

    <main>
        @yield('content')
    </main>

    {{-- Footer always at the bottom --}}
    @include('layout.footer')

    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
