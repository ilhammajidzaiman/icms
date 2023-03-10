<!DOCTYPE html>
<html lang="en">
{{-- <html style="height: auto;" class="" lang="en"> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @php
    $value = config('app.logo');
    $value == 'logo.svg' ? $url=url('assets/images/'.$value) : $url=asset('storage/'.$value);
    @endphp
    <link rel="shortcut icon" href="{{ $url }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/admin-lte-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/admin-lte-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/summernote-0.8.18-dist/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini text-sm layout-fixed" style="height: auto;">
    <div class="wrapper">