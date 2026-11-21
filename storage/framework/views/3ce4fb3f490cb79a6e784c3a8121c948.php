


<?php $__env->startSection('title', 'Platform providers'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-slate-200 hover:text-white">Admin dashboard</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Permission checks used by several rows, evaluated once instead of per provider
        $user = auth()->user();
        $canSeeAccount = $user->can('manage provider accounts') || ($user->can('manage users') && $user->can('manage platform users'));
        $canOpenAccountProfile = $user->can('manage users') && $user->can('manage platform users');
        $canManageAccounts = $user->can('manage provider accounts');
        $canSeeBranches = $user->can('view all branches');
        $canSeeDrivers = $user->can('view all drivers');
        $canSeeOrders = $user->can('view all orders');

        // Status badge colours
        $statusStyles = [
            'active' => 'bg-emerald-100 text-emerald-800',
            'suspended' => 'bg-amber-100 text-amber-800',
            'inactive' => 'bg-slate-200 text-slate-700',
        ];
    ?>

    
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Providers</h1>
            <p class="mt-1 max-w-2xl text-slate-600">Create provider businesses, manage their designated accounts, and control operational status.</p>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage providers')): ?>
            <a href="<?php echo e(route('admin.providers.create')); ?>" class="rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Add provider</a>
        <?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Provider</th>
                        <th class="px-3 py-3 font-medium">Designated account</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-3 py-3 text-right font-medium">Branches</th>
                        <th class="px-3 py-3 text-right font-medium">Drivers</th>
                        <th class="px-3 py-3 text-right font-medium">Orders</th>
                        <th class="px-5 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            
                            <td class="px-5 py-4">
                                <p class="font-semibold"><?php echo e($provider->name); ?></p>
                                <p class="text-xs text-slate-500"><?php echo e($provider->email ?: 'No email recorded'); ?></p>
                            </td>

                            
                            <td class="px-3 py-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canSeeAccount): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($provider->designatedAdmin): ?>
                                        <?php echo e($provider->designatedAdmin->name); ?>

                                    <?php else: ?>
                                        <span class="text-slate-500">Not designated</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php else: ?>
                                    â€”
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>

                            
                            <td class="px-3 py-4">
                                <span class="rounded-full px-2.5 py-1 text-xs font-semibold <?php echo e($statusStyles[$provider->status] ?? 'bg-slate-200 text-slate-700'); ?>"><?php echo e(ucfirst($provider->status)); ?></span>
                            </td>

                            
                            <td class="px-3 py-4 text-right tabular-nums"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canSeeBranches): ?><?php echo e($provider->branches_count); ?><?php else: ?>â€”<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></td>
                            <td class="px-3 py-4 text-right tabular-nums"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canSeeDrivers): ?><?php echo e($provider->drivers_count); ?><?php else: ?>â€”<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></td>
                            <td class="px-3 py-4 text-right tabular-nums"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canSeeOrders): ?><?php echo e($provider->orders_count); ?><?php else: ?>â€”<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></td>

                            
                            <td class="px-5 py-4">
                                <div class="flex flex-wrap gap-x-4 gap-y-1">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage providers')): ?>
                                        <a href="<?php echo e(route('admin.providers.edit', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Edit</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $provider)): ?>
                                        <a href="<?php echo e(route('provider.providers.show', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Workspace</a>
                                    <?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($provider->admin_user_id): ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canOpenAccountProfile): ?>
                                            <a href="<?php echo e(route('admin.users.edit', $provider->admin_user_id)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Provider account</a>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php elseif($canManageAccounts): ?>
                                        <a href="<?php echo e(route('admin.providers.accounts.create', $provider)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Create account</a>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="7" class="px-5 py-10 text-center text-slate-500">No providers have been created.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($providers->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4"><?php echo e($providers->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/providers/manage-index.blade.php ENDPATH**/ ?>