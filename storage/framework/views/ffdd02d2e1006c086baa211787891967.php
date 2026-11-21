<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['status', 'paymentStatus' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['status', 'paymentStatus' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $label = $status === 'out_for_delivery' && $paymentStatus === 'paid'
        ? 'Awaiting Customer Confirmation'
        : match ($status) {
        'pending' => 'Pending',
        'accepted' => 'Accepted',
        'assigned' => 'Driver Assigned',
        'fuel_loading' => 'Fuel Loading',
        'out_for_delivery' => 'Out for Delivery',
        'delivered' => 'Delivered',
        'completed' => 'Completed',
        'rejected' => 'Rejected',
        'cancelled' => 'Cancelled',
            default => ucfirst(str_replace('_', ' ', $status)),
        };
?>

<span <?php echo e($attributes->merge(['class' => ''])); ?>><?php echo e($label); ?></span>
<?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/components/order-status.blade.php ENDPATH**/ ?>