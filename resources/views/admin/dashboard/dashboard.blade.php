@extends('layouts.app')

@section('title', 'Dashboard admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>
    <p class="text-gray-700">Ini adalah dashboard admin CampRent.</p>
</div>
@endsection
