<?php $__env->startSection('title', 'All payments'); ?>


<?php $__env->startSection('back-link'); ?>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-slate-200 hover:text-white">Admin dashboard</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="mb-6">
        <h1 class="text-3xl font-bold">Payments</h1>
        <p class="mt-1 text-slate-600">Review payment status and cash collections.</p>
    </section>

    
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Order</th>
                        <th class="px-3 py-3 font-medium">Customer</th>
                        <th class="px-3 py-3 font-medium">Provider</th>
                        <th class="px-3 py-3 font-medium">Method</th>
                        <th class="px-3 py-3 text-right font-medium">Amount</th>
                        <th class="px-3 py-3 font-medium">Status</th>
                        <th class="px-3 py-3 font-medium">Collected by</th>
                        <th class="px-5 py-3 font-medium">Collected at</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold"><?php echo e($payment->order->order_number); ?></td>
                            <td class="px-3 py-4"><?php echo e($payment->order->customer->name); ?></td>
                            <td class="px-3 py-4"><?php echo e($payment->order->provider?->name ?? 'Unassigned'); ?></td>
                            <td class="px-3 py-4"><?php echo e(ucfirst(str_replace('_', ' ', $payment->payment_method))); ?></td>

                            
                            <td class="whitespace-nowrap px-3 py-4 text-right tabular-nums">UGX <?php echo e(number_format((float) $payment->amount)); ?></td>

                            
                            <td class="px-3 py-4">
                                <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700"><?php echo e(ucfirst($payment->status)); ?></span>
                            </td>

                            
                            <td class="px-3 py-4"><?php echo e($payment->collectedByDriver?->user?->name ?? '—'); ?></td>
                            <td class="whitespace-nowrap px-5 py-4"><?php echo e($payment->collected_at?->format('d M Y H:i') ?? '—'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <tr><td colspan="8" class="px-5 py-10 text-center text-slate-500">No payments have been recorded.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($payments->hasPages()): ?>
            <div class="border-t border-slate-200 px-5 py-4"><?php echo e($payments->links()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fueldrop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/admin/payments/index.blade.php ENDPATH**/ ?>