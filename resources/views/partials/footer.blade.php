<footer
    class="bg-gradient-to-r from-[#f4f4f5] from-20% to-white to-50% dark:from-[#151b21] dark:from-20% dark:to-[#2a3240] dark:to-50% mx-auto">
    {{-- Footer top --}}
    <div class="container mx-auto max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-12">
            <div class="bg-[#f4f4f5] dark:bg-[#151b21] col-span-4 py-10 lg:px-4">
                <div class="flex justify-center my-8">
                    <img src="{{ asset('assets/img/logo-1000px-black.png') }}" class="block dark:hidden h-[36px]"
                        alt="Mahadi Saputra's Logo" />
                    <img src="{{ asset('assets/img/logo-1000px-white.png') }}" class="hidden dark:block h-[36px]"
                        alt="Mahadi Saputra's Logo" />
                </div>

                <div class="space-y-8 text-center lg:text-left max-w-sm mx-auto">
                    <p class="text-gray-600 tracking-normal dark:text-gray-50">
                        Seorang mahasiswa semester akhir di ITB STIKOM Bali dan HELP University Malaysia yang berasal
                        dari Bali, Indonesia
                    </p>

                    <div class="flex justify-evenly items-center">
                        <a href="https://facebook.com/dodepersie" target="_blank"
                            class="inline-flex items-center text-blue-500 dark:text-white p-2 rounded-full">
                            <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="stroke-[1.25] shrink-0 mr-2 h-3.5 w-3.5">
                                <g clip-path="url(#clip0_17_61)">
                                    <path
                                        d="M48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 35.9789 8.77641 45.908 20.25 47.7084V30.9375H14.1562V24H20.25V18.7125C20.25 12.6975 23.8331 9.375 29.3152 9.375C31.9402 9.375 34.6875 9.84375 34.6875 9.84375V15.75H31.6613C28.68 15.75 27.75 17.6002 27.75 19.5V24H34.4062L33.3422 30.9375H27.75V47.7084C39.2236 45.908 48 35.9789 48 24Z"
                                        fill="currentColor"></path>
                                </g>
                                <defs>
                                    <clipPath>
                                        <rect width="48" height="48" fill="currentColor"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>

                        <a href="https://github.com/dodepersie" target="_blank"
                            class="inline-flex items-center dark:text-white p-2 rounded-full">
                            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="https://instagram.com/mahadisptr" target="_blank"
                            class="inline-flex items-center text-red-500 dark:text-white p-2 rounded-full">
                            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
                                <g clip-path="url(#clip0_17_63)">
                                    <path
                                        d="M24 4.32187C30.4125 4.32187 31.1719 4.35 33.6938 4.4625C36.0375 4.56562 37.3031 4.95938 38.1469 5.2875C39.2625 5.71875 40.0688 6.24375 40.9031 7.07812C41.7469 7.92188 42.2625 8.71875 42.6938 9.83438C43.0219 10.6781 43.4156 11.9531 43.5188 14.2875C43.6313 16.8187 43.6594 17.5781 43.6594 23.9813C43.6594 30.3938 43.6313 31.1531 43.5188 33.675C43.4156 36.0188 43.0219 37.2844 42.6938 38.1281C42.2625 39.2438 41.7375 40.05 40.9031 40.8844C40.0594 41.7281 39.2625 42.2438 38.1469 42.675C37.3031 43.0031 36.0281 43.3969 33.6938 43.5C31.1625 43.6125 30.4031 43.6406 24 43.6406C17.5875 43.6406 16.8281 43.6125 14.3063 43.5C11.9625 43.3969 10.6969 43.0031 9.85313 42.675C8.7375 42.2438 7.93125 41.7188 7.09688 40.8844C6.25313 40.0406 5.7375 39.2438 5.30625 38.1281C4.97813 37.2844 4.58438 36.0094 4.48125 33.675C4.36875 31.1438 4.34063 30.3844 4.34063 23.9813C4.34063 17.5688 4.36875 16.8094 4.48125 14.2875C4.58438 11.9437 4.97813 10.6781 5.30625 9.83438C5.7375 8.71875 6.2625 7.9125 7.09688 7.07812C7.94063 6.23438 8.7375 5.71875 9.85313 5.2875C10.6969 4.95938 11.9719 4.56562 14.3063 4.4625C16.8281 4.35 17.5875 4.32187 24 4.32187ZM24 0C17.4844 0 16.6688 0.028125 14.1094 0.140625C11.5594 0.253125 9.80625 0.665625 8.2875 1.25625C6.70312 1.875 5.3625 2.69062 4.03125 4.03125C2.69063 5.3625 1.875 6.70313 1.25625 8.27813C0.665625 9.80625 0.253125 11.55 0.140625 14.1C0.028125 16.6687 0 17.4844 0 24C0 30.5156 0.028125 31.3312 0.140625 33.8906C0.253125 36.4406 0.665625 38.1938 1.25625 39.7125C1.875 41.2969 2.69063 42.6375 4.03125 43.9688C5.3625 45.3 6.70313 46.125 8.27813 46.7344C9.80625 47.325 11.55 47.7375 14.1 47.85C16.6594 47.9625 17.475 47.9906 23.9906 47.9906C30.5063 47.9906 31.3219 47.9625 33.8813 47.85C36.4313 47.7375 38.1844 47.325 39.7031 46.7344C41.2781 46.125 42.6188 45.3 43.95 43.9688C45.2812 42.6375 46.1063 41.2969 46.7156 39.7219C47.3063 38.1938 47.7188 36.45 47.8313 33.9C47.9438 31.3406 47.9719 30.525 47.9719 24.0094C47.9719 17.4938 47.9438 16.6781 47.8313 14.1188C47.7188 11.5688 47.3063 9.81563 46.7156 8.29688C46.125 6.70312 45.3094 5.3625 43.9688 4.03125C42.6375 2.7 41.2969 1.875 39.7219 1.26562C38.1938 0.675 36.45 0.2625 33.9 0.15C31.3313 0.028125 30.5156 0 24 0Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M24 11.6719C17.1938 11.6719 11.6719 17.1938 11.6719 24C11.6719 30.8062 17.1938 36.3281 24 36.3281C30.8062 36.3281 36.3281 30.8062 36.3281 24C36.3281 17.1938 30.8062 11.6719 24 11.6719ZM24 31.9969C19.5844 31.9969 16.0031 28.4156 16.0031 24C16.0031 19.5844 19.5844 16.0031 24 16.0031C28.4156 16.0031 31.9969 19.5844 31.9969 24C31.9969 28.4156 28.4156 31.9969 24 31.9969Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M39.6937 11.1843C39.6937 12.778 38.4 14.0624 36.8156 14.0624C35.2219 14.0624 33.9375 12.7687 33.9375 11.1843C33.9375 9.59053 35.2313 8.30615 36.8156 8.30615C38.4 8.30615 39.6937 9.5999 39.6937 11.1843Z"
                                        fill="currentColor"></path>
                                </g>
                                <defs>
                                    <clipPath>
                                        <rect width="48" height="48" fill="currentColor"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>

                    </div>

                </div>
            </div>

            <div class="bg-white dark:bg-[#2a3240] col-span-8 px-4">
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-10 px-4 lg:px-7 text-black dark:text-white my-8">
                    <div>
                        <h1 class="text-xl tracking-normal font-bold">Backlink</h1>
                        <hr class="border-b border-gray-200 dark:border-gray-600 my-3 h-px" />

                        <ul class="space-y-5">
                            <li>
                                <a href="#" target="_blank" rel="noopener noreferrer">Slot #1</a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener noreferrer">Slot #2</a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener noreferrer">Slot #3</a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener noreferrer">Slot #4</a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener noreferrer">Slot #5</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h1 class="text-xl tracking-normal font-bold">Portofolio</h1>
                        <hr class="border-b border-gray-200 dark:border-gray-600 my-3 h-px" />

                        <ul class="space-y-5">
                            <li>
                                <a href="https://penghitung-wr-mlbb.vercel.app/" target="_blank" rel="noopener noreferrer">Kalkulator MLBB</a>
                            </li>
                            <li>
                                <a href="https://v2.mahadisaputra.my.id/" target="_blank" rel="noopener noreferrer">Portofolio v2</a>
                            </li>
                            <li>
                                <a href="https://v3.mahadisaputra.my.id/" target="_blank" rel="noopener noreferrer">Portofolio v3</a>
                            </li>
                            <li>
                                <a href="https://mooflixxi.mahadisaputra.my.id/" target="_blank" rel="noopener noreferrer">MoofliXXI</a>
                            </li>
                            <li>
                                <a href="https://210623.mahadisaputra.my.id/" target="_blank" rel="noopener noreferrer">Undangan Digital</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h1 class="text-xl tracking-normal font-bold">Hubungi saya</h1>
                        <hr class="border-b border-gray-200 dark:border-gray-600 my-3 h-px" />

                        <ul class="space-y-5">
                            <li>
                                <a href="mailto:me@mahadisaputra.my.id" target="_blank" rel="noopener noreferrer">Email</a>
                            </li>
                            <li>
                                <a href="https://facebook.com/DodePersie" target="_blank" rel="noopener noreferrer">Facebook</a>
                            </li>
                            <li>
                                <a href="https://github.com/dodepersie" target="_blank" rel="noopener noreferrer">Github</a>
                            </li>
                            <li>
                                <a href="https://instagram.com/mahadisptr" target="_blank" rel="noopener noreferrer">Instagram</a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/in/mahadisaputra" target="_blank" rel="noopener noreferrer">Linkedin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<footer class="bg-[#E9E9E9] dark:bg-[#444A54] px-3 py-4">
    <div class="container mx-auto max-w-6xl">
        {{-- Footer bottom --}}
        <div class="flex flex-col md:flex-row justify-center items-center gap-2">
            <span class="text-sm leading-loose tracking-normal text-gray-600 dark:text-gray-50 text-center">
                © {{ now()->year }} <a href="{{ route('home') }}" class="hover:underline">Mahadi Saputra</a>.
                Desain oleh: <a href="https://parsinta.com/" class="hover:underline" target="_blank" rel="noopener noreferrer">Parsinta</a> & <a
                    href="https://santrikoding.com/" class="hover:underline" target="_blank" rel="noopener noreferrer">Santrikoding</a>
            </span>
        </div>
    </div>
</footer>
