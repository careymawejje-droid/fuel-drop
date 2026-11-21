


<?php $__env->startSection('title', 'Add customer'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="text-sm text-slate-200 hover:text-white">Users</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Shared input style so every field looks the same
        $input = 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 font-normal focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200';
    ?>

    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Add customer</h1>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <?php echo csrf_field(); ?>

        
        <div class="border-b border-slate-200 p-6">
            <h2 class="font-bold">Customer details</h2>
            <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-medium sm:col-span-2">Full name
                    <input name="name" value="<?php echo e(old('name')); ?>" required maxlength="255" autocomplete="name" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Email
                    <input name="email" type="email" value="<?php echo e(old('email')); ?>" required maxlength="255" autocomplete="email" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Phone
                    <input name="phone" type="tel" value="<?php echo e(old('phone')); ?>" maxlength="20" autocomplete="tel" class="<?php echo e($input); ?>">
                </label>

                
                <div class="text-sm">
                    <span class="block font-medium">Account role</span>
                    <p class="mt-1 inline-flex rounded-full bg-slate-100 px-3 py-2 font-semibold text-slate-700">Customer</p>
                </div>
            </div>
        </div>

        
        <div class="p-6">
            <h2 class="font-bold">Sign-in password</h2>
            <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-medium">Password
                    <input name="password" type="password" required minlength="8" autocomplete="new-password" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Confirm password
                    <input name="password_confirmation" type="password" required minlength="8" autocomplete="new-password" class="<?php echo e($input); ?>">
                </label>
            </div>
        </div>

        
        <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-900">Cancel</a>
            <button class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Create customer</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/users/create.blade.php ENDPATH**/ ?>