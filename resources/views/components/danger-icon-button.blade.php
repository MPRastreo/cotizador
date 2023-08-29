<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg p-3 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800']) }}>
    {{ $slot }}
</button>
