<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FuelDrop | Dashboard</title>
    <meta name="description" content="Order petrol, diesel or paraffin and follow the delivery driver live on the map.">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-100 text-slate-900 font-sans antialiased" data-page="dash">

<?php
    // ---------------------------------------------------------------
    // Permission checks, evaluated once here
    // ---------------------------------------------------------------
    $user = auth()->user();
    $canViewOrders = $user->can('view own orders');
    $canOrderFuel = $user->can('view available fuels') && $user->can('place orders');

    // The most recent order is the first one in the already-loaded list
    $latestOrder = $orders->first();
?>

<?php echo $__env->make('components.fueldrop.sidebar', ['role' => 'customer'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="min-h-screen lg:ml-64">
    <header class="hidden border-b border-slate-200 bg-white px-6 py-4 lg:block">
        <p class="text-sm text-slate-500">Signed in as <span class="font-medium text-slate-900"><?php echo e($user->name); ?></span></p>
    </header>

        <main class="mx-auto max-w-5xl px-6 py-8">

            <!-- Page heading with the main actions -->
            <div class="flex flex-wrap items-center justify-between gap-3">
                <h1 class="text-3xl font-bold">Dashboard</h1>
                <div class="flex flex-wrap gap-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canViewOrders): ?>
                        <a href="<?php echo e(route('customer.orders.index')); ?>" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 font-bold transition hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400">Order history</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canOrderFuel): ?>
                        <a href="<?php echo e(route('customer.orders.create')); ?>" class="rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Order fuel</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <!-- Summary: the most recent order, and order counts from the customer's own account -->
            <section class="mt-6 grid gap-5 md:grid-cols-3">

                <!-- Most recent order: read-only summary; live tracking is not implemented -->
                <div class="rounded-xl border border-slate-200 bg-white p-6 md:col-span-2">
                    <p class="text-sm font-medium text-slate-500">Most recent order</p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestOrder): ?>
                        <div class="mt-1 flex flex-wrap items-center gap-3">
                            <h2 class="min-w-0 max-w-full text-2xl font-bold">
                                <?php if (isset($component)) { $__componentOriginal718c6d2bd89e2f0a293b65536676fe8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal718c6d2bd89e2f0a293b65536676fe8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-reference','data' => ['value' => $latestOrder->order_number,'class' => 'max-w-[16rem]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-reference'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestOrder->order_number),'class' => 'max-w-[16rem]']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order-status','data' => ['status' => $latestOrder->status,'paymentStatus' => $latestOrder->payment?->status,'class' => 'rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestOrder->status),'payment-status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestOrder->payment?->status),'class' => 'rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700']); ?>
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
                        <p class="mt-1 text-slate-600">UGX <?php echo e(number_format($latestOrder->total)); ?></p>
                        <p class="mt-1 text-sm text-slate-600">Payment: <?php echo e($latestOrder->payment?->status === 'paid' ? 'Collected' : 'Payment Pending'); ?></p>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $latestOrder)): ?>
                            <a href="<?php echo e(route('customer.orders.show', $latestOrder)); ?>" class="mt-5 inline-block rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-bold transition hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400">View details</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <h2 class="mt-1 text-2xl font-bold">No orders yet</h2>
                        <p class="mt-1 text-slate-600">Your order history will appear here.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Order counts -->
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
                    <dl class="grid grid-cols-2 divide-x divide-slate-200">
                        <div class="px-5 py-4">
                            <dt class="text-sm text-slate-500">Total orders</dt>
                            <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($ordersCount); ?></dd>
                        </div>
                        <div class="px-5 py-4">
                            <dt class="text-sm text-slate-500">Pending</dt>
                            <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($pendingOrdersCount); ?></dd>
                        </div>
                    </dl>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canViewOrders): ?>
                        <div class="border-t border-slate-200 bg-slate-50 px-5 py-4">
                            <a href="<?php echo e(route('customer.orders.index')); ?>" class="flex w-full justify-center rounded-lg bg-amber-400 py-2.5 text-sm font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">View order history</a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </section>

            <!-- Recent orders: loaded through the authenticated customer's orders relationship -->
            <section class="mt-8">
                <h2 class="text-lg font-bold">Recent orders</h2>
                <div class="mt-3 overflow-hidden rounded-xl border border-slate-200 bg-white">
                    <div class="overflow-x-auto">
                        <table class="fd-order-table w-full min-w-[720px] table-fixed text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500">
                                <tr>
                                    <th class="w-[22%] px-5 py-3 font-medium">Order</th>
                                    <th class="w-[27%] px-3 py-3 font-medium">Fuel</th>
                                    <th class="w-[16%] px-3 py-3 font-medium">Date</th>
                                    <th class="w-[17%] px-3 py-3 text-right font-medium">Total</th>
                                    <th class="w-[18%] px-5 py-3 font-medium">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="transition hover:bg-slate-50">
                                        <td class="max-w-[14rem] px-5 py-3.5 align-top font-semibold">
                                            <a href="<?php echo e(route('customer.orders.show', $order)); ?>" class="text-inherit hover:underline">
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
                                            </a>
                                        </td>
                                        <td class="whitespace-normal break-words px-3 py-3.5 align-top text-slate-600">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_2 = true; $__currentLoopData = $order->fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <?php echo e($fuel->name); ?> &middot; <?php echo e($fuel->pivot->quantity_litres); ?> L<?php echo e($loop->last ? '' : ', '); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                No fuel details
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-3.5 align-top text-slate-600"><?php echo e($order->created_at->format('d M Y')); ?></td>
                                        <td class="whitespace-nowrap px-3 py-3.5 text-right align-top tabular-nums">UGX <?php echo e(number_format($order->total)); ?></td>
                                        <td class="whitespace-nowrap px-5 py-3.5 align-top">
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
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <!-- Empty state -->
                                    <tr>
                                        <td colspan="5" class="px-5 py-8 text-center text-slate-500">You have not placed any orders yet.</td>
                                    </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

<!-- Render Lucide icons -->
<script>lucide.createIcons();</script>
</body>
</html>
<?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/customer/dashboard.blade.php ENDPATH**/ ?>