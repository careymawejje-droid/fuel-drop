<?php $__env->startSection('title', 'Platform reports'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-slate-200 hover:text-white">Admin dashboard</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Operational reports</h1>
        <p class="mt-1 text-slate-600">Lifetime provider, order, customer, driver, and payment summaries.</p>
    </section>

    
    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white" aria-label="Platform totals">
        <dl class="grid grid-cols-2 divide-x divide-y divide-slate-200 lg:grid-cols-4 lg:divide-y-0">
            <div class="px-5 py-4">
                <dt class="text-sm text-slate-500">Providers</dt>
                <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($providers->count()); ?></dd>
            </div>
            <div class="px-5 py-4">
                <dt class="text-sm text-slate-500">Customers</dt>
                <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($customersCount); ?></dd>
            </div>
            <div class="px-5 py-4">
                <dt class="text-sm text-slate-500">Drivers</dt>
                <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($driversCount); ?></dd>
            </div>
            <div class="px-5 py-4">
                <dt class="text-sm text-slate-500">Paid total</dt>
                <dd class="mt-1 text-2xl font-bold tabular-nums">UGX <?php echo e(number_format((float) $paidTotal)); ?></dd>
            </div>
        </dl>
    </section>

    
    <section class="mt-6 grid gap-5 lg:grid-cols-2">

        
        <article class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-lg font-bold">Orders by status</h2>
            <div class="mt-3 divide-y divide-slate-100 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orderStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex justify-between gap-4 py-3">
                        <span><?php echo e(ucfirst(str_replace('_', ' ', $status->status))); ?></span>
                        <span class="font-semibold tabular-nums"><?php echo e($status->total); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="py-3 text-slate-500">No orders are recorded.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </article>

        
        <article class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-lg font-bold">Payments by status</h2>
            <div class="mt-3 divide-y divide-slate-100 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $paymentStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex justify-between gap-4 py-3">
                        <span><?php echo e(ucfirst(str_replace('_', ' ', $status->status))); ?></span>
                        <span class="text-right font-semibold tabular-nums"><?php echo e($status->total); ?> · UGX <?php echo e(number_format((float) $status->amount)); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="py-3 text-slate-500">No payments are recorded.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </article>
    </section>

    
    <section class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white">
        <h2 class="px-5 py-4 text-lg font-bold">Provider operations</h2>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[600px] text-left text-sm">
                <thead class="border-t border-slate-200 bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Provider</th>
                        <th class="px-3 py-3 text-right font-medium">Branches</th>
                        <th class="px-3 py-3 text-right font-medium">Drivers</th>
                        <th class="px-3 py-3 text-right font-medium">Trucks</th>
                        <th class="px-5 py-3 text-right font-medium">Orders</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-3 font-semibold"><?php echo e($provider->name); ?></td>
                            <td class="px-3 py-3 text-right tabular-nums"><?php echo e($provider->branches_count); ?></td>
                            <td class="px-3 py-3 text-right tabular-nums"><?php echo e($provider->drivers_count); ?></td>
                            <td class="px-3 py-3 text-right tabular-nums"><?php echo e($provider->trucks_count); ?></td>
                            <td class="px-5 py-3 text-right tabular-nums"><?php echo e($provider->orders_count); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="5" class="px-5 py-8 text-center text-slate-500">No providers are configured.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>