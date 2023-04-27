<button {{ $attributes->merge(
    ['type' => 'submit',
    'class' => 'text-red-600 dark:text-red-400 whitespace-nowrap']) }}>
    {{ $slot }}
</button>
