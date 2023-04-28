<button {{ $attributes->merge(
    ['type' => 'submit',
    'class' => 'text-red-600 dark:text-red-400 hover:underline whitespace-nowrap']) }}>
    {{ $slot }}
</button>
