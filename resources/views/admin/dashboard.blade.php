<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@extends('layouts.admin')
@section('content')
<div class="flex justify justify-between  bg-slate-300 shadow-inner">
    <h1 class="text-2xl  mb-8 mt-4 ml-5">Admin Dashboard</h1>
    <div class="mt-4 mr-5">
    <form method="POST" action="{{ route('logout') }}">
         @csrf
         <x-primary-button class="ms-3">
         logout
            </x-primary-button>
    </form>
    </div>
</div>
@endsection 
</body>
</html>