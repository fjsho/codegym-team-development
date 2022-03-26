{{-- ボタン型リンク（メインカラー） --}}
<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-400 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</a>