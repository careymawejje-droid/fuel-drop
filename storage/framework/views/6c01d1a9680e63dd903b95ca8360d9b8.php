

<?php $__env->startSection('title', 'Provider workspace'); ?>

<?php $__env->startSection('content'); ?>
<?php
    // Admins see every provider; provider accounts see only their own (already filtered server-side)
    $isAdmin = auth()->user()->hasRole('admin');
?>
<div class="mx-auto max-w-5xl">

        <!-- Page heading: wording depends on whether the user is an admin -->
        <div>
            <h1 class="text-3xl font-bold"><?php echo e($isAdmin ? 'All providers' : 'Your provider'); ?></h1>
            <p class="mt-1 text-slate-600">
                <?php echo e($isAdmin ? 'Review provider workspaces across FuelDrop.' : 'Manage only the provider linked to your account.'); ?>

            </p>
        </div>

        <!-- Provider cards: the list is already filtered server-side, and each action is protected by the provider policy -->
        <div class="mt-6 grid gap-5 md:grid-cols-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="flex flex-col rounded-xl border border-slate-200 bg-white">

                    <!-- Name, status and access badge -->
                    <div class="flex items-start justify-between gap-4 p-6">
                        <div class="min-w-0">
                            <h2 class="truncate text-xl font-bold"><?php echo e($provider->name); ?></h2>
                            <p class="mt-1 text-sm text-slate-500"><?php echo e(ucfirst($provider->status)); ?></p>
                        </div>
                        <span class="shrink-0 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">Scoped access</span>
                    </div>

                    <!-- Counts: each one only shows if the user may manage that area -->
                    <dl class="grid grid-cols-2 divide-x divide-slate-200 border-t border-slate-200 text-sm">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageBranches', $provider)): ?>
                            <div class="px-6 py-4">
                                <dt class="text-slate-500">Branches</dt>
                                <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($provider->branches_count); ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageDrivers', $provider)): ?>
                            <div class="px-6 py-4">
                                <dt class="text-slate-500">Drivers</dt>
                                <dd class="mt-1 text-2xl font-bold tabular-nums"><?php echo e($provider->drivers_count); ?></dd>
                            </div>
                        <?php endif; ?>
                    </dl>

                    <!-- Action: open the provider's workspace -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $provider)): ?>
                        <div class="mt-auto border-t border-slate-200 bg-slate-50 px-6 py-4">
                            <a href="<?php echo e(route('provider.providers.show', $provider)); ?>" class="inline-flex items-center gap-2 rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">
                                Open workspace <i data-lucide="arrow-right" class="h-4 w-4"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- Empty state: no provider linked to this account -->
                <div class="rounded-xl border border-dashed border-slate-300 bg-white p-10 text-center md:col-span-2">
                    <i data-lucide="building-2" class="mx-auto h-8 w-8 text-slate-400"></i>
                    <h2 class="mt-3 text-lg font-bold">No provider access yet</h2>
                    <p class="mt-1 text-sm text-slate-500">Contact FuelDrop Admin to set up your Provider account.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/providers/index.blade.php ENDPATH**/ ?>