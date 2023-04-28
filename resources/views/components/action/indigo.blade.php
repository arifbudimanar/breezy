<button {{ $attributes->merge(
    ['type' => 'submit',
    'class' => 'text-indigo-600 dark:text-indigo-400 hover:underline whitespace-nowrap']) }}>
    {{ $slot }}
</button>
