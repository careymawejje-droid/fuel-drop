<?php $__env->startSection('title', 'Provider dashboard'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.index')); ?>" class="text-sm text-slate-200 hover:text-white">Providers</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
    </section>

    
    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white" aria-label="Provider totals">
        <dl class="grid grid-cols-2 divide-x divide-y divide-slate-200 sm:grid-cols-3 lg:grid-cols-6 lg:divide-y-0">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                'Providers' => $stats['providers'],
                'Branches' => $stats['branches'],
                'Drivers' => $stats['drivers'],
                'Orders' => $stats['orders'],
                'Incoming orders' => $stats['incoming_orders'],
                'Active orders' => $stats['active_orders'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="px-5 py-4">
                    <dt class="text-sm text-slate-500"><?php echo e($label); ?></dt>
                    <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e(number_format($value)); ?></dd>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </dl>
    </section>

    
    <section class="mt-8">
        <div class="mb-3 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-lg font-bold">Provider workspaces</h2>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view own notifications')): ?>
                <a href="<?php echo e(route('notifications.index')); ?>" class="text-sm font-semibold text-blue-700 hover:text-blue-900">View notifications</a>
            <?php endif; ?>
        </div>
        <div class="grid gap-5 md:grid-cols-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="overflow-hidden rounded-xl border border-slate-200 bg-white">
                    <h3 class="p-5 font-bold"><?php echo e($provider->name); ?></h3>

                    
                    <nav class="flex flex-wrap gap-x-4 gap-y-2 border-t border-slate-200 bg-slate-50 px-5 py-3 text-sm" aria-label="<?php echo e($provider->name); ?> management">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageBranches', $provider)): ?>
                            <a href="<?php echo e(route('provider.branches.index', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Branches</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageInventory', $provider)): ?>
                            <a href="<?php echo e(route('provider.providers.fuels.index', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Fuel inventory</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageDrivers', $provider)): ?>
                            <a href="<?php echo e(route('provider.providers.drivers.index', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Drivers</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageTrucks', $provider)): ?>
                            <a href="<?php echo e(route('provider.trucks.index', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Trucks</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $provider)): ?>
                            <a href="<?php echo e(route('provider.providers.orders.index', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Orders</a>
                        <?php endif; ?>
                    </nav>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
                <p class="rounded-xl border border-dashed border-slate-300 bg-white p-6 text-sm text-slate-500 md:col-span-2">No active provider workspaces are assigned to your account.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <section class="mt-8">
        <h2 class="mb-3 text-lg font-bold">Recent orders</h2>
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
            <div class="overflow-x-auto">
                <table class="fd-order-table w-full min-w-[700px] text-left text-sm">
                    <thead class="bg-slate-50 text-slate-500">
                        <tr>
                            <th class="px-5 py-3 font-medium">Order</th>
                            <th class="px-3 py-3 font-medium">Provider</th>
                            <th class="px-3 py-3 font-medium">Placed</th>
                            <th class="px-3 py-3 text-right font-medium">Total</th>
                            <th class="px-3 py-3 font-medium">Status</th>
                            <th class="px-5 py-3 font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                <td class="px-3 py-4"><?php echo e($order->provider?->name ?? '—'); ?></td>
                                <td class="whitespace-nowrap px-3 py-4"><?php echo e($order->created_at?->format('d M Y H:i') ?? '—'); ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-right tabular-nums">UGX <?php echo e(number_format((float) $order->total)); ?></td>

                                
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
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->provider): ?>
                                        <a href="<?php echo e(route('provider.providers.orders.show', [$order->provider, $order])); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Manage</a>
                                    <?php else: ?>
                                        <span class="text-slate-400">Unavailable</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
                            <tr>
                                <td colspan="6" class="px-5 py-10 text-center text-slate-500">No orders are available.</td>
                            </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/provider/dashboard.blade.php ENDPATH**/ ?>