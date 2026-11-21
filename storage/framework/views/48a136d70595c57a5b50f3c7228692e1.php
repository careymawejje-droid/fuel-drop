<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> | FuelDrop</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900 antialiased">
    <?php
        $role = auth()->user()->hasRole('admin') ? 'admin' : (auth()->user()->hasRole('provider') ? 'provider' : (auth()->user()->hasRole('driver') ? 'driver' : 'customer'));
    ?>
    <?php echo $__env->make('components.fueldrop.sidebar', ['role' => $role], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="min-h-screen lg:ml-64">
        <div class="hidden border-b border-slate-200 bg-white px-6 py-4 lg:flex lg:items-center lg:justify-between">
            <div class="[&_a]:!text-slate-600 [&_a:hover]:!text-slate-900">
                <?php echo $__env->yieldContent('back-link'); ?>
            </div>
            <p class="text-sm text-slate-500">Signed in as <span class="font-medium text-slate-900"><?php echo e(auth()->user()->name); ?></span></p>
        </div>
        <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    
    <script>lucide.createIcons();</script>
</body>
</html>
<?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/layouts/fueldrop.blade.php ENDPATH**/ ?>