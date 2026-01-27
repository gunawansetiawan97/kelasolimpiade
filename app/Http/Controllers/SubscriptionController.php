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
        $userSubscription = null;

        if (auth()->check()) {
            $userSubscription = $this->subscriptionService->getUserActiveSubscription(auth()->user());
        }

        return view('subscriptions.index', compact('subscriptions', 'userSubscription'));
    }

    public function mySubscription()
    {
        $userSubscription = $this->subscriptionService->getUserActiveSubscription(auth()->user());
        $remainingDays = 0;

        if ($userSubscription) {
            $remainingDays = $this->subscriptionService->getRemainingDays($userSubscription);
        }

        return view('subscriptions.my-subscription', compact('userSubscription', 'remainingDays'));
    }
}
