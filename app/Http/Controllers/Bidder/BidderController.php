<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BidderController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        if (!$user->isBidder()) {
            abort(403);
        }

        $stats = [
            'total_bids' => $user->bids()->count(),
            'active_bids' => $user->bids()->where('status', 'active')->count(),
            'won_auctions' => $user->wonAuctions()->count(),
            'pending_payments' => $user->payments()->pending()->count(),
        ];

        $activeBids = $user->bids()
            ->with(['auction.product.category'])
            ->where('status', 'active')
            ->latest()
            ->limit(5)
            ->get();

        $wonAuctions = $user->wonAuctions()
            ->with(['product.category', 'payment'])
            ->latest()
            ->limit(5)
            ->get();

        return view('bidder.dashboard', compact('stats', 'activeBids', 'wonAuctions'));
    }

    public function myBids()
    {
        $bids = auth()->user()->bids()
            ->with(['auction.product.category'])
            ->latest()
            ->paginate(20);

        return view('bidder.bids.index', compact('bids'));
    }

    public function wonAuctions()
    {
        $wonAuctions = auth()->user()->wonAuctions()
            ->with(['product.category', 'payment'])
            ->latest()
            ->paginate(20);

        return view('bidder.won-auctions', compact('wonAuctions'));
    }
}