@unless ($breadcrumbs->isEmpty())
<nav class="flex px-5 py-3 mt-[60px] mb-4 text-gray-700 border-b border-t border-gray-200 dark:border-gray-700 tracking-tighter cursor-default" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
              <li>
                <div class="flex items-center">
                  <a href="{{ $breadcrumb->url }}" class="text-md font-bold text-gray-900 dark:text-gray-50">{{ $breadcrumb->title }}</a>
                </div>
              </li>
            @else
              <li aria-current="page">
                <div class="flex items-center">
                  <span class="text-md text-gray-500 dark:text-gray-400 truncate w-[200px] md:w-[600px]">{{ ucfirst($breadcrumb->title) }}</span>
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