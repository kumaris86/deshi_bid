@extends('layouts.app')

@section('title', 'Browse Auctions - Deshi Bid')

@section('content')
<style>
    .filter-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        animation: slideInLeft 0.6s ease;
    }

    .auction-item {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s;
        animation: fadeInUp 0.6s ease;
    }

    .auction-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .auction-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .auction-item:hover .auction-img {
        transform: scale(1.1);
    }
</style>

<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold mb-0" style="color: #1f2937;">
            <i class="fas fa-gavel"></i> Browse Auctions
        </h2>
        <p class="text-muted">Find amazing deals on live auctions</p>
    </div>
</div>

<div class="row">
    <!-- Filters Sidebar -->
    <div class="col-lg-3 mb-4">
        <div class="filter-card">
            <h5 class="fw-bold mb-3">
                <i class="fas fa-filter"></i> Filters
            </h5>

            <!-- Search -->
            <form action="{{ route('auctions.index') }}" method="GET">
                <div class="mb-3">
                    <label class="form-label fw-bold">Search</label>
                    <input type="text" 
                           name="search" 
                           class="form-control" 
                           placeholder="Search products..."
                           value="{{ request('search') }}">
                </div>

                <!-- Category Filter -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Category</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort By -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Sort By</label>
                    <select name="sort" class="form-select">
                        <option value="ending_soon" {{ request('sort') == 'ending_soon' ? 'selected' : '' }}>Ending Soon</option>
                        <option value="newly_listed" {{ request('sort') == 'newly_listed' ? 'selected' : '' }}>Newly Listed</option>
                        <option value="most_bids" {{ request('sort') == 'most_bids' ? 'selected' : '' }}>Most Bids</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Apply Filters
                </button>

                @if(request()->hasAny(['search', 'category', 'sort']))
                    <a href="{{ route('auctions.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="fas fa-times"></i> Clear Filters
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Auction Listing -->
    <div class="col-lg-9">
        @if($auctions->count() > 0)
            <div class="row">
                @foreach($auctions as $auction)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="auction-item">
                            <div style="overflow: hidden; height: 220px;">
                                @if($auction->product->images && count($auction->product->images) > 0)
                                    <img src="{{ asset('storage/' . $auction->product->images[0]) }}" 
                                         class="auction-img" 
                                         alt="{{ $auction->product->name }}">
                                @else
                                    <div class="auction-img d-flex align-items-center justify-content-center bg-light">
                                        <i class="fas fa-image fa-4x text-muted"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="p-3">
                                <!-- Category Badge -->
                                <span class="badge mb-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    {{ $auction->product->category->name }}
                                </span>

                                <!-- Product Name -->
                                <h5 class="fw-bold mb-2">
                                    {{ Str::limit($auction->product->name, 35) }}
                                </h5>

                                <!-- Current Price -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <small class="text-muted d-block">Current Bid</small>
                                        <span class="fw-bold" style="font-size: 1.5rem; color: #10b981;">
                                            ৳{{ number_format($auction->current_price > 0 ? $auction->current_price : $auction->product->starting_price, 2) }}
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-success">
                                            <i class="fas fa-gavel"></i> {{ $auction->total_bids }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Time Remaining -->
                                <div class="mb-3">
                                    <span class="badge" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); width: 100%; padding: 0.5rem;">
                                        <i class="fas fa-clock"></i> {{ $auction->getTimeRemaining() }}
                                    </span>
                                </div>

                                <!-- View Button -->
                                <a href="{{ route('auctions.show', $auction) }}" class="btn btn-primary w-100">
                                    <i class="fas fa-eye"></i> View Auction
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $auctions->links() }}
            </div>
        @else
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h4>No auctions found</h4>
                    <p class="text-muted">
                        @if(request()->hasAny(['search', 'category']))
                            Try adjusting your filters or 
                            <a href="{{ route('auctions.index') }}">clear all filters</a>
                        @else
                            Check back soon for new auctions!
                        @endif
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Auto refresh every 30 seconds for live updates
    setTimeout(function() {
        location.reload();
    }, 30000);
</script>
@endpush
@endsection