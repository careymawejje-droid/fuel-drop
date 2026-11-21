


<?php $__env->startSection('title', 'Edit branch fuel'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('provider.providers.fuels.index', $provider)); ?>" class="text-sm text-slate-200 hover:text-white">Fuel inventory</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        // Shared input style so every field looks the same
        $input = 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 font-normal focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200';
    ?>

    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Edit <?php echo e($branchFuel->fuel->name); ?></h1>
        <p class="mt-1 text-slate-600"><?php echo e($provider->name); ?> Â· <?php echo e($branchFuel->branch->name); ?></p>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('provider.providers.fuels.update', [$provider, $branchFuel])); ?>" class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="grid gap-5 p-6 sm:grid-cols-2">
            <label class="block text-sm font-medium">Price per litre (UGX)
                <input name="price_per_litre" type="number" step="0.01" min="0.01" value="<?php echo e(old('price_per_litre', $branchFuel->price_per_litre)); ?>" required class="<?php echo e($input); ?>">
            </label>
            <label class="block text-sm font-medium">Available stock (litres)
                <input name="available_stock_litres" type="number" step="0.001" min="0" value="<?php echo e(old('available_stock_litres', $branchFuel->available_stock_litres)); ?>" required class="<?php echo e($input); ?>">
            </label>
            <label class="block text-sm font-medium">Status
                <select name="status" required class="<?php echo e($input); ?>">
                    <option value="active" <?php if(old('status', $branchFuel->status) === 'active'): echo 'selected'; endif; ?>>Active</option>
                    <option value="inactive" <?php if(old('status', $branchFuel->status) === 'inactive'): echo 'selected'; endif; ?>>Inactive</option>
                </select>
            </label>
        </div>

        
        <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
            <a href="<?php echo e(route('provider.providers.fuels.index', $provider)); ?>" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-900">Cancel</a>
            <button class="rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-slate-900 transition hover:bg-amber-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 fd-primary">Save changes</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/fuels/edit.blade.php ENDPATH**/ ?>