<div class="px-4 lg:px-0">
    <footer class="container max-w-6xl bg-transparent mx-auto m-4 px-4 lg:px-0">
    <div class="px-3 py-4 md:py-2 flex flex-col md:flex-row justify-center md:justify-between items-center gap-2">
        <span class="text-sm text-gray-500 dark:text-gray-400">
            © {{ now()->year }} <a href="{{ route('home') }}" class="hover:underline">Mahadi Saputra</a>. {{ __('Gambar oleh:') }} Unsplash
        </span>
    
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="https://mahadisaputra.my.id/" class="mr-4 hover:underline" target="_blank"
                    ref="noreferrer">{{ __('Tentang') }}</a>
            </li>
            <li>
                <a data-popover-target="popover-contact" class="hover:underline cursor-pointer">
                    <div data-popover id="popover-contact" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                {{ __('Kontak saya') }}
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            <p>FB: /dodepersie</p>
                            <p>Github: /dodepersie</p>
                            <p>IG: mahadisptr</p>
                        </div>
                    </div>
    
                    {{ __('Kontak') }}
                </a>
            </li>
        </ul>
    </div>
    </footer>
</div>