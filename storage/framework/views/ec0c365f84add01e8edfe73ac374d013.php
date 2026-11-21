<?php $__env->startSection('title', 'Provider orders'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.show', $provider)); ?>" class="text-sm text-slate-200 hover:text-white"><?php echo e($provider->name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Orders</h1>
        <p class="mt-1 text-slate-600"><?php echo e($provider->name); ?></p>
    </section>

    <form method="GET" action="<?php echo e(route('provider.providers.orders.index', $provider)); ?>" class="mb-5 flex flex-wrap gap-3">
        <label for="order-reference-search" class="sr-only">Search by order reference</label>
        <input id="order-reference-search" name="q" value="<?php echo e($search); ?>" maxlength="64" placeholder="Search by order reference" class="min-w-64 rounded-lg border border-slate-300 px-3 py-2">
        <button class="rounded-lg bg-slate-900 px-4 py-2 font-semibold text-white">Search</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search !== ''): ?><a href="<?php echo e(route('provider.providers.orders.index', $provider)); ?>" class="rounded-lg border border-slate-300 px-4 py-2">Clear</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </form>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Order</th>
                        <th class="px-3 py-3 font-medium">Customer</th>
                        <th class="px-3 py-3 font-medium">Placed</th>
                        <th class="px-3 py-3 font-medium">Driver / truck</th>
                        <th class="px-3 py-3 text-right font-medium">Total</th>
                        <th class="px-3 py-3 font-medium">Payment</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-5 py-3 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold"><?php echo e($order->order_number); ?></td>
                            <td class="px-3 py-4"><?php echo e($order->customer->name); ?></td>
                            <td class="whitespace-nowrap px-3 py-4"><?php echo e($order->placed_at?->format('d M Y H:i') ?? '—'); ?></td>
                            <td class="px-3 py-4"><?php echo e($order->driver?->user?->name ?? '—'); ?> / <?php echo e($order->truck?->plate ?? '—'); ?></td>

                            
                            <td class="whitespace-nowrap px-3 py-4 text-right tabular-nums">UGX <?php echo e(number_format((float) $order->total)); ?></td>

                            
                            <td class="px-3 py-4">
                                <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700"><?php echo e($order->payment?->status === 'paid' ? 'Collected' : 'Payment Pending'); ?></span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->payment?->status === 'paid'): ?>
                                    <span class="mt-1 block text-xs text-slate-500">UGX <?php echo e(number_format((float) $order->payment->amount, 2)); ?> · <?php echo e($order->payment->collected_at?->format('d M Y H:i') ?? 'Collected'); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="px-3 py-4">
                                <?php if (isset($component)) { $__componentOriginal2dcd595ef873cce5a53e09953a1030a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dcd595ef873cce5a53e09953a1030a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-status','data' => ['status' => $order->status,'paymentStatus' => $order->payment?->status,'class' => 'rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->status),'payment-status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->payment?->status),'class' => 'rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2dcd595ef873cce5a53e09953a1030a0)): ?>
<?php $attributes = $__attributesOriginal2dcd595ef873cce5a53e09953a1030a0; ?>
<?php unset($__attributesOriginal2dcd595ef873cce5a53e09953a1030a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2dcd595ef873cce5a53e09953a1030a0)): ?>
<?php $component = $__componentOriginal2dcd595ef873cce5a53e09953a1030a0; ?>
<?php unset($__componentOriginal2dcd595ef873cce5a53e09953a1030a0); ?>
<?php endif; ?>
                            </td>

                            
                            <td class="px-5 py-4">
                                <a href="<?php echo e(route('provider.providers.orders.show', [$provider, $order])); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Manage</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="8" class="px-5 py-10 text-center text-slate-500">No orders are available.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4"><?php echo e($orders->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/provider/orders/index.blade.php ENDPATH**/ ?>