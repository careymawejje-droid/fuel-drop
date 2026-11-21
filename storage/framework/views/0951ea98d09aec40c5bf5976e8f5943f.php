


<?php $__env->startSection('title', 'Manage order'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.orders.index', $provider)); ?>" class="text-sm text-slate-200 hover:text-white">Orders Â· <?php echo e($provider->name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Shared input style so every field looks the same
        $input = 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 font-normal focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200';
    ?>

    
    <section class="rounded-xl border border-slate-200 bg-white">
        <div class="flex flex-wrap items-start justify-between gap-4 p-6">
            <div>
                <h1 class="text-3xl font-bold"><?php echo e($order->order_number); ?></h1>
                <p class="mt-1 text-slate-600"><?php echo e($order->delivery_address); ?></p>
                <p class="mt-1 text-sm text-slate-500"><?php echo e($provider->name); ?></p>
            </div>
            <?php if (isset($component)) { $__componentOriginal2dcd595ef873cce5a53e09953a1030a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dcd595ef873cce5a53e09953a1030a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-status','data' => ['status' => $order->status,'paymentStatus' => $order->payment?->status,'class' => 'rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->status),'payment-status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->payment?->status),'class' => 'rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-800']); ?>
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
        </div>

        <dl class="grid grid-cols-1 divide-y divide-slate-200 border-t border-slate-200 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
            <div class="px-6 py-4">
                <dt class="text-sm text-slate-500">Customer</dt>
                <dd class="mt-1 font-bold"><?php echo e($order->customer->name); ?></dd>
                <dd class="text-sm text-slate-600"><?php echo e($order->customer->phone); ?></dd>
            </div>
            <div class="px-6 py-4">
                <dt class="text-sm text-slate-500">Delivery</dt>
                <dd class="mt-1 font-bold"><?php echo e($order->driver?->user?->name ?? 'Driver not assigned'); ?></dd>
                <dd class="text-sm text-slate-600"><?php echo e($order->truck?->plate ?? 'Truck not assigned'); ?></dd>
            </div>
            <div class="px-6 py-4">
                <dt class="text-sm text-slate-500">Payment</dt>
                <dd class="mt-1 font-bold tabular-nums">UGX <?php echo e(number_format((float) $order->total)); ?></dd>
                <dd class="text-sm text-slate-600"><?php echo e($order->payment?->status === 'paid' ? 'Collected' : 'Payment Pending'); ?></dd>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->payment?->status === 'paid'): ?>
                    <dd class="text-sm text-slate-600">Collected UGX <?php echo e(number_format((float) $order->payment->amount, 2)); ?></dd>
                    <dd class="text-sm text-slate-600">Collected at <?php echo e($order->payment->collected_at?->format('d M Y H:i') ?? 'â€”'); ?></dd>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </dl>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <section class="mt-6 rounded-xl border border-slate-200 bg-white p-6">
        <h2 class="text-lg font-bold">Order items</h2>
        <div class="mt-3 divide-y divide-slate-100 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex justify-between gap-3 py-3">
                    <span><?php echo e($fuel->name); ?> Â· <?php echo e($fuel->pivot->quantity_litres); ?> L</span>
                    <span class="font-semibold tabular-nums">UGX <?php echo e(number_format((float) $fuel->pivot->quantity_litres * (float) $fuel->pivot->unit_price)); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->status === 'rejected' && $order->rejection_reason): ?>
        <section class="mt-6 rounded-xl border border-red-200 bg-red-50 p-5 text-red-900">
            <h2 class="font-bold">Rejection reason</h2>
            <p class="mt-2 text-sm"><?php echo e($order->rejection_reason); ?></p>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->stockReservations->isNotEmpty()): ?>
        <section class="mt-6 rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-lg font-bold">Stock reservations</h2>
            <div class="mt-3 divide-y divide-slate-100 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->stockReservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-wrap justify-between gap-3 py-3">
                        <span><?php echo e($reservation->branchFuel?->fuel?->name ?? 'Fuel'); ?> Â· <?php echo e($reservation->branchFuel?->branch?->name ?? 'Branch unavailable'); ?></span>
                        <span class="tabular-nums"><?php echo e($reservation->quantity_litres); ?> L Â· <?php echo e(ucfirst($reservation->status)); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($order->status, ['assigned', 'fuel_loading', 'out_for_delivery'], true)): ?>
        <section class="mt-6 rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-lg font-bold">Driver location</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestLocation): ?>
                <p class="mt-2 text-sm text-slate-600">
                    <?php echo e($latestLocation->latitude); ?>, <?php echo e($latestLocation->longitude); ?>

                    Â· Updated <?php echo e($latestLocation->recorded_at); ?>

                </p>
            <?php elseif($order->driver?->current_latitude !== null && $order->driver?->current_longitude !== null): ?>
                <p class="mt-2 text-sm text-slate-600"><?php echo e($order->driver->current_latitude); ?>, <?php echo e($order->driver->current_longitude); ?></p>
            <?php else: ?>
                <p class="mt-2 text-sm text-slate-500">No driver location has been reported yet.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->status === 'pending'): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageOrders', $provider)): ?>
            <section class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white">
                <div class="p-6">
                    <h2 class="text-lg font-bold">Respond to this order</h2>

                    
                    <form method="POST" action="<?php echo e(route('provider.providers.orders.accept', [$provider, $order])); ?>" class="mt-4">
                        <?php echo csrf_field(); ?>
                        <button class="rounded-lg bg-emerald-600 px-5 py-2.5 font-bold text-white transition hover:bg-emerald-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2">Accept order</button>
                    </form>
                </div>

                
                <form method="POST" action="<?php echo e(route('provider.providers.orders.reject', [$provider, $order])); ?>" class="grid gap-3 border-t border-slate-200 bg-slate-50 p-6 sm:grid-cols-[1fr_auto]">
                    <?php echo csrf_field(); ?>
                    <label class="text-sm font-medium">Rejection reason
                        <textarea name="rejection_reason" required maxlength="1000" rows="2" class="<?php echo e($input); ?>"><?php echo e(old('rejection_reason')); ?></textarea>
                    </label>
                    <div class="flex items-end">
                        <button class="rounded-lg border border-red-300 bg-white px-5 py-2.5 font-bold text-red-700 transition hover:bg-red-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-400 focus-visible:ring-offset-2">Reject order</button>
                    </div>
                </form>
            </section>
        <?php endif; ?>

    
    <?php elseif(in_array($order->status, ['accepted', 'assigned'], true)): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->can('manageOrders', $provider) && auth()->user()->can('assignDeliveries', $provider)): ?>
            <form method="POST" action="<?php echo e(route('provider.providers.orders.assign', [$provider, $order])); ?>" class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white">
                <?php echo csrf_field(); ?>
                <div class="p-6">
                    <h2 class="text-lg font-bold">Delivery assignment</h2>
                    <div class="mt-4 grid gap-5 sm:grid-cols-2">
                        <label class="block text-sm font-medium">Driver
                            <select name="driver_id" required class="<?php echo e($input); ?>">
                                <option value="">Select a driver</option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($driver->id); ?>" <?php if(old('driver_id', $order->driver_id) == $driver->id): echo 'selected'; endif; ?>><?php echo e($driver->user->name); ?><?php echo e($driver->id === $order->driver_id ? ' Â· Current' : ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </select>
                        </label>
                        <label class="block text-sm font-medium">Truck
                            <select name="truck_id" required class="<?php echo e($input); ?>">
                                <option value="">Select a truck</option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $trucks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $truck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($truck->id); ?>" <?php if(old('truck_id', $order->truck_id) == $truck->id): echo 'selected'; endif; ?>><?php echo e($truck->plate); ?> Â· <?php echo e($truck->name); ?><?php echo e($truck->id === $order->truck_id ? ' Â· Current' : ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-end border-t border-slate-200 bg-slate-50 px-6 py-4">
                    <button class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary"><?php echo e($order->status === 'accepted' ? 'Assign delivery' : 'Update assignment'); ?></button>
                </div>
            </form>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/provider/orders/show.blade.php ENDPATH**/ ?>