@unless ($breadcrumbs->isEmpty())
<nav class="flex px-5 py-3 mt-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
              <li>
                <div class="flex items-center">
                  <a href="{{ $breadcrumb->url }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">{{ $breadcrumb->title }}</a>
                </div>
              </li>
            @else
              <li aria-current="page">
                <div class="flex items-center">
                  <span class="ml-1 text-sm font-bold text-gray-500 dark:text-gray-400">{{ $breadcrumb->title }}</span>
                </div>
              </li>
            @endif

            @unless($loop->last)
              <li class="text-gray-500">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              </li>
            @endif
        @endforeach
    </ol>
</nav>
@endunless