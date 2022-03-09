{{-- destroyボタン（仮） --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-400 rounded-md font-semibold text-xs text-gray-400 tracking-widest hover:bg-gray-100 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
