@extends('layouts.app')

@section('title', 'Selamat Datang di CampRent')

@section('content')
<div class="relative h-screen overflow-hidden select-none">
    {{-- Background slideshow --}}
    <div id="slideshow" class="absolute inset-0 z-0">
        <img src="/img/slide1.jpg" class="absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000 ease-in-out" />
        <img src="/img/slide2.jpg" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" />
        <img src="/img/slide3.jpg" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" />
    </div>

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

    {{-- Main Content --}}
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6 text-white">
        <h1 class="text-6xl md:text-7xl font-extrabold mb-6 drop-shadow-lg leading-tight animate-fadeInDown">
            Sewa Peralatan Camping <br /> Mudah & Cepat
        </h1>
        <p class="text-2xl max-w-3xl mb-10 drop-shadow-md animate-fadeInUp">
            Temukan berbagai perlengkapan outdoor terbaik hanya di CampRent. Praktis, cepat, dan siap pakai untuk petualanganmu!
        </p>
        <a href="{{ route('register') }}"
           class="bg-primary-600 hover:bg-primary-700 px-12 py-4 rounded-full text-2xl font-semibold shadow-xl transition transform hover:scale-110 animate-fadeInUp"
           style="animation-delay: 400ms;">
            Mulai Sekarang
        </a>
    </div>
</div>

{{-- Kenapa Pilih Section --}}
<section class="bg-gray-100 py-24 px-6">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-16">Kenapa Pilih CampRent?</h2>
        <div class="grid md:grid-cols-3 gap-12">
            <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:shadow-2xl hover:-translate-y-2 transition duration-500">
                <i class="fas fa-campground text-6xl text-primary-600 mb-6"></i>
                <h3 class="text-2xl font-semibold mb-3">Peralatan Lengkap</h3>
                <p class="text-gray-700 leading-relaxed">Tenda, matras, kompor portable, hingga hammock tersedia.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:shadow-2xl hover:-translate-y-2 transition duration-500">
                <i class="fas fa-clock text-6xl text-primary-600 mb-6"></i>
                <h3 class="text-2xl font-semibold mb-3">Cepat & Praktis</h3>
                <p class="text-gray-700 leading-relaxed">Pilih, pesan, dan peralatan siap diambil atau diantar.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg transform hover:shadow-2xl hover:-translate-y-2 transition duration-500">
                <i class="fas fa-leaf text-6xl text-primary-600 mb-6"></i>
                <h3 class="text-2xl font-semibold mb-3">Eco Friendly</h3>
                <p class="text-gray-700 leading-relaxed">Dukung kegiatan outdoor yang bertanggung jawab dan ramah alam.</p>
            </div>
        </div>
    </div>
</section>

{{-- Slideshow script --}}
<script>
    const slides = document.querySelectorAll('#slideshow img');
    let current = 0;

    setInterval(() => {
        slides[current].classList.remove('opacity-100');
        slides[current].classList.add('opacity-0');

        current = (current + 1) % slides.length;

        slides[current].classList.remove('opacity-0');
        slides[current].classList.add('opacity-100');
    }, 5000);
</script>

{{-- Animation keyframes --}}
<style>
@keyframes fadeInDown {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fadeInDown {
    animation: fadeInDown 0.8s ease forwards;
}
.animate-fadeInUp {
    animation: fadeInUp 0.8s ease forwards;
}
</style>
@endsection
