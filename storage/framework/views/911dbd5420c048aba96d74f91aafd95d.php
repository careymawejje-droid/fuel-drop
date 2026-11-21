<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuelDrop | Deliveries</title>
    <meta name="description" content="Order petrol, diesel or paraffin and follow the delivery driver live on the map.">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-100 text-navy font-sans antialiased" data-page="">
    <?php echo $__env->make('components.fueldrop.sidebar', ['role' => 'driver'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <main class="min-h-screen p-6 md:p-10 lg:ml-64">
            <div class="max-w-5xl mx-auto">
                <div class="flex flex-wrap justify-between items-center gap-3 mb-8">
                    <h1 class="text-3xl font-bold">Delivery dashboard</h1>
                    <a href="<?php echo e(route('driver.deliveries.index')); ?>" class="inline-block rounded-lg px-5 py-2.5 font-bold text-center bg-brand-500 text-navy fd-primary">All deliveries</a>
                </div>
                
                <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6">
                    <p class="text-sm text-slate-500">Assigned deliveries</p>
                    <p class="mt-1 text-3xl font-bold"><?php echo e($ordersCount); ?></p>
                </div>

                
                <div class="grid md:grid-cols-2 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <article class="bg-white border border-slate-200 rounded-2xl p-6">
                            <div class="flex flex-wrap items-start justify-between gap-3">
                                <h2 class="min-w-0 max-w-full text-xl font-bold">
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
                                </h2>
                                <?php if (isset($component)) { $__componentOriginal2dcd595ef873cce5a53e09953a1030a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dcd595ef873cce5a53e09953a1030a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-status','data' => ['status' => $order->status,'paymentStatus' => $order->payment?->status,'class' => 'rounded-full px-3 py-1 text-xs font-medium bg-amber-100 text-amber-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->status),'payment-status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->payment?->status),'class' => 'rounded-full px-3 py-1 text-xs font-medium bg-amber-100 text-amber-800']); ?>
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
                            <p class="text-slate-500 mt-2"><?php echo e($order->delivery_address); ?></p>
                            <dl class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                <div><dt class="text-slate-500">Customer</dt><dd class="mt-1 font-semibold"><?php echo e($order->customer?->name ?? 'Customer unavailable'); ?></dd></div>
                                <div><dt class="text-slate-500">Truck</dt><dd class="mt-1 font-semibold"><?php echo e($order->truck?->plate ?? 'Not assigned'); ?></dd></div>
                            </dl>
                            <a href="<?php echo e(route('driver.deliveries.show', $order)); ?>" class="mt-5 inline-flex w-full justify-center rounded-lg border border-navy py-2.5 font-bold">View delivery</a>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="bg-white border border-dashed border-slate-300 rounded-2xl p-10 text-center md:col-span-2">
                            <i data-lucide="package-check" class="mx-auto h-8 w-8 text-slate-400"></i>
                            <h2 class="mt-3 text-lg font-bold">No assigned deliveries</h2>
                            <p class="mt-1 text-sm text-slate-500">Assigned orders will appear here.</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </main>
    <script>lucide.createIcons();</script>
</body>
</html>
<?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/driver/dashboard.blade.php ENDPATH**/ ?>