<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'w-full inline-flex justify-center items-center px-4 py-3 bg-green-600 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wider hover:bg-green-700 active:bg-green-800 focus:outline-none transition duration-200'
]) }}>
    {{ $slot }}
</button>