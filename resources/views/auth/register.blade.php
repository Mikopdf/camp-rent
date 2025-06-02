@extends('layouts.app')

@section('title', 'Daftar - CampRent')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-green-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-10">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Buat Akun Baru</h2>
            <p class="mt-2 text-gray-600">Mulai petualangan outdoor kamu dengan CampRent</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-10 ring-1 ring-green-300">
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4 text-red-700 font-semibold">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input id="name" name="name" type="text" required
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none transition"
                           placeholder="Nama lengkap kamu" value="{{ old('name') }}">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Alamat Email</label>
                    <input id="email" name="email" type="email" required
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none transition"
                           placeholder="nama@example.com" value="{{ old('email') }}">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Kata Sandi</label>
                    <input id="password" name="password" type="password" required
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none transition"
                           placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" required value="{{ old('username') }}"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition"
                        placeholder="Masukkan username">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-300 focus:outline-none transition"
                           placeholder="Ulangi kata sandi">
                </div>

                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-md shadow-md transition transform hover:scale-105">
                    Daftar
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:underline">Masuk di sini</a>
        </p>

        <p class="text-center text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:underline">Kembali ke beranda</a>
        </p>
    </div>
</div>
@endsection
