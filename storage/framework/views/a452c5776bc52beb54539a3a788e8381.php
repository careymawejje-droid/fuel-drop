<?php $__env->startSection('title', 'Order history'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('customer.dashboard')); ?>" class="flex items-center gap-2 text-sm text-slate-200 hover:text-white">
        <i data-lucide="arrow-left" class="h-4 w-4"></i>
        Dashboard
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Order history</h1>
        <p class="mt-1 text-slate-600">Review your orders and open their details.</p>
    </section>

    <form method="GET" action="<?php echo e(route('customer.orders.index')); ?>" class="mb-5 flex flex-wrap gap-3">
        <label for="order-reference-search" class="sr-only">Search by order reference</label>
        <input id="order-reference-search" name="q" value="<?php echo e($search); ?>" maxlength="64" placeholder="Search by order reference" class="min-w-64 rounded-lg border border-slate-300 px-3 py-2">
        <button class="rounded-lg bg-slate-900 px-4 py-2 font-semibold text-white">Search</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search !== ''): ?><a href="<?php echo e(route('customer.orders.index')); ?>" class="rounded-lg border border-slate-300 px-4 py-2">Clear</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </form>

    
    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="fd-order-table w-full min-w-[640px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Order</th>
                        <th class="px-3 py-3 font-medium">Fuel</th>
                        <th class="px-3 py-3 font-medium">Placed</th>
                        <th class="px-3 py-3 text-right font-medium">Total</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-5 py-3"><span class="sr-only">Details</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            
                            <td class="max-w-[14rem] px-5 py-4 font-semibold">
                                <?php if (isset($component)) { $__componentOriginal718c6d2bd89e2f0a293b65536676fe8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal718c6d2bd89e2f0a293b65536676fe8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-reference','data' => ['value' => $order->order_number]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-reference'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->order_number)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal718c6d2bd89e2f0a293b65536676fe8a)): ?>
<?php $attributes = $__attributesOriginal718c6d2bd89e2f0a293b65536676fe8a; ?>
<?php unset($__attributesOriginal718c6d2bd89e2f0a293b65536676fe8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal718c6d2bd89e2f0a293b65536676fe8a)): ?>
<?php $component = $__componentOriginal718c6d2bd89e2f0a293b65536676fe8a; ?>
<?php unset($__componentOriginal718c6d2bd89e2f0a293b65536676fe8a); ?>
<?php endif; ?>
                            </td>

                            
                            <td class="px-3 py-4 text-slate-600">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_2 = true; $__currentLoopData = $order->fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <?php echo e($fuel->name); ?> · <?php echo e($fuel->pivot->quantity_litres); ?> L<?php echo e($loop->last ? '' : ', '); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    No fuel details
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>

                            <td class="whitespace-nowrap px-3 py-4 text-slate-600"><?php echo e($order->created_at->format('d M Y')); ?></td>

                            
                            <td class="whitespace-nowrap px-3 py-4 text-right tabular-nums">UGX <?php echo e(number_format($order->total)); ?></td>

                            
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

                            
                            <td class="px-5 py-4 text-right">
                                <a href="<?php echo e(route('customer.orders.show', $order)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <i data-lucide="receipt-text" class="mx-auto h-8 w-8 text-slate-400"></i>
                                <h2 class="mt-3 font-bold">No orders yet</h2>
                                <p class="mt-1 text-sm text-slate-500">Your orders will appear here when ordering is available.</p>
                            </td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4">
                <?php echo e($orders->links()); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/customer/orders/index.blade.php ENDPATH**/ ?>