<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Category;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index(Request $request)
    {
        $query = Auction::with(['product.category', 'bids'])
            ->active();

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('product', function($q) use ($request) {
                $q->where('category_id', $request->category);
            });
        }

        // Search
        if ($request->has('search')) {
            $query->whereHas('product', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $auctions = $query->latest()->paginate(12);
        $categories = Category::active()->ordered()->get();

        return view('auctions.index', compact('auctions', 'categories'));
    }

    public function show(Auction $auction)
    {
        $auction->load(['product.category', 'product.user', 'bids.user', 'winner']);
        
        // Increment product views
        $auction->product->incrementViews();

        return view('auctions.show', compact('auction'));
    }
}