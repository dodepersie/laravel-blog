@unless ($breadcrumbs->isEmpty())
    <nav class="flex px-5 py-3 mt-[63.5px] mb-4 text-gray-700 border-b border-t border-gray-200 dark:border-gray-700 tracking-tighter cursor-default"
        aria-label="Breadcrumb">
        <div class="container mx-auto max-w-6xl px-4">
            <ol class="inline-flex items-center space-x-1">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && !$loop->last)
                        <li>
                            <div class="flex items-center">
                                <a href="{{ $breadcrumb->url }}"
                                    class="text-md font-bold text-gray-900 dark:text-gray-50">{{ $breadcrumb->title }}</a>
                            </div>
                        </li>
                    @else
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span
                                    class="text-md text-gray-500 dark:text-gray-400 truncate w-[200px] md:w-[600px]">{{ ucfirst($breadcrumb->title) }}</span>
                            </div>
                        </li>
                    @endif

                    @unless ($loop->last)
                        <li class="text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-2.5 h-2.5 mx-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 9 4-4-4-4" />
                                </svg>
                            </div>
                        </li>
                    @endif
                    @endforeach
                </ol>
            </div>
        </nav>
    @endunless
