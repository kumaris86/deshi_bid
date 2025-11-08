<?php $__env->startSection('title', 'Register - Deshi Bid'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .register-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .role-card {
        background: white;
        border: 3px solid #e5e7eb;
        border-radius: 15px;
        padding: 2rem;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
    }

    .role-card:hover {
        transform: translateY(-5px);
        border-color: #667eea;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .role-card.active {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    }

    .role-card i {
        font-size: 3rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-control {
        border-radius: 10px;
        border: 2px solid #e5e7eb;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
</style>

<div class="register-container">
    <div class="card">
        <div class="card-body p-5">
            <h2 class="text-center mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                <i class="fas fa-user-plus"></i> Create Account
            </h2>

            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="fas fa-user"></i> Full Name
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="name" 
                           value="<?php echo e(old('name')); ?>" 
                           required 
                           autofocus
                           placeholder="Enter your full name">
                    <?php $__errorArgs = ['name'];
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

                <!-- Email -->
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

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="fas fa-phone"></i> Phone Number
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="phone" 
                           value="<?php echo e(old('phone')); ?>" 
                           required
                           placeholder="01XXXXXXXXX">
                    <?php $__errorArgs = ['phone'];
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

                <!-- Password -->
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
                           placeholder="Minimum 8 characters">
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

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="form-label fw-bold">
                        <i class="fas fa-lock"></i> Confirm Password
                    </label>
                    <input type="password" 
                           class="form-control" 
                           name="password_confirmation" 
                           required
                           placeholder="Re-enter your password">
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <label class="form-label fw-bold">
                        <i class="fas fa-user-tag"></i> I want to:
                    </label>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="role-card" onclick="selectRole('seller')">
                                <input type="radio" name="role" value="seller" id="role-seller" class="d-none" <?php echo e(old('role') == 'seller' ? 'checked' : ''); ?>>
                                <i class="fas fa-store"></i>
                                <h5 class="fw-bold mb-2">Sell Products</h5>
                                <p class="text-muted small mb-0">List and auction your items</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="role-card" onclick="selectRole('bidder')">
                                <input type="radio" name="role" value="bidder" id="role-bidder" class="d-none" <?php echo e(old('role') == 'bidder' ? 'checked' : ''); ?>>
                                <i class="fas fa-gavel"></i>
                                <h5 class="fw-bold mb-2">Place Bids</h5>
                                <p class="text-muted small mb-0">Bid on exciting auctions</p>
                            </div>
                        </div>
                    </div>
                    
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>

                <div class="text-center mt-4">
                    <p class="mb-0">
                        Already have an account? 
                        <a href="<?php echo e(route('login')); ?>" class="fw-bold" style="color: #667eea;">
                            Login here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function selectRole(role) {
        // Remove active class from all cards
        document.querySelectorAll('.role-card').forEach(card => {
            card.classList.remove('active');
        });
        
        // Add active class to selected card
        event.currentTarget.classList.add('active');
        
        // Check the radio button
        document.getElementById('role-' + role).checked = true;
    }

    // Set active class on page load if role is selected
    document.addEventListener('DOMContentLoaded', function() {
        const selectedRole = document.querySelector('input[name="role"]:checked');
        if (selectedRole) {
            const card = document.querySelector(`#role-${selectedRole.value}`).closest('.role-card');
            card.classList.add('active');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deshi-bid-v2\resources\views/auth/register.blade.php ENDPATH**/ ?>