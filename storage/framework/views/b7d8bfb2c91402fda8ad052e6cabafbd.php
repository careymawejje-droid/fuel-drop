


<?php $__env->startSection('title', 'Edit user'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="text-sm text-slate-200 hover:text-white">Users</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Shared input style so every field looks the same
        $input = 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 font-normal focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200';
    ?>

    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Edit user</h1>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>" class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="border-b border-slate-200 p-6">
            <h2 class="font-bold">Account details</h2>
            <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-medium sm:col-span-2">Full name
                    <input name="name" value="<?php echo e(old('name', $user->name)); ?>" required maxlength="255" autocomplete="name" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Email
                    <input name="email" type="email" value="<?php echo e(old('email', $user->email)); ?>" required maxlength="255" autocomplete="email" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Phone
                    <input name="phone" type="tel" value="<?php echo e(old('phone', $user->phone)); ?>" maxlength="20" autocomplete="tel" class="<?php echo e($input); ?>">
                </label>

                
                <div class="text-sm">
                    <span class="block font-medium">Role</span>
                    <p class="mt-1 inline-flex rounded-full bg-slate-100 px-3 py-2 font-semibold text-slate-700"><?php echo e($user->roles->pluck('name')->join(', ') ?: 'No role'); ?></p>
                </div>
                <div class="text-sm">
                    <span class="block font-medium">Account status</span>
                    <p class="mt-1 inline-flex rounded-full bg-slate-100 px-3 py-2 font-semibold text-slate-700"><?php echo e(ucfirst($user->status)); ?></p>
                </div>
            </div>
        </div>

        
        <div class="p-6">
            <h2 class="font-bold">Change password</h2>
            <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-medium">New password <span class="font-normal text-slate-500">(optional)</span>
                    <input name="password" type="password" minlength="8" autocomplete="new-password" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Confirm new password
                    <input name="password_confirmation" type="password" minlength="8" autocomplete="new-password" class="<?php echo e($input); ?>">
                </label>
            </div>
        </div>

        
        <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-900">Cancel</a>
            <button class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Save changes</button>
        </div>
    </form>

    <section class="mt-6 grid gap-5 lg:grid-cols-2">
        <div class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="font-bold">Role and permissions</h2>
            <p class="mt-1 text-sm text-slate-600">Current role: <?php echo e($user->roles->pluck('name')->map(fn ($role) => $roleLabels[$role] ?? $role)->join(', ') ?: 'No role'); ?>. Saving replaces previous role assignments and clears direct permissions.</p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->id() === $user->id && $user->hasRole('admin')): ?>
                <p class="mt-4 rounded-lg bg-amber-50 p-3 text-sm text-amber-900">You cannot change your own Admin role.</p>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('admin.users.role', $user)); ?>" class="mt-4" onsubmit="return confirm('Change this userâ€™s role and replace their current role permissions?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <label class="block text-sm font-medium">New role
                        <select name="role" required class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $roleLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>" <?php if($user->roles->count() === 1 && $user->roles->first()->name === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                    </label>
                    <button class="mt-4 rounded-lg bg-amber-400 px-4 py-2 font-bold text-slate-900 fd-primary">Change role</button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="font-bold">Account access</h2>
            <p class="mt-1 text-sm text-slate-600">Current status: <strong><?php echo e($user->status === 'active' ? 'Active' : 'Inactive'); ?></strong>. Deactivation keeps this user and their records.</p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->id() === $user->id): ?>
                <p class="mt-4 rounded-lg bg-amber-50 p-3 text-sm text-amber-900">You cannot deactivate your own account.</p>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('admin.users.status', $user)); ?>" class="mt-4" onsubmit="return confirm('<?php echo e($user->status === 'active' ? 'Deactivate this account? Existing access will be revoked.' : 'Reactivate this account?'); ?>')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <input type="hidden" name="status" value="<?php echo e($user->status === 'active' ? 'inactive' : 'active'); ?>">
                    <button class="rounded-lg px-4 py-2 font-bold text-white <?php echo e($user->status === 'active' ? 'bg-red-700 hover:bg-red-800' : 'bg-emerald-700 hover:bg-emerald-800'); ?>"><?php echo e($user->status === 'active' ? 'Deactivate account' : 'Reactivate account'); ?></button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>