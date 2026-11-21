


<?php $__env->startSection('title', 'Fuel inventory'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.show', $provider)); ?>" class="text-sm text-slate-200 hover:text-white"><?php echo e($provider->name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Status badge colours (same as the other lists)
        $statusStyles = [
            'active' => 'bg-emerald-100 text-emerald-800',
            'inactive' => 'bg-slate-200 text-slate-700',
        ];
    ?>

    
    <section class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Fuel inventory</h1>
            <p class="mt-1 text-slate-600"><?php echo e($provider->name); ?></p>
        </div>
        <a href="<?php echo e(route('provider.providers.fuels.create', $provider)); ?>" class="rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Add branch fuel</a>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Branch</th>
                        <th class="px-3 py-3 font-medium">Fuel</th>
                        <th class="px-3 py-3 text-right font-medium">Price / L</th>
                        <th class="px-3 py-3 text-right font-medium">Available</th>
                        <th class="px-3 py-3 text-right font-medium">Reserved</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-5 py-3"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $branchFuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchFuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold"><?php echo e($branchFuel->branch->name); ?></td>
                            <td class="px-3 py-4"><?php echo e($branchFuel->fuel->name); ?></td>

                            
                            <td class="px-3 py-4 text-right tabular-nums">UGX <?php echo e(number_format($branchFuel->price_per_litre)); ?></td>
                            <td class="px-3 py-4 text-right tabular-nums"><?php echo e(number_format($branchFuel->available_stock_litres, 3)); ?> L</td>
                            <td class="px-3 py-4 text-right tabular-nums"><?php echo e(number_format($branchFuel->reserved_stock_litres, 3)); ?> L</td>

                            
                            <td class="px-3 py-4">
                                <span class="rounded-full px-2.5 py-1 text-xs font-semibold <?php echo e($statusStyles[$branchFuel->status] ?? 'bg-slate-200 text-slate-700'); ?>"><?php echo e(ucfirst($branchFuel->status)); ?></span>
                            </td>

                            
                            <td class="px-5 py-4 text-right">
                                <a href="<?php echo e(route('provider.providers.fuels.edit', [$provider, $branchFuel])); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="7" class="px-5 py-10 text-center text-slate-500">No inventory has been configured for this provider.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($branchFuels->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4"><?php echo e($branchFuels->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/fuels/index.blade.php ENDPATH**/ ?>