@extends('layouts.main')

@push('meta')
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://mahadisaputra.my.id/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }} / Mahadi Saputra">
    <meta property="og:description"
        content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta property="og:image" content="{{ asset('assets/img/1.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="{{ $title }} / Mahadi Saputra">
    <meta name="twitter:description"
        content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="twitter:image" content="{{ asset('assets/img/1.png') }}">
@endpush

@section('container')
    <main class="mt-12">
        <section id="jumbotron" class="bg-[#FDE3E2] dark:bg-[#2A323E] py-20 px-4">
            <div
                class="flex flex-col md:flex-row justify-between items-center mx-auto mt-10 gap-4 md:gap-10 lg:gap-7 max-w-6xl">
                <div class="flex flex-col justify-center text-gray-900 dark:text-gray-50 space-y-10" data-aos="fade-right">
                    <h1 class="text-4xl font-extrabold lg:text-6xl">
                        Mahadi <span class="bg-blue-500 text-white dark:bg-[#020817] p-2 rounded-lg">Saputra</span></h1>
                    <p class="lg:text-lg leading-loose tracking-normal text-gray-600 dark:text-gray-300">
                        Di website ini, saya akan berbagi beragam informasi menarik seputar dunia Web Programming serta
                        berbagai Tips dan Trik yang mungkin bermanfaat.
                    </p>

                    <button id="scrollToProjects"
                        class="w-44 inline-flex items-center justify-center rounded-full text-sm bg-blue-600 dark:bg-[#444A54] text-gray-50 hover:bg-blue-600/80 dark:hover:bg-[#444A54]/80 h-10 px-4 py-2">
                        Proyek terakhir saya
                        </a>
                </div>
                <div class="hidden lg:block lg:max-w-xs" data-aos="fade-left">
                    <img class="transition-shadow duration-700 hover:shadow-xl dark:shadow-slate-500/25 rounded-xl"
                        src="{{ asset('assets/img/1.png') }}" alt="Mahadi Saputra">
                </div>
            </div>
        </section>

        <section id="projects">
            <div
                class="-mt-6 flex flex-col justify-center items-center text-gray-900 dark:text-gray-50 p-10 mx-auto bg-[#E9E9E9] dark:bg-[#444A54] shadow-inner dark:shadow-0">
                <div class="max-w-6xl">
                    <div class="max-w-2xl mx-auto p-4">
                        <div class="flex flex-col justify-center items-center tracking-wide space-y-3 text-center">
                            <h1 class="text-4xl font-bold">Proyek terakhir saya</h1>
                            <p class="tracking-normal text-sm text-gray-600 dark:text-gray-300 leading-loose text-md">
                                Saya telah menyelesaikan beberapa proyek sendiri & saya lebih menyukai Front-End dan
                                sekarang
                                sedang belajar Back-End juga (≧∇≦)ﾉ
                            </p>
                        </div>
                        <hr class="w-48 h-1 mx-auto mt-4 mb-10 bg-gray-400/50 border-0 rounded dark:bg-gray-800/50">
                    </div>


                    <div class="space-y-10">
                        {{-- 1 --}}
                        <div class="inline-flex flex-col lg:flex-row justify-between items-center gap-14">
                            {{-- Image --}}
                            <img src="{{ asset('assets/img/projects/mooflixxi.png') }}" class="w-[470px] shadow-lg rounded-lg"
                                alt="MoofliXXI">
    
                            {{-- Description --}}
                            <div class="space-y-5 px-2">
                                <h1 class="text-4xl font-bold mb-3">MoofliXXI</h1>
                                <a href="https://mooflixxi.mahadisaputra.my.id/" target="_blank" rel="noopener noreferrer" 
                                    class="flex items-center gap-2 text-blue-600 dark:text-blue-300 hover:underline">https://mooflixxi.mahadisaputra.my.id/
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0  0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg></a>
                                <p class="tracking-normal text-sm lg:text-lg text-gray-600 dark:text-gray-300 leading-loose">
                                    MoofliXXI membantu untuk mendapatkan informasi tentang Film Trending Harian, Film
                                    Trending Mingguan, Film yang Sedang Diputar di Bioskop Indonesia, Film Populer Sekarang,
                                    Aktor atau Aktris Populer Minggu Ini!
                                </p>
    
                                {{-- Tech stack --}}
                                <div class="inline-flex justify-start items-center gap-5">
                                    <div
                                        class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/javascript.svg"
                                            alt="Javascript">
                                    </div>
    
                                    <div
                                        class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/react.svg"
                                            alt="React">
                                    </div>
                                </div>
                            </div>
    
                        </div>
    
                        {{-- 2 --}}
                        <div class="inline-flex flex-col lg:flex-row-reverse justify-between items-center gap-14">
                            {{-- Image --}}
                            <img src="{{ asset('assets/img/projects/v3portfolio.png') }}"
                                class="w-[470px] shadow-lg rounded-lg" alt="v3 Portfolio">
    
                            {{-- Description --}}
                            <div class="space-y-5 px-2">
                                <h1 class="text-4xl font-bold mb-3">v3 Portfolio</h1>
                                <a href="https://v3.mahadisaputra.my.id/" target="_blank" rel="noopener noreferrer" 
                                    class="flex items-center gap-2 text-blue-600 dark:text-blue-300 hover:underline">https://v3.mahadisaputra.my.id/
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg></a>
                                <p class="tracking-normal text-sm lg:text-lg text-gray-600 dark:text-gray-300 leading-loose">
                                    Portofolio v3 adalah portofolio terbaru. Pada portofolio itu juga berisi lebih
                                    banyak proyek saya, pengalaman saya, <em>tech stack</em> saya, dan menghubungi saya
                                    melalui email.
                                </p>
    
                                {{-- Tech stack --}}
                                <div class="inline-flex justify-start items-center gap-5">
    
                                    <div
                                        class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/javascript.svg"
                                            alt="Javascript">
                                    </div>
    
                                    <div
                                        class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/react.svg"
                                            alt="React">
                                    </div>
    
                                    <div
                                        class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/tailwind-css.svg"
                                            alt="Tailwind">
                                    </div>
    
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#scrollToProjects').click(function() {
                $("html, body").animate({
                    scrollTop: $("#projects").offset().top
                }, "fast");
            })
        })
    </script>
@endpush
