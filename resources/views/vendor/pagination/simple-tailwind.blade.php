@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black dark:text-gray-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-black dark:text-gray-300 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
