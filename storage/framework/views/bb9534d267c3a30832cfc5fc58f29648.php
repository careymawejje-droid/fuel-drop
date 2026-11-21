


<?php $__env->startSection('title', 'Edit branch'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.branches.index', $provider)); ?>" class="text-sm text-slate-200 hover:text-white">Branches Â· <?php echo e($provider->name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Shared input style so every field looks the same
        $input = 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 font-normal focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200';
    ?>

    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Edit <?php echo e($branch->name); ?></h1>
        <p class="mt-1 text-slate-600"><?php echo e($provider->name); ?></p>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('provider.branches.update', [$provider, $branch])); ?>" class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="border-b border-slate-200 p-6">
            <h2 class="font-bold">Branch details</h2>
            <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-medium">Branch name
                    <input name="name" value="<?php echo e(old('name', $branch->name)); ?>" required maxlength="255" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Address
                    <input name="address" value="<?php echo e(old('address', $branch->address)); ?>" required maxlength="255" class="<?php echo e($input); ?>">
                </label>
            </div>
        </div>

        
        <div class="p-6">
            <h2 class="font-bold">Location and service</h2>
            <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-medium">Latitude
                    <input name="latitude" type="number" step="0.0000001" min="-90" max="90" value="<?php echo e(old('latitude', $branch->latitude)); ?>" required class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Longitude
                    <input name="longitude" type="number" step="0.0000001" min="-180" max="180" value="<?php echo e(old('longitude', $branch->longitude)); ?>" required class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Service radius (metres)
                    <input name="service_radius_metres" type="number" min="1" value="<?php echo e(old('service_radius_metres', $branch->service_radius_metres)); ?>" class="<?php echo e($input); ?>">
                </label>
                <label class="block text-sm font-medium">Status
                    <select name="status" required class="<?php echo e($input); ?>">
                        <option value="active" <?php if(old('status', $branch->status) === 'active'): echo 'selected'; endif; ?>>Active</option>
                        <option value="inactive" <?php if(old('status', $branch->status) === 'inactive'): echo 'selected'; endif; ?>>Inactive</option>
                    </select>
                </label>
            </div>
        </div>

        
        <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
            <a href="<?php echo e(route('provider.branches.index', $provider)); ?>" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-900">Cancel</a>
            <button class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Save branch</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/provider/branches/edit.blade.php ENDPATH**/ ?>