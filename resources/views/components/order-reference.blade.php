@props(['value', 'class' => ''])

<span
    class="fd-order-reference block max-w-[14rem] truncate {{ $class }}"
    title="{{ $value }}"
    aria-label="Order reference {{ $value }}"
>{{ $value }}</span>
