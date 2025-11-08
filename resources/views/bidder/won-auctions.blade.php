@extends('layouts.app')

@section('title', 'Won Auctions - Deshi Bid')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold">
            <i class="fas fa-trophy"></i> Won Auctions
        </h2>
        <p class="text-muted">Congratulations on your wins!</p>
    </div>
</div>

<div class="row">
    @forelse($wonAuctions as $auction)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        @if($auction->product->images && count($auction->product->images) > 0)
                            <img src="{{ asset('storage/' . $auction->product->images[0]) }}" 
                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;"
                                 alt="{{ $auction->product->name }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; border-radius: 10px;">
                                <i class="fas fa-image fa-2x text-muted"></i>
                            </div>
                        @endif
                        
                        <div class="ms-3 flex-grow-1">
                            <h5 class="fw-bold mb-2">
                                <i class="fas fa-trophy text-warning"></i>
                                {{ $auction->product->name }}
                            </h5>
                            
                            <div class="mb-2">
                                <h4 class="text-success mb-0">
                                    ৳{{ number_format($auction->current_price, 2) }}
                                </h4>
                                <small class="text-muted">Winning bid</small>
                            </div>
                            
                            @if($auction->payment)
                                @if($auction->payment->status == 'completed')
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle"></i> Paid
                                    </span>
                                @elseif($auction->payment->status == 'pending')
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock"></i> Payment Pending
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times-circle"></i> Payment Required
                                    </span>
                                @endif
                            @else
                                <span class="badge bg-danger">
                                    <i class="fas fa-exclamation-triangle"></i> Payment Required
                                </span>
                            @endif
                            
                            <div class="mt-3">
                                <a href="{{ route('auctions.show', $auction) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> You haven't won any auctions yet. Keep bidding!
            </div>
        </div>
    @endforelse
</div>

{{ $wonAuctions->links() }}
@endsection