<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
    <div class="px-4">
        <div class="flex items-center">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ __('Language') }}</div>

        </div>
    </div>

    <div class="mt-3 space-y-1">
        @foreach (config('locales') as $lang)
        <x-responsive-nav-link :href="route('lang.switch', $lang)">
            {{ strtoupper($lang) }}
        </x-responsive-nav-link>
        @endforeach
    </div>
</div>
