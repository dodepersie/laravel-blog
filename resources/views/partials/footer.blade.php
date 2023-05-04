<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800 w-full mx-auto max-w-screen-xl">
  <div class= "p-4 md:flex md:items-center md:justify-between">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
      © 2023 <a href="/" class="hover:underline">Mahadi Saputra</a>.
    </span>

    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
      <li>
          <a href="https://mahadisaputra.my.id" class="mr-4 hover:underline md:mr-6" target="_blank" ref="noreferrer">@lang('footer.about')</a>
      </li>
      <li>
          <a data-popover-target="popover-no-arrow" class="hover:underline cursor-pointer">
            <div data-popover id="popover-no-arrow" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
              <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">@lang('footer.contact_header')</h3>
              </div>
              <div class="px-3 py-2">
                  <p>FB: /dodepersie</p>
                  <p>Github: /dodepersie</p>
                  <p>IG: mahadisptr</p>
              </div>
            </div>

            @lang('footer.contact')
          </a>
      </li>
    </ul>
  </div>
</footer>
