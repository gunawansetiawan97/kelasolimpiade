<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected CartService $cartService;
    protected OrderService $orderService;

    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $user = auth()->user();
        $cartItems = $this->cartService->getCartItems($user);
        $total = $this->cartService->getCartTotal($user);

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Bank account info for transfer
        $bankAccounts = [
            [
                'bank' => 'BCA',
                'account_number' => '1234567890',
                'account_name' => 'Kelas Olimpiade',
            ],
            [
                'bank' => 'Mandiri',
                'account_number' => '0987654321',
                'account_name' => 'Kelas Olimpiade',
            ],
        ];

        return view('checkout.index', compact('cartItems', 'total', 'bankAccounts'));
    }

    public function process(Request $request)
    {
        $user = auth()->user();

        try {
            $order = $this->orderService->createOrderFromCart($user);
            return redirect()->route('checkout.payment', $order)->with('success', 'Pesanan berhasil dibuat. Silakan upload bukti pembayaran.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function payment(Order $order)
    {
        // Ensure user owns this order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah diproses.');
        }

        // Bank account info for transfer
        $bankAccounts = [
            [
                'bank' => 'BCA',
                'account_number' => '1234567890',
                'account_name' => 'Kelas Olimpiade',
            ],
            [
                'bank' => 'Mandiri',
                'account_number' => '0987654321',
                'account_name' => 'Kelas Olimpiade',
            ],
        ];

        return view('checkout.payment', compact('order', 'bankAccounts'));
    }

    public function uploadProof(Request $request, Order $order)
    {
        // Ensure user owns this order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan ini sudah tidak dapat diproses.');
        }

        $request->validate([
            'proof_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('proof_image')->store('payment-proofs', 'public');

        $this->orderService->uploadPaymentProof($order, $path);

        return redirect()->route('orders.show', $order)->with('success', 'Bukti pembayaran berhasil diupload. Mohon tunggu verifikasi dari admin.');
    }
}
