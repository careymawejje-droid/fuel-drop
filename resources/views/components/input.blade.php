@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-300 bg-white text-slate-900 placeholder-slate-400 focus:border-forest focus:ring-forest/20 rounded-lg shadow-none']) !!}>
