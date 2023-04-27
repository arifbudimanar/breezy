<button {{ $attributes->merge(
    ['type' => 'submit',
    'class' => 'text-indigo-600 dark:text-indigo-400 whitespace-nowrap']) }}>
    {{ $slot }}
</button>
