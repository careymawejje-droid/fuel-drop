

<?php $__env->startSection('title', 'User details'); ?>

<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="text-sm text-slate-200 hover:text-white">Users</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <p class="text-sm font-bold uppercase tracking-wide text-amber-700">User account</p>
            <h1 class="mt-1 text-3xl font-bold"><?php echo e($user->name); ?></h1>
            <p class="mt-1 text-slate-600"><?php echo e($user->email); ?></p>
        </div>
        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="rounded-lg bg-amber-400 px-4 py-2.5 font-bold text-slate-900 fd-primary">Edit account and role</a>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <section class="grid gap-5 lg:grid-cols-2">
        <div class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-lg font-bold">Account details</h2>
            <dl class="mt-4 grid gap-4 sm:grid-cols-2">
                <div><dt class="text-sm text-slate-500">Phone</dt><dd class="mt-1 font-medium"><?php echo e($user->phone ?: 'Not provided'); ?></dd></div>
                <div><dt class="text-sm text-slate-500">Email verification</dt><dd class="mt-1 font-medium"><?php echo e($user->email_verified_at ? 'Verified' : 'Not verified'); ?></dd></div>
                <div><dt class="text-sm text-slate-500">Role</dt><dd class="mt-1 font-medium"><?php echo e($user->roles->pluck('name')->map(fn ($role) => $roleLabels[$role] ?? $role)->join(', ') ?: 'No role'); ?></dd></div>
                <div><dt class="text-sm text-slate-500">Account status</dt><dd class="mt-1"><span class="rounded-full px-2.5 py-1 text-xs font-semibold <?php echo e($user->status === 'active' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-200 text-slate-700'); ?>"><?php echo e($user->status === 'active' ? 'Active' : 'Inactive'); ?></span></dd></div>
                <div><dt class="text-sm text-slate-500">Registered</dt><dd class="mt-1 font-medium"><?php echo e($user->created_at?->format('d M Y H:i')); ?></dd></div>
            </dl>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-lg font-bold">Existing business records</h2>
            <dl class="mt-4 grid gap-4 sm:grid-cols-2">
                <div><dt class="text-sm text-slate-500">Orders</dt><dd class="mt-1 font-medium"><?php echo e($user->orders()->count()); ?></dd></div>
                <div><dt class="text-sm text-slate-500">Driver profile</dt><dd class="mt-1 font-medium"><?php echo e($user->driver ? 'Present Â· '.$user->driver->available_status : 'None'); ?></dd></div>
                <div class="sm:col-span-2"><dt class="text-sm text-slate-500">Provider memberships</dt><dd class="mt-1 font-medium"><?php echo e($user->providers->pluck('name')->join(', ') ?: 'None'); ?></dd></div>
            </dl>
            <p class="mt-4 text-sm text-slate-500">Changing a role does not remove provider memberships, driver profiles, orders, payments, or delivery history.</p>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/users/show.blade.php ENDPATH**/ ?>