<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="">
    <meta charset="utf-8">
    <title>@yield('title', $page_title ?? 'Page Title') </title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- @vite('resources/css/app.css') --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href=
    "{{ asset('logo.jpeg') }}"
              type="image/x-icon">
    <!-- Styles -->
    {{-- @vite('resources/css/custom/global.css') --}}
    {{-- @vite('resources/css/custom/footer.css') --}}
    {{-- @vite('resources/css/custom/contact.css') --}}
</head>