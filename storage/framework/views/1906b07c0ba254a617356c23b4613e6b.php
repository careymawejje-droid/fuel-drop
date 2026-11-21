<?php $__env->startSection('title', 'Assigned deliveries'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('driver.dashboard')); ?>" class="flex items-center gap-2 text-sm text-slate-200 hover:text-white">
        <i data-lucide="arrow-left" class="h-4 w-4"></i>
        Dashboard
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Assigned deliveries</h1>
        <p class="mt-1 text-slate-600">Open an assigned delivery to review its details.</p>
    </section>

    <form method="GET" action="<?php echo e(route('driver.deliveries.index')); ?>" class="mb-5 flex flex-wrap gap-3">
        <label for="order-reference-search" class="sr-only">Search by order reference</label>
        <input id="order-reference-search" name="q" value="<?php echo e($search); ?>" maxlength="64" placeholder="Search by order reference" class="min-w-64 rounded-lg border border-slate-300 px-3 py-2">
        <button class="rounded-lg bg-slate-900 px-4 py-2 font-semibold text-white">Search</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search !== ''): ?><a href="<?php echo e(route('driver.deliveries.index')); ?>" class="rounded-lg border border-slate-300 px-4 py-2">Clear</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </form>

    
    <section class="grid gap-5 md:grid-cols-2">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="flex flex-col rounded-xl border border-slate-200 bg-white">

                
                <div class="p-6">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <h2 class="text-xl font-bold"><?php echo e($order->order_number); ?></h2>
                        <?php if (isset($component)) { $__componentOriginal2dcd595ef873cce5a53e09953a1030a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dcd595ef873cce5a53e09953a1030a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-status','data' => ['status' => $order->status,'paymentStatus' => $order->payment?->status,'class' => 'rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->status),'payment-status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->payment?->status),'class' => 'rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800']); ?>
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
                    <p class="mt-2 text-slate-600"><?php echo e($order->delivery_address); ?></p>
                </div>

                
                <dl class="grid grid-cols-2 divide-x divide-slate-200 border-t border-slate-200 text-sm">
                    <div class="px-6 py-4">
                        <dt class="text-slate-500">Customer</dt>
                        <dd class="mt-1 font-semibold"><?php echo e($order->customer?->name ?? 'Customer unavailable'); ?></dd>
                    </div>
                    <div class="px-6 py-4">
                        <dt class="text-slate-500">Truck</dt>
                        <dd class="mt-1 font-semibold"><?php echo e($order->truck?->plate ?? 'Not assigned'); ?></dd>
                    </div>
                </dl>

                
                <div class="mt-auto border-t border-slate-200 bg-slate-50 px-6 py-4">
                    <a href="<?php echo e(route('driver.deliveries.show', $order)); ?>" class="inline-flex w-full justify-center rounded-lg border border-slate-300 bg-white px-4 py-2.5 font-bold transition hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400">View delivery</a>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="rounded-xl border border-dashed border-slate-300 bg-white p-10 text-center md:col-span-2">
                <i data-lucide="package-check" class="mx-auto h-8 w-8 text-slate-400"></i>
                <h2 class="mt-3 text-lg font-bold">No assigned deliveries</h2>
                <p class="mt-1 text-sm text-slate-500">Assigned orders will appear here.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->hasPages()): ?>
        <div class="mt-6">
            <?php echo e($orders->links()); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/driver/deliveries/index.blade.php ENDPATH**/ ?>