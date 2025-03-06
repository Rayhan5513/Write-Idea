<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
    <div class=" flex items-center lg:justify-center min-h-screen flex-col">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="300" height="300">
    <h1 class="text-red-500 font-bold text-6xl">welcome to WriteIdea</h1>
        <div class="flex mt-10">
        <x-primary-button class="">
            <a class=" text-sm text-black-600 hover:text-gray-200 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Register') }}
        </a>  
            </x-primary-button>
            <x-primary-button class="ms-4">
            <a class=" text-sm text-black-600 hover:text-gray-200 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('login') }}
        </a>  
            </x-primary-button>
        </div>
    </div>
    </body>
</html>
