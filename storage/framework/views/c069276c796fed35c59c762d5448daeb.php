<?php $__env->startSection('title', $provider->name); ?>

<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route(auth()->user()->hasRole('admin') ? 'admin.providers.index' : 'provider.providers.index')); ?>" class="text-sm text-slate-600 hover:text-slate-900">Provider workspace</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $btn = 'inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-900 transition hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400';
        $btnPrimary = 'inline-flex items-center gap-2 rounded-lg bg-amber-400 px-4 py-2 text-sm font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2';
        $stats = [
            ['label' => 'Branches', 'icon' => 'building-2', 'value' => $provider->branches_count, 'can' => auth()->user()->can('manageBranches', $provider)],
            ['label' => 'Inventory', 'icon' => 'fuel', 'value' => $provider->branch_fuel_count, 'can' => auth()->user()->can('manageInventory', $provider)],
            ['label' => 'Drivers', 'icon' => 'users-round', 'value' => $provider->drivers_count, 'can' => auth()->user()->can('manageDrivers', $provider)],
            ['label' => 'Trucks', 'icon' => 'truck', 'value' => $provider->trucks_count, 'can' => auth()->user()->can('manageTrucks', $provider)],
        ];
        $stats = array_filter($stats, fn ($stat) => $stat['can']);
    ?>

    <section class="rounded-xl border border-slate-200 bg-white">
        <div class="flex flex-wrap items-start justify-between gap-4 p-6">
            <div>
                <h1 class="text-3xl font-bold"><?php echo e($provider->name); ?></h1>
                <p class="mt-1 text-slate-600"><?php echo e($provider->email ?: 'No provider email recorded'); ?></p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($provider->admin_user_id): ?>
                    <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-sm text-slate-700">
                        <i data-lucide="user-check" class="h-4 w-4"></i>
                        Admin: <?php echo e($provider->designatedAdmin?->name ?? 'Assigned'); ?>

                    </span>
                <?php else: ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage provider accounts')): ?>
                        <a href="<?php echo e(route('admin.providers.accounts.create', $provider)); ?>" class="<?php echo e($btn); ?>">
                            <i data-lucide="user-plus" class="h-4 w-4"></i>Designate Provider
                        </a>
                    <?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($stats)): ?>
            <dl class="grid grid-cols-2 divide-x divide-y divide-slate-200 border-t border-slate-200 sm:grid-cols-4 sm:divide-y-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="px-6 py-4">
                        <dt class="flex items-center gap-2 text-sm text-slate-500">
                            <i data-lucide="<?php echo e($stat['icon']); ?>" class="h-4 w-4 text-amber-600"></i><?php echo e($stat['label']); ?>

                        </dt>
                        <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($stat['value']); ?></dd>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </dl>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="flex flex-wrap gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageDrivers', $provider)): ?>
                <a href="<?php echo e(route('provider.providers.drivers.index', $provider)); ?>" class="<?php echo e($btn); ?>"><i data-lucide="users-round" class="h-4 w-4"></i>Manage drivers</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageInventory', $provider)): ?>
                <a href="<?php echo e(route('provider.providers.fuels.index', $provider)); ?>" class="<?php echo e($btn); ?>"><i data-lucide="fuel" class="h-4 w-4"></i>Manage inventory</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageBranches', $provider)): ?>
                <a href="<?php echo e(route('provider.branches.index', $provider)); ?>" class="<?php echo e($btn); ?>"><i data-lucide="git-branch" class="h-4 w-4"></i>Manage branches</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageTrucks', $provider)): ?>
                <a href="<?php echo e(route('provider.trucks.index', $provider)); ?>" class="<?php echo e($btn); ?>"><i data-lucide="truck" class="h-4 w-4"></i>Manage trucks</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $provider)): ?>
                <a href="<?php echo e(route('provider.providers.orders.index', $provider)); ?>" class="<?php echo e($btn); ?>"><i data-lucide="clipboard-list" class="h-4 w-4"></i>Manage orders</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageDrivers', $provider)): ?>
                <a href="<?php echo e(route('provider.providers.drivers.create', $provider)); ?>" class="<?php echo e($btnPrimary); ?> sm:ml-auto">
                    <i data-lucide="user-plus" class="h-4 w-4"></i>Add driver
                </a>
            <?php endif; ?>
        </div>
    </section>

    <section class="mt-6 flex gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-950">
        <i data-lucide="shield-check" class="h-5 w-5 shrink-0"></i>
        <p>All branch, inventory, driver, truck, order, and payment actions remain limited to this provider on the server.</p>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/providers/show.blade.php ENDPATH**/ ?>