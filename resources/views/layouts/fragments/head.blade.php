<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>@yield('title', 'Pharmacy Management System') - {{ config('app.name') }}</title>

<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

<link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ config('app.version') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&Roboto+Mono:wght@400;700&display=swap" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.2.1/dist/simplebar.css" />

