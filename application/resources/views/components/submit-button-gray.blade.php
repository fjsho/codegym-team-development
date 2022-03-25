{{-- submitボタン（グレー） --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-md font-semibold text-xs text-black tracking-widest hover:bg-gray-100 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</button>
