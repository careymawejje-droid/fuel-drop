


<?php $__env->startSection('title', 'Provider branches'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.show', $provider)); ?>" class="text-sm text-slate-200 hover:text-white"><?php echo e($provider->name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Status badge colours (same as the other lists); any other status falls back to grey
        $statusStyles = [
            'active' => 'bg-emerald-100 text-emerald-800',
            'inactive' => 'bg-slate-200 text-slate-700',
        ];
    ?>

    
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Branches</h1>
            <p class="mt-1 text-slate-600"><?php echo e($provider->name); ?></p>
        </div>
        <a href="<?php echo e(route('provider.branches.create', $provider)); ?>" class="rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Add branch</a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Branch</th>
                        <th class="px-3 py-3 font-medium">Address</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-3 py-3 text-right font-medium">Inventory</th>
                        <th class="px-3 py-3 text-right font-medium">Drivers</th>
                        <th class="px-3 py-3 text-right font-medium">Trucks</th>
                        <th class="px-5 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold"><?php echo e($branch->name); ?></td>
                            <td class="px-3 py-4 text-slate-600"><?php echo e($branch->address); ?></td>

                            
                            <td class="px-3 py-4">
                                <span class="rounded-full px-2.5 py-1 text-xs font-semibold <?php echo e($statusStyles[$branch->status] ?? 'bg-slate-200 text-slate-700'); ?>"><?php echo e(ucfirst($branch->status)); ?></span>
                            </td>

                            
                            <td class="px-3 py-4 text-right tabular-nums"><?php echo e($branch->fuel_inventory_count); ?></td>
                            <td class="px-3 py-4 text-right tabular-nums"><?php echo e($branch->drivers_count); ?></td>
                            <td class="px-3 py-4 text-right tabular-nums"><?php echo e($branch->trucks_count); ?></td>

                            
                            <td class="px-5 py-4">
                                <a href="<?php echo e(route('provider.branches.edit', [$provider, $branch])); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="7" class="px-5 py-10 text-center text-slate-500">No branches have been created.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($branches->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4"><?php echo e($branches->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/provider/branches/index.blade.php ENDPATH**/ ?>