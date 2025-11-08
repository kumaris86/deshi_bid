

<?php $__env->startSection('title', 'Seller Dashboard - Deshi Bid'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .seller-stat-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease;
    }

    .seller-stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(45deg);
        transition: all 0.6s;
    }

    .seller-stat-card:hover::before {
        animation: shine 1.5s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    .product-mini-card {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        transition: all 0.3s;
    }

    .product-mini-card:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold mb-0" style="color: #1f2937;">
            <i class="fas fa-store"></i> Seller Dashboard
        </h2>
        <p class="text-muted">Manage your products and auctions</p>
    </div>
    <div class="col-auto">
        <a href="<?php echo e(route('seller.products.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Product
        </a>
    </div>
</div>

<!-- Statistics -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="seller-stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
            <i class="fas fa-box fa-3x mb-3"></i>
            <h3 class="fw-bold mb-0"><?php echo e($stats['total_products']); ?></h3>
            <small>Total Products</small>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="seller-stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
            <i class="fas fa-clock fa-3x mb-3"></i>
            <h3 class="fw-bold mb-0"><?php echo e($stats['pending_products']); ?></h3>
            <small>Pending Approval</small>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="seller-stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
            <i class="fas fa-gavel fa-3x mb-3"></i>
            <h3 class="fw-bold mb-0"><?php echo e($stats['active_auctions']); ?></h3>
            <small>Active Auctions</small>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="seller-stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white;">
            <i class="fas fa-check-circle fa-3x mb-3"></i>
            <h3 class="fw-bold mb-0"><?php echo e($stats['sold_products']); ?></h3>
            <small>Sold Products</small>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-bolt"></i> Quick Actions
                </h5>
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo e(route('seller.products.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                    <a href="<?php echo e(route('seller.products.index')); ?>" class="btn btn-info">
                        <i class="fas fa-box"></i> My Products
                    </a>
                    <a href="<?php echo e(route('seller.auctions.create')); ?>" class="btn btn-success">
                        <i class="fas fa-gavel"></i> Create Auction
                    </a>
                    <a href="<?php echo e(route('seller.auctions.index')); ?>" class="btn btn-warning">
                        <i class="fas fa-list"></i> My Auctions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Products -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-bold mb-4">
                    <i class="fas fa-box"></i> Recent Products
                </h5>

                <?php $__empty_1 = true; $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product-mini-card">
                        <div class="me-3">
                            <?php if($product->images && count($product->images) > 0): ?>
                                <img src="<?php echo e(asset('storage/' . $product->images[0])); ?>" 
                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;" 
                                     alt="<?php echo e($product->name); ?>">
                            <?php else: ?>
                                <div style="width: 60px; height: 60px; background: #e5e7eb; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold"><?php echo e(Str::limit($product->name, 30)); ?></h6>
                            <small class="text-muted">
                                <i class="fas fa-tag"></i> <?php echo e($product->category->name); ?>

                            </small>
                        </div>
                        <div class="text-end">
                            <?php if($product->status == 'pending'): ?>
                                <span class="badge bg-warning mb-2">Pending</span>
                            <?php elseif($product->status == 'approved'): ?>
                                <span class="badge bg-success mb-2">Approved</span>
                            <?php elseif($product->status == 'active'): ?>
                                <span class="badge bg-primary mb-2">Active</span>
                            <?php elseif($product->status == 'sold'): ?>
                                <span class="badge bg-secondary mb-2">Sold</span>
                            <?php else: ?>
                                <span class="badge bg-danger mb-2">Rejected</span>
                            <?php endif; ?>
                            <br>
                            <a href="<?php echo e(route('seller.products.edit', $product)); ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No products yet. 
                        <a href="<?php echo e(route('seller.products.create')); ?>">Add your first product!</a>
                    </div>
                <?php endif; ?>

                <?php if($recentProducts->count() > 0): ?>
                    <div class="text-center mt-3">
                        <a href="<?php echo e(route('seller.products.index')); ?>" class="btn btn-outline-primary">
                            View All Products <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Recent Auctions -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-bold mb-4">
                    <i class="fas fa-gavel"></i> Recent Auctions
                </h5>

                <?php $__empty_1 = true; $__currentLoopData = $recentAuctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product-mini-card">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold"><?php echo e(Str::limit($auction->product->name, 35)); ?></h6>
                            <small class="text-muted">
                                <i class="fas fa-calendar"></i> <?php echo e($auction->start_time->format('d M, Y')); ?>

                            </small>
                        </div>
                        <div class="text-end">
                            <?php if($auction->status == 'scheduled'): ?>
                                <span class="badge bg-info mb-2">Scheduled</span>
                            <?php elseif($auction->status == 'active'): ?>
                                <span class="badge bg-success mb-2">Active</span>
                            <?php elseif($auction->status == 'ended'): ?>
                                <span class="badge bg-secondary mb-2">Ended</span>
                            <?php else: ?>
                                <span class="badge bg-danger mb-2">Cancelled</span>
                            <?php endif; ?>
                            <br>
                            <small class="text-muted">
                                <i class="fas fa-gavel"></i> <?php echo e($auction->total_bids); ?> bids
                            </small>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No auctions yet. 
                        <a href="<?php echo e(route('seller.auctions.create')); ?>">Create your first auction!</a>
                    </div>
                <?php endif; ?>

                <?php if($recentAuctions->count() > 0): ?>
                    <div class="text-center mt-3">
                        <a href="<?php echo e(route('seller.auctions.index')); ?>" class="btn btn-outline-primary">
                            View All Auctions <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Tips Section -->
<div class="row">
    <div class="col-md-12">
        <div class="card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
            <div class="card-body">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-lightbulb"></i> Seller Tips
                </h5>
                <ul class="mb-0">
                    <li>Add clear, high-quality images of your products</li>
                    <li>Write detailed and accurate product descriptions</li>
                    <li>Set competitive starting prices to attract bidders</li>
                    <li>Respond to buyer inquiries promptly</li>
                    <li>Keep your products well-categorized for better visibility</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deshi-bid-v2\resources\views/seller/dashboard.blade.php ENDPATH**/ ?>