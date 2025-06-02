@extends('layouts.app')

@section('title', 'Masuk - CampRent')

@section('content')
<div class="flex items-center justify-center min-h-[75vh] px-4 bg-gradient-to-br from-indigo-50 via-indigo-100 to-indigo-50">
    <div class="max-w-md w-full bg-white p-10 rounded-2xl shadow-xl ring-1 ring-indigo-300">
        <h2 class="text-3xl font-extrabold text-indigo-700 text-center mb-8 tracking-wide">Selamat Datang Kembali!</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-6 text-center font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="username" required value="{{ old('username') }}"
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition"
                       placeholder="Masukkan username kamu">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition"
                       placeholder="Masukkan password">
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md shadow-md transition transform hover:scale-105">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">Daftar Sekarang</a>
        </p>
    </div>
</div>
@endsection
