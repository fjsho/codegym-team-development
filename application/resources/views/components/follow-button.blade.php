{{-- フォローボタン --}}
<button {{ $attributes->merge(['type' => 'submit',  'class' => 'inline-flex items-center px-4 py-2 bg-blue-400 border border-transparent rounded-full font-semibold text-xs text-white tracking-widest hover:bg-blue-500 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
