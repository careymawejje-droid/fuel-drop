


<?php $__env->startSection('title', 'Users'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-slate-200 hover:text-white">Admin dashboard</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $statusStyles = ['active' => 'bg-emerald-100 text-emerald-800', 'inactive' => 'bg-slate-200 text-slate-700'];
    ?>

    
    <section class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Users</h1>
            <p class="mt-1 text-slate-600">Review customer, provider, driver, and admin accounts.</p>
        </div>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Add customer</a>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <form method="GET" action="<?php echo e(route('admin.users.index')); ?>" class="mb-5 grid gap-3 rounded-xl border border-slate-200 bg-white p-4 sm:grid-cols-2 lg:grid-cols-4">
        <label class="text-sm font-medium">Search
            <input name="q" value="<?php echo e($search); ?>" maxlength="100" placeholder="Name, email, or phone" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 font-normal">
        </label>
        <label class="text-sm font-medium">Role
            <select name="role" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 font-normal">
                <option value="">All roles</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $roleLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>" <?php if($roleFilter === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </select>
        </label>
        <label class="text-sm font-medium">Account status
            <select name="status" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 font-normal">
                <option value="">All accounts</option>
                <option value="active" <?php if($statusFilter === 'active'): echo 'selected'; endif; ?>>Active</option>
                <option value="inactive" <?php if($statusFilter === 'inactive'): echo 'selected'; endif; ?>>Inactive</option>
            </select>
        </label>
        <div class="flex items-end gap-2">
            <button class="rounded-lg bg-slate-900 px-4 py-2 font-semibold text-white">Filter</button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search !== '' || $roleFilter !== '' || $statusFilter !== ''): ?>
                <a href="<?php echo e(route('admin.users.index')); ?>" class="rounded-lg border border-slate-300 px-4 py-2">Clear</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </form>

    
    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Name</th>
                        <th class="px-3 py-3 font-medium">Email</th>
                        <th class="px-3 py-3 font-medium">Role</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-5 py-3"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold"><?php echo e($user->name); ?></td>
                            <td class="px-3 py-4 text-slate-600"><?php echo e($user->email); ?></td>

                            
                            <td class="px-3 py-4 text-slate-600"><?php echo e($user->roles->pluck('name')->map(fn ($role) => $roleLabels[$role] ?? str($role)->replace('_', ' ')->title())->join(', ') ?: 'No role'); ?></td>

                            
                            <td class="px-3 py-4">
                                <?php ($active = $user->status === 'active'); ?>
                                <span class="rounded-full px-2.5 py-1 text-xs font-semibold <?php echo e($statusStyles[$active ? 'active' : 'inactive']); ?>"><?php echo e($active ? 'Active' : 'Inactive'); ?></span>
                            </td>

                            
                            <td class="px-5 py-4 text-right">
                                <div class="flex flex-wrap items-center justify-end gap-3">
                                    <a href="<?php echo e(route('admin.users.show', $user)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Details</a>
                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="font-semibold text-blue-700 hover:text-blue-900">Change role</a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->id() !== $user->id): ?>
                                        <form method="POST" action="<?php echo e(route('admin.users.status', $user)); ?>" onsubmit="return confirm('<?php echo e($active ? 'Deactivate this account? The user will be signed out and will no longer be able to log in.' : 'Reactivate this account?'); ?>')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <input type="hidden" name="status" value="<?php echo e($active ? 'inactive' : 'active'); ?>">
                                            <button class="font-semibold <?php echo e($active ? 'text-red-700 hover:text-red-900' : 'text-emerald-700 hover:text-emerald-900'); ?>"><?php echo e($active ? 'Deactivate' : 'Reactivate'); ?></button>
                                        </form>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="5" class="px-5 py-10 text-center text-slate-500">No users match these filters.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4"><?php echo e($users->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/users/index.blade.php ENDPATH**/ ?>