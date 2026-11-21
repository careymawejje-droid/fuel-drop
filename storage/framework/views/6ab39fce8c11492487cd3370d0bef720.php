<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FuelDrop | Sign up</title>

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">
</head>
<body class="auth-screen bg-slate-100 text-navy font-sans antialiased">

    
    <div class="auth-card w-full max-w-md bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-8">

        
        <div class="flex items-center gap-3 mb-6">
            <div class="h-12 w-12 rounded-xl bg-navy flex items-center justify-center">
                <i data-lucide="droplet" class="text-brand-500 fill-brand-500"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold">FuelDrop</h1>
                <p class="text-sm text-slate-500">Create your account</p>
            </div>
        </div>

        
        <form action="<?php echo e(route('register')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>

            
            <div>
                <label for="name" class="block text-sm font-medium mb-1">Full name</label>
                <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" required autofocus
                       placeholder="Your full name"
                       class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/30">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div>
                <label for="phone" class="block text-sm font-medium mb-1">Phone number</label>
                <input id="phone" name="phone" type="tel" value="<?php echo e(old('phone')); ?>" required
                       placeholder="07XX XXX XXX"
                       class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/30">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required
                       placeholder="you@example.com"
                       class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/30">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input id="password" name="password" type="password" required
                       placeholder="********"
                       class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/30">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirm password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       placeholder="********"
                       class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/30">
            </div>

            
            <div class="pt-1">
                <button type="submit" class="w-full rounded-lg bg-brand-500 hover:bg-brand-600 py-2.5 font-bold text-navy fd-primary">
                    Sign up
                </button>
            </div>
        </form>

        
        <p class="mt-6 pt-6 border-t border-slate-200 text-sm text-center text-slate-500">
            Already have an account?
            <a href="<?php echo e(route('login')); ?>" class="text-brand-600 font-bold hover:underline">Sign in</a>
        </p>
    </div>

    
    <script>lucide.createIcons();</script>
</body>
</html>
<?php /**PATH C:\Laravel Work\ITPD\fuel-drop-clean\resources\views/auth/register.blade.php ENDPATH**/ ?>