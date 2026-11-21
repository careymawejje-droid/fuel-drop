<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $activePatterns = (array) ($item['active'] ?? []);
        $excludedPatterns = (array) ($item['exclude'] ?? []);
        $isActive = request()->routeIs(...$activePatterns)
            && ($excludedPatterns === [] || ! request()->routeIs(...$excludedPatterns));
    ?>
    <a href="<?php echo e(route($item['route'], $item['parameters'] ?? [])); ?>"
        <?php if($isActive): ?> aria-current="page" <?php endif; ?>
        class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition <?php echo e($isActive ? 'bg-slate-800 font-medium text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white'); ?>">
        <i data-lucide="<?php echo e($item['icon']); ?>" class="h-4 w-4 <?php echo e($isActive ? 'text-amber-400' : ''); ?>"></i>
        <?php echo e($item['title']); ?>

    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/components/fueldrop/sidebar-links.blade.php ENDPATH**/ ?>