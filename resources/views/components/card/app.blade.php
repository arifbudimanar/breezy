{{-- <div
    class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg border-t sm:border-none border-gray-100 dark:border-gray-700">
    {{ $slot }}
</div> --}}
<div {{ $attributes->twMerge(['class'=>'p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg border-t sm:border-none border-gray-100 dark:border-gray-700']) }}>
    {{ $slot }}
</div>
