

<?php $__env->startSection('title', 'Browse Products - Deshi Bid'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold">
            <i class="fas fa-box"></i> Browse Products
        </h2>
        <p class="text-muted">Discover amazing products</p>
    </div>
</div>

<!-- Search & Filter -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('products.index')); ?>">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" 
                                   name="search" 
                                   class="form-control" 
                                   placeholder="Search products..."
                                   value="<?php echo e(request('search')); ?>">
                        </div>
                        <div class="col-md-4">
                            <select name="category" class="form-control">
                                <option value="">All Categories</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Products Grid -->
<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <?php if($product->images && count($product->images) > 0): ?>
                    <img src="<?php echo e(asset('storage/' . $product->images[0])); ?>" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover;"
                         alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                <?php endif; ?>
                
                <div class="card-body">
                    <span class="badge bg-primary mb-2"><?php echo e($product->category->name); ?></span>
                    
                    <h5 class="card-title"><?php echo e(Str::limit($product->name, 40)); ?></h5>
                    
                    <p class="text-muted small"><?php echo e(Str::limit($product->description, 80)); ?></p>
                    
                    <div class="mb-3">
                        <h4 class="text-primary mb-0">
                            ৳<?php echo e(number_format($product->starting_price, 2)); ?>

                        </h4>
                        <small class="text-muted">Starting Price</small>
                    </div>
                    
                    <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-primary w-100">
                        <i class="fas fa-eye"></i> View Details
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> No products found.
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Pagination -->
<div class="row">
    <div class="col-12">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deshi-bid-v2\resources\views/products/index.blade.php ENDPATH**/ ?>