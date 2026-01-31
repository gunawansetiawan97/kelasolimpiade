<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\XenditService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected CartService $cartService;
    protected OrderService $orderService;
    protected XenditService $xenditService;

    public function __construct(CartService $cartService, OrderService $orderService, XenditService $xenditService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
        $this->xenditService = $xenditService;
    }

    public function index()
    {
        $user = auth()->user();
        $cartItems = $this->cartService->getCartItems($user);
        $total = $this->cartService->getCartTotal($user);

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $user = auth()->user();

        try {
            // Create order from cart
            $order = $this->orderService->createOrderFromCart($user);

            // Create Xendit invoice
            $result = $this->xenditService->createInvoice($order);

            if ($result['success']) {
                // Redirect to Xendit payment page
                return redirect()->away($result['invoice_url']);
            } else {
                // If Xendit fails, redirect to manual payment page
                return redirect()->route('checkout.payment', $order)
                    ->with('error', 'Gagal membuat invoice pembayaran. Silakan gunakan metode manual.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show payment page (fallback for manual payment or to check status)
     */
    public function payment(Order $order)
    {
        // Ensure user owns this order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status === 'paid') {
            return redirect()->route('orders.show', $order)->with('success', 'Pembayaran berhasil!');
        }

        if (!in_array($order->status, ['pending'])) {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah diproses.');
        }

        $order->load('payment');

        // If has Xendit invoice, show link to pay
        if ($order->payment && $order->payment->xendit_invoice_url) {
            return view('checkout.payment-xendit', compact('order'));
        }

        // Fallback to manual payment
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

    /**
     * Retry creating Xendit invoice for an existing order
     */
    public function retryPayment(Order $order)
    {
        // Ensure user owns this order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order)->with('error', 'Pesanan ini sudah tidak dapat diproses.');
        }

        // Create new Xendit invoice
        $result = $this->xenditService->createInvoice($order);

        if ($result['success']) {
            return redirect()->away($result['invoice_url']);
        }

        return back()->with('error', 'Gagal membuat invoice pembayaran: ' . ($result['error'] ?? 'Unknown error'));
    }

    /**
     * Upload manual payment proof (fallback)
     */
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
