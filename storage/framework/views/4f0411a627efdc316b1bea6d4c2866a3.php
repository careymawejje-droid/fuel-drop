

<?php $__env->startSection('title', 'Confirm password'); ?>

<?php $__env->startSection('content'); ?>
    <section class="mx-auto max-w-xl rounded-xl border border-slate-200 bg-white p-6">
        <h1 class="text-2xl font-bold"><?php echo e(__('Confirm your password')); ?></h1>
        <p class="mt-2 text-sm text-slate-600"><?php echo e(__('This is a secure area of the application. Please confirm your password before continuing.')); ?></p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="mt-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.confirm')); ?>" class="mt-5">
            <?php echo csrf_field(); ?>
            <label for="password" class="block text-sm font-medium text-slate-700"><?php echo e(__('Password')); ?></label>
            <input id="password" name="password" type="password" required autofocus autocomplete="current-password" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200">
            <button type="submit" class="mt-4 rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">
                <?php echo e(__('Confirm')); ?>

            </button>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/auth/confirm-password.blade.php ENDPATH**/ ?>