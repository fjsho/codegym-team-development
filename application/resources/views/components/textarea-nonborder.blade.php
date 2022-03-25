{{--  テキストエリア（枠なし） --}}
@props(['disabled' => false, 'value'])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-transparent focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none']) !!}>{{ $value }}</textarea>
