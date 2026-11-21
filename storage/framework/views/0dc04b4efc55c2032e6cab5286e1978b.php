


<?php $__env->startSection('title', 'Edit driver'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.drivers.index', $provider)); ?>" class="text-sm text-slate-200 hover:text-white">Drivers Â· <?php echo e($provider->name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Shared input style so every field looks the same
        $input = 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 font-normal focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200';
    ?>

    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Edit <?php echo e($driver->user->name); ?></h1>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('provider.providers.drivers.update', [$provider, $driver])); ?>" class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="grid gap-5 p-6 sm:grid-cols-2">
            <label class="block text-sm font-medium sm:col-span-2">Full name
                <input name="name" value="<?php echo e(old('name', $driver->user->name)); ?>" required maxlength="255" autocomplete="name" class="<?php echo e($input); ?>">
            </label>
            <label class="block text-sm font-medium">Phone
                <input name="phone" type="tel" value="<?php echo e(old('phone', $driver->user->phone)); ?>" maxlength="20" autocomplete="tel" class="<?php echo e($input); ?>">
            </label>
            <label class="block text-sm font-medium">Branch
                <select name="branch_id" class="<?php echo e($input); ?>">
                    <option value="">No branch assignment</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($branch->id); ?>" <?php if(old('branch_id', $driver->branch_id) == $branch->id): echo 'selected'; endif; ?>><?php echo e($branch->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </label>
            <label class="block text-sm font-medium">Truck plate
                <input name="truck_plate" value="<?php echo e(old('truck_plate', $driver->truck_plate)); ?>" maxlength="255" class="<?php echo e($input); ?>">
            </label>

            <label class="block text-sm font-medium">Availability
                <select name="available_status" required class="<?php echo e($input); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['available' => 'Available', 'inactive' => 'Inactive'] + ($driver->available_status === 'assigned' ? ['assigned' => 'Assigned'] : []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status); ?>" <?php if(old('available_status', $driver->available_status) === $status): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </label>
        </div>

        
        <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
            <a href="<?php echo e(route('provider.providers.drivers.index', $provider)); ?>" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-900">Cancel</a>
            <button class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Save changes</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/drivers/edit.blade.php ENDPATH**/ ?>