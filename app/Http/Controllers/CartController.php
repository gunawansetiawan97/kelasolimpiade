<?php

namespace App\Http\Controllers;

use App\Models\QuestionPackage;
use App\Models\Subscription;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $user = auth()->user();
        $cartItems = $this->cartService->getCartItems($user);
        $total = $this->cartService->getCartTotal($user);

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function addPackage(Request $request, QuestionPackage $package)
    {
        $user = auth()->user();

        // Check if package is free
        if ($package->is_free) {
            return back()->with('error', 'Paket ini gratis, tidak perlu ditambahkan ke keranjang.');
        }

        // Check if user already has access
        if ($user->hasAccessToPackage($package)) {
            return back()->with('error', 'Anda sudah memiliki akses ke paket ini.');
        }

        $this->cartService->addPackage($user, $package);

        return back()->with('success', 'Paket berhasil ditambahkan ke keranjang.');
    }

    public function addSubscription(Request $request, Subscription $subscription)
    {
        $user = auth()->user();

        // Check if subscription is active
        if (!$subscription->is_active) {
            return back()->with('error', 'Paket langganan ini tidak tersedia.');
        }

        // Check if user already has active subscription
        if ($user->hasActiveSubscription()) {
            return back()->with('error', 'Anda sudah memiliki langganan aktif.');
        }

        $this->cartService->addSubscription($user, $subscription);

        return back()->with('success', 'Langganan berhasil ditambahkan ke keranjang.');
    }

    public function remove(Request $request, $cartId)
    {
        $user = auth()->user();
        $this->cartService->removeItem($user, $cartId);

        return back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function clear()
    {
        $user = auth()->user();
        $this->cartService->clearCart($user);

        return back()->with('success', 'Keranjang berhasil dikosongkan.');
    }

    public function count()
    {
        $user = auth()->user();
        return response()->json([
            'count' => $this->cartService->getCartCount($user)
        ]);
    }
}
