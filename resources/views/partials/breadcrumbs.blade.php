@unless ($breadcrumbs->isEmpty())
<nav class="flex px-5 py-3 mt-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 mb-4" aria-label="Breadcrumb" data-aos="fade-down">
    <ol class="inline-flex items-center space-x-1">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
              <li>
                <div class="flex items-center">
                  <a href="{{ $breadcrumb->url }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">{{ $breadcrumb->title }}</a>
                </div>
              </li>
            @else
              <li aria-current="page">
                <div class="flex items-center">
                  <span class="text-sm font-bold text-gray-500 dark:text-gray-400">{{ $breadcrumb->title }}</span>
                </div>
              </li>
            @endif

            @unless($loop->last)
              <li class="text-gray-500">
                <div class="flex items-center">
                  <span class="material-symbols-outlined" style="font-size: 18px;font-weight: 700;">
                    chevron_right
                  </span>
                </div>
              </li>
            @endif
        @endforeach
    </ol>
</nav>
@endunless