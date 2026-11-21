


<?php $__env->startSection('title', 'Order placed'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('customer.orders.index')); ?>" class="text-sm text-slate-200 hover:text-white">My orders</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mx-auto max-w-2xl overflow-hidden rounded-xl border border-slate-200 bg-white">

        
        <div class="p-8 text-center">
            <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-amber-400 text-slate-900"><i data-lucide="check" class="h-7 w-7"></i></div>
            <p class="mt-5 text-sm font-medium text-slate-500">Order placed</p>
            <h1 class="mt-1 text-3xl font-bold"><?php echo e($order->order_number); ?></h1>
            <p class="mt-3 text-slate-600">Your order is awaiting a response from <?php echo e($order->provider?->name ?? 'the provider'); ?>.</p>
        </div>

        
        <div class="space-y-3 border-t border-slate-200 px-8 py-5 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex justify-between gap-4">
                    <span><?php echo e($fuel->name); ?> Â· <?php echo e(number_format($fuel->pivot->quantity_litres, 3)); ?> L</span>
                    <span class="tabular-nums">UGX <?php echo e(number_format($fuel->pivot->quantity_litres * $fuel->pivot->unit_price)); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="flex justify-between gap-4">
                <span class="text-slate-500">Deliver to</span>
                <span class="text-right"><?php echo e($order->delivery_address); ?></span>
            </div>
            <div class="flex justify-between gap-4 border-t border-slate-200 pt-3 font-bold">
                <span>Total Â· Cash on Delivery</span>
                <span class="tabular-nums">UGX <?php echo e(number_format($order->total)); ?></span>
            </div>
        </div>

        
        <div class="grid gap-3 border-t border-slate-200 bg-slate-50 px-8 py-5 sm:grid-cols-2">
            <a href="<?php echo e(route('customer.orders.show', $order)); ?>" class="rounded-lg bg-amber-400 px-5 py-2.5 text-center font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">View order</a>
            <a href="<?php echo e(route('customer.dashboard')); ?>" class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-center font-bold transition hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400">Back to dashboard</a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/orders/confirmation.blade.php ENDPATH**/ ?>