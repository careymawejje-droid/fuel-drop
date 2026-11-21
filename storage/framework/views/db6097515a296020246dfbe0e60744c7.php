<?php $__env->startSection('title', 'Notifications'); ?>

<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('home')); ?>" class="text-sm text-slate-200 hover:text-white">Dashboard</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="mb-6">
        <p class="text-sm font-bold uppercase tracking-wide text-amber-700">Updates</p>
        <h1 class="mt-1 text-3xl font-bold">Notifications</h1>
    </section>

    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="divide-y divide-slate-100">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="flex flex-wrap items-center justify-between gap-4 py-4 first:pt-0 last:pb-0">
                    <div class="flex items-start gap-4">
                        <i data-lucide="<?php echo e($notification->read_at ? 'bell' : 'bell-ring'); ?>" class="mt-1 h-5 w-5 shrink-0 text-amber-600"></i>
                        <div>
                            <p class="font-semibold <?php echo e($notification->read_at ? 'text-slate-600' : 'text-slate-900'); ?>"><?php echo e($notification->title); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($notification->order): ?>
                                <p class="mt-1 text-sm text-slate-500">Order <?php echo e($notification->order->order_number); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <p class="mt-1 text-xs text-slate-400"><?php echo e($notification->created_at->diffForHumans()); ?></p>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $notification->read_at): ?>
                        <form method="POST" action="<?php echo e(route('notifications.read', $notification)); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="rounded-lg border border-slate-300 px-3 py-2 text-sm font-semibold hover:bg-slate-50">Mark as read</button>
                        </form>
                    <?php else: ?>
                        <span class="text-xs font-medium text-slate-400">Read</span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="py-10 text-center text-slate-500">You have no notifications.</div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($notifications->hasPages()): ?>
            <div class="mt-5 border-t border-slate-100 pt-4"><?php echo e($notifications->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/notifications.blade.php ENDPATH**/ ?>