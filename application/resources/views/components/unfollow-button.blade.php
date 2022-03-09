{{-- フォロー解除ボタン --}}
<button {{ $attributes->merge(['type' => 'submit',  'class' => 'inline-flex items-center px-4 py-2 bg-white border border-blue-400 rounded-full font-semibold text-xs text-blue-400 tracking-widest hover:bg-gray-100 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
