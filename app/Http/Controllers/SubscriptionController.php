<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected SubscriptionService $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function index()
    {
        $subscriptions = $this->subscriptionService->getActiveSubscriptions();
        $userSubscriptionIds = collect();

        if (auth()->check()) {
            $userSubscriptionIds = $this->subscriptionService->getUserActiveSubscriptions(auth()->user())
                ->pluck('subscription_id');
        }

        return view('subscriptions.index', compact('subscriptions', 'userSubscriptionIds'));
    }

    public function mySubscription()
    {
        $userSubscriptions = $this->subscriptionService->getUserActiveSubscriptions(auth()->user());

        // Calculate remaining days for each subscription
        $userSubscriptions = $userSubscriptions->map(function ($sub) {
            $sub->remaining_days = $this->subscriptionService->getRemainingDays($sub);
            return $sub;
        });

        return view('subscriptions.my-subscription', compact('userSubscriptions'));
    }
}
