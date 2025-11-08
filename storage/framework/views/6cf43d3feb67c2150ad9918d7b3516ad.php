<?php $__env->startSection('title', 'Login - Deshi Bid'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .login-container {
        max-width: 500px;
        margin: 0 auto;
    }
</style>

<div class="login-container">
    <div class="card">
        <div class="card-body p-5">
            <h2 class="text-center mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                <i class="fas fa-sign-in-alt"></i> Welcome Back
            </h2>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="fas fa-envelope"></i> Email Address
                    </label>
                    <input type="email" 
                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="email" 
                           value="<?php echo e(old('email')); ?>" 
                           required 
                           autofocus
                           placeholder="your@email.com">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" 
                           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="password" 
                           required
                           placeholder="Enter your password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>

                <div class="text-center">
                    <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="text-muted small">
                            Forgot Password?
                        </a>
                    <?php endif; ?>
                </div>

                <hr>

                <div class="text-center">
                    <p class="mb-0">
                        Don't have an account? 
                        <a href="<?php echo e(route('register')); ?>" class="fw-bold" style="color: #667eea;">
                            Register here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Demo Credentials Info -->
    <div class="alert alert-info mt-4">
        <strong><i class="fas fa-info-circle"></i> Demo Credentials:</strong><br>
        <small>
            <strong>Admin:</strong> admin@deshibid.com / admin123<br>
            <strong>Seller:</strong> seller@deshibid.com / seller123<br>
            <strong>Bidder:</strong> bidder@deshibid.com / bidder123
        </small>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deshi-bid-v2\resources\views/auth/login.blade.php ENDPATH**/ ?>